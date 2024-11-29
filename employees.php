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

    $employeeQuery = "SELECT employeeId, LastName, FirstName, Title, Address, StartDate, EndDate, Type, Cost FROM employee WHERE teamId = ?";
    $employeeStmt = $conn->prepare($employeeQuery);
    $employeeStmt->bind_param("i", $teamId);
    $employeeStmt->execute();
    $employeeResult = $employeeStmt->get_result();
    $employeeStmt->close();
    
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
    <title><?php echo $teamName; ?> Employees</title>
    <link rel="stylesheet" href="employeesstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2><?php echo $teamName; ?> Employees</h2>
    </header>

    <main>
        <button type="button" onclick="redirectToAddEmployee()">Add Employee</button>
        <a href="../teamhomepage.php?teamId=<?php echo $_GET['teamId']; ?>"><button>Go to Team Homepage</button></a>
		</br>
        <script>
            function redirectToAddEmployee() {
                window.location.href = "AddEmployee.php?teamId=<?php echo $_GET['teamId']; ?>";
            }
        </script>

        <table>
            <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Type</th>
                    <th>Cost</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($employeeResult->num_rows > 0) {
                    while ($employeeRow = $employeeResult->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $employeeRow['LastName'] . "</td>";
                        echo "<td>" . $employeeRow['FirstName'] . "</td>";
                        echo "<td>" . $employeeRow['Title'] . "</td>";
                        echo "<td>" . $employeeRow['Address'] . "</td>";
                        echo "<td>" . $employeeRow['StartDate'] . "</td>";
                        echo "<td>" . $employeeRow['EndDate'] . "</td>";
                        echo "<td>" . $employeeRow['Type'] . "</td>";
                        echo "<td>" . $employeeRow['Cost'] . "</td>";
                        echo "<td><a href='editEmployee.php?id={$employeeRow['employeeId']}'>Edit</a> | <a href='deleteEmployee.php?id={$employeeRow['employeeId']}'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No employees found for this team.</td></tr>";
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
