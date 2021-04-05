<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    private array $list = [
        ['name' => 'Lenta ru', 'url' => 'https://lenta.ru/rss'],
        ['name' => 'Habr', 'url' => 'https://habr.com/ru/rss/all/all/'],
        ['name' => 'Mail ru', 'url' => 'https://news.mail.ru/rss'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('resources')->insert($this->list);
    }
}
