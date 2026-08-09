<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class ArtikelController extends BaseController
{
    protected ArtikelModel $articleModel;
    protected KategoriModel $categoryModel;

    public function __construct()
    {
        $this->articleModel  = new ArtikelModel();
        $this->categoryModel = new KategoriModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');
        $builder = $this->articleModel->withCategory();
        if ($keyword) {
            $builder->like('articles.title', $keyword);
        }

        $data = [
            'title'    => 'Manajemen Artikel',
            'articles' => $builder->paginate(10),
            'pager'    => $this->articleModel->pager,
            'keyword'  => $keyword,
        ];

        return view('admin/articles/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Artikel',
            'categories' => $this->categoryModel->orderBy('name', 'ASC')->findAll(),
            'article'    => null,
        ];

        return view('admin/articles/form', $data);
    }

    public function store()
    {
        $rules = [
            'title'        => 'required|min_length[10]|max_length[200]',
            'category_id'  => 'required|is_natural_no_zero',
            'author'       => 'required|min_length[3]|max_length[100]',
            'content'      => 'required',
            'published_at' => 'required|valid_date',
            'image'        => 'uploaded[image]|is_image[image]|max_size[image,2048]',
        ];

        $messages = [
            'title' => [
                'required'   => 'Judul artikel wajib diisi.',
                'min_length' => 'Judul artikel minimal 10 karakter.',
            ],
            'category_id' => [
                'required'           => 'Kategori wajib dipilih.',
                'is_natural_no_zero' => 'Kategori wajib dipilih.',
            ],
            'author' => [
                'required'   => 'Nama penulis wajib diisi.',
                'min_length' => 'Nama penulis minimal 3 karakter.',
            ],
            'content' => [
                'required' => 'Isi artikel wajib diisi.',
            ],
            'published_at' => [
                'required'   => 'Tanggal publikasi wajib diisi.',
            ],
            'image' => [
                'uploaded'  => 'Gambar artikel wajib diunggah.',
                'is_image'  => 'File yang diunggah harus berupa gambar.',
                'max_size'  => 'Ukuran gambar maksimal 2MB.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = $this->articleModel->generateUniqueSlug($title);

        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getRandomName();
        $imageFile->move(FCPATH . 'uploads/articles', $imageName);

        $this->articleModel->insert([
            'category_id'  => $this->request->getPost('category_id'),
            'title'        => $title,
            'slug'         => $slug,
            'author'       => $this->request->getPost('author'),
            'content'      => $this->request->getPost('content'),
            'image'        => $imageName,
            'status'       => $this->request->getPost('status') ?: 'published',
            'published_at' => $this->request->getPost('published_at'),
        ]);

        return redirect()->to('/admin/articles')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $article = $this->articleModel->find($id);
        if (! $article) {
            return redirect()->to('/admin/articles')->with('error', 'Artikel tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Artikel',
            'categories' => $this->categoryModel->orderBy('name', 'ASC')->findAll(),
            'article'    => $article,
        ];

        return view('admin/articles/form', $data);
    }

    public function update($id)
    {
        $article = $this->articleModel->find($id);

        if (! $article) {
            return redirect()->to('/admin/articles')->with('error', 'Artikel tidak ditemukan.');
        }

        $rules = [
            'title'        => 'required|min_length[10]|max_length[200]',
            'category_id'  => 'required|is_natural_no_zero',
            'author'       => 'required|min_length[3]|max_length[100]',
            'content'      => 'required',
            'published_at' => 'required|valid_date',
            'image'        => 'is_image[image]|max_size[image,2048]|permit_empty',
        ];

        $messages = [
            'title' => [
                'required'   => 'Judul artikel wajib diisi.',
                'min_length' => 'Judul artikel minimal 10 karakter.',
            ],
            'category_id' => [
                'required'           => 'Kategori wajib dipilih.',
                'is_natural_no_zero' => 'Kategori wajib dipilih.',
            ],
            'author' => [
                'required'   => 'Nama penulis wajib diisi.',
                'min_length' => 'Nama penulis minimal 3 karakter.',
            ],
            'content' => [
                'required' => 'Isi artikel wajib diisi.',
            ],
            'published_at' => [
                'required' => 'Tanggal publikasi wajib diisi.',
            ],
            'image' => [
                'is_image' => 'File yang diunggah harus berupa gambar.',
                'max_size' => 'Ukuran gambar maksimal 2MB.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug  = $this->articleModel->generateUniqueSlug($title, (int) $id);

        $updateData = [
            'category_id'  => $this->request->getPost('category_id'),
            'title'        => $title,
            'slug'         => $slug,
            'author'       => $this->request->getPost('author'),
            'content'      => $this->request->getPost('content'),
            'status'       => $this->request->getPost('status') ?: 'published',
            'published_at' => $this->request->getPost('published_at'),
        ];

        $imageFile = $this->request->getFile('image');
        if ($imageFile && $imageFile->isValid() && ! $imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move(FCPATH . 'uploads/articles', $imageName);
            $updateData['image'] = $imageName;

            // Hapus gambar lama
            if ($article['image'] && file_exists(FCPATH . 'uploads/articles/' . $article['image'])) {
                unlink(FCPATH . 'uploads/articles/' . $article['image']);
            }
        }

        $this->articleModel->update($id, $updateData);

        return redirect()->to('/admin/articles')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function delete($id)
    {
        $article = $this->articleModel->find($id);

        if (! $article) {
            return redirect()->to('/admin/articles')->with('error', 'Artikel tidak ditemukan.');
        }

        if ($article['image'] && file_exists(FCPATH . 'uploads/articles/' . $article['image'])) {
            unlink(FCPATH . 'uploads/articles/' . $article['image']);
        }

        $this->articleModel->delete($id);

        return redirect()->to('/admin/articles')->with('success', 'Artikel berhasil dihapus.');
    }
}
