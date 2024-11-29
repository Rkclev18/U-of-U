<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['teamId'])) {
    $equipmentId = $_GET['id'];
    $teamId = $_GET['teamId'];

    $deleteQuery = "DELETE FROM equipment WHERE EquipmentId = ?";
    $deleteStmt = $conn->prepare($deleteQuery);
    $deleteStmt->bind_param("i", $equipmentId);
    $deleteStmt->execute();

    if ($deleteStmt->affected_rows > 0) {
        header("Location: equipment.php?teamId=$teamId");
        exit;
    } else {
        echo "Error deleting equipment.";
    }

    $deleteStmt->close();
} else {
    echo "Equipment ID or Team ID not provided.";
    exit;
}

$conn->close();