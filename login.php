<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <header>
        <img src="uofu.jpg" alt="Logo">
    </header>
    <main>
        <form method='post' action='login.php'>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </main>
    <a href="forgotpassword.php">Forgot Password</a>
			    <footer>
		<p>&copy; 2024 University of Utah Athletics</p>
    </footer>
</body>
</html>


<?php
session_start();

require_once 'dblogin.php';
require_once 'User.php';
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die($conn->connect_error);
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
    $tmp_password = mysql_entities_fix_string($conn, $_POST['password']);

    $query = "SELECT userId, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $tmp_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userId = $row['userId'];
        $passwordFromDB = $row['password'];

        if (password_verify($tmp_password, $passwordFromDB)) {
            $user = new User($tmp_username);  
            $_SESSION['userId'] = $user;
            header("Location: homepage.php");
            exit;
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }

    $stmt->close();
}

$conn->close();


function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}



?>