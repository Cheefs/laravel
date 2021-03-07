<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('news_category')->insert($this->getData());
    }

    private function getData(): array {
        $data = [];
        $faker = Faker\Factory::create("ru_RU");
        for($i = 0; $i <= 10; $i++) {
            $data[] = [
                'title' => $faker->word(),
                'slug' => $faker->slug(1)
            ];
        }
        return $data;
    }
}
