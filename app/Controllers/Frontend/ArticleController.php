<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Models\CategoryModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class ArticleController extends BaseController
{
    public function detail($slug)
    {
        $articleModel  = new ArticleModel();
        $categoryModel = new CategoryModel();

        $article = $articleModel->findBySlug($slug);

        if (! $article || $article['status'] !== 'published') {
            throw PageNotFoundException::forPageNotFound('Artikel tidak ditemukan.');
        }

        $related = $articleModel->published()
            ->where('articles.category_id', $article['category_id'])
            ->where('articles.id !=', $article['id'])
            ->limit(3)
            ->find();

        $data = [
            'title'      => $article['title'],
            'article'    => $article,
            'related'    => $related,
            'categories' => $categoryModel->orderBy('name', 'ASC')->findAll(),
        ];

        return view('frontend/detail', $data);
    }
}
