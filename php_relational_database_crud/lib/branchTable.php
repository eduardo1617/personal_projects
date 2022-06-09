<?php

require_once './vendor/autoload.php';

class branchTable {
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

    public function allBranches(): array
    {

        $query = $this->pdo->prepare('SELECT * FROM branches WHERE status = 1');
        $query->execute();
        $branches =  $query->fetchAll(PDO::FETCH_ASSOC);

        return $branches;
    }

    public function findBranch(string $id)
    {

        $query = $this->pdo->prepare('SELECT * FROM branches WHERE id = :id');
        $query->execute(['id'=>$id]);
        $branches =  $query->fetch(PDO::FETCH_ASSOC);

        return $branches;
    }

    public function deactivateBranch(string $id): void
    {
        $query = $this->pdo->prepare(
            'UPDATE branches 
                    SET status = :status
                    WHERE id = :id');
        $query->execute(['id'=>$id, 'status'=>0]);
    }

    public function editBranch(string $id, array $branchData): void
    {
        $query = $this->pdo->prepare(
            'UPDATE branches SET state = :state, city = :city, 
                    address = :address, phone = :phone
                    WHERE id = :id');
        $query->execute(
            [
                'id' => $id,
                'state' => $branchData['state'],
                'city' => $branchData['city'],
                'address' => $branchData['address'],
                'phone' => $branchData['phone']
            ]
        );
    }

    public function saveBranch(array $branchData): void
    {
        $query = $this->pdo->prepare(
            'INSERT INTO branches (state, city, address, phone, status)
                    VALUES (:state, :city, :address, :phone, :status)');
        $query->execute(
            [
                'state' => $branchData['state'],
                'city' => $branchData['city'],
                'address' => $branchData['address'],
                'phone' => $branchData['phone'],
                'status' => 1
            ]
        );
    }

}