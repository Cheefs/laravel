<?php


namespace App\Models;

use Illuminate\Support\Arr;

/**
 * @property array $list
 **/
class News
{
    private array $list = [
        1 => [
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'category_id' => 2
        ],
        2 => [
            'title' => 'Новость 2',
            'text' => 'А тут плохие новости(((',
            'category_id' => 1
        ],
        3 => [
            'title' => 'Новость 3',
            'text' => 'А тут плохие новости(((',
            'category_id' => 1
        ],
        5 => [
            'title' => 'Новость 5',
            'text' => 'А тут плохие новости(((',
            'category_id' => 3
        ]
    ];

    public function findAll(): array {
        return $this->list;
    }

    public function findOne(string $id): array {
        return $this->list[ $id ];
    }

    public function findBy(string $key, int $value): array {
        return Arr::where($this->list, function ($item) use ($key, $value) {
            return $item[ $key ] === $value;
        });
    }
}
