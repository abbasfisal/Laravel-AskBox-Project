<?php

namespace App\Models\Admin;

use App\Repositories\RelationTraits\CategoryRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Enumerations\Databases\CategoryEnum;
use phpDocumentor\Reflection\Types\This;

class Category extends Model
{

    use HasFactory;
    use CategoryRelationTrait;


    protected $fillable = [CategoryEnum::TITLE, CategoryEnum::IMAGE];

    protected $table = CategoryEnum::TABLE_NAME;


    public function imagepath()
    {
        return asset(env('category_image_path') . $this->image);
    }

    //---------- left side menu methods
    /*
     * get random some Category for showing into the right side menue in some pages
     */
    public static function get_random($count)
    {
        return self::query()
            ->inRandomOrder()
            ->limit($count)->get();
    }
    //---------------------------------
}
