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

    $teamQuery = "SELECT Type AS TeamName FROM team WHERE teamId = ?";
    $teamStmt = $conn->prepare($teamQuery);


    if ($teamStmt === false) {

        die('Prepare failed: ' . $conn->error);
    }

    $teamStmt->bind_param("i", $teamId);
    $teamStmt->execute();
    $teamResult = $teamStmt->get_result();

    if ($teamResult->num_rows > 0) {
        $row = $teamResult->fetch_assoc();
        $teamName = $row['TeamName'];
    } else {
        echo "Team not found.";
        exit;
    }

    $teamStmt->close();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $type = $_POST['type'];
        $annualCost = $_POST['annualCost'];
        $year = $_POST['year'];

        $query = "INSERT INTO equipment (Type, AnnualCost, Year, TeamId) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssii", $type, $annualCost, $year, $teamId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: equipment.php?teamId=$teamId");
            exit;
        } else {
            echo "Error adding equipment.";
        }

        $stmt->close();
    }
} else {
    echo "Team ID not provided.";
    exit;
}

$conn->close();
?>

<html>
<head>
    <title>Add Equipment</title>
    <link rel="stylesheet" href="addequipmentstyle.css">
</head>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Add <?php echo $teamName; ?> Equipment</h2>
    </header>
<body>
    <form action="addEquipment.php?teamId=<?php echo $teamId; ?>" method="post">
        <input type="hidden" name="teamId" value="<?php echo $teamId; ?>">

        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required>

        <label for="annualCost">Annual Cost:</label>
        <input type="text" id="annualCost" name="annualCost" required>

        <label for="year">Year:</label>
        <input type="text" id="year" name="year" required>

        <button type="submit">Add Equipment</button>
        <button type="button" onclick="cancelAdd()">Cancel</button>
    </form>
	    <script>
        function cancelAdd() {
            window.location.href = "equipment.php?teamId=<?php echo $teamId; ?>";
        }
    </script>
</body>
</html>