<?php

function getUser($id_user){
    $bdd = connectDb();

    $sql = "SELECT * FROM User WHERE id_user= ? LIMIT 1";
    $user = $bdd->prepare($sql);
    $user->execute([$id_user]);

    return $user->fetch();
}

function insertUser($nickname, $birth, $mdp, $mail)
{
    $bdd = connectDb();

    $passHash = password_hash($mdp, PASSWORD_DEFAULT);
    $sql = "INSERT INTO User(nickname, birth, password, mail, role, nb_reading) VALUES (?,?,?,?, 0, 0) ";
    $newUser = $bdd->prepare($sql);

    return $newUser->execute([$nickname,$birth,$passHash,$mail]);
}

function loginUser($nickname, $mdp)
{
    $bdd = connectDb();

    if (($nickname != "") && ($mdp != "")) {
        $sql = "SELECT * FROM user WHERE nickname=?";
        if (isset($bdd)) {
            $response = $bdd->prepare($sql);
            $value = array($nickname);
        }
        $response->execute($value);
        $user = $response->fetch();
        if($user){
            if(verifPassword($mdp,$user['password'])){
                return $user;
            }
        }
    }
}

function logoutUser()
{
    if (isset($_SESSION['nickname'])) {
        session_destroy();
    }
    header('Location: index.php');
}


function verifPassword($mdp, $mdpHash)
{
    $isPasswordCorrect = password_verify($mdp, $mdpHash);
    return ($isPasswordCorrect != null);
}

function verifNickname($nickname){
    $bdd = connectDb();
    $sql = "SELECT * FROM user WHERE nickname=?";
    if (isset($bdd)) {
        $response = $bdd->prepare($sql);
        $value = array($nickname);
    }
    $response->execute($value);
    $isNickameCorrect = $response->fetch();

    return ($isNickameCorrect == null);
}