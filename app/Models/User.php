<?php

namespace App\Models;

use App\Models\Admin\Ask;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Infrastructure\Enumerations\Databases\AskLikeEnum;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'image',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // question box likes relation : Many to Many Realation
    public function ask_likes()
    {
        return $this->belongsToMany(Ask::class ,AskLikeEnum::TableName)->withTimestamps();
    }





    //relation with comments table

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }



    public function comments_like()
    {
        return $this->belongsToMany(
            Comment::class,
            'comment_like' ,
            'user_id' ,
            'comment_id' ,
            'id',
            'id'
        );
    }

}
