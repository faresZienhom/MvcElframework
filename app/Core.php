<?php

namespace App;


class Core
{
    public static $globalWeb = [
        \Iliuminates\Sessions\Session::class

    ];

    public static $middlewareWebRoute = [
        'simple' => \App\Http\Middleware\SimpleMiddleware::class,
    ];

    public static $middlewareApiRoute = [];

    public static $globalApi = [];
}
