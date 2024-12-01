<?php
if (!function_exists('view')) {
    function view(string $view, null|array $data = [])
    {
        return \Iliuminates\Views\View::make($view, $data);
    }
}


if (!function_exists('url')) {
    function url(string $url = ''): string
    {
        return $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . ROOT_DIR . ltrim($url, '/');
    }
}

if (!function_exists('base_path')) {
    function base_path(string $file = null)
    {
        return  ROOT_PATH . '/../' . $file;
    }
}

if (!function_exists('storage_path')) {
    function storage_path(string $file = null)
    {
        return !is_null($file) ? base_path('storage') . '/' . $file : '';
    }
}


if (!function_exists('route_path')) {
    function route_path(string $file = null)
    {
        return !is_null($file) ? config('route.path') . '/' . $file : config('route.path');
    }
}

if (!function_exists('config')) {
    function config(string $file = null)
    {
        $seprate = explode('.', $file);

        if ((!empty($seprate) && count($seprate) > 1) && !is_null($file)) {
            $file = include base_path('config/') . $seprate[0] . '.php';
            return isset($file[$seprate[1]]) ? $file[$seprate[1]] : $file;
        }
        return $file;
    }
}


if (!function_exists('public_path')) {
    function public_path(string $file = null)
    {
        return !empty($file) ? getcwd() . '/' . $file : getcwd();
    }
}



if (!function_exists('bcrypt')) {
    function bcrypt(string $str)
    {
        return \Iliuminates\Hashes\Hash::make($str);
    }
}

if (!function_exists('hash_check')) {
    function hash_check(string $pass, string $hash)
    {
        return \Iliuminates\Hashes\Hash::check($pass, $hash);
    }
}

if (!function_exists('encrypt')) {
    function encrypt(string $value)
    {
        return \Iliuminates\Hashes\Hash::encrypt($value);
    }
}

if (!function_exists('decrypt')) {
    function decrypt(string $value)
    {
        return \Iliuminates\Hashes\Hash::decrypt($value);
    }
}