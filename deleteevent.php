<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    $query = "DELETE FROM event WHERE EventId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $eventId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: events.php");
        exit;
    } else {
        echo "Error deleting event.";
    }

    $stmt->close();
}

$conn->close();