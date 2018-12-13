<?php
require_once DAO_ESPACE;

if (!empty($_GET)) {
	if(!empty($_GET['suppr'])){
		supprimerEspace($_GET['suppr']);
	}
	 if(!empty($_GET['idEspace'])){
		modifierEspace($_GET['idEspace']);
	}
	 if(!empty($_GET['newIdEspace'])){
		ajouterEspace($_GET['newIdEspace']);
	}
}

function ajouterEspace($idEspace)
{
	$espace = new espace( "" ,"" ,"" ,"");

	$espace->setId($idEspace);
	$espace->setNom($_GET['newNomEspace']);
	$espace->setCapacite($_GET['newCapaEspace']);
	$espace->setColor($_GET['newColorEspace']);

	if($espace->estValide())
	{
		DAOespace::ajouterEspace($espace);
		return true;
	}
	return false;
}

function modifierEspace($idEspace)
{
	$espace = new espace( "" ,"" ,"" ,"");
	$espace->setId($idEspace);
	$espace->setNom($_GET['nomEspace']);
	$espace->setCapacite($_GET['capaEspace']);
	$espace->setColor($_GET['colorEspace']);

	if($espace->estValide())
	{
		DAOespace::modifierEspace($espace);
		return true;
	}
	return false;

}

function supprimerEspace($idEspace){
	$espace = DAOespace::supprimerEspace($idEspace);
}

?>
