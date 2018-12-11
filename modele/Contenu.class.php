<?php
class Contenu
{
    private $numPage;
    private $numTexte;
    private $texte;

    public function __construct($numPage, $numTexte, $texte)
    {
        $this->numPage = $numPage;
        $this->numTexte = $numTexte;
        $this->texte = $texte;
    }

    //----------------------------------- Accesseurs ---------------------------------------------

    public function getNumPage()
    {
        return $this->numPage;
    }
    public function getNumTexte()
    {
        return $this->numTexte;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    //----------------------------------- Mutateurs ---------------------------------------------

    public function setNumPage($numPage)
    {
        $this->idEspace = $numPage;
    }
    public function setNumTexte($numTexte)
    {
        $this->nom = $numTexte;
    }
    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    public function estValide()
    {
        return empty($this->listeMessageErreurActif);
    }
}
