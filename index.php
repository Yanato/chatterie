<?php
include "recurent/entete.php";

afficherEntete(_("Accueil"));
?>
         <div class="container">
            <div class="uk-grid uk-grid-collapse">
               <div class="uk-width-large-10-10 ">
                 <?php
echo fetchtext(1, 1);
                 ?>
               </div>

               </div>

            </div>
         </div>

<!-- footer -->
<?php
     include 'recurent/piedPage.php';
?>
