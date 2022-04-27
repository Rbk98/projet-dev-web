<?php
require('connect.php');

function getBestBooks()
{
    $bdd = connectDb();
    $req = $bdd->query('SELECT * FROM Book ORDER BY nb_reading DESC LIMIT 4');

    return $req;
}
