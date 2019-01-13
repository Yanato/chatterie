<?php
require_once MODELE_COMMENTAIRE;

/**
 * DAO Commentaire
 * @author Pierre
 */

class DAOcommentaire {
     
    /**
     * Récupère tous les commentaires de la table Commentaire
     * @return array d'objets Commentaire
     */
    public static function getCommentaires() {
        $rArray = array();
        
        global $connexion;
        $sql = "SELECT * FROM Commentaire";
        $requete = $connexion->query($sql);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_ASSOC);
        
        // ajoute chaque ligne dans l'array
        foreach ($requete as $ligne) {
            $commentaire = new Commentaire($ligne['idCom'], $ligne['prenomAuteur'], $ligne['nomAuteur'], $ligne['mailAuteur'], $ligne['message'], $ligne['dateCom'], $ligne['afficher']);
            $rArray[] = $commentaire;
        }
        
        return $rArray;
    }
    
    /**
     * Récupère tous les commentaires affichables (afficher = 1) de la table Commentaire
     * @return array d'objets Commentaire
     */
    public static function getCommentairesAffichables() {
        $rArray = array();
        
        global $connexion;
        $sql = "SELECT * FROM Commentaire WHERE afficher = 1";
        $requete = $connexion->query($sql);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_ASSOC);
        
        // ajoute chaque ligne dans l'array
        foreach ($requete as $ligne) {
            $commentaire = new Commentaire($ligne['idCom'], $ligne['prenomAuteur'], $ligne['nomAuteur'], $ligne['mailAuteur'], $ligne['message'], $ligne['dateCom'], $ligne['afficher']);
            $rArray[] = $commentaire;
        }
        
        return $rArray;
    }
    
    /**
     * Retourne le nombre total de commentaires du livre d'or qui sont stockés en base
     * @return int, nombre total
     */
    public static function getNbCommentaires() {
          
        return count(getCommentaires());
    }
    
    /**
     * Récupère le commentaire correspondant à $idCom dans la table Commentaire
     * @return Commentaire $commentaire
     */
    public static function getCommentaireById($idCom) {
        
        global $connexion;
        $sql = "SELECT * FROM page WHERE id=".$idCom;
        $requete = $connexion->query($sql);
        $requete->execute();
        $requete->setFetchMode(PDO::FETCH_ASSOC) ;
        
        foreach ($requete as $ligne) {   
            $commentaire = new Commentaire($ligne['idCom'], $ligne['prenomAuteur'], $ligne['nomAuteur'], $ligne['mailAuteur'], $ligne['message'], $ligne['dateCom'], $ligne['afficher']);
        }
        
        return $commentaire;
    }
    
    
    /**
     * Conversion date format Mysql en date format Français
     * @param format Mysql $Date
     * @return string format FR
     */
    public function convertToDateFR($Date) {
        // extraction des 3 sous-chaines
        $jour = substr($Date,8,2);
        $mois = substr($Date,5,2);
        $annee = substr($Date,0,4);
        // renvoi de la concaténation de la date au format français
        return $jour.'/'.$mois.'/'.$annee;
    }
    
    /**
     * Ajoute un commentaire dans la table Commentaire
     * @param Commentaire $commentaire
     * @return boolean, résultat de l'opération
     */
    public static function insertCommentaire($commentaire) {
        
        $sql = "INSERT INTO commentaire(prenomAuteur, nomAuteur, mailAuteur, message, dateCom, afficher)
  VALUES (:prenomAuteur, :nomAuteur, :mailAuteur, :message,	:dateCom, :afficher)";
        global $connexion;
        $requete = $connexion->prepare($sql);
        
        //$idCom = $commentaire->getId();
        $prenomAuteur = $commentaire->getPrenomAuteur();
        $nomAuteur = $commentaire->getNomAuteur();
        $mailAuteur = $commentaire->getMailAuteur();
        $message = $commentaire->getMessage();
        $dateCom = $commentaire->getDateCom();
        $afficher = $commentaire->getAfficher();
        
        //$requete->bindParam(':idCom', $idCom, PDO::PARAM_INT);
        $requete->bindParam(':prenomAuteur', $prenomAuteur, PDO::PARAM_STR);
        $requete->bindParam(':nomAuteur', $nomAuteur, PDO::PARAM_STR);
        $requete->bindParam(':mailAuteur', $mailAuteur, PDO::PARAM_STR);
        $requete->bindParam(':message', $message, PDO::PARAM_STR);
        $requete->bindParam(':dateCom', $dateCom, PDO::PARAM_STR);
        $requete->bindParam(':afficher', $afficher, PDO::PARAM_INT);
        
        try {
            return $requete->execute();
        } catch (PDOException $e) {
            echo($e);
            die("...");
        }

    }
    
    /**
     * Supprime le commentaire de la table Commentaire avec son id
     * @param id du commentaire $idCom
     * @return boolean, résultat de l'opération
     */
    public static function supprimerCommentaire($idCom) {
 
        $sql = "DELETE FROM Commentaire WHERE idCom = :idCom";
        global $connexion;
        $requete = $connexion->prepare($sql);
               
        $requete->bindParam(':idCom', $idCom, PDO::PARAM_INT);
        
        try {
            return $requete->execute();
        } catch (PDOException $e) {
            echo($e);
            die("...");
        }
    }
    
    /**
     * Modifier l'affichage du commentaire en modifiant le paramètre "afficher"
     * 1 : afficher le commentaire, 0 : cacher le commentaire
     * @param id du commentaire $idCom, boolean $bool
     * @return boolean, résultat de l'opération
     */
    public static function displayCommentaire($idCom, $bool) {
        
        $sql = "UPDATE commentaire SET afficher = :bool WHERE idCom = :idCom";
        global $connexion;
        $requete = $connexion->prepare($sql);
           
        $requete->bindParam(':bool', $bool, PDO::PARAM_INT);
        $requete->bindParam(':idCom', $idCom, PDO::PARAM_INT);
        
        try {
            return $requete->execute();
        } catch (PDOException $e) {
            echo($e);
            die("...");
        }
    }
    
    /**
     * Modifier le commentaire de la table Commentaire avec son id
     * @param id du commentaire $idCom
     * @return boolean, résultat de l'opération
     */
    public static function modifierCommentaire($idCom, $newCom) {
        
    }
}