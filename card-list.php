<?php
$page_roles = array('admin', 'customer');

require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM giftcard";
$result = $conn->query($query);

if (!$result) die($conn->error);

$rows = $result->num_rows;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Gift Cards</title>
    <link rel="stylesheet" href="card-list.css">
</head>
<body>

    <header>
        <img src="airasia.png" alt="Logo" style="height: 50px;">
        <h2>Your Gift Cards</h2>
    </header>

    <main>
        <button type="button" onclick="redirectToAdd()">Add New Gift Card</button>
        <script>
            function redirectToAdd() {
                window.location.href = "card-add.php";
            }
        </script>

        <a href="card-homepage.php"><button>Go Back to Homepage</button></a>

        <table>
            <thead>
                <tr>
				    <th>Image</th>
                    <th>Card ID</th>
                    <th>Card Name</th>
                    <th>Card Type</th>
                    <th>Card Value</th>
                    <th>Points</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
					echo "<td><img src='" . $row['image_path'] . "' alt='Card Image' width='100'></td>";
                    echo "<td>" . $row['card_id'] . "</td>";
                    echo "<td>" . $row['card_name'] . "</td>";
                    echo "<td>" . $row['card_type'] . "</td>";
                    echo "<td>$$row[card_value]</td>";
                    echo "<td>" . $row['points'] . "</td>";
					echo "<td><a href='card-details.php?card_id={$row['card_id']}'>View</a></td>";
                    echo "</tr>";
                }
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
