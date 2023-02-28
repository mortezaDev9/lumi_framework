<?php

declare(strict_types=1);

namespace App;

use Illuminate\Container\Container;
use App\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes = [];

    public function __construct(private Container $container)
    {
    }

    public function routes(): array
    {
        return $this->routes;
    }

    public function register(string $requestMethod, string $route, callable|array $action): self
    {
        $routeRegex = preg_replace('/\{([^\}]*)\}/', '(?P<$1>[^\/]*)', $route);
        
        $this->routes[$requestMethod][$routeRegex] = $action;
        
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function resolve(string $requestMethod, string $requestUri): mixed
    {
        foreach ($this->routes[$requestMethod] as $route => $action) {
            $regex = '#^' . $route . '$#';
            $matches = [];
            
            if (preg_match($regex, $requestUri, $matches)) {
                array_shift($matches);
                $params = array_values(array_filter($matches, 'is_int', ARRAY_FILTER_USE_KEY));
                
                if (is_callable($action)) {
                    return call_user_func_array($action, $params);
                }

                [$class, $method] = $action;

                if (class_exists($class)) {
                    $class = $this->container->get($class);

                    if (method_exists($class, $method)) {
                        return call_user_func_array([$class, $method], $params);
                    }
                }

                throw new RouteNotFoundException();
            }
        }

        throw new RouteNotFoundException();
    }
}
