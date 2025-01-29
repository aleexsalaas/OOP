<?php

namespace App\Controllers;

use App\School\Services\AssginTeacherDepartmentService;
use App\School\Entities\User;

class AddUserController {

    public function adding_users() {
        
        // Recibir los datos del formulario
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
        $uuid = $_POST['uuid'];

        $AssginTeacherDepartmentService = new AssginTeacherDepartmentService();

        try {

            $user = $AssginTeacherDepartmentService->createUser($first_name, $last_name, $email, $password, $user_type, $uuid);

            header("Location: users");
            exit();
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
