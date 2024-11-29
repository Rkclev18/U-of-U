<?php

$page_roles = array('admin');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $getUserQuery = "SELECT username FROM users WHERE userId = ?";
    $getUserStmt = $conn->prepare($getUserQuery);
    $getUserStmt->bind_param("i", $userId);
    $getUserStmt->execute();
    $getUserResult = $getUserStmt->get_result();

    if ($getUserResult->num_rows > 0) {
        $userRow = $getUserResult->fetch_assoc();
        $usernameToDelete = $userRow['username'];

        $deleteUserQuery = "DELETE FROM users WHERE userId = ?";
        $deleteUserStmt = $conn->prepare($deleteUserQuery);
        $deleteUserStmt->bind_param("i", $userId);
        $deleteUserStmt->execute();

        $deleteRoleQuery = "DELETE FROM roles WHERE username = ?";
        $deleteRoleStmt = $conn->prepare($deleteRoleQuery);
        $deleteRoleStmt->bind_param("s", $usernameToDelete);
        $deleteRoleStmt->execute();

        if ($deleteUserStmt->affected_rows > 0) {
            header("Location: manageuser.php");
            exit;
        } else {
            echo "Error deleting user.";
        }

        $getUserStmt->close();
        $deleteUserStmt->close();
        $deleteRoleStmt->close();
    } else {
        echo "User not found.";
        exit;
    }
}

$conn->close();