<?php
function connectDb(){

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=bookproject;charset=utf8', 'projetS2', 'amr2022');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    return $bdd;
}