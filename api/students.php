<?php

error_reporting(E_ALL);
ini_set('display_error', 1);

Header('Access-Control-Allow-Origin:*');
Header('Content-Type: application/json');
Header('Acess-Control-Allow-Method:POST');

include_once('../config/Studentdb.php');
include_once('../methods/Studentdb.php');


//call db

$database = new StudentDatabase();
$db = $database->connect();
$student = new StudentTable($db);

//read post
$data= $student->readStudents(); //fromStudentdb query

if($data->rowCount()){
$students = [];

while($row = $data->fetch(PDO::FETCH_OBJ)){
  print_r($row);
}
}
else{
  echo json_encode(['message'=>'No Students found']);
}
?>