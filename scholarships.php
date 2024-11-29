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

    $scholarshipQuery = "SELECT s.ScholarshipId, s.Amount, s.Date, s.Donor, s.Type AS ScholarshipType, a.FirstName, a.LastName, t.Type AS TeamName 
                         FROM scholarship s 
                         JOIN athlete a ON s.AthleteId = a.AthleteId 
                         JOIN team t ON s.TeamId = t.TeamId
                         WHERE s.TeamId = ?";

    $scholarshipStmt = $conn->prepare($scholarshipQuery);

    if (!$scholarshipStmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $scholarshipStmt->bind_param("i", $teamId);
    $scholarshipStmt->execute();
    $scholarshipResult = $scholarshipStmt->get_result();
    $scholarshipStmt->close();

    $teamQuery = "SELECT Type FROM team WHERE TeamId = ?";
    $teamStmt = $conn->prepare($teamQuery);

    if (!$teamStmt) {
        die("Query preparation failed: " . $conn->error);
    }

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
    <title><?php echo $teamName; ?> Scholarships</title>
    <link rel="stylesheet" href="scholarshipsstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2><?php echo $teamName; ?> Scholarships</h2>
    </header>

    <main>
        <a href="addscholarship.php?teamId=<?php echo $teamId; ?>"><button>Add Scholarship</button></a>
        <a href="../teamhomepage.php?teamId=<?php echo $teamId; ?>"><button>Go to Team Homepage</button></a>
        <br>

        <table>
            <thead>
                <tr>
                    <th>Athlete</th>
                    <th>Scholarship Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Donor</th>
                    <th>Team</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($scholarshipResult->num_rows > 0) {
                    while ($scholarshipRow = $scholarshipResult->fetch_assoc()) {
                        $scholarshipId = $scholarshipRow['ScholarshipId'];
                        echo "<tr>";
                        echo "<td>" . $scholarshipRow['FirstName'] . " " . $scholarshipRow['LastName'] . "</td>";
                        echo "<td>" . $scholarshipRow['ScholarshipType'] . "</td>";
                        echo "<td>" . $scholarshipRow['Amount'] . "</td>";
                        echo "<td>" . $scholarshipRow['Date'] . "</td>";
                        echo "<td>" . $scholarshipRow['Donor'] . "</td>";
                        echo "<td>" . $scholarshipRow['TeamName'] . "</td>";
                        echo "<td>
                                <a href='editscholarship.php?id={$scholarshipId}&teamId={$teamId}'>Edit</a> | 
                                <a href='deletescholarship.php?id={$scholarshipId}&teamId={$teamId}'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No scholarships found for this team.</td></tr>";
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
