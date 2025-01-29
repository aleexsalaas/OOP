<?php

namespace App\School\Entities;

use App\School\Entities\Department;

class Teacher
{
    protected ?int $id = null;
    protected int $userId;
    protected ?int $department = null;

    public function __construct(int $userId, ?int $department = null)
    {
        $this->userId = $userId;
        if ($department !== null) {
            $this->setDepartment($department);
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getDepartment(): ?int
    {
        return $this->department;
    }

    public function setDepartment(int $department): self
    {
        $this->department = $department;
        return $this;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }
}
