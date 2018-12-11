<?php
class ConnexionDB
{
    private static $bd = null;

    public static function connecter()
    {
        if (ConnexionDB::$bd) {
            return ConnexionDB::$bd;
        }
        try {
            ConnexionDB::$bd = new PDO(
                SGBD.":host=".
                HOTE_BASE_DE_DONNEES.
                "; port=".
                PORT_BASE_DE_DONNEES.
                ";dbname=".
                NOM_BASE_DE_DONNEES,
                UTILISATEUR_BASE_DE_DONNEES,
                MOT_PASSE_BASE_DE_DONNEES
            );

            ConnexionDB::$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            ConnexionDB::$bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            // Connexion impossible... impossible donc d'aller plus loin !
            echo($e);
            die("Impossible de se connecter a la source de donnees...");
        }

        return ConnexionDB::$bd;
    }
}

?>
