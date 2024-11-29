<?php

$page_roles = array('admin','employee');

require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $query = "SELECT u.*, r.username AS roleName, role FROM users u
              JOIN roles r ON u.username = r.username
              WHERE u.userId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId  = $row['userId'];
        $username = $row['username'];
        $password = $row['password'];
        $firstName = $row['forename'];
        $lastName = $row['surname'];
        $currentRoleName = $row['roleName'];
		$role = $row['role'];
    } else {
        echo "User not found.";
        exit;
    }

    $stmt->close();

?>
    <html>
    <head>
        <title>Edit User</title>
        <link rel="stylesheet" href="edituserstyle.css">
    </head>
    <body>
        <header>
            <img src="uofu.jpg" alt="Logo">
            <h2>Edit User</h2>
        </header>

        <main>
            <form action="edituser.php" method="POST">
                <input type="hidden" name="userId" value="<?php echo $userId; ?>">
				<input type="hidden" name="oldUsername" value="<?php echo $username; ?>">
                <label for="forename">First Name:</label>
                <input type="text" id="forename" name="forename" value="<?php echo $firstName; ?>" required>
                <label for="surname">Last Name:</label>
                <input type="text" id="surname" name="surname" value="<?php echo $lastName; ?>" required>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
                <label for="role">Role:</label>
                <input type="text" id="role" name="role" value="<?php echo $role; ?>" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <input type='hidden' name='update' value='yes'>
                <button type="submit">Update User</button>
                <button type="button" onclick="cancelEdit()">Cancel</button>
    </form>
    <script>

        function cancelEdit() {
            var inputs = document.querySelectorAll('input[required]');
            inputs.forEach(function(input) {
                input.removeAttribute('required');
            });

            document.forms[0].submit();
            window.location.href = "manageuser.php";
        }
    </script>
        </main>

        <footer>
            <p>&copy; 2024 University of Utah Athletics</p>
        </footer>
    </body>
</html>

<?php
}
require_once 'dblogin.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $userId = $_POST['userId'];
    $firstName = $_POST['forename'];
    $lastName = $_POST['surname'];
    $newUsername = $_POST['username'];
    $oldUsername = $_POST['oldUsername'];
    $password = $_POST['password'];
    $newRoleName = $_POST['role'];


if (!empty($password)) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $updateUserQuery = "UPDATE users SET forename = ?, surname = ?, username = ?, password = ? WHERE userId = ?";
    $updateUserStmt = $conn->prepare($updateUserQuery);
    if ($updateUserStmt) {
        $updateUserStmt->bind_param("ssssi", $firstName, $lastName, $newUsername, $hashedPassword, $userId);
        $updateUserStmt->execute();
    }
} else {
    $updateUserQuery = "UPDATE users SET forename = ?, surname = ?, username = ? WHERE userId = ?";
    $updateUserStmt = $conn->prepare($updateUserQuery);
    $updateUserStmt->bind_param("sssi", $firstName, $lastName, $newUsername, $userId);
	$updateUserStmt->execute();
}


    if ($newUsername != $oldUsername) {
        $updateRoleQuery = "UPDATE roles SET username = ?, role = ? WHERE username = ?";
        $updateRoleStmt = $conn->prepare($updateRoleQuery);
        if ($updateRoleStmt) {
            $updateRoleStmt->bind_param("sss", $newUsername, $newRoleName, $oldUsername);
            $updateRoleStmt->execute();
       if ($updateRoleStmt->affected_rows > 0) {

        } else {
            echo "Error updating role: " . $updateRoleStmt->error;
        }
        $updateRoleStmt->close();
    } else {
        echo "Error preparing update role statement: " . $conn->error;
    }
}

    if ($updateUserStmt->affected_rows > 0) {
        header("Location: manageuser.php");
        exit;
    } else {
        echo "Error updating user: " . $updateUserStmt->error;
    }

    $updateUserStmt->close();
}

$conn->close();
?>