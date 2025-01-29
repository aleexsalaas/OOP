<?php

namespace App\School\Repositories;

use App\School\Entities\Enrollment;
use PDO;

class EnrollmentRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createEnrollment(Enrollment $enrollment)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO enrollments (student_id, subject_id, enrollment_date) 
            VALUES (:student_id, :subject_id, :enrollment_date)"
        );

        $stmt->execute([
            ':student_id' => $enrollment->getStudentId(),
            ':subject_id' => $enrollment->getSubjectId(),
            ':enrollment_date' => $enrollment->getEnrollmentDate()->format('Y-m-d'),
        ]);

        $enrollment->setId($this->pdo->lastInsertId());

        return $enrollment;
    }

    public function updateEnrollment(Enrollment $enrollment)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE enrollments SET 
            student_id = :student_id, 
            subject_id = :subject_id, 
            enrollment_date = :enrollment_date
            WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $enrollment->getId(),
            ':student_id' => $enrollment->getStudentId(),
            ':subject_id' => $enrollment->getSubjectId(),
            ':enrollment_date' => $enrollment->getEnrollmentDate()->format('Y-m-d'),
        ]);
    }

    public function deleteEnrollment(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM enrollments WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function findByIdEnrollment(int $id): ?Enrollment
    {
        $stmt = $this->pdo->prepare("SELECT * FROM enrollments WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $enrollment = new Enrollment($data['student_id'], $data['subject_id'], new \DateTime($data['enrollment_date']));
            $enrollment->setId($data['id']);
            return $enrollment;
        }

        return null;
    }
}
