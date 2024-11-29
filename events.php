<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT EventId, EventName, t.Type AS TeamName, Venue, Date As 'Event Date', Income, Expenses, Opponent
          FROM event e
          JOIN team t ON e.TeamId = t.TeamId";

$result = $conn->query($query);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

?>

<html>
<head>
    <title>Events</title>
    <link rel="stylesheet" href="eventsstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Events</h2>
    </header>

    <main>
	    <button type="add-event-button" onclick="redirectToAddEvent()">Add Event</button>
		<script>
    function redirectToAddEvent() {
        window.location.href = "addevent.php";
    }
</script>
		<a href="../admin/homepage.php"><button>Go to Homepage</button></a>
        <table>
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Team</th>
                    <th>Venue</th>
                    <th>Event Date</th>
                    <th>Income</th>
                    <th>Expenses</th>
                    <th>Opponent</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['EventId'] . "</td>";
                    echo "<td>" . $row['EventName'] . "</td>";
                    echo "<td>" . $row['TeamName'] . "</td>";
                    echo "<td>" . $row['Venue'] . "</td>";
                    echo "<td>" . $row['Event Date'] . "</td>";
                    echo "<td>" . $row['Income'] . "</td>";
                    echo "<td>" . $row['Expenses'] . "</td>";
                    echo "<td>" . $row['Opponent'] . "</td>";

                    echo "<td><a href='editevent.php?id={$row['EventId']}'>Edit</a> | <a href='deleteevent.php?id={$row['EventId']}'>Delete</a></td>";
                    echo "</tr>";
                }

                $result->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </main>

    <footer>
		<p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>