<?php
include "config.php";

session_start();

if(!empty($_POST)) {

    $query = $pdo->prepare("SELECT * 
    FROM users 
    WHERE mail = ?");

    $query->execute([$_POST['mail']]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if($user['mail'] == $_POST['mail'] && password_verify($_POST['motDePasse'],$user['motDePasse'])){
        $_SESSION['mail'] = $user['mail'];
        $_SESSION['motDePasse'] = $user['motDePasse'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['pseudo'] = $user['pseudo'];

    header('Location:accueil.php');
    }
// var_dump($_SESSION);
}

include "login.html";

?>