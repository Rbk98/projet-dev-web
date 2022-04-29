<?php
session_start();

require_once('Model/userModel.php');
require_once('Model/bookModel.php');

function homeBooks()
{
    $books = getBestBooks();

    require('view/home.php');
}

function search()
{
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
        $birth = $_POST['birth_date'];
        $mdp = $_POST['password'];
        $mail = $_POST['mail'];
        $newUser = insertUser($nickname, $birth, $mdp, $mail);
        if ($newUser) {
            //TODO: Message votre compte a été créé
            header('Location: index.php');
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
            $_SESSION['nickname'] = $user['nickname'];
            $_SESSION['role'] = $user['role'];
            header('Location: index.php');
        }
    }
    require('view/login.php');
}

function updateUser()
{

}

function indexUser()
{
    $user = getUser($_SESSION['nickname']);
    require('view/my_account.php');
}

function creations()
{
    require('view/my_creations.php');
}

function stat_histoire()
{
    require('view/story_statistics.php');
}