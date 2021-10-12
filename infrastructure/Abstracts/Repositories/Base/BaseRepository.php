<?php


namespace Infrastructure\Abstracts\Repositories\Base;


use Illuminate\Database\Eloquent\Model;
use Infrastructure\Interfaces\Repositories\Base\BaseRepositoryInterface;



abstract class BaseRepository
    implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function create($attributes)
    {
        return $this->model::query()->create($attributes);
    }


    public function with($relationName)
    {
        return $this->model::query()->with($relationName)->get();
    }


    public function all($coloumns = ['*'])
    {
        return $this->model::all($coloumns);
    }
}
