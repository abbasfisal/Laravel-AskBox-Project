<?php


namespace Infrastructure\Interfaces\Repositories;


use App\Models\Comment;

interface CommentRepositoryInterface
{

    /**
     * Check Authenticated User liked or did not like an comment
     *
     * @param Comment $comment
     * @param $AuthId
     * @return mixed
     */
    public function IsUserLikedComment(Comment $comment, $AuthId);


    /**
     * Add or Remove authenticated user which is like
     * or did not like an comment
     *
     * @param Comment $comment
     * @param $AuthId
     * @return mixed
     */
    public function AddOrRemoveUserLike($comment, $AuthId);
}
