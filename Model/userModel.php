<?php

function getUser($nickname){
    $bdd = connectDb();

    $sql = "SELECT * FROM User WHERE nickname= ?";
    $user = $bdd->prepare($sql);
    $user->execute([$nickname]);

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
        //TODO: Utiliser la fonction verifpassword pour le décodage
        $sql = "SELECT * FROM user WHERE nickname=?";
        if (isset($bdd)) {
            $response = $bdd->prepare($sql);
            $values = array($nickname);
        }
        $response->execute($values);
        $user = $response->fetch();
        if(verifPassword($mdp,$user['password'])){
            return $user;
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
