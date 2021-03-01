<?php


namespace App\Models;

use Illuminate\Support\Arr;
use JetBrains\PhpStorm\Pure;

/**
 * @property array $list
 **/
class News
{
    private array $list = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'category_id' => 2
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'category_id' => 1
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'А тут плохие новости(((',
            'category_id' => 1
        ],
        5 => [
            'id' => 5,
            'title' => 'Новость 5',
            'text' => 'А тут плохие новости(((',
            'category_id' => 3
        ]
    ];

    public function findAll(): array {
        return $this->list;
    }

    #[Pure] public function findOne(int $id): ?array {
        return $this->findAll()[$id] ?? [];
    }

    public function findBy(string $key, int $value): array {
        return Arr::where($this->findAll(), function ($item) use ($key, $value) {
            return $item[ $key ] === $value;
        });
    }
}
