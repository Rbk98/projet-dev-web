<?php
function connectDb()
{

    try {
        //Local deployment
        $server = "localhost";
        $username = "projetS2";
        $password = "amr2022";
        $db = "bookproject";
        $bdd = new PDO('mysql:host=localhost:3308;dbname=bookproject;charset=utf8', 'projetS2', 'amr2022');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}