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
        if(verifNickname($nickname)){
            $birth = $_POST['birth_date'];
            $mdp = $_POST['password'];
            $mail = $_POST['mail'];
            $newUser = insertUser($nickname, $birth, $mdp, $mail);
            if ($newUser) {
                //TODO: Message votre compte a été créé
                //$message = 'Vous venez de créer votre compte ! Rendez-vous sur la page de connexion';
                header('Location: index.php');
            }
        }
        else{
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
        }
    }
    require('view/login.php');
}

function updateUser()
{

}

function indexUser()
{
    $user = getUser($_SESSION['id']);

    require('view/my_account.php');
}

function creations()
{
    require('view/my_creations.php');
}

function story_stat()
{
    require('view/story_statistics.php');
}