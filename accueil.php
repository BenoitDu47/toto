<?php

session_start();


include "config.php";

$query = $pdo->prepare( 
    'SELECT LEFT(publications.contenu, 25) AS extrait, users.pseudo, publications.dateDePublication, publications.titre, id_publication
    FROM publications
    INNER JOIN users
    ON users.id_user = publications.id_user'
);  

$query->execute();

$listePublications = $query->fetchAll(PDO::FETCH_ASSOC);  

include "accueil.html";

// if(isset($_SESSION['email'])){
//     include 'acc.html';
//     var_dump($_SESSION);
//     }else{
//     header('Location:login.php');
//     }


// $query = $pdo->prepare( 
//     'SELECT users.id_user, publications.id_user, id_publication, mail FROM publications INNER JOIN users ON users.id_user = publications.id_user'
// );  

// $query->execute(array($_GET['maPublication']));

// $numeroPublication = $query->fetchAll(PDO::FETCH_ASSOC); 




?> 


