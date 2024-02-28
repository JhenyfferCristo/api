<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

Header('Access-Control-Allow-Origin: *');
Header('Content-Type: application/json');
Header('Access-Control-Allow-Method: GET');

include_once('../config/Studentdb.php');
include_once('../methods/Studentdb.php');


if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  // Check if the student ID is provided in the URL
  $studentId = isset($_GET['id']) ? $_GET['id'] : 0;

$database = new StudentDatabase();
$db = $database->connect();
$student = new StudentTable($db);

  if ($student->deleteStudent($studentId)) {
      echo json_encode(['message' => 'Student deleted successfully']);
  } else {
      echo json_encode(['message' => 'Failed to delete student']);
  }
} else {
  echo json_encode(['message' => 'Invalid request method']);
}
?>