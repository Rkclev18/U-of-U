<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$employeeId = $lastName = $firstName = $title = $address = $startDate = $endDate = $type = $cost = $teamId = $teamName = "";


if (isset($_GET['id'])) {
    $employeeId = $_GET['id'];


    $query = "SELECT * FROM employee WHERE employeeId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $employeeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
        $lastName = $employee['LastName'];
        $firstName = $employee['FirstName'];
        $title = $employee['Title'];
        $address = $employee['Address'];
        $startDate = $employee['StartDate'];
        $endDate = $employee['EndDate'];
        $type = $employee['Type'];
        $cost = $employee['Cost'];
        $teamId = $employee['TeamId']; 
    } else {
        echo "Employee not found.";
        exit;
    }

    $stmt->close();


    $teamQuery = "SELECT Type FROM team WHERE TeamId = ?";
    $teamStmt = $conn->prepare($teamQuery);
    $teamStmt->bind_param("i", $teamId);
    $teamStmt->execute();
    $teamResult = $teamStmt->get_result();

    if ($teamResult->num_rows > 0) {
        $teamRow = $teamResult->fetch_assoc();
        $teamName = $teamRow['Type'];
    } else {
        echo "Team not found.";
        exit;
    }

    $teamStmt->close();
}




if (isset($_POST['action']) && $_POST['action'] == 'save') {

    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $title = $_POST['title'];
    $address = $_POST['address'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $type = $_POST['type'];
    $cost = $_POST['cost'];


    $updateQuery = "UPDATE employee SET LastName = ?, FirstName = ?, Title = ?, Address = ?, StartDate = ?, EndDate = ?, Type = ?, Cost = ? WHERE employeeId = ?";
    $stmt = $conn->prepare($updateQuery);


    $stmt->bind_param("ssssssssi", $lastName, $firstName, $title, $address, $startDate, $endDate, $type, $cost, $employeeId);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {

        header("Location: employees.php?teamId={$teamId}");
        exit;
    } else {
        echo "Error updating employee.";
    }

    $stmt->close();
}


$conn->close();
?>

<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="addemployeestyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Edit Employee</h2>
    </header>

    <form action="editEmployee.php?id=<?php echo $employeeId; ?>" method="post">
        <input type="hidden" name="action" value="save">

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" required>

        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" required>

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>" required>

        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate" value="<?php echo htmlspecialchars($startDate); ?>" required>

        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate" value="<?php echo htmlspecialchars($endDate); ?>" required>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="Salary" <?php echo ($type == 'Salary') ? 'selected' : ''; ?>>Salary</option>
            <option value="Hourly" <?php echo ($type == 'Hourly') ? 'selected' : ''; ?>>Hourly</option>
        </select>

        <label for="cost">Cost:</label>
        <input type="text" id="cost" name="cost" value="<?php echo htmlspecialchars($cost); ?>" required>

        <button type="submit">Save Changes</button>
        <button type="button" onclick="cancelEdit()">Cancel</button>
    </form>

    <script>
        function cancelEdit() {
            window.location.href = "employees.php?teamId=<?php echo $teamId; ?>";
        }
    </script>
</body>
</html>
