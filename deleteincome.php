<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['incomeId']) && isset($_GET['teamId'])) {
    $incomeId = $_GET['incomeId'];
    $teamId = $_GET['teamId'];

    // Query to delete the income record
    $query = "DELETE FROM income WHERE IncomeId = ? AND TeamId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $incomeId, $teamId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: incomes.php?teamId=$teamId");
        exit;
    } else {
        echo "Error deleting income record.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Income ID or Team ID not provided.";
    exit;
}
?>
