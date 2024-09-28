<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
</head>
<body>    
	<form login="login.php" method="POST">
		<div class="fields">
            <p><label for="username">Username</label>
			<input type="text" id="username" class="fields" name="username"></p>
            <p><label for="password">Password</label>
			<input type="password" id="password" class="fields" name="password"></p>
			<p><input type="submit" value="Login" id="loginBtn" name="loginBtn"></p>
		</div>
	</form>
    <a href=logout.php><button>Logout</button></a>
</body>
</html>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['username']) && !empty($_POST['password'])) {
    if (isset($_SESSION['username'])) {
        echo "<p>" .$_SESSION['username'] . " is already logged in. Wait for him to logout first</p>";
    } else {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = md5($_POST['password']);

        echo "<p><b>User logged in: " . $_SESSION['username'] . "</b></p>";
        echo "<b>Password:<br>" . $_SESSION['password'] . "</b>";
    }
} 