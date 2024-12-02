<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\SimpleMiddleware;
use App\Http\Middleware\UsersMiddleware;
use Iliuminates\FrameworkSettings;
use Iliuminates\Router\Route;

Route::group(['prefix' => '/api/','middleware'=>[SimpleMiddleware::class]], function () {



    Route::get('/', controller: function() {
        echo 'fares';
    });

    Route::get('/any', HomeController::class,'api_any',[UsersMiddleware::class]);

    Route::get('/users', controller: function () {
          //  FrameworkSettings::setLocale(locale: 'en');

        return FrameworkSettings::getLocale();
    });

    Route::get('/article', function () {
        return 'Welcome To article api Route';
    },[UsersMiddleware::class]);

});
