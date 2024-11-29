<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
    $eventName = $_POST['eventName'];
    $teamName = $_POST['Type'];
    $venue = $_POST['venue'];
    $eventDate = $_POST['Date'];
    $income = $_POST['income'];
    $expenses = $_POST['expenses'];
    $opponent = $_POST['opponent'];

 $query = "SELECT TeamId FROM team WHERE Type = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $teamName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $teamId = $row['TeamId'];

    $query = "INSERT INTO event (EventName, TeamId, Venue, Date, Income, Expenses, Opponent) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sissids", $eventName, $teamId, $venue, $eventDate, $income, $expenses, $opponent);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: events.php");
        exit;
    } else {
        echo "Error adding event: " . $stmt->error;
    }
    } else {
        echo "Team not found.";
    }

    $stmt->close();
}

$conn->close();
?>


<html>
<head>
    <title>Add Event</title>
    <link rel="stylesheet" href="addeventstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Add Event</h2>
    </header>

    <main>
        <form action="addevent.php" method="POST">
            <label for="eventName">Event Name:</label>
            <input type="text" id="eventName" name="eventName" required>
            <label for="Type">Team Name:</label>
            <input type="text" id="Type" name="Type" required>
            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue" required>
            <label for="Date">Event Date:</label>
            <input type="Date" id="Date" name="Date" required>
            <label for="income">Income:</label>
            <input type="number" id="income" name="income" required>
            <label for="expenses">Expenses:</label>
            <input type="number" id="expenses" name="expenses" required>
            <label for="opponent">Opponent:</label>
            <input type="text" id="opponent" name="opponent" required>
			<input type="hidden" name="add" value="add">
            <button type="submit">Add Event</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
    </form>
    <script>

        function cancelEdit() {
            var inputs = document.querySelectorAll('input[required]');
            inputs.forEach(function(input) {
                input.removeAttribute('required');
            });

            document.forms[0].submit();
            window.location.href = "events.php";
        }
    </script>
    </main>
			<footer>
		<p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>