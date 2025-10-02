<?php
namespace app\controllers;

class HomeController{
    public function index(){
        return $this->view('HomeView',['title'=>'Home']);
    }

    private function view($vista,$data=[]){
        extract($data);
        if(file_exists("../app/views/$vista.php")){
            ob_start();
            include "../app/views/$vista.php";
            return ob_get_clean();
        } else {
            echo "Vista no encontrada: $vista";
        }
        return "Hola desde el home";
    }
}
