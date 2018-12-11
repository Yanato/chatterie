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
}

function fetchpagename($idPage)
{
    global $connexion;
    $sql = "SELECT * FROM page WHERE id=$idPage";
    $requete = $connexion->query($sql);
    $requete->execute();
    $requete->setFetchMode(PDO::FETCH_ASSOC) ;

    foreach ($requete as $ligne) {
        return $ligne['nomPage'];
    }
}


if (!empty($_GET)) {
    if (!empty($_GET["numPage"])) {
        global $connexion;
        $numPage = $_GET['numPage'];
        $numTexte = $_GET['numTexte'];
        $editedtext = $_GET['texte'];

        try {               // $pdostat = $pdo->query("INSERT INTO acces (id,prenom,login,password,statut,age) VALUES($varId,$varPrenom,$varLog,$varPassword,$varStatut,$varAge);") ;

            $data = [
        'numPage' => $numPage,
        'numTexte' => $numTexte,
        'texte' => $editedtext,
    ];
            $sql = "UPDATE contenu SET texte=:texte WHERE numPage=:numPage & numTexte=:numTexte";
            $stmt= $connexion->prepare($sql);
            $stmt->execute($data);
            header('Location: /administration/editext.php?modif=ok&idPage='.$numPage);
        } catch (PDOException $e) {
            echo "<p>Erreur: ".$e->getMessage() ;
        }
    }
}
