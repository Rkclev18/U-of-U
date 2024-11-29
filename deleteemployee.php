<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $employeeId = $_GET['id'];


    $getTeamQuery = "SELECT teamId FROM employee WHERE employeeId = ?";
    $getTeamStmt = $conn->prepare($getTeamQuery);
    

    if ($getTeamStmt === false) {
        die("Error preparing the team query: " . $conn->error);
    }


    $getTeamStmt->bind_param("i", $employeeId);
    $getTeamStmt->execute();
    $teamResult = $getTeamStmt->get_result();


    if ($teamResult->num_rows > 0) {
        $teamRow = $teamResult->fetch_assoc();
        $teamId = $teamRow['teamId'];
    } else {
        echo "Employee not found.";
        exit;
    }

    $getTeamStmt->close();


    $deleteQuery = "DELETE FROM employee WHERE employeeId = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    

    if ($deleteStmt === false) {
        die("Error preparing the delete query: " . $conn->error);
    }


    $deleteStmt->bind_param("i", $employeeId);
    
    if ($deleteStmt->execute()) {

        header("Location: employees.php?teamId=" . $teamId);
        exit;
    } else {
        echo "Error deleting employee: " . $conn->error;
    }

    $deleteStmt->close();
} else {
    echo "Employee ID not provided.";
}

$conn->close();
?>
