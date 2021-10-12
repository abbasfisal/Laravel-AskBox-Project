<?php

namespace Database\Factories\admin;

use App\Models\Admin\Ask;
use Illuminate\Database\Eloquent\Factories\Factory;

class AskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //a
        return [
            'title'=>$this->faker->sentence(),
            'image'=>'/storage/photos/1/ask/'. rand(1,3).'.jpg'
        ];
    }
}
