<?php


namespace Infrastructure\Interfaces\Repositories\Admin;


use App\Http\Requests\CategoryRequest;
use App\Models\Admin\Category;

/**
 * Interface CategoryRepositoryInterface
 * @package Infrastructure\Interfaces\Repositories\Admin
 */
interface CategoryRepositoryInterface
{

    /**
     * Return Category with Pagination (default  perpage : 15)
     * @param null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage=null);


    /**
     * Delete a category
     * @param Category $category
     * @return mixed
     */
    public function delete(Category $category);

    /**
     * update an category
     *
     * @param Category $category
     * @param CategoryRequest $attributes
     * @return mixed
     */
    public function update(Category $category , CategoryRequest $attributes);

    /**
     * Get Some Category Randomly
     *
     * @param int $limit
     * @return mixed
     */
    public function getRandom($limit=4);


    /**
     * Get Title of Given category Id
     *
     * @param $Id
     * @return mixed
     */
    public function getTitle($Id);
}
