<?php
require_once MODELE_RESERVATION;

class DAOreservation
{
    public static function ajouterResa($reservation)
    {
        $sql = "INSERT INTO reservation(idResa, nom, mail, phone, nbrChat,	dateDeb, dateFin, conditions, statut)
  VALUES (:idResa, :nom, :mail, :phone, :nbrChat,	:dateDeb, :dateFin, :conditions, :statut)";
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
        $statut = $reservation->getStatut();

        $requete->bindParam(':idResa', $idResa, PDO::PARAM_INT);
        $requete->bindParam(':nom', $resName, PDO::PARAM_STR);
        $requete->bindParam(':mail', $resMail, PDO::PARAM_STR);
        $requete->bindParam(':phone', $resPhone, PDO::PARAM_INT);
        $requete->bindParam(':nbrChat', $resNbrChat, PDO::PARAM_INT);
        $requete->bindParam(':dateDeb', $resDateDeb, PDO::PARAM_STR);
        $requete->bindParam(':dateFin', $resDateFin, PDO::PARAM_STR);
        $requete->bindParam(':conditions', $resConditions, PDO::PARAM_STR);
        $requete->bindParam(':statut', $statut, PDO::PARAM_STR);
        try {
            $requete->execute();
        } catch (PDOException $e) {
            echo($e);
            die("...");
        }
    }

    public static function getListeReservation()
    {
        $listeReservation = [];
        global $connexion;
        $sql = "SELECT * FROM reservation";
        $requete = $connexion->prepare($sql);
        $requete->execute();

        while($enregistrementReservation = $requete->fetch(PDO::FETCH_ASSOC))
        {
            $listeReservation[] = new Reservation(
                $enregistrementReservation["idResa"],
                $enregistrementReservation["nom"],
                $enregistrementReservation["mail"],
                $enregistrementReservation["phone"],
                $enregistrementReservation["nbrChat"],
                $enregistrementReservation["dateDeb"],
                $enregistrementReservation["dateFin"],
                $enregistrementReservation["conditions"],
                $enregistrementReservation["statut"]);
        }

        return $listeReservation;
    }

    public static function getListeReservationConfirmed()
    {
        $listeReservation = [];
        global $connexion;
        $sql = "SELECT * FROM reservation";
        $requete = $connexion->prepare($sql);
        $requete->execute();

        while($enregistrementReservation = $requete->fetch(PDO::FETCH_ASSOC))
        {
            $listeReservation[] = new Reservation(
                $enregistrementReservation["idResa"],
                $enregistrementReservation["nom"],
                $enregistrementReservation["mail"],
                $enregistrementReservation["phone"],
                $enregistrementReservation["nbrChat"],
                $enregistrementReservation["dateDeb"],
                $enregistrementReservation["dateFin"],
                $enregistrementReservation["conditions"]);
        }

        return $listeReservation;
    }


    public static function modifierReservation($reservation)
  {
      $idResa = filter_var($reservation->getId(), FILTER_VALIDATE_INT);
      $nom = $reservation->getNom();
      $mail = $reservation->getMail();
      $phone = $reservation->getPhone();
      $nbrChat = $reservation->getNbrChat();
      $dateDeb = $reservation->getDateDeb();
      $dateFin = $reservation->getDateFin();
      $conditions = $reservation->getConditions();
      $statut = $reservation->getStatut();

      if(is_numeric($idResa))
      {
          $sql = "UPDATE reservation SET nom=:nom, mail=:mail, phone=:phone, nbrChat=:nbrChat, dateDeb=:dateDeb, dateFin=:dateFin, conditions=:conditions, statut=:statut
              WHERE idResa = :id";
          global $connexion;
          $requete = $connexion->prepare($sql);
          $requete->bindParam(':id', $idResa, PDO::PARAM_INT);
          $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
          $requete->bindParam(':mail', $mail, PDO::PARAM_STR);
          $requete->bindParam(':phone', $phone, PDO::PARAM_INT);
          $requete->bindParam(':nbrChat', $nbrChat, PDO::PARAM_INT);
          $requete->bindParam(':dateDeb', $dateDeb, PDO::PARAM_STR);
          $requete->bindParam(':dateFin', $dateFin, PDO::PARAM_STR);
          $requete->bindParam(':conditions', $conditions, PDO::PARAM_STR);
          $requete->bindParam(':statut', $statut, PDO::PARAM_STR);

          try {
              $requete->execute();
          } catch (PDOException $e) {

              echo($e);
              die("...");
          }

      }

  }
  public static function supprimerReservation($id)
  {
      try {
          $id_resa = filter_var($id, FILTER_VALIDATE_INT);


          if(is_numeric($id_resa))
          {
              $sql = "DELETE FROM `reservation` WHERE idResa = :id_resa";
              global $connexion;
              $requete = $connexion->prepare($sql);
              $requete->bindParam(':id_resa', $id_resa, PDO::PARAM_INT);
              $requete->execute();
          }
          $codeRetourHTTP = 200; // Code requête Ok (même si retour vide)
      } catch (PDOException $e) {
          die("Probleme avec la requete : $sql");
      }
  }

  public static function updateArchive($ok){
    try {
      $todayDate = date("Y-m-d");




      $listeReservation = [];
      global $connexion;
      $sql = "SELECT * FROM reservation";
      $requete = $connexion->prepare($sql);
      $requete->execute();

      while($enregistrementReservation = $requete->fetch(PDO::FETCH_ASSOC))
      {
        if($enregistrementReservation["dateFin"] < $todayDate){
          echo"ok";
        }

      }

      return $listeReservation;

        $codeRetourHTTP = 200; // Code requête Ok (même si retour vide)
    } catch (PDOException $e) {
        die("Probleme avec la requete : $sql");
    }
  }

}
