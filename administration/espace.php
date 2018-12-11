<?php
include "recurent/entete.php";
require_once CONTROLEUR_ESPACE;
require_once DAO_ESPACE;

afficherEntete(_("Editer les espaces"));
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
        <div class="espacement-bas-element">


       <div class="content">
         <h1>Modification des Espaces :</h1>
         <div class="uk-grid uk-grid-collapse">
           <div class="uk-width-1-2">


            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                      <th>idEspace</th>
                      <th>Nom</th>
                      <th>Capacité</th>
                      <th>Couleur</th>
                      <th></th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $id = 0;
                  $listeEspace = DAOespace::getListeEspace();
                  foreach($listeEspace as $espace){
                    $id++;
                  echo "                  <tr>
                                    <form class'uk-form' action='". $_SERVER['PHP_SELF']."' method='GET'>
                                    <td><input readonly name='idEspace' type='text' value=".$espace->getId()."></td>
                                    <td><input name='nomEspace' type='text' value=".$espace->getNom()."></td>
                                    <td><input name='capaEspace' type='text' value=".$espace->getCapacite()."></td>
                                    <td><input name='colorEspace' type='color' value=".$espace->getColor ()."></td>
                                    <td><input class='uk-button uk-button-primary' type='submit' value='Modifier'/></td>
                                    <td>        <a href='".$_SERVER['PHP_SELF']."?suppr=".$espace->getId()."' class='uk-button uk-button-danger'>Supprimer</a></td>
                                    </form>
                                    </tr>";
                  }
                  $id = $id+1;
                  echo "<tr>
                                    <form class'uk-form' action='". $_SERVER['PHP_SELF']."' method='GET'>
                                    <td><input readonly name='newIdEspace' type='text' value=".$id."></td>"
                  ?>
                                    <td><input name='newNomEspace' type='text' value=""></td>
                                    <td><input name='newCapaEspace' type='text' value=""></td>
                                    <td><input name='newColorEspace' type='color' value=""></td>
                                    <td><input class='uk-button uk-button-success' type='submit' value='Ajouter'/></td>
                                    </form>
                                    </tr>


                </tbody>
            </table>
       </div>
       <div class="uk-width-1-2">

</div>
</div>
     </div>
  </div>
</div>
</div>



<!-- footer -->
<?php
     include '../recurent/piedPage.php';
?>
