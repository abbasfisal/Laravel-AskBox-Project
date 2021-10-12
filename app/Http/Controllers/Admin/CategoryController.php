<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Admin\Category;
use Infrastructure\Interfaces\Repositories\Admin\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show Create new category Form
     *
     */
    public function create()
    {
        $categories = $this->categoryRepository->paginate();

        return view('admin.pages.category', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        $this->categoryRepository
            ->create($request);

        return self::GoTo('create.category', 'create');
    }


    /**
     * Delete an category
     *
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository
            ->delete($category);

        return self::GoTo('create.category', 'delete');

    }


    /**
     * show edit category form
     *
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        return view('admin.pages.edit_category', compact('category'));

    }


    /**
     * Update an category
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryRepository
            ->update($category, $request);

        return self::GoTo('create.category', 'update');
    }
}

