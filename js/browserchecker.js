
 function myFunction(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
} 



function msieversion()  // script édité provenant à l'origine de : https://support.microsoft.com/en-us/kb/167820
{
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0) // If Internet Explorer, return version number
    {
        return parseInt(ua.substring(msie + 5));
    }
    else  // If another browser, return something else
    return 100;
}

window.onload = function () {
   if ( msieversion() < 9 ){
       
        alert("Vous utilisez IE " + msieversion() + ".\n\n"  + "Félicitation, vous faites partie des 0,5% d'utilisateurs possédant encore un navigateur aussi vieux qu'eux. N'hésitez pas à changer de logiciel ou à le mettre à jour, en plus c'est GRATUIT." );
       
    }
    var element = document.getElementById("listearticle");
element.innerHTML = "<a href=article1.html>Jour 1</a> <font color=grey>19 janvier 2018</font><br><a href=article2.html>La première semaine</a> <font color=grey>24 janvier 2018</font><br>";
}
