<?php

session_start();

include "config.php";

    $query = $pdo->prepare( 
        'SELECT titre_categorie, id_categorie FROM categories'
    );  
    
    $query->execute();
    
    $listeDesCategories = $query->fetchAll(PDO::FETCH_ASSOC);  

    $query = $pdo->prepare( 
        'SELECT pseudo, id_user FROM users'
    );  
    
    $query->execute();
    
    $listeDesUsers = $query->fetchAll(PDO::FETCH_ASSOC); 


if (empty($_POST)==false) {

    $query= $pdo->prepare('INSERT INTO publications (titre, contenu, dateDePublication, id_categ, id_user)
    VALUES (?,?,?,?,?)');

    $query->execute([$_POST['titre'], $_POST['contenu'], $_POST['dateDePublication'], $_POST['id_categ'], $_POST['id_user']]);
    header('Location:accueil.php');
}
 

include 'newPubli.html';

?>