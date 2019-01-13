<?php

/**
 * Classe Commentaire
 * @author Pierre
 */

class Commentaire
{
    private $idCom;
    private $prenomAuteur;
    private $nomAuteur;
    private $mailAuteur;
    private $message;
    private $dateCom;
    private $afficher;

    public function __construct($idCom, $prenomAuteur, $nomAuteur, $mailAuteur, $message, $dateCom, $afficher)
    {
        $this->idCom = $idCom;
        $this->prenomAuteur = $prenomAuteur;
        $this->nomAuteur = $nomAuteur;
        $this->mailAuteur = $mailAuteur;
        $this->message = $message;
        $this->dateCom = $dateCom;
        $this->afficher = $afficher;
    }

    //----------------------------------- Accesseurs ---------------------------------------------

    public function getId()
    {
        return $this->idCom;
    }
    
    public function getPrenomAuteur()
    {
        return $this->prenomAuteur;
    }
    
    public function getNomAuteur()
    {
        return $this->nomAuteur;
    }

    public function getMailAuteur()
    {
        return $this->mailAuteur;
    }

    public function getMessage()
    {
        return $this->message;
    }
    
    public function getDateCom()
    {
        return $this->dateCom;
    }

    public function getAfficher()
    {
        return $this->afficher;
    }
    
    //----------------------------------- Mutateurs ---------------------------------------------

    public function setId($idCom)
    {
        $this->idCom = $idCom;
    }
    
    public function setPrenomAuteur($prenomAuteur)
    {
        $this->prenomAuteur = $prenomAuteur;
    }
    
    public function setNomAuteur($nomAuteur)
    {
        $this->nomAuteur = $nomAuteur;
    }

    public function setMailAuteur($mailAuteur)
    {
        $this->mailAuteur = $mailAuteur;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    public function setDateCom($dateCom)
    {
        $this->dateCom = $dateCom;
    }

    public function setAfficher($afficher)
    {
        $this->afficher = $afficher;
    }
    
    public function estValide()
    {
      return empty($this->listeMessageErreurActif);
    }
        
    public function toString() 
    {
        
        $msg = "Message de : ".utf8_encode($this->prenomAuteur)." ".utf8_encode($this->nomAuteur)." <br/>";
        $msg .= "Publié le : ".$this->dateCom." <br/>";
        $msg .= "Contenu du message : ".utf8_encode($this->message)." <br/>";
        echo $msg;
    }
    
}
