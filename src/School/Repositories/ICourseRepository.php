<?php

namespace App\School\Repositories;

use App\School\Entities\Course;
use PDO;

class CourseRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createCourse(Course $course)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO courses (name, degree_id) 
            VALUES (:name, :degree_id)"
        );

        $stmt->execute([
            ':name' => $course->getName(),
            ':degree_id' => $course->getDegreeId(),
        ]);

        $course->setId($this->pdo->lastInsertId());

        return $course;
    }

    public function updateCourse(Course $course)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE courses SET 
            name = :name, 
            degree_id = :degree_id
            WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $course->getId(),
            ':name' => $course->getName(),
            ':degree_id' => $course->getDegreeId(),
        ]);
    }

    public function deleteCourse(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM courses WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function findByIdCourse(int $id): ?Course
    {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $course = new Course($data['name']);
            $course->setId($data['id']);
            $course->setDegreeId($data['degree_id']);
            return $course;
        }

        return null;
    }
}
