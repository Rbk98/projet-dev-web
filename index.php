<?php
//Correspond au controleur frontal qui joue le rôle de routeur : appelle les bonnes pages
require('Controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'accueil') {
        homeBooks();
    } else if ($_GET['action'] == 'creer-compte') {
        createUser();
    } else if ($_GET['action'] == 'rechercher') {
        search();
    } else if ($_GET['action'] == 'connexion') {
        connectUser();
    } else if ($_GET['action'] == 'mon-compte') {
        indexUser();
    } else if ($_GET['action'] == 'deconnexion') {
        logoutUser();
    } else if ($_GET['action'] == 'lire-histoire') {
        if (isset($_GET['id'])) {
            $idBook = intval($_GET['id']);
            if ($idBook != 0) {
                readStory($idBook);
            }
        }
    } else if ($_GET['action'] == 'mes-creations') {
        indexCreations();

        //action à modifier une fois qu'on aura l'accès avec l'histoire en question
    } else if ($_GET['action'] == 'info-histoire') {
        storyStat();
    } else if ($_GET['action'] == 'creer-histoire') {
        createCover();
    } else if ($_GET['action'] == 'page-livre') {
        bookPage();
    } else if ($_GET['action'] == 'creer-chapitre') {
        createChapter();
    } else if ($_GET['action'] == 'page-chapitre') {
        chapterPage();
    }else if ($_GET['action'] == 'mes-lectures'){
        indexReadings();
    }
}
} else {
    homeBooks();
}