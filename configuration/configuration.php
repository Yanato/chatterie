<?php
global $estEnAdministration;
$prefixCheminAdministration = "";
if ($estEnAdministration) {
    $prefixCheminAdministration = "../";
}

define("HOTE_BASE_DE_DONNEES", "localhost");
define("NOM_BASE_DE_DONNEES", "chatterie");
define("UTILISATEUR_BASE_DE_DONNEES", "root");
define("MOT_PASSE_BASE_DE_DONNEES", "");
define("PORT_BASE_DE_DONNEES", "3306");
define("SGBD", "mysql");


require_once $prefixCheminAdministration."DAO/ConnexionDB.php";
$connexion = ConnexionDB::connecter();

define("DAO_UTILISATEUR", $prefixCheminAdministration."DAO/DAOutilisateur.php");
define("DAO_CONTENU", $prefixCheminAdministration."DAO/DAOcontenu.php");
define("DAO_ESPACE", $prefixCheminAdministration."DAO/DAOespace.php");
define("DAO_RESERVATION", $prefixCheminAdministration."DAO/DAOreservation.php");

define("CONTROLEUR_ESPACE", $prefixCheminAdministration."controleur/controleurEspace.php");
define("CONTROLEUR_RESERVATION", $prefixCheminAdministration."controleur/controleurReservation.php");


define("MODELE_ESPACE", $prefixCheminAdministration."modele/Espace.class.php");
define("MODELE_CONTENU", $prefixCheminAdministration."modele/Contenu.class.php");
define("MODELE_RESERVATION", $prefixCheminAdministration."modele/Reservation.class.php");

define("TABLEAU_RESERVATION", $prefixCheminAdministration."administration/tableauResas.php");
