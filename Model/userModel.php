<?php

require('connect.php');

function createUser()
{
    $nickname = $_POST['nickname'];
    $birth = $_POST['birth_date'];
    $mdp = $_POST['password'];
    $mail = $_POST['mail'];
    $pass = password_hash($mdp, PASSWORD_DEFAULT);
    $req = $bdd->query("INSERT INTO User(nickname, birth, password, mail) VALUES ('$nickname', '$birth', '$pass', '$mail') ");

    $bdd->close();

    return $req;
}
