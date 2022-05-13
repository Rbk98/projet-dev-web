<?php

function connectDb()
{
    /*Local deployment*/
    $server = "localhost";
    $username = "projetS2";
    $password = "amr2022";
    $db = "bookproject";

    /*ZZZ deployment
    $server = "localhost";
    $username = "rgrenet";
    $password = "22BdxS2!rbk";
    $db = "rgrenet";*/

    $bdd = new PDO(
        'mysql:host=' . $server . ':3308;dbname=' . $db . ';charset=utf8',
        $username,
        $password,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );

    return $bdd;
}
