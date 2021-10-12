<?php


namespace App\Repositories\RelationTraits;


use App\Models\Admin;
use App\Models\Admin\Ask;
use App\Models\Comment;
use App\Models\User;
use Infrastructure\Enumerations\Databases\CommentEnum;

trait CommentRelationTrait
{

    /**
     * Each Comment BelongsTo a User
     *  (1:user=>N:comment)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Each Comment Belongs to a Ask
     *  (1:Ask=>N:Comment)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ask()
    {
        return $this->belongsTo(Ask::class);
    }



    /**
     * This method act as Replying Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, CommentEnum::COMEMNT_ID);
    }


    /**
     * admin reply for a comment
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adminReply()
    {
        return $this->belongsTo(Admin::class, CommentEnum::USER_ID, CommentEnum::ID);
    }




    /**
     * Many to Many Relation with User
     * (for store user_id , comment_id in the comment_like table)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users_like()
    {
        return $this->belongsToMany(
            User::class,
            'comment_like',
            CommentEnum::COMEMNT_ID,
            CommentEnum::USER_ID,
            'id',
            'id'
        )
            ->withTimestamps();
    }

}
