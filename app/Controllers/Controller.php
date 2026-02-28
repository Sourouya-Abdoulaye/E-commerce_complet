<?php
namespace App\Controllers;

class Controller {
    private static $chemin_global=__DIR__."/../../views/" ;

    
    public function render($view_path,$data=[]) {
        extract($data);
        require Controller::$chemin_global.$view_path;
    }

   
   


}