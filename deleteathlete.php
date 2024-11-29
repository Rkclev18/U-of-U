<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['teamId'])) {
    $athleteId = $_GET['id'];
    $teamId = $_GET['teamId'];

    $query = "SELECT TeamId FROM athlete WHERE AthleteId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $athleteId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $deleteQuery = "DELETE FROM athlete WHERE AthleteId = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $athleteId);
        $deleteStmt->execute();

        if ($deleteStmt->affected_rows > 0) {
            header("Location: athletes.php?teamId=$teamId");
            exit;
        } else {
            echo "Error deleting athlete.";
        }

        $deleteStmt->close();
    } else {
        echo "Athlete not found.";
    }

    $stmt->close();
} else {
    echo "Athlete ID or Team ID not provided.";
}

$conn->close();
?>
