<?php

session_start();

include "config.php";


$queryPublication = $pdo->prepare(
    'SELECT publications.contenu, publications.dateDePublication, publications.titre, users.pseudo, categories.titre_categorie 
    FROM publications
    INNER JOIN users ON users.id_user = publications.id_user
    INNER JOIN categories ON categories.id_categorie = publications.id_categ
    WHERE publications.id_publication = ?
    ');

$queryPublication->execute(array($_GET['maPublication']));

$resultatPublication = $queryPublication->fetch(PDO::FETCH_ASSOC);

// $resultatPublication = $pdo->prepare(
//     'SELECT publications.contenu, publications.dateDePublication, publications.titre, users.pseudo, categories.titre_categorie 
//     FROM publications
//     INNER JOIN users ON users.id_user = publications.id_user
//     INNER JOIN categories ON categories.id_categorie = publications.id_categ
//     WHERE publications.titre = ?
//     ')->execute($idPublication)->fetch(PDO::FETCH_ASSOC);

$queryCommentaires = $pdo->prepare(
    'SELECT contenu, dateDePublication, titre 
    FROM commentaires
    WHERE id_publi = ?'
    );
    
$queryCommentaires->execute(array($_GET['maPublication']));
    
$listeCommentaires = $queryCommentaires->fetchAll(PDO::FETCH_ASSOC);


 
if (empty($_POST)==false) {
 
    $query= $pdo->prepare('INSERT INTO commentaires (titre, contenu, dateDePublication, id_publi)
    VALUES (?,?,?,?)');

    $query->execute([
        $_POST['titre'], 
        $_POST['contenu'], 
        $_POST['dateDePublication'], 
        $_POST['idPubli']
    ]);
  
    header('Location:accueil.php');
}
// var_dump(  $_SESSION['mail']);

// var_dump( $_GET['maPublication']);


include 'publication.html';



// <label for="idPubli"></label>
// <input type="hidden" name="idPubli" value="<?= $_GET['maPublication']; ">

?>

