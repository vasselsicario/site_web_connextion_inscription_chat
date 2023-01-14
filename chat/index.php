<?php
  session_start();

  // Vérif si l'user est connecté, sinon go vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: ../login.php");
    exit();
  }

?>
  
<html>
  <head>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="../style.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/1.1.9/js/libs/jquery-1.10.2.min.js"></script>
  </head>


  <header>
  <div class="in">
    <div class="in">
      <div class="menu">
        <a href="../index.php">Accueil</a>
        <a href="index.php">Chat</a>
        <a href="../logout.php">Déconnexion</a>
      </div>
    </div>
  </div>
  </header>


  <body>
    <!-- Affichage du formulaire -->
    <div class='framechat'>
    
      <div id='result' name="result"></div>

      <div class='chatbody'>
        <form method="post" action="index.php" >
          <input type='text' name='msg' id='msgbox' value=" " placeholder="Tapez votre message ICI" />
          <input type='submit' name='submit' id='new_msg' class='btn btn-send' value='Envoyer' />

          <form method="post" action="index.php">
            <input type='submit' name='clear' class='btn btn-clear' value='X' />
          </form>

        </form>
      </div>
    </div>
  </body>
</html>

<?php
  // ----------------------- APPELS ----------------------- 

  // Verif si le formulaire a été soumis
  if (isset($_POST['submit'])) {
    newChat();
  }

  // Verif si l'user veut supp l'historique du chat
  if (isset($_POST['clear'])) {
    clearFunction();
  }


  // ----------------------- FONCTIONS ----------------------- 

  // Définition de la fonction de traitement du formulaire
  function newChat() {
    // Récup des données
    $message = $_POST['msg'];
    $nom_utilisateur = $_SESSION["username"];

    // Traitement des données
    require('../config.php');

    if ($message !== ""){
      
      $query = "INSERT INTO messages (username, message) VALUES ('".$nom_utilisateur."', '".$message."')"; // Requete SQL
      $res = mysqli_query($conn, $query); // Exécute la requête
    }
  }

  // Fonction pour nettoyer le chat
  function clearFunction() {
    // Récup des données
    $nom_utilisateur = $_SESSION["username"];

    // Traitement des données
    require('../config.php');

    // Requêtes
    $query = "TRUNCATE TABLE messages; ";
    $res = mysqli_query($conn, $query); // Exécute la requête

    $query = "INSERT INTO messages (username, message) VALUES ('". $nom_utilisateur."', ' a effacé l historique du chat')";
    $res = mysqli_query($conn, $query);
  }
?>


<script>
  setInterval('loadMessagesFunction()', 2000);

  function loadMessagesFunction(){
    $('#result').load('loadMessages.php');
  }
</script>