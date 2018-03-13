<?php
/**Cette page affiche les infos et les erreurs**/
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $username = $_POST['username'] ?? null;
    $password_1 = $_POST['password_1'] ?? null;
    $password_2 = $_POST['password_2'] ?? null;
    echo 'validate data' . "<br>";
    $usernameSuccess = (is_string($username) && strlen($username) > 8 ); 
    $passwordSuccess = ($password_1 === $password_2 && strlen($password_1));  
    
    if ($usernameSuccess && $passwordSuccess) {
        echo 'Store data';
        return;
    }
}
echo 'If validation fail' . "<br>";
?>
if (! ($usernameSuccess ?? true)) {
    ?> 
			<div>
				<p> You have an error into your username
				
				</p>
			</div>
		    <?php
}
?>
			<label for="username">Your username :</label>
			<input type="text" name="username">
			<?php

if (! ($passwordSuccess ?? true)) {
    
    ?>
			<div>
				<p> You have an error into your password
				
				</p>
			</div>
			<?php
}
?>