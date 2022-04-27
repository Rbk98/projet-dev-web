<?php

function insertUser($nickname, $birth, $mdp, $mail)
{
    $bdd = connectDb();

    $pass = password_hash($mdp, PASSWORD_DEFAULT);
    return $bdd->query("INSERT INTO User(nickname, birth, password, mail) VALUES ('$nickname', '$birth', '$pass', '$mail') ");
}

function loginUser($nickname, $mdp)
{
    $bdd = connectDb();

    if (($nickname != "") && ($mdp != "")) {
        $sql = "SELECT * FROM user WHERE nickname='$nickname' AND password='$mdp'";
        if (isset($bdd)) {
            $response = $bdd->prepare($sql);
        }
        $response->execute();
        $user = $response->fetch();
    }

    return $user;
}

function logoutUser()
{
    if (isset($_SESSION['nickname'])) {
        session_destroy();
    }
    header('Location: index.php');
}


function verifPassword($nickname, $mdp)
{
    $bdd = connectDb();
    $req = $bdd->query("SELECT password FROM User WHERE nickname = '$nickname'");
    $req->execute();
    $result = $req->fetch();

    $isPasswordCorrect = password_verify($mdp, $req['password']);
    return ($isPasswordCorrect != null);

}
