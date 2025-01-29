<?php

namespace App\School\Services;

use App\School\Entities\User;
use App\School\Entities\Teacher;
use App\School\Entities\Department;
use App\Infrastructure\Database\DatabaseConnection;
use Exception;

class AssginTeacherDepartmentService{

    public function createUser(string $firstName, string $lastName, string $email, string $password, string $userType, string $uuid): bool
    {
        // Obtener la conexión a la base de datos
        $db = DatabaseConnection::getConnection();

        // Preparar la consulta para insertar el usuario
        $stmt = $db->prepare("
            INSERT INTO users (uuid, first_name, last_name, email, password, user_type, created_at, updated_at)
            VALUES (:uuid, :first_name, :last_name, :email, :password, :user_type, :created_at, :updated_at)
        ");

        // Asignar los parámetros con valores
        $createdAt = (new \DateTime())->format('Y-m-d H:i:s');
        $updatedAt = $createdAt;

        $stmt->bindParam(':uuid', $uuid);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':user_type', $userType);
        $stmt->bindParam(':created_at', $createdAt);
        $stmt->bindParam(':updated_at', $updatedAt);

        // Ejecutar la consulta e indicar si fue exitosa
        return $stmt->execute();
    }

    public function createTeacher(int $userId, ?int $departmentId): Teacher {
        $db = DatabaseConnection::getConnection();
    
        // Verificar si el usuario existe en la base de datos
        $stmt = $db->prepare("SELECT id FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch();
    
        if (!$row) {
            throw new Exception("El usuario con ID $userId no existe.");
        }
    
        // Verificar si el departamento existe antes de asignarlo
        $department = null;
        if ($departmentId !== null) {
            $stmt = $db->prepare("SELECT * FROM departments WHERE id = :id");
            $stmt->bindParam(':id', $departmentId, \PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch();
    
            if ($row) {
                $department = new Department($row['id'], $row['name']);
            } else {
                throw new Exception("El departamento con ID $departmentId no existe.");
            }
        }
    
        // Crear el objeto Teacher pasando un objeto Department
        $teacher = new Teacher($userId, $row['id']);
    
        // Insertar el profesor en la base de datos
        $stmt = $db->prepare("INSERT INTO teachers (user_id, department_id) VALUES (:user_id, :department_id)");
        $stmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
        $stmt->bindParam(':department_id', $departmentId, $departmentId !== null ? \PDO::PARAM_INT : \PDO::PARAM_NULL);
    
        if ($stmt->execute()) {
            $teacher->setId($db->lastInsertId());
            return $teacher;
        }
    
        throw new Exception("Error al crear el profesor.");
    }
    
    


    public function createDepartment(string $name): Department
    {
        // Conectar a la base de datos
        $db = DatabaseConnection::getConnection();

        // Verificar si el departamento ya existe
        $stmt = $db->prepare("SELECT id FROM departments WHERE name = ?");
        $stmt->execute([$name]);
        $existingDepartment = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($existingDepartment) {
            // Si el departamento ya existe, devolver una instancia del mismo
            $department = new Department($name);
            $departmentReflection = new \ReflectionProperty($department, 'id');
            $departmentReflection->setAccessible(true);
            $departmentReflection->setValue($department, (int) $existingDepartment['id']);
            return $department;
        }

        // Crear un nuevo departamento
        $stmt = $db->prepare("INSERT INTO departments (name) VALUES (?)");
        $stmt->execute([$name]);

        // Obtener el ID generado
        $departmentId = $db->lastInsertId();

        // Crear la instancia de la clase Department con el ID asignado
        $department = new Department($name);
        $departmentReflection = new \ReflectionProperty($department, 'id');
        $departmentReflection->setAccessible(true);
        $departmentReflection->setValue($department, (int) $departmentId);

        return $department;
    }






}