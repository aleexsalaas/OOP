<?php 

namespace App\Controllers;

use App\School\Services\AssginTeacherDepartmentService;

class DepartmentsController {


    public function add_departments(){

        require VIEWS . '/departmentsform.view.php';
    

    }

    public function adding_departments() {
        

        $name = $_POST['name'];
    
        $AssginTeacherDepartmentService = new AssginTeacherDepartmentService();
    
        try {

            $department = $AssginTeacherDepartmentService->createDepartment($name);
    
            header("Location: departments");
            exit();
        } catch (\Exception $e) {

            echo "Error: " . $e->getMessage();
            header("Location: add-departments");
            exit();
        }
    }
    
}