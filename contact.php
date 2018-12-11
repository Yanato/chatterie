<?php
include "recurent/entete.php";
afficherEntete(_("Accueil"));

?>

         <div class="container">

            <div class="uk-grid uk-grid-collapse">
               <div class="uk-width-large-1-1 ">
                 <div class="messageErreur">
                   <div class="uk-grid uk-grid-collapse">
                     <div class=" uk-width-1-3"></div>

                     <div class=" uk-width-1-3">
                       <?php
                       if (!empty($_GET["message"])) {
                           if ($_GET["message"] === "ok") {
                               echo  '
                         <div class="uk-alert uk-alert-success" data-uk-alert="">
                                                       <a href="" class="uk-alert-close uk-close"></a>
                                                       <p>Votre message a été envoyé</p>
                                                   </div>';
                           }
                       }
                       ?>



                     </div>
                 </div>

                 </div>
                 <div class="uk-grid uk-grid-collapse">
                   <div class=" uk-width-1-3"></div>
                   <div class=" uk-width-1-3">

                 <form class="uk-form" action='DAO/sendContactMessage.php' method='POST'>
        <fieldset>
          <legend>N'hesitez pas a nous envoyer un message</legend>

            <div class="uk-form-row">
                <input name="name" type="text" required="" placeholder="Nom complet*" >
            </div>

            <div class="uk-form-row">
                <input name="email" type="email" required=""  placeholder="Mail*" >
            </div>

            <div class="uk-form-row">
                <input name="phone" type="text" placeholder="Telephone" class="uk-form-width-large">
            </div>

            <div class="uk-form-row">
                <textarea name='message' cols="" rows="5" required="" placeholder="Message*" class="uk-form-width-large"></textarea>
            </div>

            <div class="uk-form-row">
                <button class="uk-button">Envoyer</button>
            </div>
        </fieldset>
    </form>
</div>
</div>


               </div>
            </div>
         </div>

<!-- footer -->
<?php
     include 'recurent/piedPage.php';
?>
