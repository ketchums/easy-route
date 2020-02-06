<?php declare (strict_types = 1);

namespace EasyRouter;

class EasyRouter
{
    /**
     * Holds the callbacks for each endpoint.
     * @var array
     */
    private $routes = [];

    /**
     * Holds the methods allowed for each endpoint.
     * @var array
     */
    private $routeMethods = [];

    /**
     * Adds a GET route to the route list.
     *
     * @param string $url The endpoint to register the callback to.
     * @param array $options
     */
    public function addGet(string $url, array $options) : void
    {
        $this->add($url, ['GET'], $options);
    }

    /**
     * Adds a POST route to the route list
     *
     * @param string $url
     * @param array $options
     */
    public function addPost(string $url, array $options) : void
    {
        $this->add($url, ['POST'], $options);
    }

    /**
     * Adds a PUT route to the route list
     *
     * @param string $url
     * @param array $options
     */
    public function addPut(string $url, array $options) : void
    {
        $this->add($url, ['PUT'], $options);
    }

    /**
     * Adds a PATCH route to the route list
     *
     * @param string $url
     * @param array $options
     */
    public function addPatch(string $url, array $options) : void
    {
        $this->add($url, ['PATCH'], $options);
    }

    /**
     * Adds a DELETE route to the route list
     *
     * @param string $url
     * @param array $options
     */
    public function addDelete(string $url, array $options) : void
    {
        $this->add($url, ['DELETE'], $options);
    }

    /**
     * Adds a route with custom methods to the route list.
     *
     * @param string $url
     * @param array $options
     */
    private function add(string $url, array $methods, array $options) : void
    {
        $this->routes[$url] = $options;
        $this->routeMethods[$url] = $methods;
    }
    
    public function resolve($endpoint) : void
    {
        if (array_key_exists($endpoint, $this->routes)) {
            echo '404';
            exit();
        }

        if (!in_array($_SERVER['REQUEST_METHOD'], $this->routeMethods[$endpoint])) {
            echo '405';
            exit();
        }

        $options = $this->routes[$endpoint];
        $method = $options['method'];

        if (is_callable($method) && !array_key_exists('controller', $options)) {
            $method();
        }
        else {
            $controller = new $options['controller']();
            call_user_func(array($controller, $method));
        }
    }
}