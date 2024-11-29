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
} else {
    echo "Income ID or Team ID not provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incomeType = $_POST['Type'];  // Corrected the field name
    $amount = $_POST['amount'];
    $year = $_POST['year'];

    $query = "UPDATE income SET Type = ?, Amount = ?, Year = ? WHERE IncomeId = ? AND TeamId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $incomeType, $amount, $year, $incomeId, $teamId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: incomes.php?teamId=$teamId");
        exit;
    } else {
        echo "Error updating income.";
    }

    $stmt->close();
    $conn->close();
} else {
    $query = "SELECT Type, Amount, Year FROM income WHERE IncomeId = ? AND TeamId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $incomeId, $teamId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $incomeType = $row['Type'];
        $amount = $row['Amount'];
        $year = $row['Year'];
    } else {
        echo "Income not found.";
        exit;
    }

    $stmt->close();
}
?>

<html>
<head>
    <title>Edit Income</title>
    <link rel="stylesheet" href="addincomestyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Edit Income</h2>
    </header>

    <main>
        <form action="editincome.php?incomeId=<?php echo $incomeId; ?>&teamId=<?php echo $teamId; ?>" method="POST">
            <label for="Type">Income Type:</label>
            <input type="text" name="Type" value="<?php echo $incomeType; ?>" required> <!-- Fixed the 'name' attribute -->

            <label for="amount">Amount:</label>
            <input type="text" name="amount" value="<?php echo $amount; ?>" required>

            <label for="year">Year:</label>
            <input type="text" name="year" value="<?php echo $year; ?>" required>

            <button type="submit">Update Income</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>

        <script>
            function cancelEdit() {
                window.location.href = "incomes.php?teamId=<?php echo $teamId; ?>";
            }
        </script>
    </main>
</body>
</html>
