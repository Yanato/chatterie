<?php

function fetchtext($numpage, $numtext)
{
    global $connexion;
    $sql = "SELECT * FROM contenu WHERE 'numPage'=$numpage & 'numtext'=$numtext";
    $requete = $connexion->prepare($sql);
    $requete->execute();
    $requete->setFetchMode(PDO::FETCH_ASSOC) ;

    foreach ($requete as $ligne) {
        echo $ligne['texte'];
    }
    echo "ah";
}
