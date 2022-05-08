<?php
//Correspond au controleur frontal qui joue le rôle de routeur : appelle les bonnes pages
require('Controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'accueil') {
        homeBooks();
    } else if ($_GET['action'] == 'creer-compte') {
        createUser();
    } else if ($_GET['action'] == 'modifier-son-compte') {
        if (isset($_SESSION['id'])) {
            updateUser();
        } else {
            accessDenied();
        }
    } else if ($_GET['action'] == 'rechercher') {
        search();
    } else if ($_GET['action'] == 'connexion') {
        connectUser();
    } else if ($_GET['action'] == 'mon-compte') {
        if (isset($_SESSION['id'])) {
            indexUser();
        } else {
            accessDenied();
        }
    } else if ($_GET['action'] == 'deconnexion') {
        logoutUser();
    } else if ($_GET['action'] == 'lire-histoire') {
        if (isset($_GET['id'])) {
            $idBook = intval($_GET['id']);
            if ($idBook != 0) {
                readStory($idBook);
            }
        } else {
            homeBooks();
        }
    } else if ($_GET['action'] == 'mes-creations') {
        if (isset($_SESSION['id']) && $_SESSION['role'] == 1) {
            indexCreations();
        } else {
            accessDenied();
        }

        //action à modifier une fois qu'on aura l'accès avec l'histoire en question
    } else if ($_GET['action'] == 'info-histoire') {
        if (isset($_GET['id'])) {
            $idBook = intval($_GET['id']);
            if ($idBook != 0) {
                storyStat($idBook);
            }
        } else {
            homeBooks();
        }
    } else if ($_GET['action'] == 'creer-histoire') {
        if (isset($_SESSION['id']) && $_SESSION['role'] == 1) {
            createCover();
        } else {
            accessDenied();
        }
    } else if ($_GET['action'] == 'afficher-livre') {
        if (isset($_GET['id'])) {
            $idCover = intval($_GET['id']);
            if ($idCover != 0) {
                readCover($idCover);
            }
        } else {
            homeBooks();
        }
    } else if ($_GET['action'] == 'modifier-livre') {
        if (isset($_GET['id'])) {
            $idCover = intval($_GET['id']);
            if ($idCover != 0) {
                updateCover($idCover);
            }
        } else {
            accessDenied();
        }
    } else if ($_GET['action'] == 'creer-chapitre') {
        if (isset($_SESSION['id']) && $_SESSION['role'] == 1) {
            createChapter();
        } else {
            accessDenied();
        }
    } else if ($_GET['action'] == 'page-chapitre') {
        if (isset($_SESSION['id']) && $_SESSION['role'] == 1) {
            chapterPage();
        } else {
            accessDenied();
        }
    } else if ($_GET['action'] == 'mes-lectures') {
        if (isset($_SESSION['id'])) {
            indexReadings();
        } else {
            accessDenied();
        }
    }
} else {
    homeBooks();
}