<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');

        $categoryList = DB::table('news_category')->get();

        for($i = 0; $i <= 10; $i++) {
            $data[] = [
                'title' => $faker->word(),
                'text' => $faker->realText(rand(200,700)),
                'is_private' => false,
                'category_id' => rand(1, count($categoryList)),
                'image' => null
            ];
        }
        return $data;
    }
}
