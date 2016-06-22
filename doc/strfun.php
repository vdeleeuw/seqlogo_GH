<?php

#    (gH)   -_-  strfun.php  ;  TimeStamp (unix) : 06 Avril 2006 vers 11:22

# strfun.php version 3.17

###########################################################
###########################################################
##                                                       ##
##   fonctions utiles pour chaines de caractères         ##
##                                                       ##
###########################################################
###########################################################

function copies($chen,$frep) {

###########################################################

# recopie un nb de fois spécifié la chaine

  $chret = "" ;
  for ($idr=1;$idr<=$frep;$idr++) {
    $chret .= $chen ;
  } ; # fin pour idr
  return($chret) ;
} ; # fin de fonction copies

###########################################################
###########################################################

function compteMots ( $phrase) {

###########################################################

if (strlen(trim($phrase))==0) { return "" ; } ;

# renvoie le n-iÉme mot d'une phrase

  $phrase = chop(trim($phrase)) ;
  $tmots = explode(" ",trim($phrase)) ;
  # il est possible que des espaces consécutifs
  # perturbent explode donc on vérifie
  # que les "mots" sont non vides

  $vnnbm = 0 ;
  $nbt = count($tmots) ;
  for ($idm=0;$idm<$nbt;$idm++) {
      $mot = $tmots[$idm] ;
      # print " mot $idm = $mot\n" ;
      if (strlen($mot)>0) {
          $vnnbm++ ;
      } ; # fin si
  } ; # fin pour chaque

  return($vnnbm) ;

} ; # fin de fonction compteMots

###########################################################

function mot ( $phrase, $num) {

###########################################################

# renvoie le n-ième mot d'une phrase

  $phrase = chop(trim($phrase)) ;
  $tmots = explode(" ",trim($phrase)) ;
  # il est possible que des espaces consécutifs
  # perturbent explode donc on vérifie
  # que les "mots" sont non vides

  $vnbm = 0 ;
  $nbt = count($tmots) ;
  $vtmots = array() ;
  for ($idm=0;$idm<$nbt;$idm++) {
      $mot = $tmots[$idm] ;
      # print " mot $idm = $mot\n" ;
      if (strlen($mot)>0) {
          $vnbm++ ;
          $vtmots[$vnbm] = $mot ;
      } ; # fin si
  } ; # fin pour chaque
  if (($num==0) or (!isset($vtmots[$num]))) {
    $lm = "" ;
  } else {
    $lm    = $vtmots[$num] ;
  } ; # fin de si
  return $lm ;

} ; # fin de fonction mot

###########################################################

function nbmots ( $phrase) {

###########################################################

# renvoie le n-ième mot d'une phrase

  $phrase = chop(trim($phrase)) ;
  $tmots = explode(" ",trim($phrase)) ;
  # il est possible que des espaces consécutifs
  # perturbent explode donc on vérifie
  # que les "mots" sont non vides

  $vnbm = 0 ;
  $nbt = count($tmots) ;
  for ($idm=0;$idm<$nbt;$idm++) {
      $mot = $tmots[$idm] ;
      # print " mot $idm = $mot\n" ;
      if (strlen($mot)>0) {
          $vnbm++ ;
      } ; # fin si
  } ; # fin pour chaque

  return($vnbm) ;

} ; # fin de fonction nbMots


###########################################################
###########################################################

function premierCarNonNul( $chen ) {

###########################################################

  # renvoie le premier caractère qui n'est pas un espace
  # pour chaine vide, on renvoie "" et pour que des espaces,
  # on envoie "_"

  $cr = "" ;
  $lng = strlen( $chen ) ;
  if ($lng>0) {
     $cr = "_" ;
     $idc = 0 ;
     while ($idc<$lng) {
       $cc = substr($chen,$idc,1) ;
       if ($cc==" ") { $idc++ ; } else { $cr = $cc ; $idc = $lng + 1 ; } ;
     } ; # fintant que
  } ; # fin de si
  return $cr ;

} ; # fin de fonction premierCarNonNul

###########################################################
###########################################################

function surncarg( $chen , $lng ) {

###########################################################

# cadre la chaine à gauche sur une longueur donnée
# cette fonction ne déborde pas contrairement à sprintf

  $cop = copies(" ",$lng) ;
  $res = substr($chen.$cop,0,$lng-1) ;
  return $res ;

} ; # fin de fonction surncarg

###########################################################

function surncard( $chen , $lng ) {

###########################################################

# cadre la chaine à droite sur une longueur donnée
# cette fonction ne déborde pas contrairement à sprintf

  $res = $chen ;
  while (strlen($res)<$lng) { $res = " $res" ; } ;
  return $res ;

} ; # fin de fonction surncarg

###########################################################

function surncardzero( $chen , $lng ) {

###########################################################

# cadre la chaine à droite sur une longueur donnée
# cette fonction ne déborde pas contrairement à sprintf

  $res = $chen ;
  while (strlen($res)<$lng) { $res = "0$res" ; } ;
  return $res ;

} ; # fin de fonction surncarg

###########################################################

function surncardnbsp( $chen , $lng ) {

###########################################################

# cadre la chaine à droite sur une longueur donnée
# cette fonction ne déborde pas contrairement à sprintf

  $ajout = copies("&nbsp;",$lng-strlen($res)) ;
  $res = $ajout.$chen ;
  return $res ;

} ; # fin de fonction surncarg

###########################################################

function nbdif( $seq1 , $seq2 ) {

###########################################################

  # renvoie le nombre de différences entre deux chaines
  # on complète la plus petite pour comparer deux chaines de longeurs égales

  $lng1 = strlen($seq1) ;
  $lng2 = strlen($seq2) ;
  $lngc = max($lng1,$lng2) ;

  # complétion éventuelle des chaines

  $idc = $lng1 ;
  while ($idc<=$lngc) { $seq1 .= " " ; $idc++ ; } ;
  $idc = $lng2 ;
  while ($idc<=$lngc) { $seq2 .= " " ; $idc++ ; } ;

# print " chaine 1 : * $seq1 * \n" ;
# print " chaine 2 : * $seq2 * \n" ;

  # comptage du nombre de différences

  $idc = 0 ;
  $ndi = 0 ;
  while ($idc<$lngc) {
    $car1 = substr($seq1,$idc,1) ;
    $car2 = substr($seq2,$idc,1) ;
    if ($car1 != $car2) { $ndi++ ; } ;
    $idc++ ;
  } ; # fin tant que
# print " soit $ndi différences \n" ;
  return $ndi ;

} ; # fin de fonction nbdif

###########################################################
###########################################################


?>
