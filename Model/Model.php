<?php
require_once '../config/config.php';
class Model{
    public $bd=null;
    public $table=null;
    function __construct(){
        $this->connectBd();
    }
    private function connectBd(){
        global $config_db;        extract($config_db);
        try {
            $conn = new PDO("$bd_type:host=$host;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $this->db=$conn;
          } catch(PDOException $e) {
              echo 'ERROR: ' . $e->getMessage();
          }
    }
    public function getAll(){
      $data = $this->db->query("SELECT * FROM {$this->table}"); 
      return $data->fetchAll(PDO::FETCH_NAMED);
    }
    public function getById($id){
        $data = $this->db->query("SELECT * FROM {$this->table} WHERE id = " . $this->db->quote($id)); 
        return $data->fetch(PDO::FETCH_NAMED);
    }
    public function insert($dados){
        $field =[];$values =[];
        foreach ($dados as $key => $value) {
            $field[] = $key;
            $values[":".$key] =$value;
        }
       
        try {
             
            $stmt =  $this->db->prepare("INSERT INTO {$this->table} (". implode(",",$field) .") VALUES(". implode(",",array_keys($values)) .")");
            $stmt->execute( $values);
             
            return $stmt->rowCount(); 
          } catch(PDOException $e) {
              return false;
            echo 'Error: ' . $e->getMessage();
        } 
    }
    public function update($id,$dados){
        $field =[];$values =[];
        
        foreach ($dados as $key => $value) {
            $field[] = "$key = :$key";
            $values[":".$key] =$value;
        }
       
        try {
             
            $stmt =  $this->db->prepare("UPDATE {$this->table} SET ". implode(",",$field) . " WHERE id = " . $this->db->quote($id));
            $stmt->execute( $values);
             
            return $stmt->rowCount(); 
          } catch(PDOException $e) {
             // return false;
            echo 'Error: ' . $e->getMessage();die();
        } 
    }
    public function delete($id){
        try {
             
            $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
            $stmt->bindParam(':id', $id); 
            $stmt->execute();
               
            return $stmt->rowCount(); 
          } catch(PDOException $e) {
                return false;
          }
    }

}
?>