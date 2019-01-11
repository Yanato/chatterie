<?php
include "recurent/entete.php";

try {

    // Connect to database
    global $connexion;

    // Prepare and execute query
    $query = "SELECT * FROM reservation WHERE statut = 'confirmé'";
    $sth = $connexion->prepare($query);
    $sth->execute();

    // Returning array
    $events = array();

    // Fetch results
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {

        $e = array();
        $e['id'] = $row['idResa'];
        $e['title'] = $row['nom'];
        $e['start'] = $row['dateDeb'];
        $e['end'] = $row['dateFin'];
        $e['allDay'] = false;

        // Merge the event array into the return array
        array_push($events, $e);

    }

    // Output json for our calendar
    echo json_encode($events);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}
?>
