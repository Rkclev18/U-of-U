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

    $query = "SELECT * FROM equipment WHERE EquipmentId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $equipmentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $type = $row['Type'];
        $annualCost = $row['AnnualCost'];
        $year = $row['Year'];
    } else {
        echo "Equipment not found.";
        exit;
    }

    $stmt->close();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $updatedType = $_POST['type'];
        $updatedAnnualCost = $_POST['annualCost'];
        $updatedYear = $_POST['year'];

        $updateQuery = "UPDATE equipment SET Type=?, AnnualCost=?, Year=? WHERE EquipmentId=?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ssii", $updatedType, $updatedAnnualCost, $updatedYear, $equipmentId);
        $updateStmt->execute();
		
		if ($updateStmt->affected_rows > 0) {
        header("Location: equipment.php?teamId=$teamId");
        exit;
    } else {
        echo "Error updating equipment.";
    }

    $updateStmt->close();
}

    }
 else {
    echo "Equipment ID or Team ID not provided.";
    exit;
}

$conn->close();
?>

<html>
<head>
    <title>Edit Equipment</title>
    <link rel="stylesheet" href="editequipmentstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Edit Equipment </h2>
    </header>
<body>
<form action="editEquipment.php?id=<?php echo $equipmentId; ?>&teamId=<?php echo $teamId; ?>" method="post">
    <input type="hidden" name="equipmentId" value="<?php echo $equipmentId; ?>">
    <input type="hidden" name="teamId" value="<?php echo $teamId; ?>">
    <label for="type">Type:</label>
    <input type="text" id="type" name="type" value="<?php echo $type; ?>" required>
    <label for="annualCost">Annual Cost:</label>
    <input type="text" id="annualCost" name="annualCost" value="<?php echo $annualCost; ?>" required>
    <label for="year">Year:</label>
    <input type="text" id="year" name="year" value="<?php echo $year; ?>" required>
    <button type="submit">Update Equipment</button>
    <button type="button" onclick="cancelEdit()">Cancel</button>
    </form>

    <script>
        function cancelEdit() {
            window.location.href = "equipment.php?teamId=<?php echo $teamId; ?>";
        }
    </script>
</form>
</body>
</html>