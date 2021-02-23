<?php


namespace App\Models;

/**
 * @property array $list
 **/
class NewsCategory
{
    private array $list = [
        'sport' => [
            'id' => 1,
            'slug' => 'sport',
            'title' => 'Sport'
        ],
        'nature' => [
            'id' => 2,
            'slug' => 'nature',
            'title' => 'Nature'
        ],
        'science' => [
            'id' => 3,
            'slug' => 'science',
            'title' => 'Science'
        ],
    ];

    public function findAll(): array {
        return $this->list;
    }

    public function findBySlug(string $slug): array {
        return $this->list[ $slug ];
    }

    public function getNews(int $categoryId): array {
        return (new News())->findBy('category_id', $categoryId);
    }
}
