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
    $startedBooks = $sql->fetchAll();
    return $startedBooks;
}

function getFinishedCreation()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND (status=2 OR status=3)');
    $sql->execute(array($_SESSION['id']));
    $finishedBooks = $sql->fetchAll();
    return $finishedBooks;
}

function getStartedReading()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM reading WHERE writer=? AND status=0');
    $sql->execute(array($_SESSION['id']));
    $startedReadings = $sql->fetchAll();
    return $startedReadings;
}

function getFinishedReading()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM reading WHERE writer=? AND status=1');
    $sql->execute(array($_SESSION['id']));
    $finishedReadings = $sql->fetchAll();
    return $finishedReadings;
}
