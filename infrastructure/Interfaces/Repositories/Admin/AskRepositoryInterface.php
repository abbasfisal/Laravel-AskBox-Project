<?php


namespace Infrastructure\Interfaces\Repositories\Admin;


use App\Http\Requests\AskRequest;
use App\Models\Admin\Ask;
use Illuminate\Http\Request;

/**
 * Interface AskRepositoryInterface
 * @package Infrastructure\Interfaces\Repositories\Admin
 */
interface AskRepositoryInterface
{


    /**
     * Check LogedIn User did Liked an Ask
     *
     * @param $ask
     * @param $AuthUserID
     * @return bool
     */
    public function IsUserLikedAsk(Ask $ask, $AuthUserID): bool;

    /**
     * add or remove authenticated user which is like
     * or did not like an ask
     *
     * @param Ask $ask
     * @param $AuthUserID
     */
    public function AddOrRemoveUserLike(Ask $ask, $AuthUserID);


    /**
     * @return mixed
     */
    public function LikesCount();


    /**
     * Create New Ask In asks Table With
     * Attaching category_id Into ask_category Table
     * many to many relation
     *
     * @param Request $attributes
     * @return mixed
     */
    public function createWithCategory($attributes);


    /**
     * Delete Ask from Ask Table
     * With Detaching associate Data from ask_category Table
     *
     * @param Ask $ask
     * @return mixed
     */
    public function delete(Ask $ask);


    /**
     * Update Ask from Ask Table
     * With Syncing associate Data from ask_category Table
     *
     * @param Ask $ask
     * @param AskRequest $askRequest
     * @return mixed
     */
    public function update(AskRequest $askRequest, Ask $ask);


    /**
     * Get Latest ask for showin in Challange Day
     *
     * @return mixed
     */
    public function getLatest();


    /**
     * Get An ask Comments with Paginate(15:default) and load
     * (user , users_like , comments) Relations
     *
     * @return mixed
     */
    public function getAskCommentsWithPaginate(Ask $ask, $perPage = null);


    /**
     * Get Most Likes ask with Paginate(15:default)
     *
     * @param null $PerPage
     * @return mixed
     */
    public function OrderByMostLikesWithPagination($perPage = null);

    /**
     * Get Most Comments ask with Paginate(15:default)
     *
     * @param null $PerPage
     * @return mixed
     */
    public function OrderByMostCommentWithPagination($perPage = null);


    /**
     * Get Latest Ask
     *
     * @param null $perPage
     * @return mixed
     */
    public function showLates($perPage = null);

    /**
     * Filter ask with given category Id with Pagination
     *
     * @param $CategoryID
     * @param null $perPage
     * @return mixed
     */
    public function FilterAsk_By($CategoryID , $perPage=null);

    /**
     * Get Random Asks
     * @param null $perPage
     * @return mixed
     */
    public function getRandomAsk($perPage=null);
}


