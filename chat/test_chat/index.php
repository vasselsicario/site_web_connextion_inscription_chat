<?php
$host = "localhost";
$databaseName = "php_tp5";
$username = "root";
$password = "";

$bdd = new PDO("mysql:host=localhost ; dbname=php_tp5;charset=utf8 ;', 'root', '');



if(isset($_POST['valider'])){
    if(!empty($_POST['message'])){
        $pseudo = $_SESSION['username'];
        $message = nl2r(htmlspecialchars($_POST['message']));

        // Remplace pseudo par $username truc comme ça voir dans index.php du projet
        $insererMessage = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES(?, ?)');
        $insererMessage->execute(array($pseudo, $message));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
    <form method="POST" action="" align="center">
        <input type="text" name="pseudo">
        <br><br>
        <textarea name="message" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" name="valider">
    </form>
    <section id="messages"></section>

    <script>
        setInterval(('load_messages()', 2000);
        function load_messages(){
            $('#messages').load('loadMessages.php');
        };
    </script>

</body>
</html>