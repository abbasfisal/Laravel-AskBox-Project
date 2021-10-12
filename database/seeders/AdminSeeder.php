<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Admin\Avatar;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::query()->create([
            'name'=>'ali',
            'email'=>'aa@b.com',
            'image'=>Avatar::query()->inRandomOrder()->limit(1)->pluck('image')['0'],
            'password'=>bcrypt('manbar102a') ,

        ]);
    }
}
