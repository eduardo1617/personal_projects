<?php

require_once './vendor/autoload.php';

class categoryTable
{
    protected PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                'mysql:host=127.0.0.1;dbname=candys_abarrotes',
                'root',
                ''
            );
        } catch (\PDOException $e) {
            die('Could not connect');
        }
    }

    public function allCategories(): array
    {

        $query = $this->pdo->prepare('SELECT * FROM category WHERE category.status = 1
                                            ORDER BY category.id DESC');
        $query->execute();
        $categories =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

    public function saveCategory(array $categoryData): void
    {
        $query = $this->pdo->prepare(
            'INSERT INTO category (category_name, status) VALUES (:category, :status)');
        $query->execute(
            [
                'category' => $categoryData['category'],
                'status' => 1
            ]
        );
    }

    public function findCategory(string $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM category WHERE id = :id');
        $query->execute(['id'=>$id]);
        $categories =  $query->fetch(PDO::FETCH_ASSOC);

        return $categories;
    }

    public function editCategory(string $id, array $categoryData): void
    {
        $query = $this->pdo->prepare(
            'UPDATE category SET category_name = :category WHERE id = :id');
        $query->execute(
            [
                'id' => $id,
                'category' => $categoryData['category']
            ]
        );
    }

    public function deactivateCategory(string $id): void
    {
        $query = $this->pdo->prepare('UPDATE category SET status = :status WHERE id = :id');
        $query->execute(['id'=>$id, 'status'=>0]);
    }
}