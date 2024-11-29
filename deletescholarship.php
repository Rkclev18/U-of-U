<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['teamId'])) {
    $scholarshipId = $_GET['id'];
    $teamId = $_GET['teamId'];
} else {
    echo "Scholarship ID or Team ID not provided.";
    exit;
}

$query = "DELETE FROM scholarship WHERE ScholarshipId = ? AND TeamId = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    die("Query preparation failed: " . $conn->error);
}

$stmt->bind_param("ii", $scholarshipId, $teamId);

$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: scholarships.php?teamId=$teamId");
    exit;
} else {
    echo "Error deleting scholarship or scholarship not found.";
}

$stmt->close();
$conn->close();
?>
