<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Repositories\RelationTraits\AskRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Abstracts\Models\ModelAbstract;
use Infrastructure\Enumerations\Databases\AskEnum;
use Infrastructure\Enumerations\Databases\AskLikeEnum;

/**
 * Class Ask
 * @package App\Models\Admin
 */
class Ask extends ModelAbstract
{
    use AskRelationTrait;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = AskEnum::TABLE_NAME;

    /**
     * @var string[]
     */
    protected $fillable = [AskEnum::TITLE, AskEnum::IMAGE];

    /*
    |------------------------------
    | ASK Model
    |------------------------------
    | some where in this app I called it in the question variable
    |
    */


    /**
     * check loged in user is liked a ask?
     * @return bool
     */
    public function is_user_liked_questionBox()
    {


        return
            $this->user_likes()
                ->where(AskLikeEnum::USER_ID, Auth::id())
                ->exists();

    }



    public static function __callStatic($name, $arguments)
    {

        $newObj = new static();
        if (method_exists($newObj, $name)) {
            return $newObj->$name($arguments);
        }
    }


    /**
     * Return Count()  Likes of a Ask
     * @return int
     */
    public function likes_count()
    {
        return $this->user_likes()->count();
    }


    /**
     * Select Asks with Category_id
     * @param $categoryId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function filter_ask($categoryId)
    {
        return
            Ask::query()
                ->whereHas('categories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                });

    }

    /*--------------------left side menue ---------------------------*/
    /**
     * @param $perPage
     * @return mixed
     */

    // @TODO edit method name to =>OrderByMostLikesWithPagination
    // Method name must be CamleCase not snake case
    public   function orderby_MostLikes_with_pagination($perPage)
    {

        return
           Ask::withCount('user_likes')
                ->orderby('user_likes_count', 'desc')
                ->paginate($perPage);
    }


    /*-----------------------------------------------*/

    //infrastructure =>User Directory


    public function MappdedFields()
    {
        return [
            AskEnum::ID => AskEnum::ID,
            AskEnum::TITLE => AskEnum::TITLE,
            AskEnum::IMAGE => AskEnum::ID,
        ];
    }

    public function FGet($keyName)
    {

        //chcekc array_key exist
        return $this->$keyName;
    }





}
