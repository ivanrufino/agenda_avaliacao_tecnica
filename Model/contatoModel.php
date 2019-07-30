<?php
require_once 'Model.php';
class contatoModel extends Model{
    public $table = 'contato';
    

    public function getByIdUsuario($id_usuario){
        $data = $this->db->query("SELECT * FROM {$this->table} where id_usuario = ". $this->db->quote($id_usuario)); 
        return $usuario = $data->fetchAll(PDO::FETCH_NAMED);
       
    }
    
}
?>