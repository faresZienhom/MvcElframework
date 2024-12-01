<?php

use App\Http\Middleware\SimpleMiddleware;
use App\Http\Middleware\UsersMiddleware;
use Iliuminates\Router\Route;

Route::group(['prefix' => '/api/','middleware'=>[SimpleMiddleware::class]], function () {

    Route::get('/users', controller: function () {
        echo "API Route is working!";
    });

    Route::get('/article', function () {
        return 'Welcome To article api Route';
    },[UsersMiddleware::class]);

});
