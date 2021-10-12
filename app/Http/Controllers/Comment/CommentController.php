<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Admin\Ask;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Enumerations\Databases\CommentEnum;
use Infrastructure\Interfaces\Repositories\CommentRepositoryInterface;

class CommentController extends Controller
{
    /**
     * @var CommentRepositoryInterface $commentRepository
     */
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }


    /**
     * add user comment to an ask
     *
     * @param CommentRequest $request
     * @param Ask $ask
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addComment(CommentRequest $request, Ask $ask)
    {


        $this->commentRepository->create([
            CommentEnum::ASK_ID => $ask->id,
            CommentEnum::USER_ID => Auth::id(),
            CommentEnum::TEXT => $request->get('comment')
        ]);


        return redirect()->back();


    }

    /**
     * Replying to a Comment
     *
     * @param CommentRequest $request
     * @param Comment $comment
     * @param Ask $ask
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addReply(CommentRequest $request, Comment $comment, Ask $ask)
    {
        $this->commentRepository
            ->create([
                CommentEnum::ASK_ID => $ask->id,
                CommentEnum::USER_ID => Auth::id(),
                CommentEnum::COMEMNT_ID => $comment->id,
                CommentEnum::TEXT => $request->get('comment')
            ]);

        return redirect()->back();

    }

    public function addLike(Comment $comment)
    {

        $this->commentRepository->AddOrRemoveUserLike($comment, Auth::id());


        return redirect()->back();
    }


    /**
     * add Admin comment to an ask
     *
     * @param CommentRequest $request
     * @param Ask $ask
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAdminComment(CommentRequest $request, Ask $ask)
    {


        $this->commentRepository->create([
            CommentEnum::ASK_ID => $ask->id,
            CommentEnum::USER_ID => Auth::guard('admin')->id(),
            CommentEnum::IS_ADMIN => true,
            CommentEnum::TEXT => $request->get('comment')
        ]);


        return redirect()->back();


    }


    /**
     * Replying By Admin to a Comment
     *
     * @param CommentRequest $request
     * @param Comment $comment
     * @param Ask $ask
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addAdminReply(CommentRequest $request, Comment $comment, Ask $ask)
    {

        $this->commentRepository
            ->create([
                CommentEnum::ASK_ID => $ask->id,
                CommentEnum::USER_ID => Auth::guard('admin')->id(),
                CommentEnum::COMEMNT_ID => $comment->id,
                CommentEnum::IS_ADMIN => true,
                CommentEnum::TEXT => $request->get('comment')
            ]);

        return redirect()->back();

    }

}
