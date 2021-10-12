<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarRequest;
use App\Models\Admin\Avatar;
use Illuminate\Http\Request;
use Infrastructure\Interfaces\Repositories\Admin\AvatarRepositoryInterface;


class AvatarController extends Controller
{

    /**
     * @var AvatarRepositoryInterface
     */
    private $avatarRepository;

    public function __construct(AvatarRepositoryInterface $avatarRepository)
    {
        $this->avatarRepository = $avatarRepository;
    }

    /**
     * show create new avatar form
     * with passing avatars data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        $avatars = $this->avatarRepository->paginate();
        return view('admin.pages.avatar', compact('avatars'));
    }


    /**
     * Store new avatar to database
     *
     * @param AvatarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AvatarRequest $request)
    {
        $this->avatarRepository
            ->store($request);

        return self::GoTo('create.avatar', 'create');

    }


    /**
     * Show avatar edit form
     *
     * @param Avatar $avatar
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Avatar $avatar)
    {
        return view('admin.pages.edit_avatar', compact('avatar'));
    }


    /**
     * Update an avatar
     *
     * @param AvatarRequest $request
     * @param Avatar $avatar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AvatarRequest $request, Avatar $avatar)
    {

        $this->avatarRepository
            ->update($request, $avatar);

        return self::GoTo('create.avatar', 'update');

    }
}

