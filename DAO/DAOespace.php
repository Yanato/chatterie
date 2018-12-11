<?php
require_once MODELE_ESPACE;

class DAOespace{

  public static function getListeEspace()
  {
      $listeEspace = [];
      global $connexion;
      $sql = "SELECT * FROM espace";
      $requete = $connexion->prepare($sql);
      $requete->execute();

      while($enregistrementEspace = $requete->fetch(PDO::FETCH_ASSOC))
      {
          $listeEspace[] = new Espace(
              $enregistrementEspace["idEspace"],
              $enregistrementEspace["nom"],
              $enregistrementEspace["capacite"],
              $enregistrementEspace["color"]);
      }

      return $listeEspace;
  }

  public static function supprimerEspace($id)
  {
      try {
          $id_espace = filter_var($id, FILTER_VALIDATE_INT);


          if(is_numeric($id_espace))
          {
              $sql = "DELETE FROM `espace` WHERE idEspace = :id_espace";
              global $connexion;
              $requete = $connexion->prepare($sql);
              $requete->bindParam(':id_espace', $id_espace, PDO::PARAM_INT);
              $requete->execute();
          }
          $codeRetourHTTP = 200; // Code requête Ok (même si retour vide)
      } catch (PDOException $e) {
          die("Probleme avec la requete : $sql");
      }
  }

  public static function ajouterEspace($espace)
  {
      $sql = "INSERT INTO espace(idEspace, nom, capacite, color)
  VALUES (:id, :nom, :capacite, :color)";
      global $connexion;
      $requete = $connexion->prepare($sql);

      $id = $espace->getId();
      $nom = $espace->getNom();
      $capa = $espace->getCapacite();
      $color = $espace->getColor();

      $requete->bindParam(':id', $id, PDO::PARAM_INT);
      $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
      $requete->bindParam(':capacite',$capa , PDO::PARAM_INT);
      $requete->bindParam(':color',$color , PDO::PARAM_STR);
      try {
          $requete->execute();
      } catch (PDOException $e) {

          echo($e);
          die("...");
      }

  }

  public static function modifierEspace($espace)
{
    $idEspace = filter_var($espace->getId(), FILTER_VALIDATE_INT);
    $nom = $espace->getNom();
    $capa = filter_var($espace->getCapacite());
    $color = $espace->getColor();


    if(is_numeric($idEspace))
    {
        $sql = "UPDATE espace SET nom=:nom, capacite=:capacite, color=:color
  WHERE idEspace = :id";
        global $connexion;
        $requete = $connexion->prepare($sql);
        $requete->bindParam(':id', $idEspace, PDO::PARAM_INT);
        $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requete->bindParam(':capacite', $capa, PDO::PARAM_INT);
        $requete->bindParam(':color', $color, PDO::PARAM_STR);

        try {
            $requete->execute();
        } catch (PDOException $e) {

            echo($e);
            die("...");
        }

    }

}
}
