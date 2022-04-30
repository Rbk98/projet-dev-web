<?php
require('connect.php');

function getBestBooks()
{
    $bdd = connectDb();
    $books = $bdd->query('SELECT * FROM cover ORDER BY nb_win DESC LIMIT 4');

    return $books;
}

function getBook($idBook){
    $bdd = connectDb();
    $book = $bdd->prepare("SELECT * FROM cover WHERE id_book =?");
    $book->execute(array($idBook));
    if ($book->rowCount() == 1)
        return $book->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun livre ne correspond à l'identifiant '$idBook'");
}

function getStartedCreation()
{
    $bdd = connectDb();
    $books = $bdd->prepare('SELECT * FROM cover WHERE writter=? AND state=1');
    $books->execute(array($_SESSION['id_user']));

    return $books;
}

function getFinishedCreation()
{
    $bdd = connectDb();
    $books = $bdd->prepare('SELECT * FROM cover WHERE writter=:writer AND (state=2 OR state=3)');
    $books->execute(array("writer"=>$_SESSION['id_user']));

    return $books;
}
