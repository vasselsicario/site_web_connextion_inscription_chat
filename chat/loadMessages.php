<?php
  // Affichages de l'historiques des messages

  session_start();
 
  // Connexion de la base de données MySQL 
  $bdd = new PDO('mysql:host=localhost;dbname=php_tp5;charset=utf8;', 'root', '');
  $resultat = $bdd->query('SELECT * FROM messages;'); // Requete SQL

  while($res = $resultat->fetch()){
    ?>
    <b><?= $_SESSION['username'] ?> : </b><?= $res['message'] ?><br>
    <?php
  }
?>