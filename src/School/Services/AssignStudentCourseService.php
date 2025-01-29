<?php

namespace App\School\Services;

use App\School\Entities\Student;
use App\School\Entities\Course;

use App\Infrastructure\Persistence\StudentRepository;
use App\Infrastructure\Persistence\EnrollmentRepository;
use App\Infrastructure\Persistence\CourseRepository;

use App\Infrastructure\Database\DatabaseConnection;

class AssignStudentCourseService{

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

    public function createCourse(string $courseName, ?int $degreeId = null): bool
    {
        // Obtener la conexión a la base de datos
        $db = DatabaseConnection::getConnection();

        // Preparar la consulta para insertar el curso
        $stmt = $db->prepare("
            INSERT INTO courses (name, degree_id)
            VALUES (:name, :degree_id)
        ");

        // Asignar los parámetros con valores
        $stmt->bindParam(':name', $courseName);
        $stmt->bindParam(':degree_id', $degreeId, \PDO::PARAM_INT);

        // Ejecutar la consulta e indicar si fue exitosa
        return $stmt->execute();
    }

    public function createStudent(int $userId, string $dni, string $enrollmentYear): void
    {
        $db = DatabaseConnection::getConnection();
        $stmt = $db->prepare("INSERT INTO students (user_id, dni, enrollment_year) VALUES (:user_id, :dni, :enrollment_year)");
        $stmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
        $stmt->bindParam(':dni', $dni, \PDO::PARAM_STR);
        $stmt->bindParam(':enrollment_year', $enrollmentYear, \PDO::PARAM_STR);

        if (!$stmt->execute()) {
            throw new \Exception("Failed to insert student into the database.");
        }
    }


}