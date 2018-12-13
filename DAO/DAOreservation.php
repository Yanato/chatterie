<?php
require_once MODELE_RESERVATION;

class DAOreservation
{
    public static function ajouterResa($reservation)
    {
        $sql = "INSERT INTO reservation(idResa, nom, mail, phone, nbrChat,	dateDeb, dateFin, conditions)
  VALUES (:idResa, :nom, :mail, :phone, :nbrChat,	:dateDeb, :dateFin, :conditions)";
        global $connexion;
        $requete = $connexion->prepare($sql);

        $idResa = $reservation->getId();
        $resName = $reservation->getNom();
        $resMail = $reservation->getMail();
        $resPhone= $reservation->getPhone();
        $resNbrChat= $reservation->getNbrChat();
        $resDateDeb= $reservation->getDateDeb();
        $resDateFin = $reservation->getDateFin();
        $resConditions = $reservation->getConditions();

        $requete->bindParam(':idResa', $idResa, PDO::PARAM_INT);
        $requete->bindParam(':nom', $resName, PDO::PARAM_STR);
        $requete->bindParam(':mail', $resMail, PDO::PARAM_STR);
        $requete->bindParam(':phone', $resPhone, PDO::PARAM_INT);
        $requete->bindParam(':nbrChat', $resNbrChat, PDO::PARAM_INT);
        $requete->bindParam(':dateDeb', $resDateDeb, PDO::PARAM_STR);
        $requete->bindParam(':dateFin', $resDateFin, PDO::PARAM_STR);
        $requete->bindParam(':conditions', $resConditions, PDO::PARAM_STR);
        try {
            $requete->execute();
        } catch (PDOException $e) {
            echo($e);
            die("...");
        }
    }
}
