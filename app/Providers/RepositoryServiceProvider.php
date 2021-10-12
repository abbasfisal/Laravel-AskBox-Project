<?php

namespace App\Providers;

use App\Repositories\Admin\AskRepository;
use App\Repositories\Admin\AvatarRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\CommentRepository;
use App\Repositories\User\UserAvatarRepository;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Interfaces\Repositories\Admin\AskRepositoryInterface;
use Infrastructure\Interfaces\Repositories\Admin\AvatarRepositoryInterface;
use Infrastructure\Interfaces\Repositories\Admin\CategoryRepositoryInterface;
use Infrastructure\Interfaces\Repositories\CommentRepositoryInterface;
use Infrastructure\Interfaces\Repositories\User\UserAvatarRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //Ask
        app()->bind(AskRepositoryInterface::class, AskRepository::class);

        //Category
        app()->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

        //admin Avatar
        app()->bind(AvatarRepositoryInterface::class, AvatarRepository::class);

        //admin Avatar
        app()->bind(UserAvatarRepositoryInterface::class, UserAvatarRepository::class);

        //Comment
        app()->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
