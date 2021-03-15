<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $defaultCategory = NewsCategory::first();

        return [
            'title' => $this->faker->realText(rand(10,30)),
            'text' => $this->faker->realText(rand(200,700)),
            'is_private' => null,
            'news_category_id' => $defaultCategory->id,
            'image' => null
        ];
    }
}
