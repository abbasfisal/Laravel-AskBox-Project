<?php


namespace Infrastructure\Interfaces\Repositories\Base;


/**
 * Interface BaseRepositoryInterface
 * @package Infrastructure\Interfaces\Repositories\Base
 */
interface BaseRepositoryInterface
{
    /**
     * @param  $attributes
     * @return mixed
     */
    public function create( $attributes);

    /** get data with eager loading it
     * @param $relationName
     * @return mixed
     */
    public function with($relationName);


    /** get all data from table
     * @return mixed
     */
    public function all($coloumns=['*']);
}
