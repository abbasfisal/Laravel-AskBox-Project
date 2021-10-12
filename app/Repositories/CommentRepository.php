<?php


namespace App\Repositories;


use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Abstracts\Repositories\Base\BaseRepository;
use Infrastructure\Enumerations\Databases\CommentEnum;
use Infrastructure\Interfaces\Repositories\CommentRepositoryInterface;

/**
 * @method with($relationName)
 * @method create($attributes)
 * @method all($coloumns = ['*'])
 *
 */
class CommentRepository
    extends BaseRepository
    implements CommentRepositoryInterface
{

    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }


    /**
     * @inheritDoc
     */
    public function IsUserLikedComment($comment, $AuthId)
    {
        return $comment->users_like()
            ->where(CommentEnum::USER_ID, $AuthId)
            ->count();
    }

    public function AddOrRemoveUserLike($comment, $AuthId)
    {
        return $this->IsUserLikedComment($comment, $AuthId)

            ? $comment->users_like()->detach($AuthId)

            : $comment->users_like()->attach($AuthId);

    }
}
