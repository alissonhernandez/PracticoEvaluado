<?php
namespace app\controllers;

class HomeController{
    public function index(){
        $data = ["title" => "Bienvenido a mi blog", 
        "descripcion" => "Este es un blog que contiene perfil personal, mis lenguajes de programacion favortios y mis datos de contacto"];
        return $this->view("home", $data);
    }

    private function view($vista, $data = []){
        extract($data);
        ob_start();
        include "../app/views/$vista.php";
        $content = ob_get_clean();
        return $content;
    }
    else{
        echo "vista no encotrada ../app/views/$vista.php";
    }
    return "Pagina Home";   
}
?>