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

        for($i = 0; $i < 10; $i++) {
            $randomCategory = $categoryList[ rand(0, count($categoryList) - 1) ];
            $data[] = [
                'title' => $faker->word(),
                'text' => $faker->realText(rand(200,700)),
                'is_private' => false,
                'category_id' => $randomCategory->id,
                'image' => null
            ];
        }
        return $data;
    }
}
