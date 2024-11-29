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
    $athleteId = $_POST['athleteId'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $donor = $_POST['donor'];
    $scholarshipType = $_POST['Type'];

    $query = "INSERT INTO scholarship (AthleteId, Amount, Date, Donor, Type, TeamId) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->bind_param("issssi", $athleteId, $amount, $date, $donor, $scholarshipType, $teamId);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: scholarships.php?teamId=$teamId");
        exit;
    } else {
        echo "Error adding scholarship.";
    }

    $stmt->close();
    $conn->close();
}
?>

<html>
<head>
    <title>Add Scholarship</title>
	<link rel="stylesheet" href="addscholarshipstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Add Scholarship</h2>
    </header>

    <main>
        <form action="addscholarship.php?teamId=<?php echo $teamId; ?>" method="POST">
            <label for="athleteId">Select Athlete:</label>
            <select name="athleteId" required>
                <?php
                $athleteQuery = "SELECT AthleteId, FirstName, LastName FROM athlete WHERE TeamId = ?";
                $athleteStmt = $conn->prepare($athleteQuery);

                if (!$athleteStmt) {
                    die("Query preparation failed: " . $conn->error);
                }

                $athleteStmt->bind_param("i", $teamId);
                $athleteStmt->execute();
                $athleteResult = $athleteStmt->get_result();
                while ($athleteRow = $athleteResult->fetch_assoc()) {
                    echo "<option value='" . $athleteRow['AthleteId'] . "'>" . $athleteRow['FirstName'] . " " . $athleteRow['LastName'] . "</option>";
                }
                ?>
            </select>

            <label for="amount">Amount:</label>
            <input type="text" name="amount" required>

            <label for="date">Date:</label>
            <input type="date" name="date" required>

            <label for="donor">Donor:</label>
            <input type="text" name="donor" required>

            <label for="Type">Scholarship Type:</label>
            <input type="text" name="Type" required>

            <button type="submit">Add Scholarship</button>
            <button type="button" onclick="cancelAdd()">Cancel</button>
        </form>

        <script>
            function cancelAdd() {
                window.location.href = "scholarships.php?teamId=<?php echo $teamId; ?>";
            }
        </script>
    </main>
</body>
</html>
