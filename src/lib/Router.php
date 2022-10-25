<?php 

namespace App\Lib;

use App\Lib\Request;
use App\Lib\Response;

class Router
{
    private static $is_match = false;

    public static function get($route, $callback){
        if(strcasecmp($_SERVER['REQUEST_METHOD'], 'GET') !== 0){
            return;
        }
        self::on($route, $callback);
    }

    public static function post($route, $callback){
        if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') !== 0){
            return;
        }
        self::on($route, $callback);
    }

    public static function on($regex, $callback){
        $request = new Request();
        $path = $request->getRequestPath();
        $regex = str_replace('/', '\/', $regex);
        self::$is_match = preg_match('/^' . ($regex) . '$/', $path, $matches, PREG_OFFSET_CAPTURE);

        if (self::$is_match) {
            // first value is normally the route, lets remove it
            array_shift($matches);
            
            // Get the matches as parameters
            $params = array_map(function ($param) { return $param[0]; }, $matches);

            if(is_string($callback)){
                list($controller, $action) = explode('@', $callback, 2);
                $controller = 'App\\Controller\\' . $controller;
                $d = new $controller;
                call_user_func_array(array($d, $action), $params);
                //(new $controller)->$action();
            }else{
                call_user_func_array($callback, $params);
                //$callback(new Request($params), new Response());
            }
            die();
        }
    }
}
