<?php
$page_roles = array('admin');

require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_POST['card_name'])) {
    $card_name = $_POST['card_name'];
    $card_type = $_POST['card_type'];
    $card_value = $_POST['card_value'];
    $points = $_POST['points'];
    $image_path = $_POST['image_path'];

    $query = "INSERT INTO giftcard (card_name, card_type, card_value, points, image_path) 
              VALUES ('$card_name', '$card_type', '$card_value', '$points', '$image_path')";

    $result = $conn->query($query);
    if (!$result) die($conn->error);

    header("Location: card-list.php");
    exit;
}
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Gift Card</title>
  <link rel="stylesheet" href="card-add.css"> 
</head>
<body>
  <div class="form-container">
    <h1>Add New Gift Card</h1>
    <form method="post" action="card-add.php">
      <div class="form-group">
        <label for="card_name">Card Name:</label>
        <input type="text" id="card_name" name="card_name" required>
      </div>

      <div class="form-group">
        <label for="card_type">Card Type:</label>
        <input type="text" id="card_type" name="card_type" required>
      </div>

      <div class="form-group">
        <label for="card_value">Card Value:</label>
        <input type="text" id="card_value" name="card_value" required>
      </div>

      <div class="form-group">
        <label for="points">Points:</label>
        <input type="text" id="points" name="points" required>
      </div>

      <div class="form-group">
        <label for="image_path">Image Path:</label>
        <input type="text" id="image_path" name="image_path" required>
      </div>

      <div class="form-group">
        <input type="submit" value="Add Card" class="submit-btn">
      </div>
    </form>
  </div>
</body>
</html>
