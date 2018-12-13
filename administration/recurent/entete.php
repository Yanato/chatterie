<?php
$estEnAdministration = true;
require_once"../configuration/configuration.php";



function afficherEnTete($titre)
{
    ?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $titre ?></title>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<link type="text/css" rel=stylesheet href="../lib/css/uikit.almost-flat.min.css">
<link type="text/css" rel=stylesheet href="../lib/css/animate.css">
<link type="text/css" rel=stylesheet href="../lib/css/components/slideshow.almost-flat.min.css">
<link type="text/css" rel=stylesheet href="../lib/css/components/slidenav.almost-flat.min.css">
<link type="text/css" rel=stylesheet href="../lib/css/components/dotnav.almost-flat.min.css">
<link type="text/css" rel=stylesheet href="../css/style.css">
<script type="text/javascript" src="../lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../lib/js/uikit.min.js"></script>

<link rel="stylesheet" href="https://getuikit.com/v2/vendor/codemirror/codemirror.css">
<link rel="stylesheet" href="https://getuikit.com/v2/vendor/codemirror/show-hint.css">
<script src="https://getuikit.com/v2/vendor/codemirror/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.5/marked.min.js"></script>
<script src="https://getuikit.com/v2/src/js/components/htmleditor.js"></script>

<script type="text/javascript" src="../lib/js/components/slideshow.js"></script>
<script type="text/javascript" src="../lib/js/components/slideshow-fx.js"></script>
<script type="text/javascript" src="../lib/js/components/sticky.js"></script>
<script type="text/javascript" src="../lib/js/components/lightbox.min.js"></script>
<script type="text/javascript" src="../lib/js/core/modal.min.js"></script>
<script type="text/javascript" src="../lib/js/components/parallax.min.js"></script>
<script type="text/javascript" src="../js/browserchecker.js"></script>
<script type="text/javascript" src="../js/drawEspace.js"></script>





<link rel="icon" type="image/jpg" href="../image/favicon.ico">
<?php
session_start();
    if ($titre != "Connexion") {
        if (!$_SESSION["connecte"]) {
      //    header('Location: /chatterie/administration/index.php?message=co');
          header('Location: /administration/index.php?message=co');
        }
    } ?>
</head>


<body>
<!-- barre de navigation -->
<?php
if ($titre != "Connexion") {
        include 'barreDeNavigation.php';
    }
    //include 'barreDeNavigationUtilisateurConnecte.php';
}?>
