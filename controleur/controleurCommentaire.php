<?php

/**
 * Contrôleur Commentaire
 * @author Pierre
 */

require_once DAO_COMMENTAIRE;
require_once MODELE_COMMENTAIRE;

class controleurCommentaire {
    
    /**
     * Permet l'ajout d'un commentaire  saisi par un internaute depuis la page livredor.php
     * Le commentaire est ensuite ajouté en base, sera traité ensuite par l'administrateur
     * @pre POST à partir du formulaire
     */
    public static function ajouterCommentaire () {
        
        $idCom = 0;
        $prenomAuteur = $_POST['prenom'];
        $nomAuteur = $_POST['nom'];
        $mailAuteur = $_POST['email'];
        $message = $_POST['message'];
        $dateCom = date("Y-m-d");
        $afficher = 0;
        
        $commentaire = new Commentaire($idCom, $prenomAuteur, $nomAuteur, $mailAuteur, $message, $dateCom, $afficher);
        
        DAOcommentaire::insertCommentaire($commentaire);
        
        header('Location: livredor.php?message=ok'); 
    }
    
    /**
     * Supprime le commentaire en base à partir de l'espace administrateur
     * @pre GET à partir de l'espace administrateur
     */
    public static function deleteCommentaire() {
        
        $idCom = $_GET['delete'];
        DAOcommentaire::supprimerCommentaire($idCom);
        
        header('Location: moderation.php'); 
    }
    
    /**
     * Valide et affiche le commentaire
     * @pre GET à partir de l'espace administrateur
     */
    public static function afficherCommentaire() {
        
        $idCom = $_GET['edit'];
        DAOcommentaire::displayCommentaire($idCom, 1);
        
        header('Location: moderation.php');
    }
    
    /**
     * Cacher un commentaire
     * @pre GET à partir de l'espace administrateur
     */
    public static function cacherCommentaire() {
        
        $idCom = $_GET['hide'];
        DAOcommentaire::displayCommentaire($idCom, 0);
        
        header('Location: moderation.php');
    }
}
?>
