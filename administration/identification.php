<?php
include "recurent/entete.php";

if (!empty($_POST)) {
    $confirmAuth = false;
    global $connexion;
    $sql = "SELECT * FROM acces";
    $requete = $connexion->prepare($sql);
    $requete->execute();
    $requete->setFetchMode(PDO::FETCH_ASSOC) ;

    foreach ($requete as $ligne) {
        if (($_POST["username"] === $ligne['identifiant']) && ($_POST["password"] === $ligne['password'])) {
            $confirmAuth = true;
            session_start();
            // Set session variables
            $_SESSION["login"] = $ligne['identifiant'];
            $_SESSION["pass"] = $ligne['password'];
            $_SESSION["connecte"] = true;
            break;
        }
        // on affiche les informations de l'enregistrement en cours
    }
    if ($confirmAuth) {
    //  header('Location: /chatterie/administration/agenda.php');
      header('Location: /administration/agenda.php');
    } else {
        header('Location: /administration/index.php');
        echo "erreur de connexion";
        exit();
    }
}
