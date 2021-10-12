<?php


namespace Infrastructure\Abstracts\Models;


use Illuminate\Database\Eloquent\Model;

abstract class ModelAbstract extends Model
{

    abstract public function MappdedFields();

}

