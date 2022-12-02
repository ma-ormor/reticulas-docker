<?php
class Database{
  // Parametros de la BD
  private $host = 'localhost';
  private $db_name = 'reticulas';
  private $username = 'root'; 
  private $password = ''; 
  private $conn;

  // Conexión a la BD
  public function connect(){
    $this->conn = null; 
    $this->host = $this->getHost();
    $this->password = $this->getPassword();

    try{
      $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,
      $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo 'Connection error'.$e->getMessage(); 
    }

    return $this->conn;
  }

  private function getHost(){
    if(isset($_ENV['BD_RETICULAS_SERVICE_HOST']))
      return $_ENV['BD_RETICULAS_SERVICE_HOST'];
    else return 'localhost';
  }//function

  private function getPassword(){
    if(isset($_ENV['DB_PASS']))
      return $_ENV['DB_PASS'];
    else return '';
  }//function
}
?>
