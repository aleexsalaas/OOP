<?php

namespace App\School\Entities;

class Department
{
    protected ?int $id = null;
    protected string $name;

    protected array $teachers = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }

    public function getTeachers(): array
    {
        return $this->teachers;
    }

    public function addTeacher(Teacher $teacher): self
    {
        $this->teachers[] = $teacher;
        return $this;
    }
}
