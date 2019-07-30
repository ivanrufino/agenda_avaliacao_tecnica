<?php
require_once 'Controller.php';

class Home extends Controller{
    function __construct(){
        parent::__construct();
        $this->load_model('usuarioModel');
        $this->load_model('contatoModel');
    }
    public function login($dados=[]){
        $this->view('acesso.login',$dados);
    }
    public function registrar(){
        $this->view('acesso.registrar');
    }
    public function insert(){
        $dados['nome']=$_POST['nome'];
        $dados['email']=$_POST['email'];
        $dados['password']=sha1($_POST['password']);
        $info= $this->usuarioModel->insert($dados);
        if($info!==false){
            $url = $_SERVER['url_path'].'home/login';         
        }else{
            $url = $_SERVER['url_path'].'home/registrar'; 
        }
        header("Location: $url");
    }
    public function acessar(){
      
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $usuario = $this->usuarioModel->login($email, $password);
        if( $usuario !== false){
            $_SESSION['usuario']= $usuario;
            $url = $_SERVER['url_path'].'home/index';
            header("Location: $url");
        }else{
            $dados['erros']= "Não foi possível realizar login com essas informações.";
            $this->login($dados);
        }
        
    }
    public function index(){        
        $this->auth();
        $contatos= $this->contatoModel->getByIdUsuario($_SESSION['usuario']['id']);
        $this->view('index', compact('contatos'));
       // $this->view('acesso.login');
      /*   $info= $this->usuarioModel->getAll();
        var_dump($info); */
        
      /*  $teste=["ivan rufino"];
        $this->view('index', compact('teste'));*/
       // echo 'index';
    }   
    public function logout(){
        session_destroy();
        var_dump($_SESSION);
    }
 
     
}
?>