<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'category_id', 'title', 'slug', 'author', 'content',
        'image', 'status', 'published_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'title'        => 'required|min_length[10]|max_length[200]',
        'category_id'  => 'required|is_natural_no_zero',
        'author'       => 'required|min_length[3]|max_length[100]',
        'content'      => 'required',
        'published_at' => 'required|valid_date',
    ];

    protected $validationMessages = [
        'title' => [
            'required'   => 'Judul artikel wajib diisi.',
            'min_length' => 'Judul artikel minimal 10 karakter.',
        ],
        'category_id' => [
            'required'          => 'Kategori wajib dipilih.',
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
            'valid_date' => 'Format tanggal publikasi tidak valid.',
        ],
    ];

    public function withCategory()
    {
        return $this->select('articles.*, categories.name as category_name, categories.slug as category_slug')
            ->join('categories', 'categories.id = articles.category_id', 'left')
            ->orderBy('articles.published_at', 'DESC');
    }

    public function findBySlug(string $slug)
    {
        return $this->withCategory()->where('articles.slug', $slug)->first();
    }

    public function published()
    {
        return $this->withCategory()->where('articles.status', 'published');
    }

    public function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = url_title($title, '-', true);
        $slug = $base;
        $i    = 1;

        while (true) {
            $builder = $this->where('slug', $slug);
            if ($ignoreId) {
                $builder->where('id !=', $ignoreId);
            }
            if (! $builder->first()) {
                break;
            }
            $slug = $base . '-' . (++$i);
        }

        return $slug;
    }
}
