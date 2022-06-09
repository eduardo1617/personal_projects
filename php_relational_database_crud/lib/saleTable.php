<?php
require_once './vendor/autoload.php';

class saleTable
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

    public function allSales(): array
    {
        $query = $this->pdo->prepare(
            'SELECT 
                    sales.id,
                    CONCAT(branches.`state`, "-", branches.city) AS Branch,
                    CONCAT(sellers.first_name, " ", sellers.last_name) AS Employee,
                    sales.sale_date, products.product_name AS Product, sales.quantity AS Quantity,
                    sales.price, (sales.quantity * sales.price) AS Total 
                    FROM sales
                    INNER JOIN branches ON branches.id = sales.branch_id
                    INNER JOIN sellers ON sellers.id = sales.seller_id
                    INNER JOIN products ON products.id = sales.product_id
                    ORDER BY sales.id DESC'
        );
        $query->execute();
        $sales =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $sales;
    }

    public function Branche(): array
    {

        $query = $this->pdo->prepare(
            'SELECT branches.id, 
                    branches.city 
                    FROM branches
                    WHERE status = 1');
        $query->execute();
        $branches =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $branches;
    }

    public function Seller(): array
    {

        $query = $this->pdo->prepare(
            'SELECT sellers.id, 
                    CONCAT(sellers.first_name, " ", sellers.last_name) AS seller_name 
                    FROM sellers
                    WHERE status = 1');
        $query->execute();
        $sellers =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $sellers;
    }

    public function Product(): array
    {

        $query = $this->pdo->prepare(
            'SELECT products.id, 
                    products.product_name 
                    FROM products 
                    WHERE status = 1');
        $query->execute();
        $products =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function saveSale(array $saleData): void
    {
        $query = $this->pdo->prepare(
            'INSERT INTO sales (seller_id, product_id, branch_id, quantity, price, sale_date)
                    VALUES (:seller, :product, :branch, :quantity, :price, :sale_date)');
        $query->execute(
            [
                'seller' => $saleData['seller'],
                'product' => $saleData['product'],
                'branch' => $saleData['branch'],
                'quantity' => $saleData['quantity'],
                'price' => $saleData['price'],
                'sale_date' => $saleData['sale_date']
            ]
        );
    }

    public function findSale(string $id)
    {

        $query = $this->pdo->prepare('SELECT * FROM sales WHERE id = :id');
        $query->execute(['id'=>$id]);
        $sales =  $query->fetch(PDO::FETCH_ASSOC);

        return $sales;
    }

}