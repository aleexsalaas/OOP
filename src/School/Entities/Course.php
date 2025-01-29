<?php

namespace App\School\Entities;

class Course
{
    protected ?int $id = null;
    protected string $name;
    protected ?int $degree_id = null;

    // Relación: Un Course pertenece a un Degree
    protected ?Degree $degree = null;

    public function __construct(string $name, ?int $degree_id = null)
    {
        $this->name = $name;
        $this->degree_id = $degree_id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDegreeId(): ?int
    {
        return $this->degree_id;
    }

    public function getDegree(): ?Degree
    {
        return $this->degree;
    }

    // Establecer el Degree para este Course
    public function setDegree(Degree $degree): self
    {
        $this->degree = $degree;
        return $this;
    }
}
