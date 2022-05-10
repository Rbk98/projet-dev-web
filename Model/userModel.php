<?php

function getUser($id_user)
{
    $bdd = connectDb();

    $sql = "SELECT * FROM user WHERE id_user= ? LIMIT 1";
    $user = $bdd->prepare($sql);
    $user->execute([$id_user]);

    return $user->fetch();
}

function insertUser($nickname, $birth, $mdp, $mail)
{
    $bdd = connectDb();

    $passHash = password_hash($mdp, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user(nickname, birth, password, mail, role, nb_reading) VALUES (?,?,?,?, 0, 0) ";
    $newUser = $bdd->prepare($sql);

    return $newUser->execute([$nickname, $birth, $passHash, $mail]);
}

function changeUser($birth, $mdp, $mail, $id)
{
    $bdd = connectDb();

    $passHash = password_hash($mdp, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET birth=?, password=?, mail=? WHERE id_user=? ";
    $updateUser = $bdd->prepare($sql);

    return $updateUser->execute([$birth, $passHash, $mail, $id]);
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
        if ($user) {
            if (verifPassword($mdp, $user['password'])) {
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

function verifNickname($nickname)
{
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

function userBookReading($id_user, $id_cover)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('SELECT * FROM reading WHERE id_user=? AND status=0 AND id_cover=?');
    $sql->execute([$id_user, $id_cover]);
    $startReading = $sql->fetch();
    return $startReading;
}

function userBookFinished($cover)
{
    $bdd = connectDb();
    $chapter = getReadingProgress($cover);
    //On regarde si le dernier chapitre enregistré a été lu (si c'est le cas c'est que l'histoire est finie)
    $sql = $bdd->prepare('SELECT * FROM reading WHERE id_user=? AND status=1 AND id_cover=? AND id_chapter=?');
    $sql->execute([$_SESSION['id'], $cover, $chapter]);
    $finishedReading = $sql->fetch();
    return $finishedReading;
}

function switchToAdmin($id_user)
{
    $bdd = connectDb();
    $sql = $bdd->prepare('UPDATE user SET role=1 WHERE id_user=?');
    $sql->execute([$id_user]);
}

function getNumberLives($cover)
{
    $bdd = connectDb();
    $chapter = getReadingProgress($cover);
    $sql = $bdd->prepare('SELECT nb_lives FROM reading WHERE id_user=? AND id_cover=? AND id_chapter=?');
    $sql->execute(array($_SESSION['id'], $cover, $chapter));
}
