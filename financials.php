<?php

$page_roles = array('admin');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$currentYear = date("Y");
$yearFilter = isset($_GET['year']) ? $_GET['year'] : $currentYear;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $yearFilter = $_POST['year'];
}

$yearFilter = (int)$yearFilter;

$query = "
    SELECT t.TeamId, t.Type AS TeamName,
        
        (SELECT SUM(i.Amount) FROM income i WHERE i.TeamId = t.TeamId AND i.Year = $yearFilter) AS TotalIncome,
        
        (SELECT SUM(e.Income) FROM event e WHERE e.TeamId = t.TeamId AND YEAR(e.Date) = $yearFilter) AS TotalEventIncome,
        
        (SELECT SUM(e.Expenses) FROM event e WHERE e.TeamId = t.TeamId AND YEAR(e.Date) = $yearFilter) AS TotalEventExpenses,
        
        (SELECT SUM(s.Amount) FROM scholarship s WHERE s.TeamId = t.TeamId AND YEAR(s.Date) = $yearFilter) AS TotalScholarshipExpenses,
        
        (SELECT SUM(eq.AnnualCost) FROM equipment eq WHERE eq.TeamId = t.TeamId AND eq.Year = $yearFilter) AS TotalEquipmentCost,
        
        (SELECT SUM(emp.Cost) 
         FROM employee emp 
         WHERE emp.TeamId = t.TeamId 
           AND (YEAR(emp.StartDate) <= $yearFilter AND YEAR(emp.EndDate) >= $yearFilter)) AS TotalEmployeeCost
        
    FROM team t
";

$result = $conn->query($query);

if ($result) {
    ?>
    <html>
    <head>
        <title>Financial Report</title>
        <link rel="stylesheet" href="financialsstyle.css">
    </head>
    <body>
        <header>
            <img src="uofu.jpg" alt="Logo">
            <h2>Financial Report - <?php echo $yearFilter; ?></h2>
			<a href="../admin/homepage.php"><button>Go to Homepage </button></a>
        </header>

        <main>
            <form action="financials.php" method="POST">
                <label for="year">Select Year:</label>
                <select name="year" id="year">
                    <option value="2024" <?php echo ($yearFilter == 2024) ? 'selected' : ''; ?>>2024</option>
                    <option value="2023" <?php echo ($yearFilter == 2023) ? 'selected' : ''; ?>>2023</option>
                    <option value="2022" <?php echo ($yearFilter == 2022) ? 'selected' : ''; ?>>2022</option>
                    <option value="2021" <?php echo ($yearFilter == 2021) ? 'selected' : ''; ?>>2021</option>
                </select>
                <button type="submit">Filter</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Total Income</th>
                        <th>Total Expenses</th>
                        <th>Net Income</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $totalIncome = $row['TotalIncome'] + $row['TotalEventIncome'];
                            $totalExpenses = $row['TotalScholarshipExpenses'] + $row['TotalEventExpenses'] + $row['TotalEquipmentCost'] + $row['TotalEmployeeCost'];
                            $netIncome = $totalIncome - $totalExpenses;

                            echo "<tr>";
                            echo "<td>" . $row['TeamName'] . "</td>";
                            echo "<td>" . number_format($totalIncome, 2) . "</td>";
                            echo "<td>" . number_format($totalExpenses, 2) . "</td>";
                            echo "<td>" . number_format($netIncome, 2) . "</td>";
                            echo "<td><a href='teamfinancials.php?teamId=" . $row['TeamId'] . "&year=" . $yearFilter . "'>View Details</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No data found for the selected year.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </body>
    </html>
    <?php
} else {
    echo "Query failed or returned no result.";
}

$conn->close();
?>
