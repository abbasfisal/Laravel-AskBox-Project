<?php


namespace Infrastructure\Interfaces\Repositories\Admin;


use App\Http\Requests\AvatarRequest;
use App\Models\Admin\Avatar;

interface AvatarRepositoryInterface
{

    /**
     * get avatars data with paginate(perpage=15 default)
     *
     * @param null $perPage
     * @return mixed
     */
    public function paginate($perPage=null);


    /**
     * save new avatar
     * @param AvatarRequest $avatarRequest
     * @return mixed
     */
    public function store(AvatarRequest $avatarAttributes);


    /**
     * update An avatar
     * @param AvatarRequest $avatarAttributes
     * @param Avatar $avatar
     * @return mixed
     */
    public function update(AvatarRequest $avatarAttributes , Avatar $avatar);

}
