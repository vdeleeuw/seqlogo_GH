<?php
#    (gH)   -_-  stdphp.php  ;  TimeStamp (unix) : 25 Août 2012 vers 12:03
#    Code revisité par DE LEEUW Valérian le 6 juin 2016 vers 14:50 pour le projet seqlogo

######################################################

include("std.php") ;
include("stdphp_inc.php") ;

$fichierDesFonctions = "../fctSVG.php"    ;
$fichierDesExemples  = "fctSVGEx.xmp" ;

$versionStdPhp = litVersion($fichierDesFonctions) ;
$tdfns         = tableauDesFonctionsPhp($fichierDesFonctions) ;
sort($tdfns) ;
$nbFns = count($tdfns) ;

######################################################

$titre1 = "Les $nbFns fonctions de fctSVG.php" ;
$titre2 = "&nbsp; &nbsp; Les $nbFns fonctions de ".s_span("fctSVG.php","grouge") ;
debutPageMinimal($titre1,"std.css stdfixes.css")  ;

jsf("stdphp.js") ;
$appel = "docFctSVG.php" ;

######################################################

div("haut","hau") ;
blockquote() ;
pvide() ;
pvide() ;
h1($titre2) ;
finblockquote() ;
sdl() ;
findiv() ;

$lafns = "" ;
if (isset($_GET["lafns"])) { $lafns = $_GET["lafns"] ; } ;

div("gauche","bg") ;
form($appel,"get","onsubmit='montrefns() ; return false'" ) ;

## ---------------------------------------------------

div("centre") ;

pvide() ;

p() ;
echo "Choisissez la fonction : " ;
finp() ;

pvide() ;

p() ;
$lafnsel = "ancre" ;
if (!$lafns=="") { $lafnsel = $lafns ; } ;

input_select("lafns","size=\"20\"") ;
  foreach ($tdfns as $nfns) {
    $selected = "" ;
    $plus     = " ondblclick='window.location.replace(\"docFctSVG.php?lafns=$nfns\")' " ;
    if ($nfns==$lafnsel) {
      $selected = "selected" ;
    } ; # fin si
    input_option($nfns,"",$selected,"",$plus) ;
  } ; # fin pour chaque
finselect() ;
finp() ;

pvide() ;

p("centre") ;
nbsp(15) ;
input_submit("montrer","montrer","vert_pastel") ;
nbsp(15) ;
finp() ;

findiv() ;

finform() ;

pvide() ;

findiv() ;

## ---------------------------------------------------

div("droite","bd") ;
blockquote() ;
#div("statique") ;

if ($lafns!="") {
  h2("&nbsp; Exemples d'utilisation de la fonction ".s_span($lafns,"gbleuf")) ;
  p("ptextarea") ;
  textarea("","cadre tajaunec",8,100,"exemple") ;
    echo "\n" ;
    exemplesUtilisationDeLaFonction($lafns,$fichierDesExemples) ;
  fintextarea() ;
  finp() ;
  h2("&nbsp; Corps de la fonction ".s_span($lafns,"gbleuf")) ;
  p("ptextarea") ;
  textarea("","cadre",15,100,"corps") ;
    echo "\n" ;
    texteDeLaFonction($lafns,"../fctSVG.php") ;
  fintextarea() ;
  finp() ;
} else {

  h2("&nbsp; Texte intégral de fctSVG.php") ;
  pvide() ;
  #blockquote() ;
  p("ptextarea") ;
  textarea_fichier("","cadre",24,100,"docFctSVG","../fctSVG.php") ;
  finp() ;
  #finblockquote() ;

} ; # fin si

## ---------------------------------------------------

pvide() ;
pvide() ;

p("centre") ;
echo "Vous pouvez cliquer " ;
echo href("$appel?lafns=","ici","bouton_fin nou orange_pastel") ;
echo " pour revenir à la page de départ." ;
nbsp(3) ;
finp() ;

pvide() ;

p("centre") ;
echo "Largeur d'affichage du code : " ;
input_text("lrg"," 160","8","vert_pastel") ;
echo href("non.php","forcer la largeur","bouton_fin jaune_pastel nou","chlrg","onclick='changeLesLargeurs() ; return false'") ;
finp() ;

#findiv() ;

finblockquote() ;
findiv() ;

## ---------------------------------------------------

div("bas") ;
p("bas") ;
echo "&reg; (gH) Gilles HUNAULT 2007 pour cette page de documentation" ;
finp() ;
findiv() ;

######################################################
#
finPageMinimal() ;
?> 