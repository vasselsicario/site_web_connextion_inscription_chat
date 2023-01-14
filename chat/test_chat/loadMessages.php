<?php
$host = "localhost";
$databaseName = "php_tp5";
$username = "root";
$password = "";

$bdd = new PDO("mysql:host=localhost ; dbname=php_tp5;charset=utf8 ;', 'root', '');

$recupMessages = $bdd->query('SELECT * FROM messages');

while($message = $recupMessages->fetch()){
    ?>
    <div class="message">
        <h4>echo $message['pseudo'];</h4>
        <p>echo $message['message'];</p>
    </div>
    <?php
}
?>


https://www.youtube.com/watch?v=C6L89nl646U