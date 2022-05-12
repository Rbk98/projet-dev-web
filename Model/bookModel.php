<?php
require('connect.php');

const COVER_PUBLISHED = 2; // Correspond à la valeur du statut si le livre a été publié
const COVER_FINISHED = 1; // Correspond à la valeur du statut si le livre a été configuré mais non publié
const COVER_STARTED = 0; // Correspond à la valeur du statut si le livre n'a pas encore été configuré

function getBestBooks()
{
    $bdd = connectDb();
    $bestBooks = $bdd->prepare('SELECT * FROM cover WHERE status=? ORDER BY nb_reading DESC LIMIT 4');
    $bestBooks->execute(array(COVER_PUBLISHED));

    return $bestBooks->fetchAll();
}

function getBook($idBook)
{
    $bdd = connectDb();
    $book = $bdd->prepare("SELECT * FROM cover WHERE id_cover =?");
    $book->execute(array($idBook));
    if ($book->rowCount() == 1)
        return $book->fetch();
    else
        throw new Exception("Aucun livre ne correspond à l'identifiant '$idBook'");
}

function getAllBooks()
{
    $bdd = connectDb();
    $sql = $bdd->prepare("SELECT * FROM cover WHERE status=?");
    $sql->execute(array(COVER_PUBLISHED));
    $books = $sql->fetchAll();

    return $books;
}

function getStartedCreation()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND status=?');
    $sql->execute(array($_SESSION['id'], COVER_STARTED));
    $startedBooks = $sql->fetchAll();

    return $startedBooks;
}

function getFinishedCreation()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND (status=? OR status=?)');
    $sql->execute(array($_SESSION['id'], COVER_PUBLISHED, COVER_FINISHED));
    $finishedBooks = $sql->fetchAll();

    return $finishedBooks;
}

function getPublishedCreation()
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE writer=? AND status=?');
    $sql->execute(array($_SESSION['id'], COVER_PUBLISHED));
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
    $sql = $bdd->prepare('SELECT DISTINCT id_cover FROM reading WHERE id_user=? AND id_cover NOT IN (SELECT id_cover FROM reading WHERE status=0) AND status=1');
    $sql->execute(array($_SESSION['id']));
    $finishedReadings = $sql->fetchAll();

    return $finishedReadings;
}

function getBookGenre($genre)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE genre=? AND status=?');
    $sql->execute(array($genre, COVER_PUBLISHED));
    $books = $sql->fetchAll();
    return $books;
}

function insertCover($title, $resume, $genre, $nb_lives, $nb_chapters)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('INSERT INTO cover(title, summary,genre,writer,date,nb_lives,nb_chapters_max,nb_win, nb_reading, status) VALUES (?,?,?,?,?,?,?,0,0,0) ');
    $date = date('Y-m-d');
    $sql->execute([$title, $resume, $genre, $_SESSION['id'], $date, $nb_lives, $nb_chapters]);
    $idNewCover = $bdd->lastInsertId();

    return $idNewCover;
}

///CHAPTER
function insertChapter($idCover, $title, $content, $nb_choices)
{
    $bdd = connectDb();
    $id_next_chapter = getLastChapterId($idCover) + 1;
    $sql = $bdd->prepare('INSERT INTO chapter(id_chapter, id_cover,title,content,nb_choices) VALUES (?,?,?,?,?) ');
    $sql->execute([$id_next_chapter, $idCover, $title, $content, $nb_choices]);
    $idNewChapter = $bdd->lastInsertId();

    return $idNewChapter;
}

function changeChapter($id_chapter, $id_cover, $title, $content, $nb_choices)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('UPDATE chapter SET title=?, content=?, nb_choices=? WHERE id_cover=? AND id_chapter=?');

    return $sql->execute([$title, $content, $nb_choices, $id_cover, $id_chapter]);
}

