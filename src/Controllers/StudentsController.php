<?php

namespace App\Controllers;

use App\School\Services\AssignStudentCourseService;

class StudentsController {

    public function add_students() {
        require VIEWS . '/studentsform.view.php';
    }

    public function adding_students()
{
    // Inicializa el servicio
    $AssignStudentCourseService = new AssignStudentCourseService();  // O el servicio que estés usando

    $userId = $_POST['user_id'];
    $dni = $_POST['dni'];
    $enrollmentYear = $_POST['enrollment_year'];

    try {
        // Llama al método createStudent
        $result = $AssignStudentCourseService->createStudent($userId, $dni, $enrollmentYear);
        var_dump($result);
        if (!$result) {
            header("Location: students");
            exit();
        } else {
            header("Location: add-students");
            exit();
        }
        echo "Student successfully added.";
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


}