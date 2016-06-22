<?php

#    (gH)   -_-  stdphp_inc.php  ;  TimeStamp (unix) : 25 Août 2012 vers 12:20

######################################################

function litVersion($fichier) {

######################################################

$versionStd  = "???" ;
$nbfns = -1 ;
$fh = fopen($fichier,"r") ;
while ($lig=fgets($fh,4096)) {
  if (   (mot($lig,1) == "#")
     and (mot($lig,2) == "std.php")
     and (mot($lig,3) == "version") )  {
    $versionStd = mot($lig,4) ;
  } ; # fin de si
} ; # fin tant que
fclose($fh) ;
return($versionStd) ;

} ; # fin de fonction litVersion

######################################################

function tableauDesFonctionsPhp($fichier) {

######################################################

$tfns  = array() ;
$nbfns = -1 ;
$fh = fopen($fichier,"r") ;
while ($lig=fgets($fh,4096)) {
  if (substr(mot($lig."12345678",1),0,8) == "function") {
    $nfns = mot($lig,2) ;
    $pdp  = strpos($nfns,"(") ;
    $nfns = substr($nfns,0,$pdp) ;
    $tfns[$nbfns++] = $nfns ;
  } ; # fin de si
} ; # fin tant que
fclose($fh) ;
return($tfns) ;

} ; # fin de fonction tableauDesFonctionsPhp

######################################################

function exemplesUtilisationDeLaFonction($sonNom,$fichier) {

######################################################

  $fh = fopen($fichier,"r") ;
  $ok = 0 ;
  while ($lig=fgets($fh,4096)) {
    if ((strpos("    $lig "," $sonNom("))
    or  (strpos("    $lig ","->$sonNom("))) {
      $lig = str_replace("&","&amp;",$lig) ;
      $lig = str_replace("<","&lt;",$lig) ;
      $lig = str_replace(">","&gt;",$lig) ;
      echo "   ".trim($lig)."\n\n" ;
    } ; # fin si
  } ; # fin tant que
  fclose($fh) ;

} ; # fin de fonction exemplesUtilisationDeLaFonction

######################################################

function texteDeLaFonction($sonNom,$fichier) {

######################################################


  $fh = fopen($fichier,"r") ;
  $ok = 0 ;
  while ($lig=fgets($fh,4096)) {
    if (substr(mot($lig."12345678",1),0,8) == "function") {
       $nfns = mot($lig,2) ;
       $pdp  = strpos($nfns,"(") ;
       $nfns = substr($nfns,0,$pdp) ;
       if ($nfns==$sonNom) { $ok = 1 ; } ;
    } ; # fin de si
    if ($ok==1) {
       $lig = str_replace("&","&amp;",$lig) ;
       $lig = str_replace("<","&lt;",$lig) ;
       $lig = str_replace(">","&gt;",$lig) ;
       echo $lig ;
       $ok = 1 ;
    } ; # fin de si
    if  (strpos($lig,"fin de fonction")) { $ok = 0 ; } ;
  } ; # fin tant que
  fclose($fh) ;

} ; # fin de fonction texteDeLaFonction

######################################################

?> 