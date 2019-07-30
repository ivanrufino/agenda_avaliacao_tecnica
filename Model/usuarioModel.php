<?php
require_once 'Model.php';
class usuarioModel extends Model{
    public $table = 'usuario';
    

    public function login($email, $password){
        $data = $this->db->query("SELECT id,nome,email FROM {$this->table} where email = ". $this->db->quote($email)." and password = " . $this->db->quote($password)); // WHERE nome = ' . $conn->quote($name));
        return $usuario = $data->fetch(PDO::FETCH_NAMED);
       
    }
    
}
?>