<?php
require_once"configuration/configuration.php";
require_once DAO_UTILISATEUR;

function afficherEnTete($titre)
{
    ?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $titre ?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<link type="text/css" rel=stylesheet href="lib/css/uikit.almost-flat.min.css">
<link type="text/css" rel=stylesheet href="lib/css/animate.css">
<link type="text/css" rel=stylesheet href="lib/css/components/slideshow.almost-flat.min.css">
<link type="text/css" rel=stylesheet href="lib/css/components/slidenav.almost-flat.min.css">
<link type="text/css" rel=stylesheet href="lib/css/components/dotnav.almost-flat.min.css">
<link type="text/css" rel=stylesheet href="css/style.css">
<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="lib/js/uikit.min.js"></script>
<script type="text/javascript" src="lib/js/components/slideshow.js"></script>
<script type="text/javascript" src="lib/js/components/slideshow-fx.js"></script>
<script type="text/javascript" src="lib/js/components/sticky.js"></script>
<script type="text/javascript" src="lib/js/components/lightbox.min.js"></script>
<script type="text/javascript" src="lib/js/core/modal.min.js"></script>
<script type="text/javascript" src="lib/js/components/parallax.min.js"></script>
<script type="text/javascript" src="js/browserchecker.js"></script>
<link rel="icon" type="image/jpg" href="image/favicon.ico">
</head>


<body>
<!-- barre de navigation -->
<?php
include 'barreDeNavigation.php';
    //include 'barreDeNavigationUtilisateurConnecte.php';
}?>
