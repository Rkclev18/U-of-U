<?php

$page_roles = array('admin', 'employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $teamId = $_GET['id'];

    $queries = [
        "DELETE FROM athlete WHERE TeamId = ?",
        "DELETE FROM employee WHERE TeamId = ?",
        "DELETE FROM equipment WHERE TeamId = ?",
        "DELETE FROM event WHERE TeamId = ?",
        "DELETE FROM income WHERE TeamId = ?",
        "DELETE FROM ranks WHERE TeamId = ?",
        "DELETE FROM scholarship WHERE TeamId = ?"
    ];

    foreach ($queries as $query) {
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }
        $stmt->bind_param("i", $teamId);
        $stmt->execute();
        $stmt->close();
    }

    $query = "DELETE FROM team WHERE TeamId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $teamId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: teammanagement.php");
        exit;
    } else {
        echo "Error deleting team.";
    }

    $stmt->close();
}

$conn->close();

?>
