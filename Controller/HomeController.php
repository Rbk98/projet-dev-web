<?php
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

function createUser()
{
    require('view/registration.php');

    /*
    if (isset($_POST['creation'])) {
        $nickname = $_POST['nickname'];
        $birth = $_POST['birth_date'];
        $mdp = $_POST['password'];
        $mail = $_POST['mail'];
        $user = insertUser($nickname, $birth, $mdp, $mail);
    }*/

}

function connectUser()
{
    require('view/login.php');
}

function updateUser()
{

}

function indexUser()
{
    require('view/my_account.php');
}

