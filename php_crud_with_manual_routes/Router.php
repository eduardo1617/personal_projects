<?php

//use mysql_xdevapi\Exception;

class Router
{
    protected array $routes = [];

    public function __construct(array $routes)
    {
        $this -> routes = $routes;
    }

    public function load(): void
    {
        $uri = rtrim($_SERVER['REQUEST_URI'],'/');

        if(! array_key_exists($uri, $this -> routes))
        {
            throw new Exception('Invalid route.');
        }
        $instance = require $this -> routes[$uri];

        $instance -> load($uri);
    }

}