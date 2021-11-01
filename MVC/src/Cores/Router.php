<?php

namespace Anggadarkprince\SimplePhpMvc\Cores;

use Anggadarkprince\SimplePhpMvc\Exceptions\HttpNotFoundException;
use Anggadarkprince\SimplePhpMvc\Exceptions\ViewInvalidPathException;

class Router
{
    private static array $routes = [];

    /**
     * Register new route by http method, path, map to controller and function.
     *
     * @param string $method
     * @param string $path
     * @param string $controller
     * @param string $function
     */
    public static function add(string $method, string $path, string $controller, string $function): void
    {
        self::$routes[$method . '-' . $path] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function
        ];
    }

    /**
     * Proceed incoming path map to controller and function.
     *
     * @throws HttpNotFoundException|ViewInvalidPathException
     */
    public static function run(): void
    {
        $path = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        };

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            $pattern = "#^" . $route['path'] . "$#";
            if (preg_match($pattern, $path, $variables) && $method == $route['method']) {

                $function = $route['function'];
                $controller = new $route['controller'];

                // remove / skip first matching full path
                array_shift($variables);

                // call function of the method and passing matched parameter
                call_user_func_array([$controller, $function], $variables);

                return;
            }
        }

        throw new HttpNotFoundException("Controller Not Found", 404);
    }

}