<?php

namespace App\School\Repositories;

use App\School\Entities\Department;
use PDO;

class DepartmentRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createDepartment(Department $department)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO departments (name) 
            VALUES (:name)"
        );

        $stmt->execute([
            ':name' => $department->getName(),
        ]);

        $department->setId($this->pdo->lastInsertId());

        return $department;
    }

    public function updateDepartment(Department $department)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE departments SET 
            name = :name 
            WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $department->getId(),
            ':name' => $department->getName(),
        ]);
    }

    public function deleteDepartment(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM departments WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function findByIdDepartment(int $id): ?Department
    {
        $stmt = $this->pdo->prepare("SELECT * FROM departments WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $department = new Department($data['name']);
            $department->setId($data['id']);
            return $department;
        }

        return null;
    }
}
