<?php

namespace App\Controllers;

use App\Infrastructure\Database\DatabaseConnection;

use App\School\Services\DataService;

class HomeController {
    
    private $dataService;


    public function __construct() {

        $this->dataService = new DataService(); 
    }


    public function home() {

    
    $data = $this->dataService->getTablesNames();
        
    }

    public function add_usersform() {

        require VIEWS . '/usersform.view.php';

    }

    public function courses(){
        $keyword = "courses";
        $data = $this->dataService->getDataByTable($keyword);
        
    }

    public function degrees(){

        $keyword = "degrees";
        $data = $this->dataService->getDataByTable($keyword);
        
   
    }

    public function departments(){

        $keyword = "departments";
        $data = $this->dataService->getDataByTable($keyword);
        
   
    }

    public function enrollments(){

        $keyword = "enrollments";
        $data = $this->dataService->getDataByTable($keyword);
    
    
    }

    public function exams(){

        $keyword = "exams";
        $data = $this->dataService->getDataByTable($keyword);
   
    }

    public function students(){

        $keyword = "students";
        $data = $this->dataService->getDataByTable($keyword);
   
    }

    public function subjects() {

        $keyword = "subjects";
        $data = $this->dataService->getDataByTable($keyword);

    }

    public function teachers(){

        $keyword = "teachers";
        $data = $this->dataService->getDataByTable($keyword);
              
    }

    public function users() {

        $keyword = "users";
        $data = $this->dataService->getDataByTable($keyword);      

    }








}