function getLastChapterId($id_cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare("SELECT MAX(id_chapter) AS nbMax FROM chapter WHERE id_cover=?");
    $sql->execute([$id_cover]);
    $nbChapter = $sql->fetchColumn();
    if ($nbChapter) {
        if ($nbChapter != 0) {
            return $nbChapter;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

function getChapter($idCover, $idChap)
{
    $bdd = connectDb();
    $sql = $bdd->prepare("SELECT * FROM chapter WHERE id_cover =? AND id_chapter=?");
    $sql->execute(array($idCover, $idChap));
    $chapter = $sql->fetch();
    return $chapter;
}

function getAllChapters($idCover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare("SELECT * FROM chapter WHERE id_cover=?");
    $sql->execute([$idCover]);
    $chapters = $sql->fetchAll();

    return $chapters;
}


///CHOICES

function insertChoice($idNextChapter, $idChap, $idCover, $title, $unsafe, $endCover)
{
    $bdd = connectDb();
    $idNextChoice = getLastChoiceId($idCover, $idChap) + 1;

    $sql = $bdd->prepare('INSERT INTO choice(id_choice,id_next_chapter,id_current_chapter,id_cover,title,unsafe, end_cover) VALUES (?,?,?,?,?,?,?)');
    $sql->execute([$idNextChoice, $idNextChapter, $idChap, $idCover, $title, $unsafe, $endCover]);
    $idNewChoice = $bdd->lastInsertId();

    return $idNewChoice;
}

function getLastChoiceId($idCover, $idChap)
{
    $bdd = connectDb();
    $sql = $bdd->prepare("SELECT MAX(id_choice) AS nbMax FROM choice WHERE id_cover=? AND id_current_chapter=?");
    $sql->execute([$idCover, $idChap]);
    $nbChoice = $sql->fetchColumn();

    if ($nbChoice > 0) {
        return $nbChoice;
    } else {
        return 0;
    }
}

function getChoice($id_cover, $id_chapter, $id_choice)
{
    $bdd = connectDb();
    $sql = $bdd->prepare("SELECT * FROM choice WHERE id_cover =? AND id_current_chapter=? AND id_choice=?");
    $sql->execute(array($id_cover, $id_chapter, $id_choice));
    $choice = $sql->fetch();
    return $choice;
}

function getAllChoices($idCover, $idChapter)
{
    $bdd = connectDb();
    $sql = $bdd->prepare("SELECT * FROM choice WHERE id_current_chapter=? AND id_cover=?");
    $sql->execute(array($idChapter, $idCover));
    $choices = $sql->fetchAll();

    return $choices;
}

function changeChoice($id_choice, $id_next_chapter, $id_chapter, $id_cover, $title, $unsafe, $end_cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('UPDATE choice SET id_next_chapter=?, title=?, unsafe=?, end_cover=? WHERE id_cover=? AND id_current_chapter=? AND id_choice=?');

    $sql->execute([$id_next_chapter, $title, $unsafe, $end_cover, $id_cover, $id_chapter, $id_choice]);
}

function getCover($id_cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM cover WHERE id_cover=?');
    $sql->execute([$id_cover]);
    $cover = $sql->fetch();

    return $cover;
}

function changeCover($title, $summary, $genre, $nb_lives, $nb_chapters_max, $id_cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('UPDATE cover SET title=?, summary=?, genre=?, nb_chapters_max=?, nb_lives=? WHERE id_cover=?');
    return $sql->execute([$title, $summary, $genre, $nb_chapters_max, $nb_lives, $id_cover]);
}


function removeCover($id_cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('DELETE FROM cover WHERE id_cover=?');

    return $sql->execute([$id_cover]);
}

function updateNumberReadingCover($idCover)
{
    $bdd = connectDb();
    $query = $bdd->prepare('SELECT nb_reading FROM cover WHERE id_cover=?');
    $nbReadings = $query->execute(array($idCover));
    $nbReadings += 1;
    $sql = $bdd->prepare('UPDATE cover SET nb_reading=? WHERE id_cover=?');
    return $sql->execute(array($nbReadings, $idCover));
}

function updateWinsNumber($idCover)
{
    $bdd = connectDb();
    $query = $bdd->prepare('SELECT nb_win FROM cover WHERE id_cover=?');
    $query->execute(array($idCover));
    $nbWins = $query->fetch()['nb_win'];
    $nbWins += 1;
    $sql = $bdd->prepare('UPDATE cover SET nb_win=? WHERE id_cover=?');
    $sql->execute(array($nbWins, $idCover));
    return $sql->fetch();
}

function removeChapter($idCover, $idChapter)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('DELETE FROM chapter WHERE id_chapter=? AND id_cover=?');

    return $sql->execute([$idChapter, $idCover]);
}

function removeChoice($idCover, $idChapter, $idChoice)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('DELETE FROM choice WHERE id_choice=? AND id_current_chapter=? AND id_cover=?');

    return $sql->execute([$idChoice, $idChapter, $idCover]);
}


function startStory($cover)
{
    $bdd = connectDb();
    //récupération du nombre de vie au début de l'histoire
    $query = $bdd->prepare('SELECT nb_lives FROM cover WHERE id_cover=?');
    $query->execute(array($cover));
    $nbLives = $query->fetchColumn();
    $nbLives = intval($nbLives);
    //insertion dans la bdd du commencement d'une histoire
    $sql = $bdd->prepare('INSERT INTO reading(id_user, id_cover, id_chapter, id_choice, nb_lives) VALUES (?, ?, 1, 0, ?)');
    $sql->execute(array($_SESSION['id'], $cover, $nbLives));
}

function insertReadingStory($cover, $currentChapter, $choice)
{
    $bdd = connectDb();
    $previousChapter = getReadingProgress($cover);
    $previousChoice = getLastChoiceReading($cover);
    $nbLives = getRemainingLives($cover, $previousChapter, $previousChoice);

    if (choiceSafe($cover, $currentChapter, $previousChapter, $choice) == 1) {
        $nbLives = $nbLives - 1;
    }
    $sql = $bdd->prepare('INSERT INTO reading(id_user, id_cover, id_chapter, id_choice, nb_lives) VALUES (?, ?, ?, ?, ?)');
    $sql->execute(array($_SESSION['id'], $cover, $currentChapter, $choice, $nbLives));
}

function getRemainingLives($cover, $chapter, $choice)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT nb_lives FROM reading WHERE id_cover=? AND id_chapter=? AND id_choice=? AND id_user=?');
    $sql->execute(array($cover, $chapter, $choice, $_SESSION['id']));
    $nbLives = $sql->fetchColumn();

    return $nbLives;
}


