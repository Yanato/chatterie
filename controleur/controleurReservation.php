<?php
require_once DAO_RESERVATION;


if (!empty($_GET)) {
	if(!empty($_GET['clientResName'])){
		ajouterReservation($_GET['clientResName']);
	}
	 if(!empty($_GET['idResa'])){
		modifierReservation($_GET['idResa']);
	}
	 if(!empty($_GET['newIdReservation'])){
		ajouterReservation($_GET['resName']);
	}
	if(!empty($_GET['suppr'])){
		supprimerReservation($_GET['suppr']);
	}
	if(!empty($_GET['archiverTout'])){
		updateArchive();
	}
}

function updateArchive(){
	DAOreservation::updateArchive();
}

function ajouterReservation($name)
{
	$reservation = new reservation( "" ,"" ,"" ,"","" ,"" ,"" ,"","");
	$editedDateDeb = date("Y-m-d", strtotime($_GET['resDateDeb']));
	$editedDateFin = date("Y-m-d", strtotime($_GET['resDateFin']));

	$reservation->setId(NULL);
	$reservation->setNom($name);
	$reservation->setMail($_GET['resMail']);
	$reservation->setPhone($_GET['resPhone']);
	$reservation->setNbrChat($_GET['resNbrChat']);
	$reservation->setDateDeb($editedDateDeb);
	$reservation->setDateFin($editedDateFin);
	$reservation->setConditions($_GET['resConditions']);
	$reservation->setStatut($_GET['statut']);

	if($reservation->estValide())
	{
		DAOreservation::ajouterResa($reservation);
		return true;
	}
	return false;
}

function modifierReservation($idResa)
{
	$reservation = new reservation( "" ,"" ,"" ,"","","","","","");
	$reservation->setId($idResa);
	$reservation->setNom($_GET['nomResa']);
	$reservation->setMail($_GET['mailResa']);
	$reservation->setPhone($_GET['phoneResa']);
	$reservation->setNbrChat($_GET['nbrChatResa']);
	$reservation->setDateDeb($_GET['dateDebResa']);
	$reservation->setDateFin($_GET['dateFinResa']);
	$reservation->setConditions($_GET['conditionsResa']);
	$reservation->setStatut($_GET['statut']);

	if($reservation->estValide())
	{
		DAOreservation::modifierReservation($reservation);
		return true;
	}
	return false;

}


function supprimerReservation($idResa){
	$reservation = DAOreservation::supprimerReservation($idResa);
}

?>
