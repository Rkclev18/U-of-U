<?php
$page_roles = array('admin');

require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die($conn->connect_error);
}

if (isset($_GET['card_id'])) {
    $card_id = (int)$_GET['card_id'];

    $query = "SELECT * FROM giftcard WHERE card_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $card_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("No gift card found with the provided ID.");
    }

    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['card_id'])) {
    $card_id = (int)$_POST['card_id'];
    $card_name = $_POST['card_name'];
    $card_type = $_POST['card_type'];
    $card_value = (float)$_POST['card_value'];
    $points = (int)$_POST['points'];
    $image_path = $_POST['image_path'];

    $query = "UPDATE giftcard SET card_name = ?, card_type = ?, card_value = ?, points = ?, image_path = ? WHERE card_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $card_name, $card_type, $card_value, $points, $image_path, $card_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: card-list.php");
        exit;
    } else {
        die("Error updating gift card: " . $stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Gift Card</title>
    <link rel="stylesheet" href="card-update.css">
</head>
<body>
    <header>
        <?php if (isset($row)) : ?>
            <img src="<?php echo $row['image_path']; ?>" alt="Gift Card Image" class="card-image">
        <?php endif; ?>
        <h2>Update Gift Card</h2>
    </header>
    </div><form action="card-update.php" method="post">
    <input type="hidden" name="card_id" value="<?php echo $row['card_id']; ?>">

    <label for="card_name">Card Name:</label>
    <input type="text" name="card_name" value="<?php echo $row['card_name']; ?>" required>

    <label for="card_type">Card Type:</label>
    <input type="text" name="card_type" value="<?php echo $row['card_type']; ?>" required>

    <label for="card_value">Card Value:</label>
    <input type="text" name="card_value" value="<?php echo $row['card_value']; ?>" required>

    <label for="points">Points:</label>
    <input type="text" name="points" value="<?php echo $row['points']; ?>" required>

    <label for="image_path">Image Path:</label>
    <input type="text" name="image_path" value="<?php echo $row['image_path']; ?>" required>

    <button type="submit">Update Card</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>
    </main>
	 <script>
			function cancelEdit() {
			window.location.href = "card-list.php";
}
        </script>
</form>
</body>
</html>
