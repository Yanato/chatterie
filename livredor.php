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
						1 message(s) dans le livre d'or <br/>
						
						prénom NOM - 01/01/2019 <br/>
						Message : exemple <br/>
						
                         <form class="uk-form" action='#' method='POST'>
                            <fieldset>
                              <legend>Ajouter votre message au livre d'or : </legend>
                    
                                <div class="uk-form-row">
                                    <input name="prenom" type="text" required="" placeholder="Votre prénom (*)" >
                                </div>
                                
                                 <div class="uk-form-row">
                                    <input name="nom" type="text" required="" placeholder="Votre nom (*)" >
                                </div> 
                                                  
                                <div class="uk-form-row">
                                    <input name="email" type="email" required=""  placeholder="Votre mail (*)" >
                                </div>               
                    
                                <div class="uk-form-row">
                                    <textarea name='message' cols="" rows="5" required="" placeholder="Votre message (*)" class="uk-form-width-large"></textarea>
                                </div>
                                
                                <div class="uk-form-row">
                                    (*) : Tous les champs sont obligatoires. <br/>
                                    Les messages sont soumis à une vérification avant publication.
                                </div> 
                                
                                <div class="uk-form-row">
                                	<div class="g-recaptcha" data-sitekey="6LesQocUAAAAADaIABT0gp4YcS3kcH-f9DJAXc8B"></div>
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
