<?php

namespace App\School\Repositories;

use App\School\Entities\Degree;
use PDO;

class IDegreeRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

   public function createDegree(Degree $degree)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO degrees (name, duration_years) 
            VALUES (:name, :duration_years)"
        );

        $stmt->execute([
            ':name' => $degree->getName(),
            ':duration_years' => $degree->getDurationYears(),
        ]);

        $degree->setId($this->pdo->lastInsertId());

        return $degree;
    }

    public function updateDegree(Degree $degree)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE degrees SET 
            name = :name, 
            duration_years = :duration_years
            WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $degree->getId(),
            ':name' => $degree->getName(),
            ':duration_years' => $degree->getDurationYears(),
        ]);
    }

    public function deleteDegree(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM degrees WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function findByIdDegree(int $id): ?Degree
    {
        $stmt = $this->pdo->prepare("SELECT * FROM degrees WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $degree = new Degree($data['name'], $data['duration_years']);
            $degree->setId($data['id']);
            return $degree;
        }

        return null;
    }
}
