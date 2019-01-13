<?php
include "recurent/entete.php";

require_once DAO_COMMENTAIRE;
require_once CONTROLEUR_COMMENTAIRE;

$lesCommentaires = DAOcommentaire::getCommentaires();

if (!empty($_GET)) {
    if(!empty($_GET['delete'])){
        controleurCommentaire::deleteCommentaire();
    }
    if(!empty($_GET['edit'])){
        controleurCommentaire::afficherCommentaire();
    }

}
afficherEntete(_("Connexion administration"));
?>

         <div class="container">
         
         <h1>Modération du livre d'or : </h1>
         
            <div class="uk-grid uk-grid-collapse">
            
                <style>
                table, td, th {  
                  border: 1px solid #ddd;
                  text-align: left;
                }
                
                table {
                  border-collapse: collapse;
                  width: 100%;
                }
                
                th, td {
                  padding: 15px;
                }
                </style>
                                            
                <table>
                  <tr>
                    <th>Date</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actuellement affiché</th>             
                    <th>Message</th>
                    <th>Rendre affichable</th>
                    <th>Supprimer</th>
                  </tr>
        			<?php
        			foreach($lesCommentaires as $commentaire) {
        			    echo "<tr>";
        			    echo "<td>".$commentaire->getDateCom()."</td>";
        			    echo "<td>".utf8_encode($commentaire->getNomAuteur())."</td>";
        			    echo "<td>".utf8_encode($commentaire->getPrenomAuteur())."</td>";
        			    echo "<td>".utf8_encode($commentaire->getMailAuteur())."</td>";
        			    if ($commentaire->getAfficher() == 1) {
        			        echo "<td>Oui</td>";
        			    }
        			    else { echo "<td>Non</td>"; }        			    
        			    echo "<td>".utf8_encode($commentaire->getMessage())."</td>";
        			    echo "<td><a href='?edit=".$commentaire->getId()."'> <img src='../image/edit.png'></a></td>";
        			    echo "<td><a href='?delete=".$commentaire->getId()."'> <img src='../image/delete.png'</a></td>";       			    
        			    echo "</tr>";
        			}
        			?>
                </table>

            </div>
         </div>

<!-- footer -->
<?php
     include '../recurent/piedPage.php';
?>
