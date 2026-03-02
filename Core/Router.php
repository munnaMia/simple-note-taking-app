<?php

namespace Core;

use Core\Middleware\Middleware as CoreMiddleware;

class Router
{
    protected $routes = []; // cash all the routes

    protected function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null  // by default every routes has a middleware which is nulll
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    //middleware
    public function only($key)
    {
        // here when this func will be called the current route is adding the only will be associate with that only
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this; // so we can chain further the middleware
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                CoreMiddleware::resolve($route['middleware']);

                require base_path($route['controller']);
                exit();
            }
        }

        $this->abort();
    }


    protected function abort($code = 404)
    {
        http_response_code(404);

        require base_path("views/{$code}.view.php");

        die();
    }
}
