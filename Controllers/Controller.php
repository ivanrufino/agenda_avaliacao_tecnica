<?php
require_once '../config/config.php';
class Controller {
    function __construct(){
    }
     public function view($view,$dados=[]){
         global  $default_path;
         extract($dados);      
        $view=str_replace(".","/",$view);   
         require_once $default_path['view'].$view.".php";
            
     }
     public function load_model($model){
        global  $default_path;
        require_once $default_path['model'].$model.".php";
        $this->$model= new $model();
     }
     public function auth(){
      $url = $_SERVER['url_path'].'home/login';
         if (!isset($_SESSION) || !isset($_SESSION['usuario'])){
            header("Location: $url");
            die();
         }
        //
       
     }
}
?>