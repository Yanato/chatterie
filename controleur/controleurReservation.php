<?php
require_once DAO_RESERVATION;


if (!empty($_GET)) {
	if(!empty($_GET['resName'])){
		ajouterReservation();
	}
//	 if(!empty($_GET['idEspace'])){
//		modifierEspace($_GET['idEspace']);
//	}
//	 if(!empty($_GET['newIdEspace'])){
//		ajouterEspace($_GET['newIdEspace']);
//	}
}

function ajouterReservation()
{
	$reservation = new reservation( "" ,"" ,"" ,"","" ,"" ,"" ,"");
	$editedDateDeb = date("Y-m-d", strtotime($_GET['resDateDeb']));
	$editedDateFin = date("Y-m-d", strtotime($_GET['resDateFin']));

	$reservation->setId(NULL);
	$reservation->setNom($_GET['resName']);
	$reservation->setMail($_GET['resMail']);
	$reservation->setPhone($_GET['resPhone']);
	$reservation->setNbrChat($_GET['resNbrChat']);
	$reservation->setDateDeb($editedDateDeb);
	$reservation->setDateFin($editedDateFin);
	$reservation->setConditions($_GET['resConditions']);

	if($reservation->estValide())
	{
		DAOreservation::ajouterResa($reservation);
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
