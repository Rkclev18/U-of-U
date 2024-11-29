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

    $query = "SELECT *
              FROM team
              WHERE TeamId = ?";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param("i", $teamId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $teamId = $row['TeamId'];
        $teamName = $row['Type'];
    } else {
        echo "Team not found.";
        exit;
    }

    $stmt->close();
}
?>

<html>
<head>
    <title><?php echo $teamName ?> Team Homepage</title>
    <link rel="stylesheet" href="teamhomepagestyle.css">
</head>
<body>

    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2><?php echo $teamName ?> Team Homepage</h2>
    </header>

    <main>

        <div class="card">
            <h2>Employees</h2>
            <button type="button" onclick="redirectToEmployees()">Go to Employees</button>
            <script>
                function redirectToEmployees() {
                    window.location.href = "../team/employee/employees.php?teamId=<?php echo $teamId ?>"; 
                }
            </script>
        </div>

        <div class="card">
            <h2>Equipment</h2>
            <button type="button" onclick="redirectToEquipment()">Go to Equipment</button>
            <script>
                function redirectToEquipment() {
                    window.location.href = "../team/equipment/equipment.php?teamId=<?php echo $teamId ?>"; 
                }
            </script>
        </div>

        <div class="card">
            <h2>Athletes</h2>
            <button type="button" onclick="redirectToAthletes()">Go to Athletes</button>
            <script>
                function redirectToAthletes() {
                    window.location.href = "../team/athletes/athletes.php?teamId=<?php echo $teamId ?>";
                }
            </script>
        </div>

        <div class="card">
            <h2>Scholarships</h2>
            <button type="button" onclick="redirectToScholarships()">Go to Scholarships</button>
            <script>
                function redirectToScholarships() {
                    window.location.href = "../team/scholarships/scholarships.php?teamId=<?php echo $teamId ?>";
                }
            </script>
        </div>
		
	
        <div class="card">
            <h2>Incomes</h2>
            <button type="button" onclick="redirectToIncomes()">Go to Incomes</button>
            <script>
                function redirectToIncomes() {
                    window.location.href = "../team/incomes/incomes.php?teamId=<?php echo $teamId ?>";
                }
            </script>
        </div>

    </main>

    <footer>
        <a href="teammanagement.php"><button>Go to Team Management</button></a>
        <br>
        <br>
        <a href="Logout.php">Logout</a>
        <p>&copy; 2024 University of Utah Athletics</p>
    </footer>

</body>
</html>
