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


    if (isset($_POST['action']) && $_POST['action'] == 'save') {
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $title = $_POST['title'];
        $address = $_POST['address'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $type = $_POST['Type'];
        $cost = $_POST['cost'];


        $query = "INSERT INTO employee (LastName, FirstName, Title, Address, StartDate, EndDate, Type, Cost, TeamId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . $conn->error);
        }

        $stmt->bind_param("ssssssssi", $lastName, $firstName, $title, $address, $startDate, $endDate, $type, $cost, $teamId);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: employees.php?teamId={$teamId}");
            exit;
        } else {
            echo "Error adding employee.";
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
    <title>Add <?php echo isset($teamName) ? $teamName : 'Employee'; ?> Employee</title>
    <link rel="stylesheet" href="addemployeestyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Add <?php echo isset($teamName) ? $teamName : 'Employee'; ?> Employee</h2>
    </header>
    
    <form action="addemployee.php?teamId=<?php echo $teamId; ?>" method="post">
        <input type="hidden" name="teamId" value="<?php echo $teamId; ?>">

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" required>

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" required>

		<label for="Type">Type:</label>
			<select id="Type" name="Type" required>
				<option value="Salary">Salary</option>
				<option value="Hourly">Hourly</option>
			</select>


        <label for="cost">Cost:</label>
        <input type="text" id="cost" name="cost" required>

        <input type="hidden" name="action" value="save">
        <button type="submit">Add Employee</button>
        <button type="button" onclick="cancelEdit()">Cancel</button>
    </form>

    <script>
        function cancelEdit() {
            window.location.href = "employees.php?teamId=<?php echo $teamId; ?>";
        }
    </script>
</body>
</html>
