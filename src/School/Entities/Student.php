<?php

namespace App\School\Entities;

class Student
{
    protected ?int $id = null;
    protected string $first_name;
    protected string $last_name;


    protected array $subjects = [];

    public function __construct(string $first_name, string $last_name)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getSubjects(): array
    {
        return $this->subjects;
    }

    public function enrollInSubject(Subject $subject): self
    {
        $this->subjects[] = $subject;
        return $this;
    }
}
