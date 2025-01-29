<?php

namespace App\School\Repositories;

use App\School\Entities\Exam;
use PDO;

class ExamRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createExam(Exam $exam)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO exams (subject_id, exam_date, description) 
            VALUES (:subject_id, :exam_date, :description)"
        );

        $stmt->execute([
            ':subject_id' => $exam->getSubjectId(),
            ':exam_date' => $exam->getExamDate()->format('Y-m-d H:i:s'),
            ':description' => $exam->getDescription(),
        ]);

        $exam->setId($this->pdo->lastInsertId());

        return $exam;
    }

    public function updateExam(Exam $exam)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE exams SET 
            subject_id = :subject_id, 
            exam_date = :exam_date, 
            description = :description
            WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $exam->getId(),
            ':subject_id' => $exam->getSubjectId(),
            ':exam_date' => $exam->getExamDate()->format('Y-m-d H:i:s'),
            ':description' => $exam->getDescription(),
        ]);
    }

    public function deleteExam(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM exams WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function findByIdExam(int $id): ?Exam
    {
        $stmt = $this->pdo->prepare("SELECT * FROM exams WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $exam = new Exam($data['subject_id'], new \DateTime($data['exam_date']), $data['description']);
            $exam->setId($data['id']);
            return $exam;
        }

        return null;
    }
}
