<?php

namespace Pa;

trait ApplicationRouter
{
    static $pagenotfound_callback = null;
    static array $routesdata = [];

    /**
     * 
     * '/cataloge/(?<id>[\d]+)'
     * '/cataloge/id:n'
     * '/cataloge/(?<name>[\w]+)'
     * '/cataloge/name:s'
     * 
     * route('/cataloge/id:n', function($id){});
     * 
     */
    static function route($uri, $callback, $method = 'GET')
    {
        $match = preg_match_all('#(\w+:\w{1})#', $uri, $matches);
        $regexp = $uri;
        if ($match && !empty($matches[0])) {
            foreach ($matches[0] as $rou) {
                $params = explode(':', $rou);
                $name = $params[0];
                $type = $params[1] == 'n' ? '\d' : '\w';
                $regexp = str_replace($rou, "(?<$name>[$type]+)", $regexp);
            }
        }

        self::$routesdata[$uri] = [
            'uri' => $uri,
            'regexp' => $regexp,
            'callback' => $callback,
            'arguments' => [],
            'method' => $method,
        ];
    }

    static function routeNotFound(callable $callback)
    {
        self::$pagenotfound_callback = $callback;
    }
    

    static function request_hendler()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routesdata as $routedata) {
            $match = preg_match('#^' . $routedata['regexp'] . '$#', $request_uri, $matches);
            if ($match && strtoupper($routedata['method']) == strtoupper($request_method)) {
                $argsuments = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $argsuments[$key] = $value;
                    }
                }
        
                return call_user_func_array($routedata['callback'], $argsuments);
            }
        }

        if (self::$pagenotfound_callback) 
            call_user_func_array(self::$pagenotfound_callback, []);

        return;
    }

    static function redirect(string $uri)
    {
        if ($_SERVER["REQUEST_URI"] !== $uri) {
            header("Location: $uri");
        } else {
            throw new \Exception("Error Processing Recursive Redirect Request \"$uri\"", 1);
        }
    }
}
