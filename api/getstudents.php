<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

Header('Access-Control-Allow-Origin: *');
Header('Content-Type: application/json');
Header('Access-Control-Allow-Method: GET');

include_once('../config/Studentdb.php');
include_once('../methods/Studentdb.php');

// Initialize database connection
$database = new StudentDatabase();
$db = $database->connect();
$student = new StudentTable($db);

// Get all students
$data = $student->getStudents();

if ($data->rowCount()) {
    $students = [];

    while ($row = $data->fetch(PDO::FETCH_OBJ)) {
        $students[] = $row;
    }

    echo json_encode($students);
} else {
    echo json_encode(['message' => 'No students found']);
}
?>