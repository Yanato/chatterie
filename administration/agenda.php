<?php
include "recurent/entete.php";
require_once CONTROLEUR_RESERVATION;
require_once DAO_RESERVATION;

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
         <h2>Liste des réservations :</h2>
         <div class="uk-grid uk-grid-collapse">

           <div class="uk-width-2-3">
             <ul class="uk-tab" data-uk-tab="{connect:'#my-id'}">
               <li><a href="">Reservation en attente</a></li>
               <li><a href="">Reservation confirmés</a></li>
               <li><a href="">Reservations passés de date</a></li>
               <li>                                    <form class'uk-form' action='<?php $_SERVER['PHP_SELF']?>' method='GET'>
                 <input name="archiverTout" type="hidden" value="ok">
                 <td><input class='uk-button uk-button-primary' type='submit' value='Archiver les demandes passés de date'/></td>

</form></li>
             </ul>

             <!-- This is the container of the content items -->
             <ul id="my-id" class="uk-switcher uk-margin">
               <li>
            <table class="uk-table uk-table-striped ">
                <thead>
                    <tr>
                      <th>idResa</th>
                      <th>Nom</th>
                      <th>mail</th>
                      <th>phone</th>
                      <th>nbrChat</th>
                      <th>dateDeb</th>
                      <th>dateFin</th>
                      <th>conditions</th>
                      <th>statut</th>
                      <th></th>
                      <th></th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  $nbrTabJs = 0;
                  $listeReservation = DAOreservation::getListeReservation();
                  foreach ($listeReservation as $reservation) {
                      echo "                  <tr>
                                    <form class'uk-form' action='". $_SERVER['PHP_SELF']."' method='GET'>
                                    <td><input size='3' readonly name='idResa' type='text' value=".$reservation->getId()."></td>
                                    <td><input name='nomResa' type='text' value=".$reservation->getNom()."></td>
                                    <td><input name='mailResa' type='text' value=".$reservation->getMail()."></td>
                                    <td><input size='10' name='phoneResa' type='text' value=".$reservation->getPhone()."></td>
                                    <td><input size='3' name='nbrChatResa' type='text' value=".$reservation->getNbrChat()."></td>
                                    <td><input size='10' name='dateDebResa' type='date' value=".$reservation->getDateDeb()."></td>
                                    <td><input size='10' name='dateFinResa' type='date' value=".$reservation->getDateFin()."></td>
                                    <td><input name='conditionsResa' type='text' value=".$reservation->getConditions()."></td>
                                    <td><select name='statut'>
                                      <option selected disabled hidden>".$reservation->getStatut()."</option>
            <option>en attente</option>
            <option>confirmé</option>
            <option>archivé</option>
        </select></td>
                                    <td><input class='uk-button uk-button-primary' type='submit' value='Modifier'/></td>
                                    <td>        <a href='".$_SERVER['PHP_SELF']."?suppr=".$reservation->getId()."' class='uk-button uk-button-danger'>Supprimer</a></td>
                                    </form>
                                    </tr>";
                      $nomJs[] =  $reservation->getNom();
                      $nbrTabJs =  $nbrTabJs+1;
                  }
                  echo "<tr>
                                    <form class'uk-form' action='". $_SERVER['PHP_SELF']."' method='GET'>
                                    <td><input size='3' readonly name='newIdReservation' type='text' value='-'></td>"
                  ?>
                                    <td><input name='resName' type='text' value=""></td>
                                    <td><input name='resMail' type='text' value=""></td>
                                    <td><input size='10' name='resPhone' type='text' value=""></td>
                                    <td><input size='3' name='resNbrChat' type='text' value=""></td>
                                    <td><input size='10' name='resDateDeb' type='date' value=""></td>
                                    <td><input size='10' name='resDateFin' type='date' value=""></td>
                                    <td><input name='resConditions' type='text' value=""></td>
                                    <input name="statut" type="hidden" value="confirmé">

                                    <td><input class='uk-button uk-button-success' type='submit' value='Ajouter'/></td>
                                    </form>
                                    </tr>


                </tbody>
            </table>
          </li>
        </ul>
       </div>
       <div class="uk-width-1-2">

         <canvas id="cnv" width="700" height="500"></canvas>

              <script type="text/javascript">
              for (i = 0; i < <?php echo $nbrTabJs?>; i++){
                var nbrCase = <?php echo json_encode($capaciteJs); ?>;
                var nomCase = <?php echo json_encode($nomJs); ?>;
                var colorCase = <?php echo json_encode($colorJs); ?>;
                var long = 40+90*i;

                  drawGrid(nbrCase[i],5,long,80,colorCase[i], nomCase[i]);

              }
               </script>
</div>
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
