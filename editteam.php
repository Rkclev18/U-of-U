<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $teamId = $_GET['id'];

    $query = "SELECT t.TeamId, t.Type, t.Email, t.EstablishedDate, r.RankNumber, r.RankDate 
              FROM team t
              JOIN ranks r ON t.TeamId = r.TeamId
              WHERE t.TeamId = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $teamId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $teamId = $row['TeamId'];
        $teamName = $row['Type'];
        $teamEmail = $row['Email'];
        $establishedDate = $row['EstablishedDate'];
        $rank = $row['RankNumber'];
        $rankDate = $row['RankDate'];
    } else {
        echo "Team not found.";
        exit;
    }

    $stmt->close();
?>

<html>
<head>
    <title>Edit Team</title>
    <link rel="stylesheet" href="editteamstyle.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c2yXq1zspK3z7IUgr6HSCq+ByllaZZ4e8KGbgFqWZ9KJOBkRH20qxM6oUQvl+l9QPd0" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C89scichPD02hX1v7vXLGnbeQk4gnKw80L8ALx2z4ELbjT53mvnSw1h8ia0QIEhNq" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Edit Team</h2>
    </header>

    <main>
        <form action="editteam.php" method="POST">
            <input type="hidden" name="teamId" value="<?php echo $teamId; ?>">
            <label for="Type">Team Name:</label>
            <input type="text" id="Type" name="Type" value="<?php echo $teamName; ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $teamEmail; ?>" required>
            <label for="establishedDate">Established Date:</label>
            <input type="date" id="establishedDate" name="establishedDate" value="<?php echo $establishedDate; ?>">
            <label for="RankNumber">Rank:</label>
            <input type="text" id="RankNumber" name="RankNumber" value="<?php echo $rank; ?>">
            <label for="RankDate">Rank Date:</label>
            <input type="date" id="RankDate" name="RankDate" value="<?php echo $rankDate; ?>">
			<input type='hidden' name='update' value='yes'>
            <button type="submit">Update Team</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>
    </main>
	 <script>
            function cancelEdit() {
                var inputs = document.querySelectorAll('input[required]');
                inputs.forEach(function(input) {
                    input.removeAttribute('required');
                });
                document.forms[0].submit();
            }
        </script>
		    <footer>
		<p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>
<?php

} elseif (isset($_POST['update'])) {
    $teamId = $_POST['teamId'];
    $teamName = $_POST['Type'];
    $teamEmail = $_POST['email'];
    $establishedDate = $_POST['establishedDate'];
    $rank = $_POST['RankNumber'];
    $rankDate = $_POST['RankDate'];

    $query = "UPDATE team t
               JOIN ranks r ON t.TeamId = r.TeamId
               SET t.Type = '$teamName', t.Email = '$teamEmail', t.EstablishedDate = '$establishedDate', r.RankNumber = '$rank', r.RankDate = '$rankDate'
               WHERE t.TeamId = '$teamId'";

$stmt = $conn->prepare($query);
    if (!$stmt) {
        die('Prepare failed: ' . $conn->error);
    }

    $stmt->bind_param("sssssi", $teamName, $teamEmail, $establishedDate, $rank, $rankDate, $teamId);

    if ($stmt->execute()) {
        header("Location: teammanagement.php");
        exit;
    } else {
        echo "Error updating team: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>