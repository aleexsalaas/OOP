<?php 

namespace App\Controllers;

use App\School\Services\AssginTeacherDepartmentService;

class TeachersController {

    public function add_teachers() {
        require VIEWS . '/teachersform.view.php';
    }

    public function adding_teachers() {

        $userId = $_POST['user_id']; 
        $departmentId = $_POST['department_id'] ?? null;
        var_dump($departmentId);

        $AssginTeacherDepartmentService = new AssginTeacherDepartmentService();

        try {
            $teacher = $AssginTeacherDepartmentService->createTeacher($userId, $departmentId);


            header("Location: teachers");
            exit();
        } catch (\Exception $e) {

            echo "Error: " . $e->getMessage();
            header("Location: add-teachers");
            exit();
        }
    }
}
