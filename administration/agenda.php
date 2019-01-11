<?php
include "recurent/entete.php";
require_once CONTROLEUR_RESERVATION;
require_once DAO_RESERVATION;
require_once TABLEAU_RESERVATION;

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
<script>
$(function() {

  // page is now ready, initialize the calendar...

  $('#calendar').fullCalendar({
          default: 'fr',
          events: {
    url: 'json-events-feed.php',
    type: 'POST', // Send post data
    error: function() {
        alert('There was an error while fetching events.');
    }
}
    // put your options and callbacks here
  })

});
</script>
        <div class="espacement-bas-element">


       <div class="content">
         <h2>Liste des réservations :</h2>
         <div class="uk-grid uk-grid-collapse">
           <div class="uk-width-1-2">
             <div id='calendar'></div>

           </div>
           <div class="uk-width-3-3">
             <ul class="uk-tab" data-uk-tab="{connect:'#my-id'}">
               <li><a href="">Reservation en attente</a></li>
               <li><a href="">Reservation confirmés</a></li>
               <li><a href="">Reservations passés de date</a></li>
             </ul>

             <!-- This is the container of the content items -->
             <ul id="my-id" class="uk-switcher uk-margin">
               <li>
                 <?php afficherTableau(_("en attente")); ?>
          </li>
          <li>
            <?php afficherTableau(_("confirmé")); ?>
          </li>
          <li>
                      <?php afficherTableau(_("archivé")); ?>
                    </li>
        </ul>
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
