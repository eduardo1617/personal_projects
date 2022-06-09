<?php
require_once './vendor/autoload.php';

class sellerTable
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

    public function allSellers(): array
    {
        $query = $this->pdo->prepare(
            'SELECT 
                    sellers.id,
                    sellers.first_name,
                    sellers.last_name,
                    sellers.dni,
                    sellers.birthday,
                    sellers.hiring_date,
                    sellers.work_id,
                    sellers.phone,
                    GROUP_CONCAT(CONCAT(branches.`state`, "-", branches.city)) AS branchName
                    FROM sellers
                    INNER JOIN branch_seller ON branch_seller.id_seller = sellers.id
                    INNER JOIN branches ON branches.id = branch_seller.id_branch
                    WHERE sellers.status = 1
                    GROUP BY sellers.id, sellers.first_name, sellers.last_name, sellers.dni, 
                    sellers.birthday, sellers.hiring_date, sellers.work_id, sellers.phone
                    ORDER BY  sellers.id DESC '
        );
        $query->execute();
        $sellers =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $sellers;
    }

    public function Branche(): array
    {

        $query = $this->pdo->prepare('SELECT branches.id, branches.city FROM branches WHERE status = 1');
        $query->execute();
        $branches =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $branches;
    }

    public function saveSeller(array $sellerData): void
    {
        $query = $this->pdo->prepare(
            'INSERT INTO sellers (first_name, last_name, dni, birthday, hiring_date, work_id, phone, status)
                    VALUES (:first_name, :last_name, :dni, :birth_day, :hiring_date, 
                            (SELECT CONCAT(CAST((RAND()*1000000) AS DECIMAL(6)),"-",YEAR(NOW())) AS work_id), 
                            :phone, :status )');
        $query->execute(
            [
                'first_name' => $sellerData['first_name'],
                'last_name' => $sellerData['last_name'],
                'dni' => $sellerData['dni'],
                'birth_day' => $sellerData['birth_day'],
                'hiring_date' => $sellerData['hiring_date'],
//                'work_id' => $sellerData['work_id'],
                'phone' => $sellerData['phone'],
                'status' => 1
            ]
        );

        $findIdSeller = $this->pdo->prepare('SELECT LAST_INSERT_ID() AS lastId FROM sellers LIMIT 1');
        $findIdSeller->execute();
        $seller =  $findIdSeller->fetch(PDO::FETCH_ASSOC);
        $lastSeller = $seller["lastId"];

        $brandSellerAsignation = $this->pdo->prepare(
            'INSERT INTO branch_seller (id_seller, id_branch)
                    VALUES (:id_seller, :id_branch)');
        $brandSellerAsignation->execute(
            [
                'id_seller' => $lastSeller,
                'id_branch' => (int)$sellerData['branches']
            ]
        );
    }

    public function findSeller(string $id)
    {

        $query = $this->pdo->prepare(
            'SELECT branch_seller.id_seller, branch_seller.id_branch,
                    sellers.first_name, sellers.last_name, sellers.dni, sellers.birthday, 
                    sellers.hiring_date, sellers.work_id, sellers.phone
                    FROM branch_seller
                    INNER JOIN sellers ON sellers.id = branch_seller.id_seller
                    WHERE branch_seller.id_seller = :id');
        $query->execute(['id'=>$id]);
        $seller =  $query->fetch(PDO::FETCH_ASSOC);

        return $seller;
    }

    public function editSeller(string $id, array $sellerData): void
    {
        $query = $this->pdo->prepare(
            'UPDATE sellers SET first_name = :first_name, last_name = :last_name, 
                    dni = :dni, birthday = :birth_day, hiring_date = :hiring_date, work_id = :work_id,
                    phone = :phone WHERE id = :id');
        $query->execute(
            [
                'id' => $id,
                'first_name' => $sellerData['first_name'],
                'last_name' => $sellerData['last_name'],
                'dni' => $sellerData['dni'],
                'birth_day' => $sellerData['birth_day'],
                'hiring_date' => $sellerData['hiring_date'],
                'work_id' => $sellerData['work_id'],
                'phone' => $sellerData['phone']
            ]
        );

        $brandSellerUpdate = $this->pdo->prepare(
            'UPDATE branch_seller SET id_branch = :id_branch
                    WHERE id_seller = :id_seller');
        $brandSellerUpdate->execute(
            [
                'id_seller' => $id,
                'id_branch' => (int)$sellerData['branches']
            ]
        );
    }

    public function deactivateSeller(string $id): void
    {
        $query = $this->pdo->prepare(
            'UPDATE
                    sellers SET status = :status
                    WHERE id = :id');
        $query->execute(
            [
                'id'=>$id,
                'status'=>0
            ]
        );
    }
}