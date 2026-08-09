<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $articleModel  = new ArtikelModel();
        $categoryModel = new KategoriModel();

        $data = [
            'title'           => 'Dashboard',
            'total_articles'  => $articleModel->countAll(),
            'total_categories' => $categoryModel->countAll(),
            'total_published' => $articleModel->where('status', 'published')->countAllResults(),
            'total_draft'     => $articleModel->where('status', 'draft')->countAllResults(),
            'latest_articles' => $articleModel->withCategory()->limit(5)->find(),
        ];

        return view('admin/dashboard', $data);
    }
}
