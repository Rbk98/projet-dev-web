<?php

function listBooks(){
    $books = getBestBooks();

    require('../view/home.php');
}

function createUser(){
    $user = createUser();

    require('../view/registration.php');
}

