<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AskController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AvatarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\User\UserAskController;
use App\Http\Controllers\User\UserAvatarController;
use App\Http\Controllers\User\UserController;
use App\Models\Admin\Ask;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::any('/' , function (){
   return 'Home Page';
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//-------------------- admin
Route::group(['prefix' => 'admin'], function () {
    //Matches The " /admin/* " URL
    Route::post('/login', [AdminLoginController::class, 'login'])
        ->name('admin.login');

    Route::get('/login', [AdminLoginController::class, 'showLoginForm']);

    Route::get('/logout', [AdminLoginController::class, 'logout'])
        ->name('admin.logout')
        ->middleware('auth:admin');

    Route::get('home', [AdminController::class, 'ShowDashboard'])
        ->name('admin.home')
        ->middleware('auth:admin');

});

//------------------- admin Category
Route::group(['prefix' => '/admin/category', 'middleware' => 'auth:admin'], function () {

    // "/admin/category/* " URL

//show cateogry
    Route::get('/', [CategoryController::class, 'create'])
        ->name('create.category');


//save category
    Route::put('/', [CategoryController::class, 'store'])
        ->name('store.category');


//delete
    Route::get('/delete/{category}', [CategoryController::class, 'destroy'])
        ->name('destroy.category');

//edit
    Route::get('/edit/{category}', [CategoryController::class, 'edit'])
        ->name('edit.category');

//update
    Route::put('/edit/{category}', [CategoryController::class, 'update'])
        ->name('update.category');


});


//---------------------- ADMIN AVATAR IMAGE
Route::group(['prefix' => '/admin/avatar', 'middleware' => 'auth:admin'], function () {
    // "/admin/avatar/*" URL

    //create
    Route::get('/create', [AvatarController::class, 'create'])
        ->name('create.avatar');

    //store
    Route::put('/', [AvatarController::class, 'store'])
        ->name('store.avatar');

    //edit
    Route::get('/{avatar}', [AvatarController::class, 'edit'])
        ->name('edit.avatar');

    //update
    Route::patch('/{avatar}', [AvatarController::class, 'update'])
        ->name('update.avatar');


});


//---------------------- admin ask

Route::group(['prefix' => '/admin/askbox', 'middleware' => 'auth:admin'], function () {
    // "admin/askbox/* " URL

//show list
    Route::get('/', [AskController::class, 'index'])
        ->name('show.askbox');

//create
    Route::get('/create', [AskController::class, 'create'])
        ->name('create.askbox');


//save
    Route::post('/store', [AskController::class, 'store'])
        ->name('store.askbox');


//delete
    Route::get('/delete/{ask}', [AskController::class, 'destroy'])
        ->name('destroy.askbox');

//edit
    Route::get('/edit/{ask}', [AskController::class, 'edit'])
        ->name('edit.askbox');


//update
    Route::put('/edit/{ask}', [AskController::class, 'update'])
        ->name('update.askbox');

//single ask
    Route::get('show/{ask}' , [AskController::class ,'showSingle' ])
        ->name('showsingle.ask');

//add comment by admin
    Route::post('/add/comment/{ask}', [CommentController::class, 'addAdminComment'])
        ->name('addcomment.admin');

//reply by admin
    Route::post('/add/reply/{comment}/{ask}', [CommentController::class, 'addAdminReply'])
        ->name('addreply.admin');


});

Route::get('/addlikes/{ask}', [AskController::class, 'addLikes'])
    ->name('addlikes.askbox')
    ->middleware('auth');


//------------------------------------------ User

Route::group(['prefix' => '/user', 'middleware' => 'auth'], function () {
    // "/user/* " URL

//logout
    Route::get('/logout', [LoginController::class, 'logout'])
        ->name('logout.user');


//show home dashbord
    Route::get('/home', [UserController::class, 'showHome'])
        ->name('home.user');


//shwo challange day
    Route::get('/ChallangeDay', [UserController::class, 'showChallangeDay'])
        ->name('ChallangeDay.user');


//show categories
    Route::get('/categories', [UserController::class, 'showCategories'])
        ->name('categories.user');


//add comment to a question box
    Route::post('/add/comment/{ask}', [CommentController::class, 'addComment'])
        ->name('addcomment.user');

//add a replay to a comment
    //
    Route::post('/add/reply/{comment}/{ask}', [CommentController::class, 'addReply'])
        ->name('addreply.user');

//Like Or unlike a comment
    Route::get('/add/like/{comment}', [CommentController::class, 'addLike'])
        ->name('add.comment.like.user');


//select single ask
    Route::get('/ask/{ask}', [UserAskController::class, 'showSingleAsk'])
        //edit name => users.single_ask
        ->name('singleAsk.user');


    Route::get('/filter/category/{category}', [UserAskController::class, 'show_asks_by_category'])
        //edit name => users.asks_by_category
        ->name('asks.by.category.user');


});


//----------------------- ask left side menu
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    //Matches The "/user/*" URL

    Route::get('/show-best', [UserAskController::class, 'showBest'])
        ->name('showBest.ask');


    Route::get('/show-most-comments', [UserAskController::class, 'showMostComments'])
        ->name('showMostComments'); //add .ask


    Route::get('/show-latest', [UserAskController::class, 'showLates'])
        ->name('showLatest.ask');

    // Route::get('/category', [UserAskController::class, 'showByCategory']);

});

