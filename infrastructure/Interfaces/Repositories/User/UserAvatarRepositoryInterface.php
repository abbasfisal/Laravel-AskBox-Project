<?php


namespace Infrastructure\Interfaces\Repositories\User;


use App\Http\Requests\AvatarRequest;
use App\Models\Admin\Avatar;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

interface UserAvatarRepositoryInterface
{

    /**
     * Get Avatars by paginate(15 :default)
     *
     * @param null $perPage
     * @return mixed
     */
    public function paginate($perPage =null);
    /**
     * save new user avatar
     * @param AvatarRequest $avatarRequest
     * @return mixed
     */
    public function store(AvatarRequest $avatarAttributes);


    /**
     * update user avatar
     *
     * @param Avatar $avatar
     * @return mixed
     */
    public function update(User $user , Avatar $avatar);
}
