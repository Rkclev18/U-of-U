<?php
session_start();
require_once 'dblogin.php';

$conn = new mysqli($hn, $un, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the userId is set in the URL
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            // Check if both passwords match
            if ($newPassword === $confirmPassword) {
                // Hash the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the user's password in the database
                $query = "UPDATE users SET password = ? WHERE userId = ?";
                $stmt = $conn->prepare($query);

                if (!$stmt) {
                    die("Query preparation failed: " . $conn->error);
                }

                $stmt->bind_param("si", $hashedPassword, $userId);
                if ($stmt->execute()) {
                    // Redirect to the login page after the password is reset
                    header("Location: login.php");
                    exit;
                } else {
                    echo "Error updating password.";
                }

                $stmt->close();
            } else {
                echo "Passwords do not match.";
            }
        }
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>

<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
        <h2>Reset Your Password</h2>
    </header>
    <main>
        <form method="POST" action="resetpassword.php?userId=<?php echo $_GET['userId']; ?>">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Reset Password</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>
