<?php

namespace Database\Factories\admin;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            'title' => Arr::random(config('appData.category_title')),
            'image' => '/storage/photos/1/category/' . Arr::random(config('appData.category_images_name'))
        ];

    }

}
