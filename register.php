<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>register</title>
	<link rel="stylesheet" href="./style.css" />
</head>
<body>
	<!--le bloc menu -->

</body>
</html>

<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire

	// ---------------- USERNAME ----------------
	$username = stripslashes($_REQUEST['username']); // Supprime les antislashes
	$username = mysqli_real_escape_string($conn, $username); // Recup username

	// ---------------- EMAIL ----------------
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email); // Recup email

	// ---------------- PASSWORD ----------------
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password); // Recup password

    $query = "INSERT into users (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
			  // Requete SQL +  hash pour secu le mdp

    $res = mysqli_query($conn, $query); // Exécute la requête
    if($res){
       echo "<div class='lien'>
             <h3>Bienvenue !</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
    }
	header("Location: ./mail/mailing.php");
}else{
?>

<form class="box" action="" method="post">
    <h1 class="box-title">S'inscrire</h1>
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="lien"><a href="login.php">Connexion</a></p>
</form>
<?php } ?>