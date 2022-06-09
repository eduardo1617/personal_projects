<?php
require_once './vendor/autoload.php';

class Reports
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

    public function BranchesReport(): array
    {
        $query = $this->pdo->prepare(
            'SELECT 
                    Branches.id, 
                    CONCAT(branches.`state`,"-",branches.city) as Branch, 
                    SUM((sales.quantity* sales.price)) as TotalBranch
                    FROM sales
                    INNER JOIN branches on branches.id = sales.branch_id
                    GROUP BY branches.id, Branch 
                    ORDER BY Branch '
        );
        $query->execute();
        $branchesReport =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $branchesReport;
    }

    public function findBranchReport(string $id)
    {

        $query = $this->pdo->prepare(
            'SELECT 
                    CONCAT(branches.`state`, "-", branches.city) AS Branch
                    FROM branches WHERE id = :id');
        $query->execute(['id'=>$id]);
        $branchReport =  $query->fetch(PDO::FETCH_ASSOC);

        return $branchReport;
    }

    public function branchReport($id): array
    {
        $query = $this->pdo->prepare(
            'SELECT 
                    CONCAT(sellers.first_name, " ", sellers.last_name) as Seller, 
                    products.product_name, sales.sale_date, sales.quantity, (sales.quantity*sales.price) as Total 
                    FROM sales
                    INNER JOIN sellers ON sellers.id = sales.seller_id
                    INNER JOIN products ON products.id = sales.product_id
                    WHERE sales.branch_id = :id'
        );
        $query->execute(['id'=>$id]);
        $branchReport =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $branchReport;
    }

    public function SellersReport(): array
    {
        $query = $this->pdo->prepare(
            'SELECT 
                    sellers.id,
                    CONCAT(sellers.first_name, " ", sellers.last_name) AS Seller,
                    sellers.work_id, 
                    SUM(sales.quantity * sales.price) AS TotalSold
                    FROM sales
                    INNER JOIN sellers ON sellers.id = sales.seller_id
                    GROUP BY seller_id, Seller, sellers.work_id
                    ORDER BY Seller'
        );
        $query->execute();
        $sellersReport =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $sellersReport;
    }

    public function sellerReport($id): array
    {
        $query = $this->pdo->prepare(
            'SELECT
                    CONCAT(branches.`state`, "-", branches.city) AS Branch,
                    products.product_name, 
                    sales.sale_date, 
                    sales.quantity, 
                    (sales.quantity * sales.price) AS Total
                    FROM sales
                    INNER JOIN branches ON branches.id = sales.branch_id
                    INNER JOIN products ON products.id = sales.product_id
                    WHERE sales.seller_id = :id'
        );
        $query->execute(['id'=>$id]);
        $sellerReport =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $sellerReport;
    }

    public function findSellerReport(string $id)
    {

        $query = $this->pdo->prepare(
            'SELECT 
                    CONCAT(first_name, " ", last_name) AS fullname 
                    FROM sellers 
                    WHERE id = :id');
        $query->execute(['id'=>$id]);
        $sellerReport =  $query->fetch(PDO::FETCH_ASSOC);

        return $sellerReport;
    }
}