//----------------------- user avatar image
Route::group(['prefix' => 'user/avatar', 'middleware' => 'auth'], function () {
    //Matches The "/user/avatar/" URL

    Route::get('/', [UserAvatarController::class, 'show'])
        ->name('show.avatar.user');

    Route::get('/{avatar}', [UserAvatarController::class, 'update'])
        ->name('update.avatar.user');

});


//----------------------

//----------------- laravel file manager package

include_once('LaravelFileManager.php');
//----------------------------


Route::get('/sss', function () {
    $faker = \Faker\factory::create();


    Ask::all()->each(function ($ask) use ($faker) {
        /**@var \App\Models\Admin\Ask $ask */

echo "<hr>";
        for ($i = 1; $i <= $ss=rand(5, 20); $i++) {
            echo 'random:'.$ss;
            //create comment
            $commentData = $ask->comments()->create([
                'user_id' => User::query()->inRandomOrder()->limit(1)->pluck('id')[0],
                'text' => $faker->sentence()
            ])->getRawOriginal();


            //create reply for a comment
            if (rand(0, 1)) {
                $ask->comments()->create([
                    'user_id' => User::query()->inRandomOrder()->limit(1)->pluck('id')[0],
                    'text' => $faker->sentence(),
                    'comment_id' => $commentData['id']
                ]);

                $s = rand(1, User::query()->count());

                $c = \App\Models\Comment::find($commentData['id']);

                /**@var \App\Models\Comment $c*/

                for ($i = 1; $i <= $s; $i++) {
                    $user_ids = User::query()->inRandomOrder()->limit(1)->pluck('id')[0];

                    if ($c->users_like()->where('user_id', '=', $user_ids)
                        ->doesntExist()) {
                        $c->users_like()->attach([
                            'user_id' => User::query()->inRandomOrder()->limit(1)->pluck('id')[0]
                        ]);
                    }

                }
            }


            $user_id = User::query()->inRandomOrder()->limit(1)->pluck('id')[0];

            //قبلش چک میکنم که هر کاربر فقط یکبار توسنته باشه یه اسک رو لایک کرده باشه

            //add like to ask
            if ($ask->user_likes()
                ->where('user_id', '=', $user_id)
                ->doesntExist()) {

                $ask->user_likes()->attach([
                    'user_id' => $user_id
                ]);
            }


        }
echo "<hr>";
        //create
    });

});
