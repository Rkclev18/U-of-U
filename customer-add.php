<?php

$page_roles = array('admin');

require_once 'login.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add'])) {
    $firstName = $_POST['forename'];
    $lastName = $_POST['surname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roleName = $_POST['role'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $insertUserQuery = "INSERT INTO users (forename, surname, username, password) VALUES (?, ?, ?, ?)";
    $insertUserStmt = $conn->prepare($insertUserQuery);
    if ($insertUserStmt) {
        $insertUserStmt->bind_param("ssss", $firstName, $lastName, $username, $hashedPassword);
        if ($insertUserStmt->execute()) {

            $insertRoleQuery = "INSERT INTO roles (username, role) VALUES (?, ?)";
            $insertRoleStmt = $conn->prepare($insertRoleQuery);
            if ($insertRoleStmt) {
                $insertRoleStmt->bind_param("ss", $username, $roleName);
                $insertRoleStmt->execute();
                if ($insertRoleStmt->affected_rows > 0) {
                    header("Location: customer.php");
                    exit;
                } else {
                    echo "Error inserting role: " . $insertRoleStmt->error;
                }
                $insertRoleStmt->close();
            } else {
                echo "Error preparing insert role statement: " . $conn->error;
            }
            $insertUserStmt->close();
        } else {
            echo "Error inserting user: " . $insertUserStmt->error;
        }
    } else {
        echo "Error preparing insert user statement: " . $conn->error;
    }
}

$conn->close();

?>

<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" href="customer-addstyle.css">
</head>
<body>
    <header>
        <img src="airasia.png" alt="Logo">
        <h2>Add Customer</h2>
    </header>

    <main>
        <form action="customer-add.php" method="POST">
            <label for="forename">First Name:</label>
            <input type="text" id="forename" name="forename" required>
            
            <label for="surname">Last Name:</label>
            <input type="text" id="surname" name="surname" required>
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="hidden" name="add" value="add">
            
            <button type="submit">Create Customer</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </form>

        <script>
            function cancelEdit() {
                var inputs = document.querySelectorAll('input[required]');
                inputs.forEach(function(input) {
                    input.removeAttribute('required');
                });

                document.forms[0].submit();
                window.location.href = "customer.php"; 
            }
        </script>
    </main>

    <footer>
        <p>&copy; 2024 Air Asia</p>
    </footer>
</body>
</html>
