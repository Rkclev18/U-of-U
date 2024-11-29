<?php

$page_roles = array('admin', 'customer');

require_once 'checksession.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Asia Home Page</title>
    <link rel="stylesheet" href="card-homepagestyle.css">
</head>
<body>
    <header>
        <img src="airasia.png" alt="Logo">
    </header>

    <main>
        <div class="card">
            <h2>Gift Cards</h2>
            <button type="button" onclick="redirectToCards()">Go to Gift Cards</button>
            <script>
                function redirectToCards() {
                    window.location.href = "card-list.php";
                }
            </script>
        </div>
        <div class="card">
            <h2>Redemption</h2>
            <button type="button" onclick="redirectToRedemption()">Redeem Points</button>
            <script>
                function redirectToRedemption() {
                    window.location.href = "redeem.php";
                }
            </script>
        </div>
        <div class="card">
            <h2>Customers</h2>
            <button type="button" onclick="redirectToCustomer()">Go to Customers</button>
            <script>
                function redirectToCustomer() {
                    window.location.href = "customer.php";
                }
            </script>
        </div>
    </main>
		</br>
	

    <footer>
		<a href="Logout.php">Logout</a>
        <p>&copy; 2024 Air Asia</p>
    </footer>
</body>
</html>
