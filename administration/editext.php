<?php
include "recurent/entete.php";
require_once DAO_CONTENU;

afficherEntete(_("Connexion administration"));
?>
         <div class="container-administration">
            <div class="uk-grid uk-grid-collapse">
              <div class="uk-width-1-1">
                <?php
                if (!empty($_GET["modif"])) {
                    if ($_GET["modif"] === "ok") {
                        echo  '
                  <div class="uk-alert uk-alert-success" data-uk-alert="">
                                                <a href="" class="uk-alert-close uk-close"></a>
                                                <p>La modification a été effectué</p>
                                            </div>';
                    }
                    if ($_GET["modif"] === "nok") {
                        echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                                  <a href="" class="uk-alert-close uk-close"></a>
                                                  <p>Erreur lors de la modification</p>
                                              </div>';
                    }
                }
                ?>


                <?php
                  if (!empty($_GET["idPage"])) {
                      $idPage = $_GET['idPage'];
                      $pageName = fetchpagename($idPage);
                      echo "              <div class='content'  >
                        <h1 class='titreAdministration'>Modification des textes de la page <b>".$pageName."</b></h1>";
                      global $connexion;
                      $sql = "SELECT * FROM contenu WHERE numPage=$idPage";
                      $requete = $connexion->query($sql);
                      $requete->execute();
                      $requete->setFetchMode(PDO::FETCH_ASSOC) ;

                      foreach ($requete as $ligne) {
                          echo "<h2>Texte".$ligne['numTexte']."</h2>";
                          echo "<form 'class=uk-form' action='". $_SERVER['PHP_SELF']."' method='GET'>
                                          <div class='uk-form-row'>
                                            <fieldset>
                                            <input type='text' name='numPage' value=".$idPage." hidden>
                                            <input type='text' name='numTexte' value=".$ligne['numTexte']." hidden>
                                            <textarea data-uk-htmleditor name='texte' cols='150' rows='10' placeholder='Textarea'>".$ligne['texte']."</textarea>
                                            </div>
                                              <input class='uk-button' type='submit' value='Modifier' />
                                        </fieldset>
                                      </form>
                                               ";
                      }
                  }



?>
</div>
</div>
            </div>
         </div>


<!-- footer -->
<?php
     include '../recurent/piedPage.php';
?>
