<?php
use App\Http\Controllers\HomeController;
use App\Http\Middleware\SimpleMiddleware;
use Iliuminates\Router\Route;
use Iliuminates\Sessions\Session;
 

 //Route::get('/', HomeController::class,'index',);
 
 
 Route::get('/about',HomeController::class,'about');
 Route::get('/article/{id}', HomeController::class, 'article');

 Route::get('/', function() {
    return trans('channel');
});

