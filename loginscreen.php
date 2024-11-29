<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="loginscreenstyle.css">
</head>
<body>
    <header>
        <img src="airasia.png" alt="Logo">
    </header>
    <main>
        <form method='post' action='loginscreen.php'>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </main>

			    <footer>
		<p>&copy; 2024 Air Asia</p>
    </footer>
</body>
</html>


<?php
session_start();

require_once 'login.php';
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
            header("Location: card-homepage.php");
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