<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\SimpleMiddleware;
use App\Http\Middleware\UsersMiddleware;
use Iliuminates\Router\Route;

Route::group(['prefix'=>'/api/','middleware'=>[SimpleMiddleware::class]],function(){

    // api
    Route::get('/', function () {
        //FrameworkSettings::setLocale($_GET['lang']);
    });

    Route::get('any', HomeController::class, 'api_any', [UsersMiddleware::class]);
    // api/users
    Route::get('users', function () {
        return 'Welcome To users api Route';
    },[UsersMiddleware::class]);

    Route::get('article', function () {
        return 'Welcome To article api Route';
    });
    
});