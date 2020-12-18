<?php

include "config.php";

if (empty($_POST)==false) {
    $password = $_POST['motDePasse'];
    $hashPassword =  password_hash($password, PASSWORD_DEFAULT);


    $query= $pdo->prepare('INSERT INTO users (mail, motDePasse, nom, prenom, pseudo)
    VALUES (?,?,?,?,?)');

    $query->execute([$_POST['mail'], $hashPassword, $_POST['nom'], $_POST['prenom'], $_POST['pseudo']]);
    header('Location:login.php');
}

include 'connexion.html';

?>