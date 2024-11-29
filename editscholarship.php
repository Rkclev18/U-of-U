<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['teamId']) && isset($_GET['id'])) {
    $teamId = $_GET['teamId'];
    $scholarshipId = $_GET['id'];
} else {
    echo "Team ID or Scholarship ID not provided.";
    exit;
}

$query = "SELECT s.ScholarshipId, s.AthleteId, s.Amount, s.Date, s.Donor, s.Type, a.FirstName, a.LastName
          FROM scholarship s
          INNER JOIN athlete a ON s.AthleteId = a.AthleteId
          WHERE s.ScholarshipId = ? AND s.TeamId = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $scholarshipId, $teamId);
$stmt->execute();
$result = $stmt->get_result();
$scholarship = $result->fetch_assoc();
$stmt->close();

if (!$scholarship) {
    echo "Scholarship not found.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $athleteId = $_POST['athleteId'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $donor = $_POST['donor'];
    $scholarshipType = $_POST['Type'];

    $updateQuery = "UPDATE scholarship
                    SET AthleteId = ?, Amount = ?, Date = ?, Donor = ?, Type = ? 
                    WHERE ScholarshipId = ? AND TeamId = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("issssii", $athleteId, $amount, $date, $donor, $scholarshipType, $scholarshipId, $teamId);
    $updateStmt->execute();

    if ($updateStmt->affected_rows > 0) {
        header("Location: scholarships.php?teamId=$teamId");
        exit;
    } else {
        echo "Error updating scholarship.";
    }

    $updateStmt->close();
    $conn->close();
}
?>

<html>
<head>
    <title>Edit Scholarship</title>
    <link rel="stylesheet" href="editscholarshipstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Edit Scholarship</h2>
    </header>

    <main>
        <form action="editscholarship.php?teamId=<?php echo $teamId; ?>&id=<?php echo $scholarshipId; ?>" method="POST">
            <label for="athleteId">Select Athlete:</label>
            <select name="athleteId" required>
                <?php
                // Fetch athletes for the team
                $athleteQuery = "SELECT AthleteId, FirstName, LastName FROM athlete WHERE TeamId = ?";
                $athleteStmt = $conn->prepare($athleteQuery);
                $athleteStmt->bind_param("i", $teamId);
                $athleteStmt->execute();
                $athleteResult = $athleteStmt->get_result();
                
                // Generate options with the currently selected athlete being pre-selected
                while ($athleteRow = $athleteResult->fetch_assoc()) {
                    $selected = ($athleteRow['AthleteId'] == $scholarship['AthleteId']) ? "selected" : "";
                    echo "<option value='" . $athleteRow['AthleteId'] . "' $selected>" . $athleteRow['FirstName'] . " " . $athleteRow['LastName'] . "</option>";
                }
                ?>
            </select>

            <label for="amount">Amount:</label>
            <input type="text" name="amount" value="<?php echo htmlspecialchars($scholarship['Amount']); ?>" required>

            <label for="date">Date:</label>
            <input type="date" name="date" value="<?php echo htmlspecialchars($scholarship['Date']); ?>" required>

            <label for="donor">Donor:</label>
            <input type="text" name="donor" value="<?php echo htmlspecialchars($scholarship['Donor']); ?>" required>

            <label for="Type">Scholarship Type:</label>
            <input type="text" name="Type" value="<?php echo htmlspecialchars($scholarship['Type']); ?>" required>

            <button type="submit">Update Scholarship</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>

        <script>
            function cancelEdit() {
                window.location.href = "scholarships.php?teamId=<?php echo $teamId; ?>";
            }
        </script>
    </main>
</body>
</html>
