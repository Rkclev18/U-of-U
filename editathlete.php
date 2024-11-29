<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['teamId'])) {
    $athleteId = $_GET['id'];
    $teamId = $_GET['teamId'];

    $athleteQuery = "SELECT AthleteId, LastName, FirstName, Position, AcademicLevel, Contact FROM athlete WHERE AthleteId = ? AND TeamId = ?";
    $athleteStmt = $conn->prepare($athleteQuery);
    $athleteStmt->bind_param("ii", $athleteId, $teamId);
    $athleteStmt->execute();
    $athleteResult = $athleteStmt->get_result();

    if ($athleteResult->num_rows > 0) {
        $athleteRow = $athleteResult->fetch_assoc();
        $lastName = $athleteRow['LastName'];
        $firstName = $athleteRow['FirstName'];
        $position = $athleteRow['Position'];
        $academicLevel = $athleteRow['AcademicLevel'];
        $contact = $athleteRow['Contact'];
    } else {
        echo "Athlete not found.";
        exit;
    }

    $teamQuery = "SELECT Type AS TeamName FROM team WHERE teamId = ?";
    $teamStmt = $conn->prepare($teamQuery);
    $teamStmt->bind_param("i", $teamId);
    $teamStmt->execute();
    $teamResult = $teamStmt->get_result();

    if ($teamResult->num_rows > 0) {
        $teamRow = $teamResult->fetch_assoc();
        $teamName = $teamRow['TeamName'];
    } else {
        echo "Team not found.";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $position = $_POST['position'];
        $academicLevel = $_POST['academicLevel'];
        $contact = $_POST['contact'];

        $updateQuery = "UPDATE athlete SET LastName = ?, FirstName = ?, Position = ?, AcademicLevel = ?, Contact = ? WHERE AthleteId = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("sssssi", $lastName, $firstName, $position, $academicLevel, $contact, $athleteId);
        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            header("Location: athletes.php?teamId=$teamId");
            exit;
        } else {
            echo "Error updating athlete information.";
        }

        $updateStmt->close();
    }

    $athleteStmt->close();
    $teamStmt->close();
} else {
    echo "Athlete ID or Team ID not provided.";
    exit;
}

$conn->close();
?>

<html>
<head>
    <title>Edit Athlete</title>
    <link rel="stylesheet" href="addathletestyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Edit Athlete</h2>
    </header>

    <form action="editAthlete.php?id=<?php echo $athleteId; ?>&teamId=<?php echo $teamId; ?>" method="post">
        <input type="hidden" name="teamId" value="<?php echo $teamId; ?>">

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $lastName; ?>" required>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $firstName; ?>" required>

        <label for="position">Position:</label> 
        <input type="text" id="position" name="position" value="<?php echo $position; ?>" required>

        <label for="academicLevel">Academic Level:</label>
        <input type="text" id="academicLevel" name="academicLevel" value="<?php echo $academicLevel; ?>" required>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" value="<?php echo $contact; ?>" required>

        <button type="submit">Update Athlete</button>
        <button type="button" onclick="cancelEdit()">Cancel</button>
    </form>

    <script>
        function cancelEdit() {
            window.location.href = "athletes.php?teamId=<?php echo $teamId; ?>";
        }
    </script>
</body>
</html>
