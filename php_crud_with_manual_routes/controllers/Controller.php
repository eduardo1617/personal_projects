<?php

namespace Controllers;

use mysql_xdevapi\Exception;

abstract class Controller
{
    protected array $urls = [];

    abstract public function index();

    public function load(string $uri): void
    {
        $method = $this -> urls[$uri] ?? null;

        if (!$method){
            throw new Exception('Method not found');
        }
        $this -> $method();
    }
}