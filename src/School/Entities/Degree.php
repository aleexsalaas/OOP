<?php

namespace App\School\Entities;

class Degree
{
    protected ?int $id = null;
    protected string $name;
    protected ?int $duration_years = null;

    // Relación: Un Degree tiene muchos Courses
    protected array $courses = [];

    public function __construct(string $name, ?int $duration_years = null)
    {
        $this->name = $name;
        $this->duration_years = $duration_years;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDurationYears(): ?int
    {
        return $this->duration_years;
    }

    // Relación: Obtener todos los Courses asociados a este Degree
    public function getCourses(): array
    {
        return $this->courses;
    }

    // Relación: Añadir un Course a este Degree
    public function addCourse(Course $course): self
    {
        $this->courses[] = $course;
        return $this;
    }
}
