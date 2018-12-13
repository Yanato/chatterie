<?php
include "recurent/entete.php";
afficherEntete(_("Accueil"));
?>
         <div class="container">
            <div class="uk-grid uk-grid-collapse">
                <div class=" uk-width-1-5"> </div>

                <div class=" uk-width-3-5">

              <form class="uk-form" action='controleur/controleurReservation.php' method='GET'>
       <legend>Effectuer une demande de réservation</legend>
       <div class="uk-grid uk-grid-collapse">
         <div class=" uk-width-1-3">

           <div class="uk-form-row">
             <label class="uk-form-label" >Nom complet*</label>
             <div class="uk-form-controls">
               <input name="resName" type="text" required="" class="uk-form-width-medium" placeholder="ex: Michel Dupon" >
             </div>
           </div>

           <div class="uk-form-row">
             <label class="uk-form-label" >Adresse mail*</label>
             <div class="uk-form-controls">
               <input name="resMail" type="email" required=""  class="uk-form-width-medium" placeholder="ex: michel.d@gmail.com*" >
             </div>
           </div>

           <div class="uk-form-row">
             <label class="uk-form-label" >Numero de Telephone</label>
             <div class="uk-form-controls">
               <input name="resPhone" type="text" class="uk-form-width-medium" placeholder="ex: 0633221144">
             </div>
           </div>

         </div>
           <div class=" uk-width-2-3">
             <div class="uk-grid uk-grid-collapse">
               <div class=" uk-width-1-2">
             <div class="uk-form-row">
               <label class="uk-form-label" >Date de debut</label>
               <div class="uk-form-controls">
                 <input name="resDateDeb" type="text" data-uk-datepicker="{format:'DD.MM.YYYY', minDate:0, maxDate:90}">
                 </div>
             </div>
           </div>

           <div class=" uk-width-1-2">
         <div class="uk-form-row">
           <label class="uk-form-label" >Date de fin</label>
           <div class="uk-form-controls">
             <input name="resDateFin" type="text" data-uk-datepicker="{format:'DD.MM.YYYY', minDate:1, maxDate:90}">
           </div>
         </div>
       </div>
     </div>
   <br>

             <div class="uk-form-row">
               <label class="uk-form-label" >Nombre de chat à garder*</label>
               <div class="uk-form-controls">
                 <input name="resNbrChat" type="text" required="" class="uk-form-width-medium" placeholder="1,2,3..." >
               </div>
             </div>

             <div class="uk-form-row">
               <label class="uk-form-label" >Conditions demandées*</label>
               <div class="uk-form-controls">
                 <textarea name="resConditions" type="text" required="" rows="3"  class="uk-form-width-large" placeholder="ex:&#10;-Maladies&#10;-en box, en maison...&#10;-chauffée ou non" ></textarea>
               </div>
             </div>


           </div>


        </div>





         <div class="uk-form-row">
             <button class="uk-button">Envoyer</button>
         </div>
 </form>
</div>
</div>
            </div>
         </div>

<!-- footer -->
<?php
     include 'recurent/piedPage.php';
?>
