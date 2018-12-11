<?php
class Espace{
	private $idEspace;
	private $nom;
	private $capacite;
	private $color;

	public function __construct($idEspace, $nom, $capacite, $color ){
		$this->idEspace = $idEspace;
		$this->nom = $nom;
		$this->capacite = $capacite;
		$this->color = $color;
	}

//----------------------------------- Accesseurs ---------------------------------------------

public function getId(){
	return $this->idEspace;
}
public function getNom(){
		return $this->nom;
	}

	public function getCapacite(){
		return $this->capacite;
	}

	public function getColor(){
		return $this->color;
	}

//----------------------------------- Mutateurs ---------------------------------------------

public function setId( $idEspace){
	$this->idEspace = $idEspace;
}	public function setNom( $nom ){
		$this->nom = $nom;
	}

	public function setCapacite( $capacite ){
		$this->capacite = $capacite;
	}

	public function setColor( $color ){
		$this->color = $color;
	}


	public function estValide(){
		return empty($this->listeMessageErreurActif);
}
}
?>
