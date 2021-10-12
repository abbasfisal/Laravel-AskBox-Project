<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AskRequest;
use App\Models\Admin\Ask;
use App\Repositories\Admin\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Infrastructure\Enumerations\Databases\AskEnum;
use Infrastructure\Interfaces\Repositories\Admin\AskRepositoryInterface;
use Infrastructure\Interfaces\Repositories\Admin\CategoryRepositoryInterface;

/**
 * Class AskController
 * @package App\Http\Controllers\Admin
 */
class AskController extends Controller
{
    /**
     * an concrete  of AskRepositoryInterface
     * @var AskRepositoryInterface
     */
    private $askRepository;

    /**
     * AskController constructor.
     * @param AskRepositoryInterface $askRepository
     */
    public function __construct(AskRepositoryInterface $askRepository)
    {
        $this->askRepository = $askRepository;
    }

    /**
     * show asks data with categories relation
     *
     * @return View
     */
    public function index()
    {


        $asks = $this->askRepository
            ->with(AskEnum::getRelationName('categories'));

        return view('admin.pages.show_ask', compact('asks', $this->askRepository));
    }

    /**
     * Show Create New Asks Form with passing Category data
     */
    public function create()
    {
        //make instanse of category repository
        /**@var CategoryRepository $categoryRepository */
        $categoryRepository = self::makeInstace(CategoryRepositoryInterface::class);

        $categories = $categoryRepository->all(); //get all categories table data


        return view('admin.pages.create_ask', compact('categories'));
    }

    /**
     * Show Create-New-Ask Form
     * with passing Category Data TO It
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AskRequest $request)
    {

        $this->askRepository
            ->createWithCategory($request);

        return
            self::GoTo('show.askbox', 'create');

    }

    /**
     * Delete an ask
     *
     * @param Ask $ask
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Ask $ask)
    {
        $this->askRepository->delete($ask);

        return
            self::GoTo('show.askbox', 'delete');

    }

    /**
     * Show Edit-Ask Form
     *
     * with passing Category Data TO It
     * @param Ask $ask
     * @return View
     */
    public function edit(Ask $ask)
    {
        //make instanse of category repository
        /**@var CategoryRepository $categoryRepository */
        $categoryRepository = self::makeInstace(CategoryRepositoryInterface::class);

        $categories = $categoryRepository->all(); //get all categories table data


        return view('admin.pages.edit_ask', compact('ask', 'categories'));
    }

    /**
     * update data Of an ask
     *
     * @param Request $request
     * @param Ask $ask
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AskRequest $askRequest, Ask $ask)
    {

        $this->askRepository->update($askRequest, $ask);


        return self::GoTo('show.askbox', 'update');


    }


    /**
     *  add or remove single ask like
     *
     * @param Ask $ask
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLikes(Ask $ask)
    {

        $this->askRepository->AddOrRemoveUserLike($ask, Auth::id());

        return redirect()->back();


    }

    /**
     * show single ask for admin
     * @param Ask $ask
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showSingle(Ask $ask)
    {

        /** @var Ask $question */
        $question = $ask;

        $comments = $this->askRepository->getAskCommentsWithPaginate($ask);

        return view('admin.pages.single_question', compact('question', 'comments'));

    }
}
