<?php
class Reservation
{
    private $idResa;
    private $nom;
    private $mail;
    private $phone;
    private $nbrChat;
    private $dateDeb;
    private $dateFin;
    private $conditions;

    public function __construct($idResa, $nom, $mail, $phone, $nbrChat, $dateDeb, $dateFin, $conditions)
    {
        $this->idResa = $idResa;
        $this->nom = $nom;
        $this->mail = $mail;
        $this->phone = $phone;
        $this->nbrChat = $nbrChat;
        $this->dateDeb = $dateDeb;
        $this->dateFin = $dateFin;
        $this->conditions = $conditions;
    }

    //----------------------------------- Accesseurs ---------------------------------------------

    public function getId()
    {
        return $this->idResa;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getPhone()
    {
        return $this->phone;
    }
    public function getNbrChat()
    {
        return $this->nbrChat;
    }
    public function getDateDeb()
    {
        return $this->dateDeb;
    }
    public function getDateFin()
    {
        return $this->dateFin;
    }
    public function getConditions()
    {
        return $this->conditions;
    }

    //----------------------------------- Mutateurs ---------------------------------------------

    public function setId($idResa)
    {
        $this->idResa = $idResa;
    }
    public function setNom($nom)
    {
        $this->nom= $nom;
    }

    public function setMail($mail)
    {
        $this->mail=$mail;
    }

    public function setPhone($phone)
    {
        $this->phone=$phone;
    }
    public function setNbrChat($nbrChat)
    {
        $this->nbrChat=$nbrChat;
    }
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb=$dateDeb;
    }
    public function setDateFin($dateFin)
    {
        $this->dateFin=$dateFin;
    }
    public function setConditions($conditions)
    {
        $this->conditions=$conditions;
    }

    public function estValide(){
      return empty($this->listeMessageErreurActif);
  }
}
