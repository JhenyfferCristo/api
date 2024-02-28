<?php

error_reporting(E_ALL);
ini_set('display_error', 1);

class StudentTable{
  //student table properties

  public $id;
  public $student_name;
  public $student_number;
  public $student_age;

//connecting with the data of the student table

  private $connection;
  private $table = 'student';

  public function __construct($db){
    $this->connection = $db;
  }

  public function getStudents(){
    $query = 'SELECT * FROM student';
    $queryResponse = $this->connection->prepare($query);
    $queryResponse->execute();
    return $queryResponse;
}

  public function getStudent($id){
    $query = 'SELECT * FROM student WHERE id = :id';
    $queryResponse = $this->connection->prepare($query);
    $queryResponse->bindParam(':id', $id, PDO::PARAM_INT);
    $queryResponse->execute();
    return $queryResponse;
}

public function insertStudent(){
  $query = 'INSERT INTO student (id, student_name, student_number, student_age) VALUES (:id, :name, :number, :age)';
  $queryResponse = $this->connection->prepare($query);

  $queryResponse->bindParam(':id', $this->id);
  $queryResponse->bindParam(':name', $this->student_name);
  $queryResponse->bindParam(':number', $this->student_number);
  $queryResponse->bindParam(':age', $this->student_age);

  return $queryResponse->execute();
}

public function deleteStudent($id){
  $query = 'DELETE FROM student WHERE id = :id';
  $queryResponse = $this->connection->prepare($query);
  $queryResponse->bindParam(':id', $id, PDO::PARAM_INT);
  return $queryResponse->execute();
}

}
?>