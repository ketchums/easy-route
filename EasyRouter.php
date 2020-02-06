<?php declare (strict_types = 1);

namespace EasyRouter;

class EasyRouter
{
    private $routes = [];
    private $routeMethods = [];

    public function addGet(string $url, array $options) : void
    {
        $this->add($url, ['GET'], $options);
    }

    public function addPost(string $url, array $options) : void
    {
        $this->add($url, ['POST'], $options);
    }

    public function addPut(string $url, array $options) : void
    {
        $this->add($url, ['PUT'], $options);
    }

    public function addPatch(string $url, array $options) : void
    {
        $this->add($url, ['PATCH'], $options);
    }

    public function addDelete(string $url, array $options) : void
    {
        $this->add($url, ['DELETE'], $options);
    }

    private function add(string $url, array $methods, array $options) : void
    {
        $this->routes[$url] = $options;
        $this->routeMethods[$url] = $methods;
    }
    
    public function resolve($endpoint) : void
    {

    }
}