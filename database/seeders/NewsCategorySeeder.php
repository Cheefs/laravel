<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategorySeeder extends Seeder
{
    private array $list = [
        ['slug' => 'sport', 'title' => 'Sport'],
        ['slug' => 'nature', 'title' => 'Nature'],
        ['slug' => 'science', 'title' => 'Science'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('news_categories')->insert($this->list);
    }
}
