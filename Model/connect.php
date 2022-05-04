<?php
function connectDb()
{
    try {
        //Local deployment
        $server = "localhost";
        $username = "projetS2";
        $password = "amr2022";
        $db = "bookproject";
        $bdd = new PDO('mysql:host='.$server.':3308;dbname='.$db.';charset=utf8', $username, $password);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}