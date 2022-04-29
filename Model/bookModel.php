<?php
require('connect.php');

function getBestBooks()
{
    $bdd = connectDb();
    $books = $bdd->query('SELECT * FROM Book ORDER BY nb_reading DESC LIMIT 4');

    return $books;
}

function getBook($idBook){
    $bdd = connectDb();
    $book = $bdd->prepare("SELECT * FROM Book WHERE id_book =?");
    $book->execute(array($idBook));
    if ($book->rowCount() == 1)
        return $book->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun livre ne correspond à l'identifiant '$idBook'");
}
