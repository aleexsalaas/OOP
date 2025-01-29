<?php

namespace App\School\Entities;

class Exam
{
    private int $id;
    private int $subjectId;
    private \DateTime $examDate;
    private string $description;

    public function __construct(int $subjectId, \DateTime $examDate, string $description)
    {
        $this->subjectId = $subjectId;
        $this->examDate = $examDate;
        $this->description = $description;
    }

    // Getters y Setters

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSubjectId(): int
    {
        return $this->subjectId;
    }

    public function setSubjectId(int $subjectId): void
    {
        $this->subjectId = $subjectId;
    }

    public function getExamDate(): \DateTime
    {
        return $this->examDate;
    }

    public function setExamDate(\DateTime $examDate): void
    {
        $this->examDate = $examDate;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
