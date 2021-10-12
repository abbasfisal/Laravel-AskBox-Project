<?php

namespace Database\Seeders;

use App\Models\Admin\Ask;
use App\Models\Admin\Category;
use App\Models\Comment;
use Database\Factories\CommentFactory;
use Illuminate\Database\Seeder;

class AskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Ask::query()->create([
            'title'=>'whats is your hair color ?' ,
        ])->categories()->attach(Category::query()->find([1,2,3]));*/
    }
}
