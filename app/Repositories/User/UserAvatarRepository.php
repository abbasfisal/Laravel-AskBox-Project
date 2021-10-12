<?php


namespace App\Repositories\User;


use App\Http\Requests\AvatarRequest;
use App\Models\Admin\Avatar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Abstracts\Repositories\Base\BaseRepository;
use Infrastructure\Enumerations\Databases\UserEnum;
use Infrastructure\Interfaces\Repositories\User\UserAvatarRepositoryInterface;

class UserAvatarRepository
    extends BaseRepository
    implements UserAvatarRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function paginate($perPage = null)
    {
        return Avatar::paginate(config('appData.perPage'));
    }

    /**
     * @inheritDoc
     */
    public function store(AvatarRequest $avatarAttributes)
    {
        // TODO: Implement store() method.
    }

    /**
     * @inheritDoc
     */
    public function update(User  $user ,Avatar $avatar)
    {

        return $user->update([UserEnum::IMAG => $avatar->image]);
    }
}
