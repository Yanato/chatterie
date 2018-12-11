<?php
include "recurent/entete.php";
afficherEntete(_("Connexion"));
?>

<div class="menu-administration">
   <a href="/index.php">
      <div class="uk-button-dropdown ownbuttonAdministration site">
         <div>Retour au site</div>
      </div>
   </a>
</div>

<div class="messageErreur">
  <div class="uk-grid uk-grid-collapse">
    <div class=" uk-width-1-3"></div>

    <div class=" uk-width-1-3">
      <?php
      if (!empty($_GET["message"])) {
          if ($_GET["message"] === "deco") {
              echo  '
        <div class="uk-alert uk-alert-success" data-uk-alert="">
                                      <a href="" class="uk-alert-close uk-close"></a>
                                      <p>Vous vous etes bien deconnecte</p>
                                  </div>';
          }
          if ($_GET["message"] === "co") {
              echo '<div class="uk-alert uk-alert-danger" data-uk-alert="">
                                        <a href="" class="uk-alert-close uk-close"></a>
                                        <p>Veuillez vous reconnecter pour acceder au pannel</p>
                                    </div>';
          }
      }
      ?>



    </div>
</div>

</div>
         <div class="container connexion-administration">
<h1><?=_("Pannel d'administration de la chatterie")?></h1>

            <div class="uk-grid uk-grid-collapse">
              <div class=" uk-width-1-3"></div>

              <div class="uk-block-muted uk-width-1-3">
                <div id="espace-connexion-utilisateur">
                  <h2><?=_("Se connecter")?></h2>

                  <form class="uk-form" action="identification.php" method="POST">
                      <fieldset >

                          <div class="uk-form-row">
                              <input type="text" name="username" placeholder="Pseudo" >
                          </div>
                          <div class="uk-form-row espacement-bas-element">
                              <input type="password" name="password" placeholder="<?=_("mot de passe")?>" >
                          </div>
                          <div class="uk-grid uk-grid-collapse espacement-bas-element">
                              <div class="uk-width-1-2 ">
                                  <div class="uk-form-row">
                                      <label><input type="checkbox"><?=_(" Se souvenir de moi")?></label>

                                  </div>
                              </div>

                          </div>
                          <div class="uk-form-row">
                            <input class="uk-button" type="submit" value="Login" />
                          </div>
                      </fieldset>

                  </form>
                  </div>

              </div>

            </div>


         </div>
