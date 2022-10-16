<?php
session_start();
$pdo = new PDO("mysql:host=database;dbname=messagerie", "root", "password");
if (isset($_POST['valider'])){
    if(!empty($_POST['message'])){
//        faire en sorte que le pseudo soit celui lors de la creation
        $pseudo = htmlspecialchars($_SESSION['pseudo']);
        $message= nl2br(htmlspecialchars($_POST['message']));

        $insererMessage= $pdo->prepare('INSERT INTO message (pseudo, message) VALUES(?, ?)');
        $insererMessage->execute(array($pseudo, $message));
    }else{
        echo "veuillez compléter tous les champs";
    }
}






if (!$_SESSION['mdp']){
    header('Location: connexion.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="post.php">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>messagerie instantané</title>
</head>
<body>
<form method="POST" action="">
    <textarea name="message"></textarea>
    <input type="submit" name="valider">
</form>
<section id="message">
<!--    c'est fais expres qu'il n'y a pas d'automatisation pour le reload de la page puisque c'est pas le but de l'exo-->
    <?php
    $pdo = new PDO("mysql:host=database;dbname=messagerie", "root", "password");
    $recupMessage= $pdo->query('SELECT * FROM message');
    while($message = $recupMessage->fetch()){
        ?>
        <div class="message">
            <h4><?= $message['pseudo']; ?></h4>
            <p><?= $message['message']; ?></p>
            <input type="button" value="test" <? if ($message['pseudo']=$_SESSION['pseudo']){
            }?>>
        </div>
        <?php
    }


    ?>
</section>




    <a href="deconnexion.php">
        <button>Se déconnecter</button>
    </a>
</body>
</html>