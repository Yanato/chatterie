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
define("DAO_ADMINISTRATEUR", $prefixCheminAdministration."DAO/DAOadministrateur.php");
