<?php

namespace App\School\Entities;

class Subject
{
    protected ?int $id = null;
    protected string $name;

    protected array $students = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function addStudent(Student $student): self
    {
        $this->students[] = $student;
        return $this;
    }
}
