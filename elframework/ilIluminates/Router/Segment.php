<?php 
namespace Iliuminates\Router;

class Segment 
{

    public static function uri(){
        return str_replace('/mvcelframework/public', '', $_SERVER['REQUEST_URI']);
    }
    /**
     * @param int $offset
     * 
     * @return string
     */
    public static function get(int $offset):string{
        $uri = static::uri();
        $segments = explode('/', trim($uri,'/'));
        return isset($segments[$offset])?$segments[$offset]:'';
    }

    public static function all(){
        return  explode('/', static::uri());
    }


}