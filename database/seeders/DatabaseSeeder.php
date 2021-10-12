<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //avatar
        //admin
        //user

        //category
        //ask
        //asklike
        //comment
        //comment like

        // \App\Models\User::factory(10)->create();
        $this->call(AvatarSeeder::class);

        $this->call(AdminSeeder::class);

        $this->call(CategorySeeder::class);

        User::factory()->count(20)->create();

        Admin\Ask::factory()->count(20)->create()->each(function ($q) {
            /**@var \App\Models\Admin\Ask $q */
            for ($i = 1; $i <= rand(3, 6); $i++) {
                $q->categories()->attach([
                    'category_id' => Category::query()->inRandomOrder()->pluck('id')[0]
                ]);
            }
        });

        //--------


        //--------


        $this->call(AskSeeder::class);
    }
}
