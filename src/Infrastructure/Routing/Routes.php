<?php

use App\Controllers\HomeController;
use App\Controllers\AddUserFormController;
use App\Controllers\AddUserController;
use App\Controllers\TeachersController;
use App\Controllers\DepartmentsController;
use App\Controllers\CoursesController;
use App\Controllers\StudentsController;

return [
    [
        'method' => 'GET',
        'path' => '/',
        'handler' => [HomeController::class,'home'],
    ],
    [
        'method' => 'GET',
        'path' => '/users',
        'handler' => [HomeController::class,'users'],
    ],
    [
        'method' => 'GET',
        'path' => '/add-users',
        'handler' => [AddUserFormController::class,'add_users'],
    ],
    [
        'method' => 'POST',
        'path' => '/users-add-form',
        'handler' => [AddUserController::class,'adding_users'],
    ],
    [
        'method' => 'GET',
        'path' => '/courses',
        'handler' => [HomeController::class,'courses'],
    ],
    [
        'method' => 'GET',
        'path' => '/degrees',
        'handler' => [HomeController::class,'degrees'],
    ],
    [
        'method' => 'GET',
        'path' => '/departments',
        'handler' => [HomeController::class,'departments'],
    ],
    [
        'method' => 'GET',
        'path' => '/teachers',
        'handler' => [HomeController::class,'teachers'],
    ],
    [
        'method' => 'GET',
        'path' => '/students',
        'handler' => [HomeController::class,'students'],
    ],
    [
        'method' => 'GET',
        'path' => '/subjects',
        'handler' => [HomeController::class,'subjects'],
    ],
    [
        'method' => 'GET',
        'path' => '/exams',
        'handler' => [HomeController::class,'exams'],
    ],
    [
        'method' => 'GET',
        'path' => '/enrollments',
        'handler' => [HomeController::class,'enrollments'],
    ],
    [
        'method' => 'GET',
        'path' => '/add-teachers',
        'handler' => [TeachersController::class,'add_teachers'],
    ],
    [
        'method' => 'GET',
        'path' => '/add-courses',
        'handler' => [CoursesController::class,'add_courses'],
    ],
    [
        'method' => 'GET',
        'path' => '/add-departments',
        'handler' => [DepartmentsController::class,'add_departments'],
    ],
    [
        'method' => 'GET',
        'path' => '/add-students',
        'handler' => [StudentsController::class,'add_students'],
    ],
    [
        'method' => 'POST',
        'path' => '/departments-add-form',
        'handler' => [DepartmentsController::class,'adding_departments'],
    ],
    [
        'method' => 'POST',
        'path' => '/teacher-add-form',
        'handler' => [TeachersController::class,'adding_teachers'],
    ],
    [
        'method' => 'POST',
        'path' => '/courses-add-form',
        'handler' => [CoursesController::class,'adding_courses'],
    ],
    [
        'method' => 'POST',
        'path' => '/students-add-form',
        'handler' => [StudentsController::class,'adding_students'],
    ]
];