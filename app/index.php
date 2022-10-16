<?php
session_start();
$pdo = new PDO("mysql:host=database;dbname=data", "root", "password");
//    inscription utilisateur
if(isset($_POST['inscription'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = md5($_POST['mdp']);
//        inserer l'utilisateur dans la base de donner
        $insertUser = $pdo->prepare('INSERT INTO utilisateur(pseudo, mdp)VALUES(?,?)');
        $insertUser->execute(array($pseudo,$mdp));

///       prendre les informations de l'utilisateur dans la BD
        $recupUser= $pdo->prepare('SELECT * FROM utilisateur WHERE pseudo = ? AND mdp =?');
        $recupUser->execute(array($pseudo, $mdp));

//        crée une session pour chaque utilisateur connecter en récupérant les informations pseudo, mdp et en passant recuperer l'id avec la commande $recupUser
//        rowcount va compter le nombre de donner trouver pour chercher l'utilisateur et declarer les sessions
        if ($recupUser->rowCount() > 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
//            ce fetch permet de juste recuperer l'id

        }
    }else{
        echo "veuillez completer tous les champs";
    }


}

if(isset($_POST['connexion'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = md5($_POST['mdp']);
//        recuperer les utilisateur dans la base de donne
        $recupUser = $pdo->prepare('SELECT * FROM utilisateur WHERE pseudo = ? AND mdp = ?');
//        recuperer lutilisateur qui correspond au pseudo et mot de passe utiliser pour la connexion
        $recupUser->execute(array($pseudo, $mdp));

        if($recupUser->rowCount() > 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: post.php');
        } else{
            echo "votre mot de passe ou pseudo est inconnu";
        }
    }else{
        echo "veuillez completer tous les champs";
    }
}
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>inscription</title>
</head>
<body>
<h1>inscription</h1>
<form method="POST" action="">
    <input type="text" name="pseudo" placeholder="pseudo" autocomplete="off">
    <input type="password" name="mdp" placeholder="password" autocomplete="off">
    <input type="submit" name="inscription" value="inscription">
</form>

<h1>connexion</h1>
<form method="POST" action="">
    <input type="text" name="pseudo" placeholder="pseudo" autocomplete="off">
    <input type="password" name="mdp" placeholder="password" autocomplete="off">
    <input type="submit" name="connexion" value="connexion">

</form>
</body>
</html>

