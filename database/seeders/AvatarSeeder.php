<?php

namespace Database\Seeders;

use App\Models\Admin\Avatar;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 21; $i++) {
            Avatar::query()->create([
                'image' => '/storage/photos/1/avatars/(' .$i. ').jpg'
            ]);
        }
    }
}
