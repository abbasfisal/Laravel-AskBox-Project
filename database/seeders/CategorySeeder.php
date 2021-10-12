<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CategorySeeder extends Seeder
{

    public function run()
    {

        foreach (config('appData.category_title') as $item) {
            Category::query()->create([
                'title' => $item ,
                'image'=>"/storage/photos/1/category/".Arr::random(config('appData.category_images_name')),
            ]);
        }

    }
}
