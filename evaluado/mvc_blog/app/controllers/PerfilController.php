<?php
namespace app\controllers;

class PerfilControler{
    public function index(){
        $data = ["title" => "Mi perfil", 
        "descripcion" => "Mi nombre es Alisson Hernández, tengo 22 años y soy estudiante de ingenieria en sistemas informaticos."];
        return $this->view("perfil", $data);
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
    return "Pagina Perfil";
}