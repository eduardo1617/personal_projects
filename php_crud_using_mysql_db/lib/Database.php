<?php

require_once './vendor/autoload.php';

class Database {
    protected PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=127.0.0.1;dbname=users_db',
                'root',
                ''
            );
        } catch (\PDOException $e) {
            die('Could not connect');
        }
    }

    public function all(): array
    {
        $allUsers = [];

        $query = $this->pdo->prepare('SELECT * FROM users');
        $query->execute();
        $users =  $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user)
        {
            $user['hobbies'] = json_decode($user['hobbies'], true);
            $allUsers[] = $user;
        }

        return $allUsers;
    }

    public function find(string $id)
    {

        $query = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $query->execute(['id'=>$id]);
        $users =  $query->fetch(PDO::FETCH_ASSOC);

        return $users;
    }

    public function delete(string $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(['id'=>$id]);
    }

    public function edit(string $id, array $data): void
    {
        $hobbies = json_encode($data['hobbies']);

        $query = $this->pdo->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name, 
                 hobbies = :hobbies WHERE id = :id');
        $query->execute(
            [
                'id' => $id,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'hobbies' => $hobbies
            ]
        );
    }

    public function save(array $data): void
    {
        $hobbies = json_encode($data['hobbies']);

        $query = $this->pdo->prepare('INSERT INTO users (first_name, last_name, hobbies)
                                    VALUES (:first_name, :last_name, :hobbies)');
        $query->execute(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'hobbies' => $hobbies
            ]
        );

    }

}