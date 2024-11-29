<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT t.TeamId, t.Type, t.Email, t.EstablishedDate, r.RankNumber, r.RankDate 
FROM team t
JOIN ranks r ON t.TeamId = r.TeamId";

$result = $conn->query($query);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

?>

<html>
<head>
    <title>Team Management</title>
    <link rel="stylesheet" href="teammanagementstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Team Management</h2>
    </header>

    <main>
        <button type="add-team-button" onclick="redirectToAddTeam()">Add Team</button>
		<a href="../admin/homepage.php"><button>Go to Homepage</button></a>
        <script>
            function redirectToAddTeam() {
                window.location.href = "Addteam.php";
            }
        </script>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Team</th>
                    <th>Email</th>
                    <th>Established Date</th>
                    <th>Rank</th>
                    <th>Rank Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['TeamId'] . "</td>";
                    echo "<td><a href='teamhomepage.php?teamId=" . $row['TeamId'] . "'>" . $row['Type'] . "</a></td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['EstablishedDate'] . "</td>";
                    echo "<td>" . $row['RankNumber'] . "</td>";
                    echo "<td>" . $row['RankDate'] . "</td>";
                    echo "<td><a href='editteam.php?id={$row['TeamId']}'>Edit</a> | <a href='deleteteamandrank.php?id={$row['TeamId']}'>Delete</a></td>";
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