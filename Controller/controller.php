<?php
session_start();

require_once('Model/userModel.php');
require_once('Model/bookModel.php');

function homeBooks()
{
    $bestBooks = getBestBooks();
    $books = getAllBooks();

    require('view/home.php');
}

function search()
{
    if (isset($_POST['genre'])) {
        $genre = $_POST['genre'];
        $bookGenre = getBookGenre($genre);
    }
    require('view/search.php');
}

function readStory($idBook)
{
    $book = getBook($idBook);
    require('view/read_story.php');
}

function createUser()
{

    if (isset($_POST['nickname']) && isset($_POST['birth_date']) && isset($_POST['password']) && isset($_POST['mail'])) {
        $nickname = $_POST['nickname'];
        if (verifNickname($nickname)) {
            $birth = $_POST['birth_date'];
            $mdp = $_POST['password'];
            $mail = $_POST['mail'];
            $newUser = insertUser($nickname, $birth, $mdp, $mail);
            if ($newUser) {
                $user = loginUser($nickname, $mdp);
                if ($user) {
                    $_SESSION['id'] = $user['id_user'];
                    $_SESSION['nickname'] = $user['nickname'];
                    $_SESSION['role'] = $user['role'];
                    header('Location: index.php');
                }
            }
        } else {
            $error = "Le surnom existe déjà. Veuillez en choisir un nouveau";
        }
    }
    require('view/registration.php');
}

function connectUser()
{
    if (isset($_POST['nickname']) && isset($_POST['password'])) {
        $nickname = $_POST['nickname'];
        $mdp = $_POST['password'];
        $user = loginUser($nickname, $mdp);

        if ($user) {
            $_SESSION['id'] = $user['id_user'];
            $_SESSION['nickname'] = $user['nickname'];
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
        } else {
            $error = "Utilisateur ou mot de passe incorrect";
        }
    }
    require('view/login.php');
}

function updateUser()
{
    $user = getUser($_SESSION['id']);

    if (isset($_POST['birth_date']) && isset($_POST['password']) && isset($_POST['mail'])) {
        $birth = $_POST['birth_date'];
        $mdp = $_POST['password'];
        $mail = $_POST['mail'];
        $updateUser = changeUser($birth, $mdp, $mail, $_SESSION['id']);
        if ($updateUser) {
            header('Location: index.php?action=mon-compte');
        }
    }
    require('view/update_account.php');

}

function indexUser()
{
    $user = getUser($_SESSION['id']);

    require('view/my_account.php');
}

function indexCreations()
{
    $startedBooks = getStartedCreation();
    $finishedBooks = getFinishedCreation();
    require('view/my_creations.php');
}

function storyStat($idBook)
{
    $book = getBook($idBook);
    require('view/story_statistics.php');
}


function createCover()
{
    if (isset($_POST['title']) && isset($_POST['resume']) && isset($_POST['genre']) && isset($_POST['nb_lives']) && isset($_POST['nb_chapters_max'])) {
        $title = $_POST['title'];
        $resume = $_POST['resume'];
        $genre = $_POST['genre'];
        $nb_lives = $_POST['nb_lives'];
        $nb_chapters_max = $_POST['nb_chapters_max'];
        $newCover = insertCover($title, $resume, $genre, $nb_lives, $nb_chapters_max);
        if ($newCover) {
            header('Location: index.php?action=mes-creations');
        }

    }
    require('view/create_story.php');
}

function readCover($id_cover)
{
    $cover = getCover($id_cover);
    require('view/cover_page.php');
}

function updateCover($id_cover)
{
    $cover = getCover($id_cover);
    if (isset($_POST['title']) && isset($_POST['summary']) && isset($_POST['genre']) && isset($_POST['nb_lives']) && isset($_POST['nb_chapters_max'])) {
        $title = $_POST['title'];
        $summary = $_POST['summary'];
        $genre = $_POST['genre'];
        $nb_lives = $_POST['nb_lives'];
        $nb_chapters_max = $_POST['nb_chapters_max'];
        $updateCover = changeCover($title, $summary, $genre, $nb_lives, $nb_chapters_max, $id_cover);
        if ($updateCover) {
            header('Location: index.php?action=afficher-livre&id='.$id_cover);
        }
    }
    require('view/update_cover.php');
}

function createChapter()
{
    require('view/create_chapter.php');
}

function chapterPage()
{
    require('view/chapter_page.php');
}

function indexReadings()
{
    $startedReadings = getStartedReading();
    $finishedReadings = getFinishedReading();
    require('view/my_readings.php');
}
