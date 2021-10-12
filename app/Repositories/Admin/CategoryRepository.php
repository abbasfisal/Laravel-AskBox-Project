<?php


namespace App\Repositories\Admin;


use App\Models\Admin\Category;
use Illuminate\Support\Facades\File;
use Infrastructure\Abstracts\Repositories\Base\BaseRepository;
use Infrastructure\Enumerations\Databases\CategoryEnum;
use Infrastructure\Interfaces\Repositories\Admin\CategoryRepositoryInterface;


/**
 * @method with($relationName)
 * @method all($coloumns = ['*'])
 *
 */
class CategoryRepository
    extends BaseRepository
    implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }


    /**
     * Creat New Category
     *
     * @param $attributes
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function create($attributes)
    {

        return $this->model::query()->create([
            CategoryEnum::TITLE => $attributes->get('title'),
            CategoryEnum::IMAGE => $attributes->get('filepath')
        ]);

    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = null)
    {

        return Category::query()->paginate(config('appData.perPage'));
    }


    /**
     * @inheritDoc
     */
    public function delete(Category $category)
    {
        File::delete(public_path(env('category_image_path') . $category->image));

        return $category->delete();
    }


    /**
     * @inheritDoc
     */
    public function update(Category $category, $attributes)
    {

        return $category->update([
            CategoryEnum::TITLE => $attributes->get('title'),
            CategoryEnum::IMAGE => $attributes->get('filepath')
        ]);

    }

    /**
     * @inheritDoc
     */
    public function getRandom($limit = 4)
    {
        return $this->model::query()
            ->inRandomOrder()
            ->limit($limit)->get();
    }

    /**
     * @inheritDoc
     */
    public function getTitle($Id)
    {
        return
            Category::query()
                ->where(CategoryEnum::ID, '=', $Id)
                ->pluck('title')->first();
    }


}
