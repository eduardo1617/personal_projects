<?php

use League\Container\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/Database.php';

$container = new Container();
$container->add('users_db', Database::class);

AppFactory::setContainer($container);
$app = AppFactory::create();

$twig = Twig::create('views', ['cache' => false]);

$app->add(TwigMiddleware::create($app, $twig));
$app->add(new MethodOverrideMiddleware());

//root
$app->get('/', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();

    return $view->render($response, 'index.html', [
        'errors' => $params['errors'] ?? null
    ]);
});

//guardando a un usuario
$app->post('/', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();

    $firstName = $params['first_name'] ?? null;
    $lastName = $params['last_name'] ?? null;
    $hobbies = $params['hobbies'] ?? null;

    $db = $this->get('users_db');

    $errors = [];

    if (!$firstName) {
        $errors['first_name'] = 'First name is required.';
    }

    if (!$lastName) {
        $errors['last_name'] = 'Last name is required.';
    }

    if (!$hobbies) {
        $errors['hobbies'] = 'hobbies are required';
    }

    if (count($errors) > 0) {
        $url = "/?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->save(
        [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'hobbies' => $hobbies
        ]
    );

    return $response->withHeader('Location', '/')->withStatus(302);
});

//vista de los usuarios
$app->get('/users', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('users_db');

    $users = $db->all();

    return $view->render($response, 'users/users.html',
        [
            'users' => $users
        ]);
});

//borrar
$app->delete('/users/{id}', function (Request $request, Response $response, $args) {

    $db = $this->get('users_db');

    $id = $args['id'] ?? null;
    $user = $db->find($id);

    if (!$id || !$user) {
        return $response->withHeader('Location', '/users')->withStatus(302);
    }

    $db->delete($id);
    return $response->withHeader('Location', '/users')->withStatus(302);
});

//vista de edit
$app->get('/users/{id}', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();

    $db = $this->get('users_db');
    $id = $args['id'];
    $user = $db->find($id);

    return $view->render($response, 'users/user.info.html', [
        'user' => $user,
        'id' => $id,
        'errors' => $params['errors'] ?? null,
        'hobbies' => json_decode($user['hobbies'])
    ]);
});

//editar un usuario
$app->patch('/users/{id}', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();
    //$db = new Database();
    $db = $this->get('users_db');

    $id = $args['id'] ?? null;
    $user = $db->find($id);

    if (!$id || !$user) {
        return $response->withHeader('Location', '/users')->withStatus(302);
    }

    $firstName = $params['first_name'] ?? null;
    $lastName = $params['last_name'] ?? null;
    $hobbies = $params['hobbies'] ?? null;


    $errors = [];

    if (!$firstName) {
        $errors['first_name'] = 'First name is required.';
    }

    if (!$lastName) {
        $errors['last_name'] = 'Last name is required.';
    }

    if (!$hobbies) {
        $errors['hobbies'] = 'Hobbies are required';
    }

    if (count($errors) > 0) {
        $url = "/users/$id?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->edit(
        $id,
        [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'hobbies' => $hobbies
        ]
    );

    return $response->withHeader('Location', '/users')->withStatus(302);
});

$app->run();
