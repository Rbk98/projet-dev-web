<?php
//Correspond au controleur frontal qui joue le rôle de routeur : appelle les bonnes pages
require('Controller/HomeController.php');
require_once('Model/userModel.php');
require_once('Model/bookModel.php');
require_once('Controller/HomeController.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listBooks') {
        listBooks();
    }
    else if ($_GET['action'] == 'createUser') {
        createUser();
    }
}
else {
    listBooks();
}