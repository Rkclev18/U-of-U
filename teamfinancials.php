<?php

$page_roles = array('admin');
require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$yearFilter = isset($_GET['year']) ? $_GET['year'] : date("Y");

if (!isset($_GET['teamId'])) {
    echo "Team ID is not provided.";
    exit;
}

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
	
$query = "
SELECT 
    t.Type AS TeamName,
    'Employee' AS AccountType,
    CONCAT(emp.FirstName, ' ', emp.LastName) AS Account,
    emp.Title AS Description,
    0 AS Income,
    emp.Cost AS Expense
FROM team t
LEFT JOIN employee emp ON emp.TeamId = t.TeamId
WHERE t.TeamId = $teamId 
  AND (YEAR(emp.StartDate) <= $yearFilter AND (YEAR(emp.EndDate) >= $yearFilter OR emp.EndDate IS NULL)) 
  AND emp.Cost IS NOT NULL


    UNION ALL

    SELECT 
        t.Type AS TeamName,
        'Equipment' AS AccountType,
        eq.Type AS Account,
        'Annual Equipment Cost' AS Description,
        0 AS Income,
        eq.AnnualCost AS Expense
    FROM team t
    LEFT JOIN equipment eq ON eq.TeamId = t.TeamId
    WHERE t.TeamId = $teamId AND eq.AnnualCost IS NOT NULL

    UNION ALL

    SELECT 
        t.Type AS TeamName,
        'Scholarship' AS AccountType,
        CONCAT(a.FirstName, ' ', a.LastName) AS Account,
        CONCAT('Scholarship Type: ', s.Type) AS Description,
        0 AS Income,
        s.Amount AS Expense
    FROM team t
    JOIN athlete a ON a.TeamId = t.TeamId
    JOIN scholarship s ON s.athleteId = a.AthleteId
    WHERE t.TeamId = $teamId AND YEAR(s.Date) = $yearFilter AND s.Amount IS NOT NULL

    UNION ALL

    SELECT 
        t.Type AS TeamName,
        'Event Expense' AS AccountType,
        e.EventName AS Account,
        CONCAT('Event Expense: ', CONCAT(e.Venue, ' ', e.Opponent)) AS Description,
        0 AS Income,
        e.Expenses AS Expense
    FROM team t
    LEFT JOIN event e ON e.TeamId = t.TeamId
    WHERE t.TeamId = $teamId AND YEAR(e.Date) = $yearFilter AND e.Expenses IS NOT NULL

    UNION ALL

    SELECT 
        t.Type AS TeamName,
        'Event Income' AS AccountType,
        e.EventName AS Account,
        CONCAT('Event Income: ', CONCAT(e.Venue, ' ', e.Opponent)) AS Description,
        e.Income AS Income,
        0 AS Expense
    FROM team t
    LEFT JOIN event e ON e.TeamId = t.TeamId
    WHERE t.TeamId = $teamId AND YEAR(e.Date) = $yearFilter AND e.Income IS NOT NULL

    UNION ALL

    SELECT 
        t.Type AS TeamName,
        'Other Income' AS AccountType,
        i.Type AS Account,
        'Other Income' AS Description,
        i.Amount AS Income,
        0 AS Expense
    FROM team t
    LEFT JOIN income i ON i.TeamId = t.TeamId AND i.Year = $yearFilter
	WHERE t.TeamId = $teamId AND i.Amount IS NOT NULL";
	
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    ?>
    <html>
    <head>
        <title>Team Financial Report</title>
        <link rel="stylesheet" href="teamfinancialstyle.css">
		
		
    </head>
    <body>
        <header>
		    <img src="uofu.jpg" alt="Logo">
            <h1><?php echo $teamName ; ?> Team Financial Report - <?php echo htmlspecialchars($yearFilter); ?></h1>
			<a href="financials.php"><button>Go Back</button></a>

    </header>
            <form method="GET" action="teamfinancials.php">
                <label for="year">Select Year:</label>
                <select name="year" onchange="this.form.submit()">
                    <option value="2022" <?php echo ($yearFilter == 2022) ? 'selected' : ''; ?>>2022</option>
                    <option value="2023" <?php echo ($yearFilter == 2023) ? 'selected' : ''; ?>>2023</option>
                    <option value="2024" <?php echo ($yearFilter == 2024) ? 'selected' : ''; ?>>2024</option>
                </select>
                <input type="hidden" name="teamId" value="<?php echo htmlspecialchars($teamId); ?>">
            </form>
        </header>
        
        <main>
            <table>
                <thead>
                    <tr>
                        <th>Account Type</th>
                        <th>Account</th>
                        <th>Description</th>
                        <th>Income</th>
                        <th>Expense</th>
                        <th>Net Income</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalIncome = 0;
                    $totalExpense = 0;

                    while ($row = $result->fetch_assoc()) {
                        $netIncome = $row['Income'] - $row['Expense'];
                        $totalIncome += ($row['AccountType'] == 'Other Income') + $row['Income'];
                        $totalExpense += $row['Expense'];

                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['AccountType']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Account']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
                        echo "<td>" . number_format($row['Income'], 2) . "</td>";
                        echo "<td>" . number_format($row['Expense'], 2) . "</td>";
                        echo "<td>" . number_format($netIncome, 2) . "</td>";
                        echo "</tr>";
                    }

                    echo "<tr>";
                    echo "<td><strong>Total</strong></td>";
                    echo "<td></td>"; 
                    echo "<td></td>"; 
                    echo "<td><strong>" . number_format($totalIncome, 2) . "</strong></td>";
                    echo "<td><strong>" . number_format($totalExpense, 2) . "</strong></td>";
                    echo "<td><strong>" . number_format($totalIncome - $totalExpense, 2) . "</strong></td>";
                    echo "</tr>";
                    ?>
                </tbody>
            </table>
        </main>
    </body>
    </html>
    <?php
} else {
    echo "No financial data found for this team and year.";
}

// Close the statement and connection
$conn->close();

?>
