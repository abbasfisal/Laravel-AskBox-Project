<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ask;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Infrastructure\Interfaces\Repositories\Admin\AskRepositoryInterface;
use Infrastructure\Interfaces\Repositories\Admin\CategoryRepositoryInterface;

/*
 *  this class used for left side menue
 */

class UserAskController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;
    /**
     * @var AskRepositoryInterface
     */
    private $askRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository, AskRepositoryInterface $askRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->askRepository = $askRepository;
    }

    public function showBest()
    {


        $asks = $this->askRepository->OrderByMostLikesWithPagination();

        $categories = $this->categoryRepository->getRandom();

        return view('user.pages.most_likes_ask',
            compact('asks', 'categories')
        );


    }

    public function showMostComments()
    {
        $asks = $this->askRepository->OrderByMostCommentWithPagination();

        $categories = $this->categoryRepository->getRandom();


        return view('user.pages.most_comments_ask'
            , compact('asks', 'categories')
        );
    }

    /**
     * get latest asks
     *
     */
    public function showLates()
    {
        $asks = $this->askRepository->showLates();

        $categories = $this->categoryRepository->getRandom();

        return view('user.pages.show_latest_ask', compact('asks', 'categories'));
    }


    /*
     * show single ask
     */
    public function showSingleAsk(Ask $ask)
    {

        /** @var Ask $question */
        $question = $ask;

        $comments = $this->askRepository->getAskCommentsWithPaginate($ask);

        return view('user.pages.single_question', compact('question', 'comments'));

    }


    /*
     * select asks by its category
     */
    public function show_asks_by_category(Request $request, $category)
    {

        $filter_title = $this->categoryRepository->getTitle($category);


        $asks = $this->askRepository->FilterAsk_By($category);

        $categories = $this->categoryRepository->getRandom();


        return view('user.pages.category_filter',
            compact('asks', 'categories', 'filter_title'));

    }
}
