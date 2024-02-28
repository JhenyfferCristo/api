<?php


class StudentDatabase{

  private $host='localhost';
  private $db_name = 'student';
  private $username = 'root';
  private $password = 'password';
  private $connection = null; 


//connect the databse
public function connect(){
  try{
    $this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password,);
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  return $this->connection;
}
}