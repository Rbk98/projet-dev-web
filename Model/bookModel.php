<?php
require('connect.php');

function getBestBooks()
{
    $bdd = connectDb();
    $bestBooks = $bdd->query('SELECT * FROM cover ORDER BY nb_reading DESC LIMIT 4');

    return $bestBooks;
}

function getBook($idBook)
{
    $bdd = connectDb();
    $book = $bdd->prepare("SELECT * FROM cover WHERE id_cover =?");
    $book->execute(array($idBook));
    if ($book->rowCount() == 1)
        return $book->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun livre ne correspond à l'identifiant '$idBook'");
}

function getAllBooks()
{
    $bdd = connectDb();
    $sql = $bdd->prepare("SELECT * FROM cover");
    $sql->execute();
    $books = $sql->fetchAll();

    return $books;
}

function getStartedCreation()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND status=0');
    $sql->execute(array($_SESSION['id']));
    $startedBooks = $sql->fetchAll();

    return $startedBooks;
}

function getFinishedCreation()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND (status=1 OR status=2)');
    $sql->execute(array($_SESSION['id']));
    $finishedBooks = $sql->fetchAll();
    return $finishedBooks;
}

function getPublishedCreation()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND status=2');
    $sql->execute(array($_SESSION['id']));
    $publishedBooks = $sql->fetchAll();
    return $publishedBooks;
}

function getStartedReading()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM reading WHERE id_user=? AND status=0');
    $sql->execute(array($_SESSION['id']));
    $startedReadings = $sql->fetchAll();
    return $startedReadings;
}

function getFinishedReading()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM reading WHERE id_user=? AND status=1');
    $sql->execute(array($_SESSION['id']));
    $finishedReadings = $sql->fetchAll();
    return $finishedReadings;
}

function getBookGenre($genre)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE genre=? AND status=2 ');
    $sql->execute(array($genre));
    $books = $sql->fetchAll();  // Accès à la première ligne de résultat
    return $books;
}

function insertCover($title, $resume, $genre, $nb_lives, $nb_chapters)
{
    $bdd = connectDb();
    $newCover = $bdd->prepare('INSERT INTO cover(title, summary,genre,writer,date,nb_lives,nb_chapters_max,nb_win, nb_reading, status) VALUES (?,?,?,?,?,?,?,0,0,0) ');
    $date = date('Y-m-d');

    return $newCover->execute([$title, $resume, $genre, $_SESSION['id'], $date, $nb_lives, $nb_chapters]);
}


function getCover($id_cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE id_cover=?');
    $sql->execute([$id_cover]);
    $cover_page = $sql->fetch();

    return $cover_page;
}

function changeCover($title, $summary, $genre, $nb_lives, $nb_chapters_max, $id_cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('UPDATE cover SET title=?, summary=?, genre=? WHERE id_cover=?');

    return $sql->execute([$title, $summary, $genre, $id_cover]);
}

function updateNumberReading()
{
    $bdd = connectDb();
    $nbReadings = $bdd->prepare('SELECT nb_reading FROM user WHERE id_user=?');
    $nbReadings->execute($_SESSION['id']);
    $nbReadings++;
    $sql = $bdd->prepare('UPDATE user SET nb_reading=? WHERE id_user=?');
    return $sql->execute([$nbReadings], $_SESSION['id']);
}

function startStory($cover)
{
    $bdd = connectDb();
    //récupération du nombre de vie au début de l'histoire
    $query = $bdd->prepare('SELECT nb_lives FROM cover WHERE id_cover=?');
    $query->execute(array($cover));
    $nbLives = $query->fetch();
    $nbLives = intval($nbLives);
    //insertion dans la bdd du commencement d'une histoire
    $sql = $bdd->prepare('INSERT INTO reading(id_user, id_cover, id_chapter, id_choice, nb_lives) VALUES (?, ?, 1, 0, ?)');
    $sql->execute(array($_SESSION['id'], $cover, $nbLives));
}

function getReadingProgress($cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM reading WHERE id_user=? AND id_cover=?');
    $sql->execute(array($_SESSION['id'], $cover));
    $sql->fetchAll();
    $chapter = 1;
    foreach ($sql as $ligne) {
        if ($ligne['id_chapter'] > $chapter) {
            $chapter = $ligne['id_chapter'];
        }
    }
    return $chapter;
}

function getChapterContent($id_cover, $id_chapter)
{
    $bdd = connectDb();
    $chapter = $bdd->prepare('SELECT * FROM chapter WHERE id_cover=? AND id_chapter=?');
    $chapter->execute(array($id_cover, $id_chapter));
    if ($chapter->rowCount() == 1) return $chapter->fetch();
    else throw new Exception("Aucun chapitre ne correspond à l'identifiant '$id_chapter'");
}
