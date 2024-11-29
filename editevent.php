<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    $query = "SELECT e.EventId, e.EventName, t.Type AS TeamName, e.Venue, Date, e.Income, e.Expenses, e.Opponent
              FROM event e
              JOIN team t ON e.TeamId = t.TeamId
              WHERE e.EventId = ?";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $eventId = $row['EventId'];
        $eventName = $row['EventName'];
        $teamName = $row['TeamName'];
        $venue = $row['Venue'];
        $eventDate = $row['Date'];
        $income = $row['Income'];
        $expenses = $row['Expenses'];
        $opponent = $row['Opponent'];
    } else {
        echo "Event not found.";
        exit;
    }

    $stmt->close();
?>

<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="editeventstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Edit Event</h2>
    </header>

    <main>
        <form action="editevent.php" method="POST">
            <input type="hidden" name="eventId" value="<?php echo $eventId; ?>">
            <label for="eventName">Event Name:</label>
            <input type="text" id="eventName" name="eventName" value="<?php echo $eventName; ?>" required>
            <label for="Type">Team Name:</label>
            <input type="text" id="Type" name="Type" value="<?php echo $teamName; ?>" disabled>
            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue" value="<?php echo $venue; ?>" required>
            <label for="Date">Event Date:</label>
            <input type="Date" id="Date" name="Date" value="<?php echo $eventDate; ?>" required>
            <label for="income">Income:</label>
            <input type="number" id="income" name="income" value="<?php echo $income; ?>" required>
            <label for="expenses">Expenses:</label>
            <input type="number" id="expenses" name="expenses" value="<?php echo $expenses; ?>" required>
            <label for="opponent">Opponent:</label>
            <input type="text" id="opponent" name="opponent" value="<?php echo $opponent; ?>" required>
			<input type='hidden' name='update' value='yes'>
            <button type="submit">Update Event</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>
    </main>
	 <script>
			function cancelEdit() {
			window.location.href = "events.php";
}
        </script>
		    <footer>
		<p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>
<?php

} elseif (isset($_POST['update'])) {
    $eventId = $_POST['eventId'];
    $eventName = $_POST['eventName'];
    $venue = $_POST['venue'];
    $eventDate = $_POST['Date'];
    $income = $_POST['income'];
    $expenses = $_POST['expenses'];
    $opponent = $_POST['opponent'];



    $query = "UPDATE event SET EventName = '$eventName', Venue = '$venue', Date = '$eventDate', Income = '$income', Expenses = '$expenses', Opponent = '$opponent' WHERE EventId = '$eventId'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssdsidi", $eventName, $venue, $eventDate, $income, $expenses, $opponent, $eventId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: events.php");
        exit;
    } else {
        echo "Error updating event: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>