<?php


namespace App\Repositories\Admin;


use App\Http\Requests\AskRequest;
use App\Models\Admin\Ask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Infrastructure\Abstracts\Repositories\Base\BaseRepository;
use Infrastructure\Enumerations\Databases\AskLikeEnum;
use Infrastructure\Interfaces\Repositories\Admin\AskRepositoryInterface;


/**
 * @method with($relationName)
 * @method create($attributes)
 * @method all($coloumns = ['*'])
 *
 */
class AskRepository
    extends BaseRepository
    implements AskRepositoryInterface
{

    public function __construct(Ask $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     *
     */
    public function IsUserLikedAsk($ask, $AuthUserID): bool
    {

        return
            (bool)$ask->user_likes()
                ->where(AskLikeEnum::USER_ID, $AuthUserID)
                ->count();

    }

    public function LikesCount()
    {
        // TODO: Implement LikesCount() method.
    }


    /**
     * @inheritDoc
     */
    public function createWithCategory($attributes)
    {
        return
            $this->model::query()
                ->create([
                    'title' => $attributes->get('title'),
                    'image' => $attributes->get('filepath')
                ])
                ->categories()->attach($attributes->get('tags'));
    }

    /**
     * @inheritDoc
     */
    public function delete(Ask $ask)
    {
        return DB::transaction(function () use ($ask) {

            $ask->categories()->detach();
            $ask->delete();

        });

    }

    /**
     * @inheritDoc
     */
    public function update(AskRequest $askRequest, Ask $ask)
    {
        return DB::transaction(function () use ($ask, $askRequest) {

            $ask->update($askRequest->only(['title', 'filepath']));
            $ask->categories()->sync($askRequest->get('tags'));

        });

    }

    /**
     * @inheritDoc
     */
    public function AddOrRemoveUserLike(Ask $ask, $AuthUserID)
    {

        $this->IsUserLikedAsk($ask, $AuthUserID)
            ? $ask->user_likes()->detach(Auth::id()) //means: user liked an ask so , remove that like
            : $ask->user_likes()->attach(Auth::id());//means: user did not liked an ask so , add that ask


    }

    /**
     * @inheritDoc
     */
    public function getLatest()
    {
        return $this->model::query()->latest()->first();
    }


    /**
     * @inheritDoc
     */
    public function getAskCommentsWithPaginate(Ask $ask, $perPage = null)
    {
        return $ask->comments()
            ->with(['user', 'users_like', 'comments'])
            ->paginate($perPage ?: config('appData.perPage'));
    }

    /**
     * @inheritDoc
     */
    public function OrderByMostLikesWithPagination($perPage = null)
    {
        return
            $this->model::query()->withCount('user_likes')
                ->orderby('user_likes_count', 'desc')
                ->paginate($perPage ?: config('appData.perPage'));
    }

    /**
     * @inheritDoc
     */
    public function OrderByMostCommentWithPagination($perPage = null)
    {
        return
            $this->model::query()->withCount(['comments'])
                ->orderBy('comments_count', 'desc')
                ->paginate($perPage ?: config('appData.perPage'));
    }


    /**
     * @inheritDoc
     */
    public function showLates($perPage = null)
    {
        return
            $this->model::query()->latest()->withCount('comments')
                ->paginate($perPage ?: config('appData.perPage'));
    }


    /**
     * @inheritDoc
     */
    public function FilterAsk_By($CategoryID, $perPage = null)
    {

        return
            Ask::query()
                ->whereHas('categories', function ($query) use ($CategoryID) {

                    $query->where('category_id', $CategoryID);

                })
                ->paginate($perPage ?: config('appData.perPage'));
    }

    public function getRandomAsk($perPage=null)
    {
        return Ask::query()
            ->inRandomOrder()
            ->limit($perPage ?: config('appData.perPage'))
            ->get();
    }

}
