<?php 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	include ('DatabaseConnection.php');
	include ('Student.php');
	$db = new DatabaseConnection("localhost", "root", "","faculty");
	$connection = $db->getConnection();
	$student = new Student($connection);
	$studentData = $student->getAllStudents();
	$response = array();
	if ($studentData) {
		$response['success'] = true;
		$response['students'] = $studentData;
	} else {
		$response['success'] = false;
		$response['message'] = "Error creating student";
	}
	echo json_encode($response);
} else {
	echo "Invalid request.";
}
