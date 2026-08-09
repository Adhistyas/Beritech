<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class BerandaController extends BaseController
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
        $latest  = $this->articleModel->published()->limit(7)->find();

        $data = [
            'title'      => 'Beranda',
            'headline'   => $latest[0] ?? null,
            'articles'   => array_slice($latest, 1),
            'categories' => $this->categoryModel->orderBy('name', 'ASC')->findAll(),
        ];

        return view('frontend/beranda', $data);
    }

    public function articles()
    {
        $keyword    = $this->request->getGet('q');
        $categoryId = $this->request->getGet('kategori');

        $builder = $this->articleModel->published();

        if ($keyword) {
            $builder->like('articles.title', $keyword);
        }

        if ($categoryId) {
            $builder->where('articles.category_id', $categoryId);
        }

        $data = [
            'title'      => 'Semua Artikel',
            'articles'   => $builder->paginate(5),
            'pager'      => $this->articleModel->pager,
            'categories' => $this->categoryModel->orderBy('name', 'ASC')->findAll(),
            'keyword'    => $keyword,
            'categoryId' => $categoryId,
        ];

        return view('frontend/artikel', $data);
    }

    public function about()
    {
        return view('frontend/tentang', [
            'title'      => 'Tentang',
            'categories' => $this->categoryModel->orderBy('name', 'ASC')->findAll(),
        ]);
    }
}
