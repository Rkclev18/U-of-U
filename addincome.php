<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['teamId'])) {
    $teamId = $_GET['teamId'];
} else {
    echo "Team ID not provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $incomeType = $_POST['Type'];
    $amount = $_POST['amount'];
    $year = $_POST['year'];

    $query = "INSERT INTO income (Type, Amount, Year, TeamId) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $incomeType, $amount, $year, $teamId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: incomes.php?teamId=$teamId");
        exit;
    } else {
        echo "Error adding income.";
    }

    $stmt->close();
    $conn->close();
}
?>

<html>
<head>
    <title>Add Income</title>
    <link rel="stylesheet" href="addincomestyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Add Income</h2>
    </header>

    <main>
        <form action="addincome.php?teamId=<?php echo $teamId; ?>" method="POST">
            <label for="Type">Income Type:</label>
            <input type="text" name="Type" required>

            <label for="amount">Amount:</label>
            <input type="text" name="amount" required>

            <label for="year">Year:</label>
            <input type="text" name="year" required>

            <button type="submit">Add Income</button>
            <button type="button" onclick="cancelAdd()">Cancel</button>
        </form>

        <script>
            function cancelAdd() {
                window.location.href = "incomes.php?teamId=<?php echo $teamId; ?>";
            }
        </script>
    </main>
</body>
</html>
