<?php
require('connect.php');

function getBestBooks()
{
    $bdd = connectDb();
    $books = $bdd->query('SELECT * FROM cover ORDER BY nb_win DESC LIMIT 4');

    return $books;
}

function getBook($idBook)
{
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
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND (status=2 OR status=2)');
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

function getBookGenre($genre){
    $bdd=connectDb();
    $sql=$bdd->prepare('SELECT * FROM cover WHERE genre=? AND status=2 ');
    $sql->execute(array($genre));
    $books=$sql->fetchAll();  // Accès à la première ligne de résultat
    return $books;
    
    
}

function insertCover($title, $resume, $genre, $nb_lives, $nb_chapters)
{
    $bdd = connectDb();
    $newCover = $bdd->prepare('INSERT INTO Cover(title, summary,genre,writer,date,nb_lives,nb_chapters_max,nb_win, nb_reading, status) VALUES (?,?,?,?,?,?,?,0,0,0) ');
    $date = date('Y-m-d');

    return $newCover->execute([$title, $resume, $genre, $_SESSION['id'], $date, $nb_lives, $nb_chapters]);
}
