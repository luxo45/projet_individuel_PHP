<?php
include_once __DIR__ . '/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'] ?? 'null';
    $password_1 = $_POST['password_1'] ?? 'null';
    $password_2 = $_POST['password_2'] ?? 'null';
    
    echo 'validate data' . "<br>";
    $usernameSuccess = (is_string($username) && strlen($username) > 2);
    $passwordSuccess = ($password_1 === $password_2 && strlen($password_1) > 8);
    
    if ($usernameSuccess && $passwordSuccess) {
        try {
            $connection = Service\DBConnector::getConnection();
        } catch (PDOException $exception) {
            http_response_code(500);
            echo 'A problem occured, contact support';
            exit(10); 
        }
        echo 'Store data';
        return;
    }
    
}
?>

<!Doctype html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Register here</title>
	</head>
	<body>
		<form  method="POST">

			<?php

if (! ($usernameSuccess ?? true)) {
    ?>
			<div>
				<p> You have an error in your username </p>
			</div>
			<?php
}
?>
			<label for="username">Your username :</label>
			<input type="text" name="username" value="<?php

echo htmlentities($_POST['username'] ?? '');
?>">
			
			<br/>
			<?php

if (! ($passwordSuccess ?? true)) {
    ?>
			<div>
				<p> You have an error in your password </p>
			</div>
			<?php
}
?>
			<label for="password_1">Your password :</label>
			<input type="password" name="password_1" >
			<br/>
			
			<label for="password_2">Your password :</label>
			<input type="password" name="password_2" >
			
			<br/>
			
			<button type="submit">login</button>
			
			<br/>
			
			<button type="submit">logout</button>
		
		</form>
		
	</body>
	
	
</html>