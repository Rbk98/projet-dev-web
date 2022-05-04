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
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND status=1');
    $sql->execute(array($_SESSION['id']));
    $booksStarted = $sql->fetchAll();
    return $booksStarted;
}

function getFinishedCreation()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND (status=2 OR status=3)');
    $sql->execute(array($_SESSION['id']));
    $booksFinished = $sql->fetchAll();
    return $booksFinished;
}

function getBookGenre($genre){
    $bdd=connectDb();
    $sql=$bdd->prepare('SELECT * FROM cover WHERE genre=? ');
    $sql->execute(array($genre));
    $books=$sql->fetchAll();  // Accès à la première ligne de résultat
    return $books;
    
    
}