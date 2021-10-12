<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ask;
use App\Repositories\Admin\AskRepository;
use App\Repositories\Admin\CategoryRepository;
use Infrastructure\Interfaces\Repositories\Admin\AskRepositoryInterface;
use Infrastructure\Interfaces\Repositories\Admin\CategoryRepositoryInterface;

class UserController extends Controller
{

    public function showHome()
    {
        /**@var CategoryRepository $categories */
        $categories = self::makeInstace(CategoryRepositoryInterface::class);
        $categories = $categories->getRandom(10);


        /**@var AskRepository $asks */
        $asks = self::makeInstace(AskRepositoryInterface::class);
        $asks = $asks->getRandomAsk();


        return view('user.pages.home', compact('categories' ,'asks'));
    }

    public function showChallangeDay()
    {
        //make instance
        /**@var AskRepository $askRepository */
        $askRepository = self::makeInstace(AskRepositoryInterface::class);

        /** @var Ask $question */
        $question = $askRepository->getLatest();

        $comments = $askRepository
            ->getAskCommentsWithPaginate($question);


        return view('user.pages.question', compact('question', 'comments'));

    }


    public function showCategories()
    {
        /**@var CategoryRepositoryInterface $categoryRepository */
        $categoryRepository = self::makeInstace(CategoryRepositoryInterface::class);

        $categories = $categoryRepository->paginate();

        return view('user.pages.categories', compact('categories'));
    }


}

