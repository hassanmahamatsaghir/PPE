<?php
session_start();// Démarre la session pour vérifier si l'utilisateur est connecté
include 'bdd/bdd.php'; 



include "view/commun/header.php";

// Système de routage
$page = isset($_GET["page"]) ? $_GET["page"] : "accueil";


// Pages accessibles sans connexion
$pages_libres = ["accueil", "login", "register", "registerAction", "loginAction"];

// Vérification : Rediriger vers la page de connexion si non connecté
if (!isset($_SESSION['user_id']) && !in_array($page, $pages_libres)) {
    header("Location: index.php?page=login");
    exit();
}

switch ($page) {
    case "accueil":
        include "view/accueil.php";
        break;

    case "fiche_metier":
        include "view/fiche_Metier.php";
        break;

    case "interview":
        include "view/interview.php";
        break;

    case "domaines":
        include "view/domaines.php";
        break;
    case "login":
        include "view/login.php";
        break;
    case "register":
        include "view/register.php";
        break;
    case "loginAction":
        include "view/loginAction.php";
        break;
    case "registerAction":
            include "view/registerAction.php";
            break;
    default:
        include "view/accueil.php"; 
        break;
}

// Inclusion du footer
include "view/commun/footer.php";
?>