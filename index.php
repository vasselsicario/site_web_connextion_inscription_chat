<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index</title>
	<link rel="stylesheet" href="style.css" />
</head>

<header>
	<div class="in">
		<div class="in">
			<div class="menu">
				<a href="index.php">Accueil</a>
				<a href="./chat/index.php">Chat</a>
				<a href="logout.php">Déconnexion</a>
			</div>
		</div>
	</div>
</header>

<body>
	<div class="text">
		<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
		<p>Vous êtes maintenant connecté.</p>
	</div>
</body>
</html>