<?php 

namespace App\Controllers;

use App\School\Services\AssignStudentCourseService;

class coursesController {

    private $dataService;

    public function add_courses() {
        require VIEWS . '/coursesform.view.php';
    }

    public function adding_courses() {
        $courseName = $_POST['course_name'];
        $degreeId = $_POST['degrees_id'];
        $service = new AssignStudentCourseService();
        $result = $service->createCourse($courseName, $degreeId);

if ($result) {
    // Redirigir a la lista de cursos si se crea exitosamente
    header("Location: courses");
    exit();
} else {
    // Redirigir al formulario si ocurre un error
    header("Location: courses-add-form");
    exit();
}
    }
}
