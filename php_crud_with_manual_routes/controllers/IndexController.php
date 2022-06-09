<?php

require_once __DIR__.'/Controller.php';

use Controllers\Controller;

class IndexController extends Controller
{
    protected array $urls = [
        '' => 'index'
    ];

    public function index()
    {
        require_once __DIR__ . '/../views/index.view.php';
    }
}

return new IndexController();