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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $position = $_POST['position'];
        $academicLevel = $_POST['academicLevel'];
        $contact = $_POST['contact'];

        $query = "INSERT INTO athlete (LastName, FirstName, Position, AcademicLevel, Contact, TeamId) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssi", $lastName, $firstName, $position, $academicLevel, $contact, $teamId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: athletes.php?teamId=$teamId");
            exit;
        } else {
            echo "Error adding athlete.";
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
    <title>Add Athlete</title>
    <link rel="stylesheet" href="addathletestyle.css">
</head>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Add <?php echo $teamName; ?> Athlete</h2>
    </header>
<body>
    <form action="addathlete.php?teamId=<?php echo $teamId; ?>" method="post">
        <input type="hidden" name="teamId" value="<?php echo $teamId; ?>">

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="position">Position:</label> 
        <input type="text" id="position" name="position" required>

        <label for="academicLevel">Academic Level:</label>
        <input type="text" id="academicLevel" name="academicLevel" required>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>

        <button type="submit">Add Athlete</button>
        <button type="button" onclick="cancelAdd()">Cancel</button>
    </form>
	    <script>
        function cancelAdd() {
            window.location.href = "athletes.php?teamId=<?php echo $teamId; ?>";
        }
    </script>
</body>
</html>