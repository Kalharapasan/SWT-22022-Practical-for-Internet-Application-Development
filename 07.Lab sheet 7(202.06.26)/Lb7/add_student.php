<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = trim($_POST['name']);
    $gpa = floatval($_POST['gpa']);
    
    if (empty($name) || $gpa < 0 || $gpa > 4) {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid input data. Please check the name and GPA.'
        ]);
        exit();
    }

    include ('DatabaseConnection.php');
    include ('Student.php');

    $db = new DatabaseConnection("localhost", "root", "", "faculty");
    $connection = $db->getConnection();
    

    $student = new Student($connection);
    $student->setName($name);
    $student->setGpa($gpa);

    $result = $student->create(); 
    
    $response = array();
    if ($result) {
        $response['success'] = true;
        $studentData = $student->getAllStudents(); 
        $response['students'] = $studentData;
    } else {
        $response['success'] = false;
        $response['message'] = "Error creating student";
    }

    echo json_encode($response);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>
