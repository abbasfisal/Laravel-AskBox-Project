<?php

namespace App\Models;

use App\Models\Admin\Ask;
use App\Repositories\RelationTraits\CommentRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Infrastructure\Enumerations\Databases\CommentEnum;
use Symfony\Component\Mime\Email;

class Comment extends Model
{
    use CommentRelationTrait;
    use HasFactory;

    protected $guarded = [];




    public function users_like_count()
    {
        return $this->users_like()->count();
    }

    /*
     * check user liked or not liked a comment
     * @return bool
     */
    public function is_user_liked_a_comment($userId)
    {
        return (bool)$this->users_like()
            ->where(CommentEnum::USER_ID, $userId)
            ->count();
    }
}
