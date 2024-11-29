<?php

$page_roles = array('customer', 'admin');

require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_SESSION['userId']; 
$username = $user->username; 


$userQuery = "SELECT userId FROM users WHERE username = ?";
$userStmt = $conn->prepare($userQuery);
$userStmt->bind_param("s", $username);
$userStmt->execute();
$userResult = $userStmt->get_result();
$user = $userResult->fetch_assoc();
$userStmt->close();

if (!$user) {
    die("Error: User not found.");
}

$userId = $user['userId'];


$accountQuery = "SELECT account_type, points FROM account WHERE user_id = ?";
$accountStmt = $conn->prepare($accountQuery);
$accountStmt->bind_param("i", $userId);
$accountStmt->execute();
$accountResult = $accountStmt->get_result();
$account = $accountResult->fetch_assoc();
$accountStmt->close();

if (!$account) {
    die("Error: Account not found.");
}

$accountType = $account['account_type'];
$userPoints = $account['points'];


$giftcardQuery = "SELECT card_id, card_name, card_type, card_value, points FROM giftcard WHERE card_type = ?";
$giftcardStmt = $conn->prepare($giftcardQuery);
$giftcardStmt->bind_param("s", $accountType);
$giftcardStmt->execute();
$giftcardResult = $giftcardStmt->get_result();
$giftcardStmt->close();


if (isset($_POST['redeem'])) {
    $cardId = $_POST['card_id'];
    $pointsNeeded = $_POST['points_needed'];

    if ($userPoints >= $pointsNeeded) {

        $conn->begin_transaction();
        try {

            $newPoints = $userPoints - $pointsNeeded;
            $updatePointsQuery = "UPDATE account SET points = ? WHERE user_id = ?";
            $updatePointsStmt = $conn->prepare($updatePointsQuery);
            $updatePointsStmt->bind_param("ii", $newPoints, $userId);
            $updatePointsStmt->execute();
            $updatePointsStmt->close();


            $insertRedemptionQuery = "INSERT INTO redemption (date, accountId, cardId, pointsRedeemed) VALUES (NOW(), ?, ?, ?)";
            $insertRedemptionStmt = $conn->prepare($insertRedemptionQuery);
            $insertRedemptionStmt->bind_param("iii", $userId, $cardId, $pointsNeeded);
            $insertRedemptionStmt->execute();
            $insertRedemptionStmt->close();

            $conn->commit();


            echo "<script>
                alert('Redemption Successful! Points have been deducted.');
                window.location.href = 'redeem.php';
            </script>";
            exit();
        } catch (Exception $e) {
            $conn->rollback();
            echo "<script>
                alert('Error: Redemption failed. Please try again.');
                window.location.href = 'redeem.php';
            </script>";
            exit();
        }
    } else {

        echo "<script>
            alert('Redemption Unsuccessful: Not enough points.');
            window.location.href = 'redeem.php';
        </script>";
        exit();
    }
}

$conn->close();

?>

<html>
<head>
    <title>Redeem Gift Cards</title>
    <link rel="stylesheet" href="redeemstyle.css">
</head>
<body>
    <header>
        <img src="airasia.png" alt="Logo">
        <h2>Redeem Gift Cards</h2>
    </header>

    <main>
        <h3>Your Points: <?php echo htmlspecialchars($userPoints); ?></h3>
        <a href="card-homepage.php"><button>Go to Homepage</button></a>
		</br>
		</br>
        <table>
            <thead>
                <tr>
                    <th>Card ID</th>
                    <th>Card Name</th>
                    <th>Card Type</th>
                    <th>Card Value</th>
                    <th>Points Required</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $giftcardResult->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['card_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['card_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['card_type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['card_value']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['points']) . "</td>";
                    echo "<td>
                        <form action='redeem.php' method='POST'>
                            <input type='hidden' name='card_id' value='" . htmlspecialchars($row['card_id']) . "'>
                            <input type='hidden' name='points_needed' value='" . htmlspecialchars($row['points']) . "'>
                            <button type='submit' name='redeem'>Redeem</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }

                $giftcardResult->close();
                ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Air Asia</p>
    </footer>
</body>
</html>
