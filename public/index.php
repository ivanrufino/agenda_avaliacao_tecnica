<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../config/config.php';
$url_arr = explode('/',$_GET['url']);
$_SERVER['url_path'] = $default_path['url_path'];
$dir = dirname(__FILE__);
switch (count($url_arr)) {
    
    case 1:
        if(empty( $url_arr[0])){
            $class  = $default_class;
        }else{
            $class  = ucfirst($url_arr[0]);
        }
        $method = $default_method;
        $params = [];
        break;
    case 2:
        $class  = ucfirst($url_arr[0]);
        if(empty( $url_arr[1])){
            $method = $default_method;
        }else{
            $method = $url_arr[1];
        }
       
        $params = [];
        break;
    default:
        $class  = ucfirst($url_arr[0]);
        $method = $url_arr[1];
        unset($url_arr[0],$url_arr[1]);
        $params = $url_arr;
        break;
}
 $path_file = $default_path['controller'].$class.".php";
 
if(is_file($path_file)){
    require_once $path_file;  
    $obj = new $class();
    if(method_exists($obj,$method)){
        call_user_func_array(array( $obj , $method),  $params);
        
    }else{
        echo 'page 404';    
    }
}else{
    echo 'page 404';
}



?>
