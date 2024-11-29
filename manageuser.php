<?php

$page_roles = array('admin');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT UserId, forename, surname, username FROM users";
$result = $conn->query($query);

if (!$result) {
    die("Error executing query: " . $conn->error);
}

?>

<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="manageuserstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Manage Users</h2>
    </header>

    <main>
	        <a href="adduser.php"><button>Add User</button></a>
        <a href="../admin/homepage.php"><button>Go to homepage</button></a>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['UserId'] . "</td>";
                    echo "<td>" . $row['forename'] . "</td>";
                    echo "<td>" . $row['surname'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td><a href='edituser.php?id={$row['UserId']}'>Edit</a> | <a href='deleteuser.php?id={$row['UserId']}'>Delete</a></td>";
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