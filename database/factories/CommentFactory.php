<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //comment mdoel
        //ask_id (fk)
        //user_id (fk)
        //text
        //comment_likes(users_like)

        return [
            'ask_id'=>'2',
            'user_id'=> User::query()->inRandomOrder()->first(),
            'text'=>$this->faker->text(105)
        ];
    }
}
