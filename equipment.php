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

    $equipmentQuery = "SELECT EquipmentId, Type, AnnualCost, Year FROM equipment WHERE TeamId = ?";
    $equipmentStmt = $conn->prepare($equipmentQuery);
    $equipmentStmt->bind_param("i", $teamId);
    $equipmentStmt->execute();
    $equipmentResult = $equipmentStmt->get_result();
	$equipmentStmt->close();

    $teamQuery = "SELECT Type FROM team WHERE teamId = ?";
    $teamStmt = $conn->prepare($teamQuery);
    $teamStmt->bind_param("i", $teamId);
    $teamStmt->execute();
    $teamResult = $teamStmt->get_result();

    if ($teamResult->num_rows > 0) {
        $row = $teamResult->fetch_assoc();
        $teamName = $row['Type'];
    } else {
        echo "Team not found.";
        exit;
    }

    $teamStmt->close();

    $conn->close();
} else {
    echo "Team ID not provided.";
    exit;
}
?>

<html>
<head>
    <title><?php echo $teamName; ?> Equipment</title>
    <link rel="stylesheet" href="equipmentstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2><?php echo $teamName; ?> Equipment</h2>
    </header>

    <main>
        <button type="button" onclick="redirectToAddEquipment()">Add Equipment</button>
        <a href="../teamhomepage.php?teamId=<?php echo $_GET['teamId']; ?>"><button>Go to Team Homepage</button></a>
        </br>
        <script>
            function redirectToAddEquipment() {
                window.location.href = "addequipment.php?teamId=<?php echo $teamId; ?>";
            }
        </script>

        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Annual Cost</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($equipmentResult->num_rows > 0) {
                    while ($equipmentRow = $equipmentResult->fetch_assoc()) {
                        $equipmentId = $equipmentRow['EquipmentId'];
                        echo "<tr>";
                        echo "<td>" . $equipmentRow['Type'] . "</td>";
                        echo "<td>" . $equipmentRow['AnnualCost'] . "</td>";
                        echo "<td>" . $equipmentRow['Year'] . "</td>";
                        echo "<td><a href='editEquipment.php?id={$equipmentId}&teamId={$teamId}'>Edit</a> | <a href='deletequipment.php?id={$equipmentId}&teamId={$teamId}'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No equipment found for this team.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>