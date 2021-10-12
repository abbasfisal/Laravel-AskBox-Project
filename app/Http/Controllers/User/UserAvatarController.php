<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Avatar;
use App\Models\User;
use App\Policies\UserAvatarPolicy;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Infrastructure\Enumerations\Databases\UserEnum;
use Infrastructure\Interfaces\Repositories\User\UserAvatarRepositoryInterface;
use phpDocumentor\Reflection\Types\Self_;

class UserAvatarController extends Controller
{
    /**
     * @var UserAvatarRepositoryInterface
     */
    private $userAvatarRepository;

    public function __construct(UserAvatarRepositoryInterface $userAvatarRepository)
    {
        $this->userAvatarRepository = $userAvatarRepository;
    }


    /**
     * show avatars by pagination (15)
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show()
    {

        $avatars = $this->userAvatarRepository->paginate();

        return view('user.pages.avatars', compact('avatars'));
    }

    public function update(Avatar $avatar)
    {
        $this->authorize('updateAvatar', auth()->user());

        $this->userAvatarRepository
            ->update(Auth::user() , $avatar);

        return self::GoTo('show.avatar.user' , 'update');


    }
}
