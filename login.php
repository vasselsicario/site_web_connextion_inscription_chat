<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="./style.css" />
</head>
<body>
	
</body>
</html>

<?php
require('config.php');
session_start();

// Verif le username existe
if (isset($_POST['username'])){

	$username = stripslashes($_REQUEST['username']); // Supprime les antislashes
	$username = mysqli_real_escape_string($conn, $username); // Recup username

	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password); // Recup password

    $query = "SELECT * FROM users WHERE username='$username' and password='".hash('sha256', $password)."'"; // Requete SQL +  hash pour secu le mdp
	$result = mysqli_query($conn,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if($rows==1){
		// Verif si session est ok
	    $_SESSION['username'] = $username;
	    header("Location: index.php");  // Redirection vers index
	}else{
		$message = "Erreur : Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?>


<form class="box" action="" method="post" name="login">
	<h1 class="box-title">Connexion</h1>
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
	<input type="password" class="box-input" name="password" placeholder="Mot de passe">
	<input type="submit" class="box-button" name="submit" value="Connexion">
	<p class="lien"><a href="register.php">S'inscrire</a></p>
	
	<?php if (! empty($message)) { ?>
    	<p class="erreur"><?php echo $message; ?></p>
	<?php } ?>
</form>