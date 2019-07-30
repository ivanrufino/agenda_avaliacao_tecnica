<?php
require_once 'Controller.php';

class Contato extends Controller{
    function __construct(){
        parent::__construct();
        $this->load_model('usuarioModel');
        $this->load_model('contatoModel');
    }
    public function novo(){
        $validar = $this->validarCampos();
        if(!$validar){
            $dados['id_usuario'] = $_SESSION['usuario']['id'];
            $dados['nome']       = $_POST['nome'];
            $dados['email']      = $_POST['email'];
            $dados['telefone']   = $_POST['telefone'];
            $dados['celular']    = $_POST['celular'];
            $dados['cep']        = $_POST['cep'];
            $dados['endereco']   = $_POST['endereco'];
            $dados['estado']     = $_POST['estado'];
            $dados['cidade']     = $_POST['cidade'];
            $info= $this->contatoModel->insert($dados);
            $retorno['message']='ok';
        }else{
            $retorno['message']=$validar;
        }
        echo json_encode($retorno); 
     
    }
    public function alterar($id){
       
        $contato = $this->contatoModel->getById($id);
        $this->view('contato.editar',compact('contato'));
        //print_r($contato);
    }
    public function excluir($id){
        $this->contatoModel->delete($id);
        $url = $_SERVER['url_path'].'home/index';
        header("Location: $url");
    }
    public function update($id){
        $validar = $this->validarCampos();
        if(!$validar){
            $dados['nome']       = $_POST['nome'];
            $dados['email']      = $_POST['email'];
            $dados['telefone']   = $_POST['telefone'];
            $dados['celular']    = $_POST['celular'];
            $dados['cep']        = $_POST['cep'];
            $dados['endereco']   = $_POST['endereco'];
            $dados['estado']     = $_POST['estado'];
            $dados['cidade']     = $_POST['cidade'];
            $this->contatoModel->update($id,$dados);
            $url = $_SERVER['url_path'].'home/index';
            header("Location: $url");
        }else{
            $this->alterar($id);
            
        }
    }
    public function validarCampos(){
        $erros="";
        if(empty(trim($_POST['nome']))){
            $erros .="Nome é Obrigatório.<br>"; 
            
        }
        if(empty(trim($_POST['email']))){
            $erros .="Email é Obrigatório.<br>"; 
        }
        if(empty(trim($_POST['telefone']))){
            $erros .="Telefone é Obrigatório.<br>"; 
        }
        if(empty(trim($_POST['celular']))){
            $erros .="Celular é Obrigatório.<br>"; 
        }
      //  var_dump(trim($_POST['nome']));
       // return 'me';
        return $erros=="" ? false:$erros;
    }
    
 
     
}
?>