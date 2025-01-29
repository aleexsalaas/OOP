<?php

namespace App\School\Repositories;

use App\School\Entities\Subject;
use PDO;

class SubjectRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createSubject(Subject $subject)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO subjects (course_id, name) 
            VALUES (:course_id, :name)"
        );

        $stmt->execute([
            ':course_id' => $subject->getCourseId(),
            ':name' => $subject->getName(),
        ]);

        $subject->setId($this->pdo->lastInsertId());

        return $subject;
    }

    public function updateSubject(Subject $subject)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE subjects SET 
            course_id = :course_id, 
            name = :name
            WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $subject->getId(),
            ':course_id' => $subject->getCourseId(),
            ':name' => $subject->getName(),
        ]);
    }

    public function deleteSubject(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM subjects WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function findByIdSubject(int $id): ?Subject
    {
        $stmt = $this->pdo->prepare("SELECT * FROM subjects WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $subject = new Subject($data['course_id'], $data['name']);
            $subject->setId($data['id']);
            return $subject;
        }

        return null;
    }
}