function getNextChapter($cover, $currentChapter, $choice)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT id_next_chapter FROM choice WHERE id_cover=? AND id_current_chapter=? AND id_choice=?');
    $sql->execute(array($cover, $currentChapter, $choice));
    return $sql->fetchColumn();
}

function choiceSafe($cover, $idCurrentchapter, $previousChapter, $idChoice)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT unsafe FROM choice WHERE id_cover=? AND id_next_chapter=? AND id_current_chapter=? AND id_choice=?');
    $sql->execute([$cover, $idCurrentchapter, $previousChapter, $idChoice]);

    return $sql->fetchColumn();
}


function getReadingProgress($cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT MAX(id_chapter) AS nbChapter FROM reading WHERE id_user=? AND id_cover=?');
    $sql->execute(array($_SESSION['id'], $cover));
    $maxChapter = $sql->fetchColumn();
    if ($maxChapter) {
        if ($maxChapter != 0) {
            return $maxChapter;
        } else {
            return 0;
        }
    } else {
        return 0;
    }
}

function getLastChoiceReading($cover)
{
    $bdd = connectDb();
    $chapter = getReadingProgress($cover);
    $sql = $bdd->prepare('SELECT id_choice FROM reading WHERE id_user=? AND id_cover=? AND id_chapter=?');
    $sql->execute(array($_SESSION['id'], $cover, $chapter));
    $result = $sql->fetchColumn();
    return $result;
}

function updateStatusReading($cover, $chapter)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('UPDATE reading SET status=1 WHERE id_user=? AND id_cover=? AND id_chapter=?');
    $sql->execute(array($_SESSION['id'], $cover, $chapter));
}

function deleteReadingStory($cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('DELETE FROM reading WHERE id_user=? AND id_cover=?');

    return $sql->execute(array($_SESSION['id'], $cover));
}


function getChoices($cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT c.id_choice, c.title FROM choice c INNER JOIN reading r ON (r.id_choice=c.id_choice AND r.id_chapter=c.id_next_chapter AND r.id_cover=c.id_cover) WHERE r.id_user=? AND r.id_cover=? AND r.id_choice<>0');
    $sql->execute(array($_SESSION['id'], $cover));
    $choiceNames = $sql->fetchAll();
    return $choiceNames;
}


function editCoverStatus($idCover, $status)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('UPDATE cover SET status=? WHERE id_cover=?');

    return $sql->execute([$status, $idCover]);
}
