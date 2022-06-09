<?php

require_once './Router.php';

$router = new Router(
    [
        '' => 'controllers/IndexController.php',
        '/delete' => 'controllers/UserController.php',
        '/save_edit' => 'controllers/UserController.php',
//        '/edit' => 'controllers/UserController.php',
        '/save' => 'controllers/UserController.php'

    ]
);

$router -> load();