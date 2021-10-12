<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin']], function () {

    \UniSharp\LaravelFilemanager\Lfm::routes();
});
