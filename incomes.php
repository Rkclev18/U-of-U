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

    $incomeQuery = "SELECT IncomeId, TeamId, Type, Amount, Year FROM income WHERE TeamId = ?";
    $incomeStmt = $conn->prepare($incomeQuery);
    $incomeStmt->bind_param("i", $teamId);
    $incomeStmt->execute();
    $incomeResult = $incomeStmt->get_result();
    $incomeStmt->close();

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
} else {
    echo "Team ID not provided.";
    exit;
}

$conn->close();
?>

<html>
<head>
    <title>Incomes - <?php echo $teamName; ?></title>
    <link rel="stylesheet" href="incomesstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Incomes for <?php echo $teamName; ?></h2>
    </header>

    <main>
        <a href="addincome.php?teamId=<?php echo $teamId; ?>"><button>Add Income</button></a>
		<a href="../teamhomepage.php?teamId=<?php echo $teamId; ?>"><button>Back to Team Homepage</button></a>
        <br><br>

        <table>
            <thead>
                <tr>
                    <th>Income Type</th>
                    <th>Amount</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($incomeResult->num_rows > 0) {
                    while ($incomeRow = $incomeResult->fetch_assoc()) {
                        $incomeId = $incomeRow['IncomeId'];
                        echo "<tr>";
                        echo "<td>" . $incomeRow['Type'] . "</td>";
                        echo "<td>" . $incomeRow['Amount'] . "</td>";
                        echo "<td>" . $incomeRow['Year'] . "</td>";
                        echo "<td>
                                <a href='editincome.php?incomeId={$incomeId}&teamId={$teamId}'>Edit</a> | 
                                <a href='deleteincome.php?incomeId={$incomeId}&teamId={$teamId}'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No income records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <br>
        <p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>
