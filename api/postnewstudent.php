<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

Header('Access-Control-Allow-Origin: *');
Header('Content-Type: application/json');
Header('Access-Control-Allow-Method: POST');

include_once('../config/Studentdb.php');
include_once('../methods/Studentdb.php');

// Initialize database connection
$database = new StudentDatabase();
$db = $database-> connect();
$student = new StudentTable($db);

// Adding a new student
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $data = json_decode(file_get_contents("php://input"));


  $student = new StudentTable($db);
  $student->id=$data->id;
  $student->student_name = $data->student_name;
  $student->student_number = $data->student_number;
  $student->student_age = $data->student_age;

  // Insert the student
  if ($student->insertStudent()) {
      echo json_encode(['message' => 'Student added successfully']);
  } else {
      echo json_encode(['message' => 'Failed to add student']);
  }
} else {
  echo json_encode(['message' => 'Invalid request method']);
}

?>