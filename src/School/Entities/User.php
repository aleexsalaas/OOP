<?php
namespace App\School\Entities;

use App\Infrastructure\Database\DatabaseConnection; // Asegúrate de usar el namespace correctamente

class User
{
    private int $id;
    private string $uuid;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private ?\DateTime $createdAt = null;
    private ?\DateTime $updatedAt = null;
    private string $userType;

    /**
     * Constructor de la clase User.
     */
    public function __construct(string $firstName, string $lastName, string $email, string $password, string $userType, string $uuid)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->userType = $userType;
        $this->uuid = $uuid;
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUserType(): string
    {
        return $this->userType;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    // Setters
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function setUpdatedAt(): self
    {
        $this->updatedAt = new \DateTime();
        return $this;
    }

}
