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

    $athleteQuery = "SELECT AthleteId, LastName, FirstName, Position, AcademicLevel, Contact FROM athlete WHERE TeamId = ?";
    $athleteStmt = $conn->prepare($athleteQuery);
    $athleteStmt->bind_param("i", $teamId);
    $athleteStmt->execute();
    $athleteResult = $athleteStmt->get_result();
    $athleteStmt->close();

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
}
?>

<html>
<head>
    <title><?php echo $teamName; ?> Athletes</title>
    <link rel="stylesheet" href="athletesstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2><?php echo $teamName; ?> Athletes</h2>
    </header>

    <main>
        <a href="addathlete.php?teamId=<?php echo $teamId; ?>"><button>Add Athlete</button></a>
        <a href="../teamhomepage.php?teamId=<?php echo $teamId; ?>"><button>Go to Team Homepage</button></a>
        <br>

        <table>
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Position</th>
                    <th>Academic Level</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($athleteResult->num_rows > 0) {
                    while ($athleteRow = $athleteResult->fetch_assoc()) {
                        $athleteId = $athleteRow['AthleteId'];
                        echo "<tr>";
                        echo "<td>" . $athleteRow['LastName'] . "</td>";
                        echo "<td>" . $athleteRow['FirstName'] . "</td>";
                        echo "<td>" . $athleteRow['Position'] . "</td>";
                        echo "<td>" . $athleteRow['AcademicLevel'] . "</td>";
                        echo "<td>" . $athleteRow['Contact'] . "</td>";
                        echo "<td><a href='editAthlete.php?id={$athleteId}&teamId={$teamId}'>Edit</a> | <a href='deleteAthlete.php?id={$athleteId}&teamId={$teamId}'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No athletes found for this team.</td></tr>";
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
