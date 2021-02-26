<?php


namespace App\Models;

use Illuminate\Support\Arr;

/**
 * @property array $list
 * @property News $news
 **/
class NewsCategory
{
    private News $news;
    private array $list = [
        1 => [
            'id' => 1,
            'slug' => 'sport',
            'title' => 'Sport'
        ],
        2 =>  [
            'id' => 2,
            'slug' => 'nature',
            'title' => 'Nature'
        ],
        3 => [
            'id' => 3,
            'slug' => 'science',
            'title' => 'Science'
        ],
    ];

    public function __construct(News $news) {
        $this->news = $news;
    }

    public function findAll(): array {
        return $this->list;
    }

    public function findOne(int $id): ?array {
        return $this->findAll()[$id] ?? [];
    }

    public function findBy(string $key, string|int $value): ?array {
        return Arr::first($this->findAll(), function ($item) use ($key, $value) {
            return $item[ $key ] === $value;
        });
    }

    public function getNews(int $categoryId): array {
        return $this->news->findBy('category_id', $categoryId);
    }
}
