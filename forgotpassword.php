<?php
session_start();
require_once 'dblogin.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        // Check if the username exists
        $query = "SELECT userId FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row['userId'];

            // Redirect to the reset password page with the userId as a URL parameter
            header("Location: resetpassword.php?userId=" . $userId);
            exit;
        } else {
            echo "No user found with that username.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Reset Your Password</h2>
    </header>
    <main>
        <form method="post" action="forgotpassword.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit">Reset Password</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>
