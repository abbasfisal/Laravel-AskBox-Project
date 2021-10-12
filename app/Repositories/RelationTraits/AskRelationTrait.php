<?php


namespace App\Repositories\RelationTraits;


use App\Models\Admin\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Infrastructure\Enumerations\Databases\AskLikeEnum;

trait AskRelationTrait
{
    /*--------------------------------------------------------------------
     | Define Relation between Ask Model and Other Models in This Class
     |--------------------------------------------------------------------
     */


    /**
     * Relation between Asks  with  Categories Table
     * many to many relation
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class
        );
    }

    /**
     * Relation between Ask and its Comments
     * @return HasMany|Collection|Comment[]
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * inverce Many To Many Relation between Asks And Users
     * for Store the ask_id and user_id
     * in the ask_like table
     * @return BelongsToMany
     */
    public function user_likes(): BelongsToMany
    {

        return
            $this
                ->belongsToMany(User::class, AskLikeEnum::TableName)
                ->withTimestamps();
    }



}
