<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['action']) && $_POST['action'] == 'save') {
    $teamName = $_POST['team_name'];
    $teamEmail = $_POST['email'];
    $establishedDate = $_POST['established_date'];
    $rank = $_POST['rank'];
    $rankDate = $_POST['rank_date'];

    $query = "INSERT INTO team (Type, Email, EstablishedDate) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $teamName, $teamEmail, $establishedDate);
    $stmt->execute();

    $teamId = $conn->insert_id;

    $query = "INSERT INTO ranks (TeamId, RankNumber, RankDate) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iis", $teamId, $rank, $rankDate);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: teammanagement.php");
        exit;
    } else {
        echo "Error adding team.";
    }

    $stmt->close();
}

$conn->close();
?>

<html>
<head>
    <title>Add Team</title>
    <link rel="stylesheet" href="addteamstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Add Team</h2>
    </header>

    <main>
        <form action="addteam.php" method="POST">
            <label for="team_name">Team Name:</label>
            <input type="text" id="team_name" name="team_name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="established_date">Established Date:</label>
            <input type="date" id="established_date" name="established_date" required>
            <label for="rank">Rank:</label>
            <input type="text" id="rank" name="rank">
            <label for="rank_date">Rank Date:</label>
            <input type="date" id="rank_date" name="rank_date">
            <input type="hidden" name="action" value="save">
            <button type="submit">Save</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
    </form>
    <script>

        function cancelEdit() {
            var inputs = document.querySelectorAll('input[required]');
            inputs.forEach(function(input) {
                input.removeAttribute('required');
            });

            document.forms[0].submit();
            window.location.href = "teammanagement.php";
        }
    </script>
    </main>
		<footer>
		<p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>