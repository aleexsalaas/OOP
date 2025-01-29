<?php

namespace App\School\Repositories;

use App\School\Entities\User;
use PDO;

class IUserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function createUser(User $user)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (uuid, first_name, last_name, email, password, user_type, created_at, updated_at) 
            VALUES (:uuid, :first_name, :last_name, :email, :password, :user_type, :created_at, :updated_at)"
        );

        $stmt->execute([
            ':uuid' => $user->getUuid(),
            ':first_name' => $user->getFirstName(),
            ':last_name' => $user->getLastName(),
            ':email' => $user->getEmail(),
            ':password' => password_hash($user->getPassword(), PASSWORD_BCRYPT),
            ':user_type' => $user->getUserType(),
            ':created_at' => date('Y-m-d H:i:s'),
            ':updated_at' => date('Y-m-d H:i:s')
        ]);

       $user->setId($this->pdo->lastInsertId());

        return $user; 
    }

    // Actualizar un usuario existente
    public function updateUser(User $user)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE users SET 
            uuid = :uuid, 
            first_name = :first_name, 
            last_name = :last_name, 
            email = :email, 
            password = :password, 
            user_type = :user_type, 
            updated_at = :updated_at
            WHERE id = :id"
        );

        return $stmt->execute([
            ':id' => $user->getId(),
            ':uuid' => $user->getUuid(),
            ':first_name' => $user->getFirstName(),
            ':last_name' => $user->getLastName(),
            ':email' => $user->getEmail(),
            ':password' => password_hash($user->getPassword(), PASSWORD_BCRYPT),
            ':user_type' => $user->getUserType(),
            ':updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function deleteUser(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function findByDniUser(string $dni): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE dni = :dni");
        $stmt->execute([':dni' => $dni]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data['first_name'], $data['email'], $data['password'], $data['user_type'], $data['last_name'], $data['uuid']);
        }

        return null;
    }

    // Buscar un usuario por ID
    public function findByIdUser(int $id): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data['first_name'], $data['email'], $data['password'], $data['user_type'], $data['last_name'], $data['uuid']);
        }

        return null;
    }

    // Buscar todos los usuarios
    public function findAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM users");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($data as $row) {
            $users[] = new User($row['first_name'], $row['email'], $row['password'], $row['user_type'], $row['last_name'], $row['uuid']);
        }

        return $users;
    }
}
