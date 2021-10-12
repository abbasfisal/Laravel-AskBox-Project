<?php

namespace App\Models;

use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'password','image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admincomments()
    {
        return $this->hasMany(Comment::class , 'user_id' , 'id');
    }

}
