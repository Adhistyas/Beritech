<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected KategoriModel $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Manajemen Kategori',
            'categories' => $this->categoryModel->withArticleCount()->orderBy('categories.name', 'ASC')->findAll(),
        ];

        return view('admin/kategori/index', $data);
    }

    public function create()
    {
        return view('admin/kategori/form', ['title' => 'Tambah Kategori', 'category' => null]);
    }

    public function store()
    {
        $rules = ['name' => 'required|min_length[3]|max_length[100]'];
        $messages = [
            'name' => [
                'required'   => 'Nama kategori wajib diisi.',
                'min_length' => 'Nama kategori minimal 3 karakter.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = $this->request->getPost('name');

        $this->categoryModel->insert([
            'name' => $name,
            'slug' => url_title($name, '-', true),
        ]);

        return redirect()->to('/admin/categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);

        if (! $category) {
            return redirect()->to('/admin/categories')->with('error', 'Kategori tidak ditemukan.');
        }

        return view('admin/kategori/form', ['title' => 'Edit Kategori', 'category' => $category]);
    }

    public function update($id)
    {
        $category = $this->categoryModel->find($id);

        if (! $category) {
            return redirect()->to('/admin/categories')->with('error', 'Kategori tidak ditemukan.');
        }

        $rules = ['name' => 'required|min_length[3]|max_length[100]'];
        $messages = [
            'name' => [
                'required'   => 'Nama kategori wajib diisi.',
                'min_length' => 'Nama kategori minimal 3 karakter.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $name = $this->request->getPost('name');

        $this->categoryModel->update($id, [
            'name' => $name,
            'slug' => url_title($name, '-', true),
        ]);

        return redirect()->to('/admin/categories')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function delete($id)
    {
        $category = $this->categoryModel->find($id);

        if (! $category) {
            return redirect()->to('/admin/categories')->with('error', 'Kategori tidak ditemukan.');
        }

        $this->categoryModel->delete($id);

        return redirect()->to('/admin/categories')->with('success', 'Kategori berhasil dihapus.');
    }
}
