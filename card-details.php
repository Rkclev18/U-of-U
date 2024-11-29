<?php

$page_roles = array('admin', 'customer');

require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$card_id = $_GET['card_id'];
$query = "SELECT * FROM giftcard WHERE card_id = $card_id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$isAdmin = in_array('admin', $user_roles);

if (isset($_POST['delete']) && $isAdmin) {
    $delete_query = "DELETE FROM giftcard WHERE card_id = $card_id";
    if ($conn->query($delete_query) === TRUE) {
        header("Location: card-list.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gift Card Details</title>
    <link rel="stylesheet" href="card-details.css">
</head>

<body>

    <div class="details-container">
        <header>
            <h1>Gift Card Details</h1>
            <img src="<?php echo $row['image_path']; ?>" alt="Gift Card Image" class="card-image">
        </header>

        <div class="card-details">
            <div class="card-info">
                <p><strong>Card Name:</strong> <?php echo $row['card_name']; ?></p>
                <p><strong>Card Type:</strong> <?php echo $row['card_type']; ?></p>
                <p><strong>Card Value:</strong> $<?php echo number_format($row['card_value'], 2); ?></p>
                <p><strong>Points:</strong> <?php echo $row['points']; ?></p>
            </div>

            <?php if ($isAdmin): ?>
                <button class="update-btn" onclick="window.location.href='card-update.php?card_id=<?php echo $row['card_id']; ?>';">Update Card</button>
                <form method="POST" style="margin-top: 10px;">
                    <button type="submit" name="delete" class="delete-btn" onclick="return confirm('Are you sure you want to delete this card?');">Delete Card</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>
