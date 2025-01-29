<?php

namespace App\School\Repositories;

use App\School\Entities\Teacher;
use PDO;

class TeacherRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createTeacher(Teacher $teacher)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO teachers (user_id, department_id) 
            VALUES (:user_id, :department_id)"
        );

        $stmt->execute([
            ':user_id' => $teacher->getUserId(),
            ':department_id' => $teacher->getDepartmentId(),
        ]);

        $teacher->setId($this->pdo->lastInsertId());

        return $teacher;
    }

    public function updateTeacher(Teacher $teacher)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE teachers SET 
            user_id = :user_id, 
            department_id = :department_id
            WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $teacher->getId(),
            ':user_id' => $teacher->getUserId(),
            ':department_id' => $teacher->getDepartmentId(),
        ]);
    }

    public function deleteTeacher(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM teachers WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function findByIdTeacher(int $id): ?Teacher
    {
        $stmt = $this->pdo->prepare("SELECT * FROM teachers WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $teacher = new Teacher($data['user_id'], $data['department_id']);
            $teacher->setId($data['id']);
            return $teacher;
        }

        return null;
    }
}
