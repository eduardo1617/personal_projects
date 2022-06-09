<?php

require_once __DIR__.'/Controller.php';
require_once __DIR__.'/../Database.php';

use Controllers\Controller;

class UserController extends Controller
{
    protected array $urls = [
        '/delete' => 'delete',
        '/save_edit' => 'save_edit',
//        '/edit' => 'edit',
        '/save' => 'save'
    ];

    public function delete()
    {
        $db = new Database();

        $id = $_POST['id'] ?? null;
        $user = $db->find($id);

        if (! $id || ! $user) {
            header('Location: /');
            die;
        }

        $db->delete($id);

        header("Location: /");
        die;
    }

    public function save()
    {
        $firstName = $_POST['first_name'] ?? null;
        $lastName = $_POST['last_name'] ?? null;

        $errors = [];

        if (! $firstName) {
            $errors['first_name'] = 'First name is required.';
        }

        if (! $lastName) {
            $errors['last_name'] = 'Last name is required.';
        }

        if (count($errors) > 0) {
            $url = '/?'.http_build_query(['errors' => $errors]);

            header("Location: $url");
            die;
        }

        $db = new Database();

        $db->save(
            [
                'first_name' => $firstName,
                'last_name' => $lastName,
            ]
        );

        header("Location: /");
        die;
    }

    public function save_edit()
    {
        $db = new Database();

        $id = $_POST['id'] ?? null;
        $user = $db->find($id);

        if (! $id || ! $user) {
            header('Location: /');
            die;
        }

        $firstName = $_POST['first_name'] ?? null;
        $lastName = $_POST['last_name'] ?? null;

        $errors = [];

        if (! $firstName) {
            $errors['first_name'] = 'First name is required.';
        }

        if (! $lastName) {
            $errors['last_name'] = 'Last name is required.';
        }

        if (count($errors) > 0) {
            $query = compact('errors', 'id');

            $url = 'edit.php?'.http_build_query($query);

            header("Location: $url");
            die;
        }

        $db->edit(
            $id,
            [
                'first_name' => $firstName,
                'last_name' => $lastName,
            ]
        );

        header("Location: /");
        die;
    }

    public function index()
    {
        require_once __DIR__ . '/../views/index.view.php';
    }
}

return new UserController();