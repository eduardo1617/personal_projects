<?php
require_once './vendor/autoload.php';

class productTable
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

    public function allProducts(): array
    {
        $query = $this->pdo->prepare(
            'SELECT 
                    products.id, 
                    products.product_name,
                    category.category_name 
                    FROM products
                    INNER JOIN category ON category.id = products.category_id
                    WHERE products.status = 1
                    ORDER BY products.id DESC'
        );
        $query->execute();
        $products =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function Category(): array
    {

        $query = $this->pdo->prepare('
                                    SELECT category.id, category.category_name 
                                    FROM category
                                    WHERE category.status = 1');
        $query->execute();
        $categories =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

    public function saveProduct(array $productData): void
    {
        $query = $this->pdo->prepare(
            'INSERT INTO products (product_name, category_id, status)
                    VALUES (:product_name, :category_id, :status)');
        $query->execute(
            [
                'product_name' => $productData['product_name'],
                'category_id' => (int)$productData['category'],
                'status' => 0
            ]
        );
    }

    public function findProduct(string $id)
    {

        $query = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $query->execute(['id'=>$id]);
        $product =  $query->fetch(PDO::FETCH_ASSOC);

        return $product;
    }

    public function editProduct(string $id, array $productData): void
    {
        $query = $this->pdo->prepare(
            'UPDATE products SET product_name = :product_name, category_id = :category_id
                    WHERE id = :id');
        $query->execute(
            [
                'id' => $id,
                'product_name' => $productData['product'],
                'category_id' => (int)$productData['category']
            ]
        );
    }

    public function deactivateProduct(string $id): void
    {
        $query = $this->pdo->prepare(
            'UPDATE
                    products SET status = :status
                    WHERE id = :id');
        $query->execute(
            [
                'id'=>$id,
                'status'=>0
            ]
        );
    }

}