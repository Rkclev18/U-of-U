<?php

$page_roles = array('admin');

require_once 'login.php';
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
    <title>Manage Customers</title>
    <link rel="stylesheet" href="customerstyle.css">
</head>
<body>
    <header>
        <img src="airasia.png" alt="Logo">
        <h2>Manage Users</h2>
    </header>

    <main>
	        <a href="customer-add.php"><button>Add Customer</button></a>
        <a href="card-homepage.php"><button>Go to Homepage</button></a>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
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
                    echo "</tr>";
                }

                $result->close();
                $conn->close();
                ?>
            </tbody>
        </table>
    </main>

    <footer>
		<p>&copy; 2024 Air Asia</p>
    </footer>
</body>
</html>