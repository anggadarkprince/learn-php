<?php

namespace Anggadarkprince\SimpleWebLogin\Cores;

use Anggadarkprince\SimpleWebLogin\Exceptions\HttpNotFoundException;
use Anggadarkprince\SimpleWebLogin\Exceptions\ViewInvalidPathException;

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
     * @param array $middlewares
     */
    public static function add(string $method, string $path, string $controller, string $function, array $middlewares = []): void
    {
        self::$routes[$method . '-' . $path] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middlewares
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

                // call middleware
                $middlewareInstance = null;
                foreach ($route['middleware'] as $middleware) {
                    $middlewareInstance = new $middleware;
                    $middlewareInstance->before();
                }

                $function = $route['function'];
                $controller = new $route['controller'];

                // remove / skip first matching full path
                array_shift($variables);

                // call function of the method and passing matched parameter
                call_user_func_array([$controller, $function], $variables);

                if (!is_null($middlewareInstance)) {
                    $middlewareInstance->after(View::$args);
                }

                return;
            }
        }

        throw new HttpNotFoundException("Controller Not Found", 404);
    }

}