<?php

namespace Iliuminates\Router;

use Iliuminates\Middleware\Middleware;

class Router
{
    protected static $routes = [];
    protected static $groupAttributes = [];

    // Register a route with method, path, and handler
    public static function add(string $method, string $route, $controller, $action, array $middleware = [])
    {
        $route = self::applyGroupPrefix($route);
        $middleware = array_merge(static::getGroupMiddleware(), $middleware);

        self::$routes[] = [
            'method' => $method,
            'uri' => $route == '/' ? $route : ltrim($route, '/'),
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware,
        ];
    }

    public static function group($attributes, $callback): void
    {
        $previousGroupAttribute = static::$groupAttributes;
        static::$groupAttributes = array_merge(static::$groupAttributes, $attributes);
        call_user_func($callback, new self);
        static::$groupAttributes = $previousGroupAttribute;
    }

    protected static function applyGroupPrefix($route): string
    {
        if (isset(static::$groupAttributes['prefix'])) {
            $full_route = rtrim(static::$groupAttributes['prefix'], '/') . '/' . ltrim($route, '/');
            return rtrim(ltrim($full_route, '/'), '/');
        } else {
            return $route;
        }
    }
    protected static function getGroupMiddleware(): array
    {
        return static::$groupAttributes['middleware'] ?? [];
    }

    public function routes(): array
    {
        return static::$routes;
    }
    // Dispatch the request and match the route
    public static function dispatch($uri, $method)
    {
        // var_dump(static::$groupAttributes);
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        $uri = str_replace('/mvcelframework/public', '', $uri);

        $uri = empty($uri) ? '/' : $uri;

        foreach (static::$routes as $route) {

            if ($method === $route['method']) {
                $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_]+)', $route['uri']);
                $pattern = "#^$pattern$#";

                if (preg_match($pattern, $uri, $matches)) {
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                    $controller = $route['controller'];
                    if (is_object($controller)) {

                        $route['middleware'] = $route['action'];
                        $middlewareStack = $route['middleware'];

                        $next = function ($request) use ($controller, $params) {
                            return $controller(...$params);
                        };

                        // Proccessing Middleware if using Anonymous Functions
                        $next = Middleware::handleMiddleware($middlewareStack, $next);

                        echo $next($uri);

                    } else {

                        $action = $route['action'];
                        $middlewareStack = $route['middleware'];

                        $next = function ($request) use ($controller, $action, $params) {
                            return call_user_func_array([new $controller, $action], $params);
                        };

                        $next = Middleware::handleMiddleware($middlewareStack, $next);

                        echo $next($uri);
                    }
                    return;
                }
            }
        }

        throw new \Exception("This route {$uri} not found");
    }

}
