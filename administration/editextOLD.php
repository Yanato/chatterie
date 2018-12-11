<?php
require_once('fonctadmin.php');
include "recurent/entete.php";
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
              <div class="content">
                <h1>Modification des textes de la page :</h1>
                <h2>Texte </h2>

                <form class="uk-form" action="fonctadmin.php" method="GET">
                  <div class="uk-form-row">
                    <fieldset>
                      <input type="text" name='numPage' value=1 hidden>
                      <input type="text" name='numTexte' value=1 hidden>
                      <textarea data-uk-htmleditor name='texte' cols="150" rows="10" placeholder="Textarea"><?php fetchtext(1, 1);?></textarea>
                                                  </div>
                                                    <input class="uk-button" type="submit" value="Modifier" />
                                              </fieldset>
                                            </form>
</div>
</div>
            </div>
         </div>

<!-- footer -->
<?php
     include '../recurent/piedPage.php';
?>
