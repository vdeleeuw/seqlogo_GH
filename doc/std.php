<?php

#    (gH)   -_-  std.php  ;  TimeStamp (unix) : 25 Août 2012 vers 11:47

error_reporting(E_ALL | E_NOTICE | E_STRICT ) ;

require_once("strfun.php") ; # <== fonctions usuelles pour chaines de caractères

# std.php version 3.28

###########################################################
###########################################################
##                                                       ##
##   fonctions standard pour pages web                   ##
##                                                       ##
###########################################################

###########################################################

# 3.27 : fonctions pour svg
# 3.25 : volontairement non détaillé
# 3.23 : ajouts de fonctions pour mysql
# 3.21 : reprise de pre_fichier, option utf et input_option

# 3.19 : ajout de bouton et finbouton
# 3.17 : ajout d'un id pour debutSection()
# 3.15 : modification de ul() et ol()
# 3.13 : modification de dd et dt pour avoir des dl compactes (pas de <dl compact="compact"> en strict
# 3.11 : ajout de tableauDar, reprise de tdm (table des matières)
# 3.09 : ajout de label et legende, reprise de th
# 3.07 : ajout de $xtra pour ancre et td, modification de js dans debutPage
# 3.05 : reprise de cmt, ajout de sdl
# 3.03 : reprise de input_radio
# 3.01 : reprise de input_radio
# 2.99 : modification de textarea
# 2.97 : reprise de pre_fichier
# 2.95 : ajout de debutPageMinimale() et finPageMinimale()
# 2.93 : ajout de comptageSqlSimple (pour mysql) et de pct
# 2.91 : reprise de debutPage et finPage pour éviter d'avoir à recopier les gif, jpg et css
#        à titre d'exemple seulement ==> debutPageGeneral et finPageGeneral
# 2.89 : modification de la fonction hr ; ajout de l'objet tdm
# 2.87 : ajout des fonctions debutPageMinimal et finPageMinimal ; modification de fieldset
# 2.85 : ajout de la fonction pre_fichier
# 2.79 : amélioration de certaines fonctions (ajout du paramètre $cla)
# 2.77 : ajout des fonctions span, finspan, tdvide, snbsp
# 2.75 : ajout des fonctions img, ahref, href, aname
# 2.73 : ajout des fonctions b pour <b>... et em pour <em>...
# 2.71 : ajouts des fonctions jsf et js pour automatiser <script...
# 2.69 : ajouts de $js dans debutPage
# 2.67 : ajouts mineurs de petites fonctions (formulaire)
# 2.65 : ajout d'un paramètre facultatif pour feuille de style dans debutPage
# 2.63 : ajout d'un paramètre facultatif pour DTD "strict" dans debutPage
# 2.61 : ajout de fonctions pour formulaire

###########################################################

function debutPage($titre="",$grm="std",$styl="",$js="",$favicon="",$mathjax="off") {

###########################################################

if ($grm=="svg")   { header("Content-type: image/svg+xml") ; } ;
#if ($grm!="html5") { echo "<"."?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?".">\n" ; } ;

if ($grm=="std") {
   echo "<!DOCTYPE html \n" ;
   echo "   PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \n" ;
   echo "   \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"> \n" ;
   echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"fr\" xml:lang=\"fr\"> \n" ;
} elseif ($grm=="svg") {
   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n" ;
   #echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 plus MathML 2.0 plus SVG 1.1//EN" "http://www.w3.org/2002/04/xhtml-math-svg/xhtml-math-svg.dtd">'."\n" ;
   echo '<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:svg="http://www.w3.org/2000/svg">'."\n" ;
} elseif ($grm=="html5") {
   echo "<!doctype html>\n" ;
   echo "<html>\n" ;
} else {
   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n" ;
   echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"fr\" xml:lang=\"fr\">\n" ;
} ; # fin de si

echo "<head> \n" ;
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\n" ;

# chargement éventuel de mathajx

if ($mathjax=="on") {

   echo "<script type='text/x-mathjax-config'>\n" ;
   #echo " MathJax.Hub.Config({ tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]} }) ; \n" ;
   echo " MathJax.Hub.Config({ tex2jax: {inlineMath: [['$','$']] } }) ; \n" ;
   echo "</script>\n" ;
   echo '<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/1.1-latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML-full"></script>'."\n" ;

} ; # fin si

# chargement d'un ou plusieurs fichiers javascript

if ($js!="") {
   $tjs = preg_split("/\s+/",trim($js)) ;
   foreach($tjs as $fjs) {
      echo "<script type='text/javascript' src='$fjs'></script>\n" ;
   } ; # fin pour
} ; # fin de si

if ($favicon!="") {
   echo "<link rel='icon' type='image/png' href='$favicon' />\n" ;
} ; # fin de si

# chargement du style standard

echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"std.css\"  title=\"gh\" />\n" ;

# chargement de style(s) personnalisé(s)

if ($styl!="") {
   $tstyl = preg_split("/\s+/",trim($styl)) ;
   foreach ($tstyl as $fstyl) {
     echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$fstyl\" title=\"gh\" /> \n" ;
   } ; # fin pour
} ; # fin de si

echo "<title>\n" ;
echo " $titre" ;
echo "</title>\n" ;
echo "</head>\n" ;

#if ($grm=="std") {
   echo "<body class=\"beige_jpg\">\n" ;
#} ; # fin de si

echo "<blockquote>\n" ;
echo "<p>&nbsp;</p>\n" ;
if ($grm=="std") {
  echo "<p align=\"right\">\n" ;
} else {
  echo "<p class='align_right'>\n" ;
} ; # fin de si

echo "<a href=\"http://validator.w3.org/check?uri=referer\">\n" ;
echo "<img src=\"valid.png\" height=\"31\" width=\"88\"  alt=\"Valid XHTML\" />\n" ;
echo "</a>\n" ;

echo "&nbsp;&nbsp;&nbsp;" ;
$std = "http://forge.info.univ-angers.fr/~gh/std.css" ;
echo "<a href='http://jigsaw.w3.org/css-validator/validator?uri=".urlencode($std)."'>\n" ;

echo "<img src=\"css.gif\" height=\"31\" width=\"88\"  alt=\"Valid CSS2\" />\n" ;

echo "</a>\n" ;
echo "&nbsp;&nbsp;&nbsp;" ;
echo "</p>\n" ;

} # fin de fonction debutPage

#######################################################################################

function debutPageGeneral($titre="",$grm="std",$styl="",$js="") {

###########################################################

if  ($grm=="svg") { header("Content-type: image/svg+xml") ; } ;
echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n" ;

if ($grm=="std") {
   echo "<!DOCTYPE html \n" ;
   echo "   PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \n" ;
   echo "   \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"> \n" ;
   echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"fr\" xml:lang=\"fr\"> \n" ;
} elseif ($grm=="svg") {
   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1 plus MathML 2.0 plus SVG 1.1//EN" "http://www.w3.org/2002/04/xhtml-math-svg/xhtml-math-svg.dtd">'."\n" ;
   echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" >\n" ;
} else {
   echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n" ;
   echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"fr\" xml:lang=\"fr\"> \n" ;
} ; # fin de si

echo "<head> \n" ;
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" /> \n" ;

# chargement d'un ou plusieurs fichiers javascript

if ($js!="") {
   $tjs = preg_split("/\s+/",trim($js)) ;
   foreach($tjs as $fjs) {
      echo "<script type='text/javascript' src='$fjs'></script>\n" ;
   } ; # fin pour
} ; # fin de si


# chargement du style standard

if (@fopen("http://forge.info.univ-angers.fr/~gh/std.css","r")) {
   echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://forge.info.univ-angers.fr/~gh/std.css\"  title=\"gh\" /> \n" ;
} else {
   echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"std.css\"  title=\"gh\" /> \n" ;
} ; # fin de si

# chargement de style personnalisé

if ($styl!="") {
   echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$styl\" title=\"gh\" /> \n" ;
} ; # fin de si

echo "<title> \n" ;
echo "$titre&nbsp;\n" ;
echo "</title> \n" ;
echo "</head> \n" ;

if ($grm=="std") {
   if (@fopen("http://forge.info.univ-angers.fr/~gh/","r")) {
       echo "<body background=\"http://forge.info.univ-angers.fr/~gh/beige.jpg\"> \n" ;
   } else {
       echo "<body background=\"beige.jpg\"> \n" ;
   } ; # fin si
} else {
   echo "<body class=\"beige_jpg\"> \n" ;
} ; # fin de si

echo "<blockquote> \n" ;
echo "<p>&nbsp;</p> \n" ;
if ($grm=="std") {
  echo "<p align=\"right\"> \n" ;
} else {
  echo "<p class='align_right'> \n" ;
} ; # fin de si

echo "<a href=\"http://validator.w3.org/check?uri=referer\"> \n" ;
if (@fopen("http://forge.info.univ-angers.fr/~gh/valid.png","r")) {
    echo "<img src=\"http://forge.info.univ-angers.fr/~gh/valid.png\" height=\"31\" width=\"88\"  alt=\"Valid XHTML\" /> \n" ;
} else {
    echo "<img src=\"valid.png\" height=\"31\" width=\"88\"  alt=\"Valid XHTML\" /> \n" ;
} ; # fin si
echo "</a>\n" ;

echo "&nbsp;&nbsp;&nbsp;" ;
$std = "http://forge.info.univ-angers.fr/~gh/std.css" ;
echo "<a href='http://jigsaw.w3.org/css-validator/validator?uri=".urlencode($std)."'>\n" ;

if (@fopen("http://forge.info.univ-angers.fr/~gh/css.gif","r")) {
  echo "<img src=\"http://forge.info.univ-angers.fr/~gh/css.gif\" height=\"31\" width=\"88\"  alt=\"Valid CSS2\" />\n" ;
} else {
  echo "<img src=\"css.gif\" height=\"31\" width=\"88\"  alt=\"Valid CSS2\" />\n" ;
} ; # fin si
echo "</a>\n" ;
echo "&nbsp;&nbsp;&nbsp;" ;
echo "</p>\n" ;

} # fin de fonction debutPageGeneral

#######################################################################################
#######################################################################################

function finPage() {

#######################################################################################

echo "<!-- fin de page standard (gH) -->\n" ;
echo "<p>&nbsp;</p><p>\n" ;

echo "<a href=\"http://www.info.univ-angers.fr/pub/gh/\"> \n" ;
echo "<img src=\"return.gif\" alt=\"retour gH\" /></a> \n" ;

echo "&nbsp;&nbsp;&nbsp;Retour &agrave; la page principale de &nbsp; \n" ;
echo "<span class='coulGH'>(gH)</span>\n" ;
echo "</p>\n" ;
echo "<p>&nbsp;</p> \n" ;
echo "</blockquote> \n" ;
echo "</body> \n" ;
echo "</html> \n" ;

} # fin de fonction finPage

#######################################################################################

function finPageGeneral() {

#######################################################################################

echo "<!-- fin de page standard (gH) -->\n" ;
echo "<p>&nbsp;</p><p>\n" ;

echo "<a href=\"http://www.info.univ-angers.fr/pub/gh/\"> \n" ;
if (@fopen("http://forge.info.univ-angers.fr/~gh/return.gif","r")) {
  echo "<img src=\"http://forge.info.univ-angers.fr/~gh/return.gif\" alt=\"retour gH\" /></a> \n" ;
} else {
  echo "<img src=\"return.gif\" alt=\"retour gH\" /></a> \n" ;
} ; # fin si

echo "&nbsp;&nbsp;&nbsp;Retour &agrave; la page principale de &nbsp; \n" ;
echo "<span class='coulGH'>(gH)</span>\n" ;
echo "</p>\n" ;
echo "<p>&nbsp;</p> \n" ;
echo "</blockquote> \n" ;
echo "</body> \n" ;
echo "</html> \n" ;

} # fin de fonction finPageGeneral


#######################################################################################

function debutPageMinimale($tit="&nbsp;") {

#######################################################################################

echo "<html> \n" ;
echo "<head> \n" ;
echo "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' /> \n" ;
echo "<title>" ;
echo " $tit " ;
echo "</title> \n" ;
echo "</head> \n" ;
echo "<body> \n" ;
echo "<!-- début de page minimale (gH) -->\n" ;

} # fin de fonction debutPageMinimale

#######################################################################################

function finPageMinimale() {

#######################################################################################

echo "<!-- fin de page minimale (gH) -->\n" ;
echo "<p>&nbsp;</p><p>\n" ;
echo "</body> \n" ;
echo "</html> \n" ;

} # fin de fonction finPageMinimale

###########################################################

function debutPageRedir($titre,$temps="",$newUrl="http://www.google.fr/search") {

###########################################################

echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>\n" ;
echo "<!DOCTYPE html \n" ;
echo "   PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \n" ;
echo "   \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"> \n" ;
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"fr\" xml:lang=\"fr\"> \n" ;
echo "<head> \n" ;
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" /> \n" ;
echo "<meta http-equiv=\"Refresh\" content=\"$temps; URL=$newUrl\">" ;
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"http://www.info.univ-angers.fr/pub/gh/std.css\" title=\"standard (gH)\" /> \n" ;
echo "<title> \n" ;
echo "$titre \n" ;
echo "</title> \n" ;
echo "</head> \n" ;
echo "<body background=\"beige.jpg\"> \n" ;
echo "<blockquote> \n" ;
echo "<p>&nbsp;</p> \n" ;
echo "<h1>redirection vers ".s_span($newUrl,"grouge")."</h1>\n" ;
echo "<p align=\"right\"> \n" ;
echo "<a href=\"http://validator.w3.org/check/referer\"> \n" ;
echo "<img src=\"valid.png\" height=\"31\" width=\"88\"  alt=\"Valid XHTML 1.0!\" /> \n" ;
echo "</a>\n" ;
echo "&nbsp;&nbsp;&nbsp;" ;
echo "</p>\n" ;

} # fin de fonction debutPageRedir

#######################################################################################
#######################################################################################

function debutSection($wi="100%",$ids="") {

#######################################################################################

echo "<!-- debut de section (gH) -->\n" ;
if ($ids=="") {
   echo "<table cellpadding='50' class='bgcolor_white' width='".$wi."'  summary='cadre général'><tr><td class='bgcolor_white'>\n" ;
} else {
   echo "<table cellpadding='50' id='$ids' class='bgcolor_white' width='".$wi."'  summary='cadre général'><tr><td class='bgcolor_white'>\n" ;
} ; # # finsi

} # fin de fonction debutSection

#######################################################################################
#######################################################################################

function finSection() {

#######################################################################################

echo "<!-- fin de section (gH) -->\n" ;
echo "</td></tr></table> \n" ;
echo "<p>&nbsp;</p> \n" ;

} # fin de fonction finSection

#######################################################################################
#######################################################################################

# passage en gras

function b($chen="&nbsp;") {
  return "<strong>$chen</strong>" ;
} # fin de fonction b

# em comme "emphase"

function em($chen="&nbsp;") {
  return "<em>$chen</em>" ;
} # fin de fonction em

# passage en mode clavier (keyboard ==> kbd)

function kbd($chen="&nbsp;") {
  return "<kbd>$chen</kbd>" ;
} # fin de fonction kbd

# fonction générique pour titre de niveau i

function h($nivi=1,$chen="&nbsp;",$cla="",$id="") {
  $attr = "" ;
  if (!$cla=="") {
      $attr .= " class='$cla'" ;
  } ; # fin de si
  if (!$id=="") {
      $attr .= " id='$id'" ;
  } ; # fin de si
  sdl() ;
  echo "<h$nivi$attr>$chen</h$nivi>\n" ;
  sdl() ;
} # fin de fonction h

# titre de niveau 1

function h1($chen="&nbsp;",$cla="",$id="") {
  h("1",$chen,$cla,$id) ;
} # fin de fonction h1

# titre de niveau 2

function h2($chen="&nbsp;",$cla="",$id="") {
  h("2",$chen,$cla,$id) ;
} # fin de fonction h2

# titre de niveau 3

function h3($chen="&nbsp;",$cla="",$id="") {
  h("3",$chen,$cla,$id) ;
} # fin de fonction h3

function h4($chen="&nbsp;",$cla="",$id="") {
  h("4",$chen,$cla,$id) ;
} # fin de fonction h4

# ancien titre de niveau 1

function hh1($chen="&nbsp;",$cla="") {
  if ($cla=="") {
      echo "<h1> $chen </h1>\n" ;
  } else {
      echo "<h1 class='$cla'> $chen </h1>\n" ;
  } ; # fin de si
} # fin de fonction hh1

# ancien titre de niveau 2

function hh2($chen="&nbsp;") {
  echo "<h2> $chen</h2>\n" ;
} # fin de fonction hh2

# ancien titre de niveau 3

function hh3($chen="&nbsp;") {
  echo "<h3> $chen</h3>\n" ;
} # fin de fonction hh3

function cmt($chen="&nbsp;") {
  return "<!-- $chen -->\n" ;
} # fin de fonction cmt

function sdl($nbl=1) {
  echo copies("\n",$nbl) ;
} # fin de fonction sdl

function sub($chen="&nbsp;") { # indice
  return "<sub>$chen</sub>" ;
} # fin de fonction sub

function sup($chen="&nbsp;") { # expsant
  return "<sup>$chen</sup>" ;
} # fin de fonction sup

#######################################################################################

function ul($xtra="") {
  if ($xtra=="") {
     echo "<ul>\n" ;
  } else {
     echo "<ul $xtra>\n" ;
  } ; # fin de si
} # fin de fonction ul

function finul() {
  echo "</ul>\n" ;
} # fin de fonction finul

function bouton($id="",$xtra="",$type="",$value="") {
   echo "<button" ;
   if ($id!="") {
      echo " id='$id'" ;
   } # fin de si
   if ($type!="") {
      echo " type='".$type."'" ;
   } # fin de si
   if ($xtra!="") {
      echo " $xtra" ;
   } # fin de si
   echo ">" ;
   if ($value != ""){
      echo "$value";
   }
   echo "</button>\n" ;
}# fin de fonction bouton

function finbouton() {
  echo "</button>\n" ;
} # fin de fonction finbouton

function ol($xtra="") {
  if ($xtra=="") {
     echo "<ol>\n" ;
  } else {
     echo "<ol $xtra>\n" ;
  } ; # fin de si
} # fin de fonction ol

function finol() {
  echo "</ol>\n" ;
} # fin de fonction finol

function li($cntli="") {
  echo "<li>$cntli</li>\n" ;
} # fin de fonction finli

function debutli($cntli="",$xtra="") {
  echo "<li $xtra>$cntli" ;
} # fin de fonction debutli

function finli() {
  echo "</li>\n" ;
} # fin de fonction finli

function dt($cntli="",$cla="") {
  if ($cla=="") {
    echo "<dt>$cntli</dt>\n" ;
  } else {
    echo "<dt class='$cla'>$cntli</dt>\n" ;
  } ; # fin de si
} # fin de fonction dt

function dd($cntli="",$cla="") {
  if ($cla=="") {
    echo "<dd>$cntli</dd>\n" ;
  } else {
    echo "<dd class='$cla'>$cntli</dd>\n" ;
  } ; # fin de si
} # fin de fonction dd

function debutdd($cntli="") {
  echo "<dd>$cntli" ;
} # fin de fonction debutdd

function findd() {
  echo "</dd>\n" ;
} # fin de fonction findd

function debutdt($cntli="") {
  echo "<dt>$cntli" ;
} # fin de fonction debutdt

function findt() {
  echo "</dt>\n" ;
} # fin de fonction findt

function debutdl($cntli="",$xtra="") {
  echo "<dl $xtra>$cntli" ;
} # fin de fonction debutdl

function findl() {
  echo "</dl>\n" ;
} # fin de fonction findl


#######################################################################################

# quelques span

function s_span($chen,$cla,$id="",$xtra="") {
  $attr = "" ;
  if (!$cla=="") {
      $attr .= " class='$cla'" ;
  } ; # fin de si
  if (!$id=="") {
      $attr .= " id='$id'" ;
  } ; # fin de si
  if ($xtra!="")  { $attr .= " $xtra"        ; } ;
  return("<span $attr>$chen</span>") ;
} # fin de fonction s_span

function span($cla="",$id="",$xtra="") {
  $chen  = "<span" ;
  if ($cla!="")   { $chen .= " class='$cla'" ; } ;
  if ($id!="")    { $chen .= " id='$id'"     ; } ;
  if ($xtra!="")  { $chen .= " $xtra"        ; } ;
  $chen .= ">" ;
  echo $chen ;
} # fin de fonction span

function finspan() {
  echo "</span>" ;
} # fin de fonction finspan

function grouge($chen=" ") {
  echo "<span class='grouge'>$chen</span>" ;
} # fin de fonction grouge

function gbleu($chen=" ") {
  echo "<span class='gbleu'>$chen</span>" ;
} # fin de fonction gbleu

function s_gbleu($chen=" ") {
  return("<span class='gbleu'>$chen</span>") ;
} # fin de fonction gbleu

function gbleuf($chen=" ") {
  echo "<span class='gbleuf'>$chen</span>" ;
} # fin de fonction gbleuf

function gvert($chen=" ") {
  echo "<span class='gvert'>$chen</span>" ;
} # fin de fonction gvert

function gvertf($chen=" ") {
  echo "<span class='gvertf'>$chen</span>" ;
} # fin de fonction gvert

# pre, blockquote et les autres

function finform() {
  echo "</form>" ;
} # fin de fonction finform

function p($cla="",$id="") {
  $attr = "" ;
  if (!$cla=="") {
      $attr .= " class='$cla'" ;
  } ; # fin de si
  if (!$id=="") {
      $attr .= " id='$id'" ;
  } ; # fin de si
  sdl() ;
  echo "<p$attr>\n" ;
} # fin de fonction p

function pre($cla="",$id="") {
  $attr = "" ;
  if (!$cla=="") {
      $attr .= " class='$cla'" ;
  } ; # fin de si
  if (!$id=="") {
      $attr .= " id='$id'" ;
  } ; # fin de si
  echo "<pre $attr>\n" ;
} # fin de fonction pre

function finpre() {
  echo "</pre>\n" ;
} # fin de fonction finpre

function pre_fichier($nomfic,$cla="",$nbesp=0,$utf=0) {
  pre($cla) ;
  if (!file_exists($nomfic)) {
     print " fichier $nomfic non vu\n" ;
  } else {
  $deblig = "" ;
  if ($nbesp>0) { $deblig = copies(" ",$nbesp) ; } ;
  cmt("deblig avec $nbesp espaces : *$deblig*") ;
  $fh = fopen($nomfic,"r") ;
  echo"\n" ;
  while (!feof ($fh)) {
   $lig = fgets($fh, 4096) ;
      $lig = preg_replace("/\n/","",$lig);
      $ligs = "     " ;
      $lng  = strlen($lig) ;
      $idc = 0 ;
      while ($idc<$lng) {
        $cc = substr($lig,$idc,1) ;
        if ($cc=="<") { $cc = "&lt;" ; } ;
        if ($cc==">") { $cc = "&gt;" ; } ;
        if ($cc=="&") { $cc = "&amp;" ; } ;
        $ligs .= $cc ;
        $idc++ ;
      } ; # fintant que
      echo $deblig ;
      if ($utf==0) {
        echo $ligs ;
      } else {
        echo utf8_decode($ligs) ;
      } ; # fin si
      echo"\n" ;
  } ; # fin tant que
  fclose($fh) ;
  } ; # fin si le fichier existe

  finpre() ;
} # fin de fonction pre_fichier

function code($cla="") {
  if ($cla=="") {
      echo "<code>\n" ;
  } else {
      echo "<code class='$cla'>\n" ;
  } ; # fin de si
} # fin de fonction code

function fincode() {
  echo "</code>\n" ;
} # fin de fonction fincode

function br() {
  echo "<br />\n" ;
} # fin de fonction br

function sbr() {
  return("<br />\n") ;
} # fin de fonction br

function nbsp($rep=1) {
  echo copies("&nbsp;",$rep) ;
} # fin de fonction nbsp

function snbsp($rep=1) {
  return(copies("&nbsp;",$rep)) ;
} # fin de fonction snbsp

function s_nbsp($rep=1) {
  return(copies("&nbsp;",$rep)) ;
} # fin de fonction s_nbsp

function ptexte() {
  echo "<p class='texte'>\n" ;
} # fin de fonction p

function pj() {
  echo "<p class='texte'>\n" ;
} # fin de fonction pj

function finp() {
  sdl() ;
  echo "</p>\n" ;
  sdl() ;
} # fin de fonction finp

function pvide() {
  echo "<p>&nbsp;</p>\n" ;
} # fin de fonction pvide

function center() {
  echo "<center>\n" ;
} # fin de fonction center

function fincenter() {
  echo "</center>\n" ;
} # fin de fonction ficenter

function blockquote() {
  echo "<blockquote>\n" ;
} # fin de fonction blockquote

function finblockquote() {
  echo "</blockquote>\n" ;
} # fin de fonction finblockquote

function table($bord=0,$pad=0,$cla="",$resum="?",$xtra="") {
  sdl() ;
  $defcla = "" ;
  if (strlen($cla)>0) { $defcla = "class='$cla'" ; } ;
  echo "<table border=\"$bord\" cellpadding=\"$pad\" $defcla summary=\"$resum\" $xtra>\n" ;
} # fin de fonction table

function fintable() {
  echo "</table>\n" ;
  sdl() ;
} # fin de fonction fintable

function entetesTableau($chaineEntetes,$cla="") {
   $lesEntetes = preg_split("/\s+/",$chaineEntetes) ;
   tr($cla) ;
   foreach( $lesEntetes as $col) {
           th() ; echo preg_replace("/__/"," ",$col) ; finth() ;
   } # fin pour chaque
   fintr() ;
} # fin de fonction entetesTableau

function tr($cla="",$xtra="",$sdl=1) {
  $defcla = "" ;
  if (strlen($cla)>0) { $defcla = "class='$cla'" ; } ;
  echo "<tr" ;
  if ($defcla!="") {
     echo " $defcla" ;
  } ; # fin si
  if ($xtra!="") {
     echo " $xtra" ;
  } ; # fin si
  echo ">" ;
  if ($sdl==1) { echo "\n" ; } ;
} # fin de fonction tr

function fintr() {
  echo "</tr>\n" ;
} # fin de fonction fintr

function td($aligne="L",$cla="",$colspan="",$xtra="",$sdl=0) {
  $defcla = "" ;
  if (strlen($cla)>0)     { $defcla  = " class='$cla'" ; } ;
  if (strlen($colspan)>0) { $defcla .= " colspan='$colspan'" ; } ;
  if (strtoupper($aligne)=="R") {
     echo "<td align='right'" ;
  } elseif (strtoupper($aligne)=="C") {
     echo "<td align='center'" ;
  } else {
     echo "<td align='left'" ;
  } ; # fin si
  if ($defcla!="") {
     echo " $defcla" ;
  } ; # fin si
  if ($xtra!="") {
     echo " $xtra" ;
  } ; # fin si
  echo ">" ;
  if ($sdl==1) { echo "\n" ; } ;
} # fin de fonction td

function th($aligne="C",$cla="",$colspan="",$xtra="",$sdl=1) {
  $defcla = "" ;
  if (strlen($cla)>0)     { $defcla  = " class='$cla'" ; } ;
  if (strlen($colspan)>0) { $defcla .= " colspan='$colspan'" ; } ;
  if (strtoupper($aligne)=="R") {
     echo "<th align='right'" ;
  } elseif (strtoupper($aligne)=="C") {
     echo "<th align='center'" ;
  } else {
     echo "<th align='left'" ;
  } ; # fin si
  if ($defcla!="") {
     echo " $defcla" ;
  } ; # fin si
  if ($xtra!="") {
     echo " $xtra" ;
  } ; # fin si
  echo ">" ;
  if ($sdl==1) { echo "\n" ; } ;
} # fin de fonction th

function fintd() {
  echo "</td>\n" ;
} # fin de fonction fintd

function tdvide() {
  echo "<td>&nbsp;</td>\n" ;
} # fin de fonction tdvide

function finth() {
  echo "</th>\n" ;
} # fin de fonction finth

function tdk($aligne) {
  if (strtoupper($aligne)=="R") {
     echo "<td align='right'>\n<kbd>" ;
  } else {
     echo "<td><kbd>" ;
  } ; # fin si
} # fin de fonction tdk

function fintdk() {
  echo "</kbd>\n</td>\n" ;
} # fin de fonction fintdk

function div($cla="",$id="",$xtra="") {
  $attr = "" ;
  if (!$cla=="") {
      $attr .= " class='$cla'" ;
  } ; # fin de si
  if (!$id=="") {
      $attr .= " id='$id'" ;
  } ; # fin de si
  if (!$xtra=="") {
      $attr .= " $xtra" ;
  } ; # fin de si
  echo "<div$attr>\n" ;
} # fin de fonction div

function findiv() {
  echo "</div>\n" ;
} # fin de fonction findiv

function hr($cla="") {
  if (strlen($cla)==0) {
    echo "<hr />\n" ;
  } else {
    echo "<hr class='$cla' />\n" ;
  } ; # fin si
} # fin de fonction hr


#######################################################################################

function form($action=".",$method="get",$xtra="") {
  echo "<form action='$action' method='$method' $xtra>\n" ; ;
} # fin de fonction form

function fieldset($cla="") {
  if (strlen($cla)>0) {
     echo "<fieldset class='$cla'>\n" ;
  } else {
     echo "<fieldset>\n" ;
  } ; # fin si
} # fin de fonction fieldset

function finfieldset() {
  echo "</fieldset>\n" ;
} # fin de fonction finfieldset

function label($texte,$for,$id) {
  echo "<label for='$for' id='$id'>$texte" ;
  echo "</label>\n" ;
} # fin de fonction label

function legende($lngd,$cla="") {
  if (strlen($cla)>0) {
     echo "<legend class='$cla'>\n" ;
  } else {
     echo "<legend>\n" ;
  } ; # fin si
  echo "$lngd\n" ;
  echo "</legend>\n" ;
} # fin de fonction legende

function input_hidden($name,$value=0,$id="") {
  if ($id=="") { $id = $name ; } ;
  echo "<input type='hidden' name='$name' value='$value' id='$id' />\n" ;
} # fin de fonction input_hidden

function input_text($name,$value=0,$size="",$cla="") {
  $defcla = "" ;
  if (strlen($size)==0) { $size = "10" ; } ;
  if (strlen($cla)>0) { $defcla = "class='$cla'" ; } ;
  echo "<input type='text' id='$name' name='$name' value='$value' size='$size' $defcla />\n" ;
} # fin de fonction input_text

function input_textNoId($name,$value=0,$size="",$cla="") {
  $defcla = "" ;
  if (strlen($size)==0) { $size = "10" ; } ;
  if (strlen($cla)>0) { $defcla = "class='$cla'" ; } ;
  echo "<input type='text' name='$name' value='$value' size='$size' $defcla />\n" ;
} # fin de fonction input_textNoId

function input_password($name,$value="",$size=15,$cla="") {
  $defcla = "" ;
  if (strlen($cla)>0) { $defcla = "class='$cla'" ; } ;
  echo "<input type='password' id='$name' name='$name' value='$value' size='$size' $defcla />\n" ;
} # fin de fonction input_password

function input_checkbox($value,$display="",$cla="",$chk="") {
  if ($display=="") { $display = $value ; }  ;
  $vchk = "" ;
  if (!$chk== "") {  $vchk=" checked='checked' " ; } ;
  if (!$cla=="") { $display = "<span class='$cla'>$display</span>" ; }  ;
  echo "<input type='checkbox' id='$value' name=\"$value\" $vchk /> $display" ;
} # fin de fonction input_checkbox

function input_checkboxOnClick($name, $value, $id="", $chk="", $cla="",$onClick="", $display="") {
   $attr = "" ;
   if (!$name== "") {  $attr .= " name='$name' " ; } ;
   if (!$value=="") {  $attr .= " value='$value' " ; } ;
   if (!$id== "")   {  $attr .= " id='$id' "; } ;
   if (!$chk== "")  {  $attr .= " checked='checked' "; } ;
   if (!$onClick== "")   {  $attr .= " onclick='$onClick' "; } ;
   if (!$cla=="")   { $display = "<span class='$cla'>$display</span>" ; }  ;
   echo "<input type='checkbox' $attr /> $display\n" ;
} # fin de fonction input_checkboxOnClick

function input_radio($name,$value,$display="",$cla="",$chk="",$id="",$xtra="") {
  $attr = "" ;
  if (!$name== "") {  $attr .= " name='$name' "      ; } ;
  if (!$id== "")   {  $attr .= " id='$id' "          ; } ;
  if (!$value=="") {  $attr .= " value='$value' " ; } ;
  if (!$chk== "")  {  $attr .= " checked='checked' " ; } ;
  if (!$cla=="")   {  $display = "<span class='$cla'>$display</span>" ; }  ;
  if (!$xtra=="")  {  $attr .= " $xtra" ; }  ;
  echo "<input type='radio' $attr /> $display\n" ;
} # fin de fonction input_radio


function input_submit($value,$name="",$clas="",$xtra="") {
  echo "<input type='submit' " ;
  if (!$value=="") { echo " value='$value'" ; } ;
  if (!$name=="")  { echo " name='$name'" ; } ;
  if (!$clas=="")  { echo " class='$clas'" ; } ;
  if (!$xtra=="")  { echo " $xtra"          ; } ;
  echo " />\n" ;
} # fin de fonction input_submit

function input_reset($value,$name="",$clas="",$xtra="") {
  echo "<input type='reset' " ;
  if (!$value=="") { echo " value='$value'" ; } ;
  if (!$name=="")  { echo " name='$name'"   ; } ;
  if (!$clas=="")  { echo " class='$clas'"  ; } ;
  if (!$xtra=="")  { echo " $xtra"          ; } ;
  echo "/>\n" ;
} # fin de fonction input_reset

function input_file($name, $maxlength=123456,$extra="") {
  echo '<input type="file" id="'.$name.'" name="'.$name.'" maxlength="'.$maxlength.'" '.$extra.' />'."\n" ;
} # fin de fonction input_file


function textarea($name,$class="",$rows=8,$cols=40,$id="") {
  $attr = "" ;
  if ($name!="") {
      $attr .= " name='$name'" ;
  } ; # fin de si
  if ($class!="") {
      $attr .= " class='$class'" ;
  } ; # fin de si
  if ($id!="") {
      $attr .= " id='$id'" ;
  } ; # fin de si
  if ($rows=="") { $rows=8 ; } ;
  if ($cols=="") { $cols=40 ; } ;
  $attr .= " rows='$rows' cols='$cols'" ;
  echo "<textarea $attr>\n" ;
} # fin de fonction textarea

function textarea_fichier($name,$class="",$rows=8,$cols=40,$id="",$fichier,$deb="      ") {
  $attr = "" ;
  if (!$name=="") {
      $attr .= " name='$name'" ;
  } ; # fin de si
  if (!$class=="") {
      $attr .= " class='$class'" ;
  } ; # fin de si
  if (!$id=="") {
      $attr .= " id='$id'" ;
  } ; # fin de si
  $attr .= " rows='$rows' cols='$cols'" ;
  echo "<textarea $attr>\n" ;
  if (!file_exists($fichier)) {
     print " fichier $fichier non vu\n" ;
  } else {
  $fh = fopen($fichier,"r") ;
  echo"\n" ;
  while (!feof ($fh)) {
   $lig = fgets($fh, 4096) ;
      $lig = preg_replace("/\n/","",$lig);
      $ligs = $deb ;
      $lng  = strlen($lig) ;
      $idc = 0 ;
      while ($idc<$lng) {
        $cc = substr($lig,$idc,1) ;
        if ($cc=="<") { $cc = "&lt;" ; } ;
        if ($cc==">") { $cc = "&gt;" ; } ;
        if ($cc=="&") { $cc = "&amp;" ; } ;
        $ligs .= $cc ;
        $idc++ ;
      } ; # fintant que
      echo $ligs ;
      echo"\n" ;
  } ; # fin tant que
  fclose($fh) ;
  } ; # fin de si
  echo "</textarea>\n" ;

} # fin de fonction textarea_fichier

#######################################################################################

function input_select($name,$xtra="") {
  echo "<select id='$name' name='$name' $xtra>\n" ;
} # fin de fonction input_select

function input_select_fin() {
  echo "</select>\n" ;
} # fin de fonction input_select_fin

function finselect() {
  echo "</select>\n" ;
} # fin de fonction finselect

function input_option($value,$display="",$sel="",$id="",$xtra="") {
  if ($display=="") { $display = $value ; }  ;
  $attr = " value='$value'" ;
  if (strlen($sel)>0)   { $attr .= " selected='selected'" ; } ;
  if (strlen($id)>0)    { $attr .= " id='$id'" ; } ;
  if (strlen($xtra)>0)  { $attr .= " $xtra" ; } ;
  echo "<option$attr> $display </option>\n" ;
} # fin de fonction input_option

function listeSelectFromTxt($name,$lstValues,$numSel=1,$xtra="",$underscore=0) {
  input_select($name,$xtra) ;
  $tabValues =  preg_split("/\s+/",(trim($lstValues))) ;
  $nbe = 0 ;
  foreach ($tabValues as $elt) {
     $nbe++;
     $esel = "" ;
     if ($nbe==$numSel) { $esel = "selected" ; } ;
     if ($underscore==1) { $elt = preg_replace("/_/"," ",$elt) ; } ;
     echo "  " ;
     input_option($elt,$elt,$esel) ;
  } ; # fin pourchaque
  finselect() ;
} # fin de fonction listeSelectFromTxt

function listeSelectFromChampMySql($champ,$table,$name,$numSel=1,$xtra="",$underscore=0) {
  $que = "SELECT distinct $champ FROM $table ORDER BY $champ " ;
  $res = mysql_query($que) ;
  $lstValues = "" ;
  while ($ldr=mysql_fetch_array($res)) {
    $lstValues .= $ldr[$champ]." " ;
  } ; # fintant que
  listeSelectFromTxt($name,$lstValues,$numSel=1,$xtra="",$underscore=0) ;
} # fin de fonction listeSelectFromChampMySql

#######################################################################################

function fintextarea() {
  echo "</textarea>\n" ;
} # fin de fonction fintextarea

function noscript() {
  echo "<noscript>\n" ;
} # fin de fonction noscript

function finnoscript() {
  echo "</noscript>\n" ;
} # fin de fonction finnoscript

function abbr($bulle) {
  echo "<abbr title='$bulle'>" ;
} # fin de fonction abbr

function finabbr() {
  echo "</abbr>" ;
} # fin de fonction finabbr

#######################################################################################
#######################################################################################

# on passe la chaine en rouge fonc&eacute; (gras)

function ghRouge($chen) {
  return("<span class=\"grouge\">$chen</span>") ;
} # fin de fonction ghRouge

# on passe la chaine en bleu fonc&eacute; (gras)

function ghBleu($chen) {
  return("<span class=\"gbleu\">$chen</span>") ;
} # fin de fonction ghBleu

#######################################################################################
#######################################################################################

function img( $src , $alt="",$wi="",$id="",$cla="",$tit='') {

#######################################################################################

#echo "<!-- img src='$src' alt='$alt' -->\n" ;

  if ($alt=="")   { $alt  = "non su" ; } ;
  $attr  = "src='$src'" ;
  $attr .= " alt='$alt'" ;
  if (!$wi=="")   { $attr .= " width='$wi'" ; } ;
  if (!$id=="")   { $attr .= " id='$id'"    ; } ;
  if (!$cla=="")  { $attr .= " class='$cla'"    ; } ;
  if (!$tit=="")  { $attr .= " title='$tit'"    ; } ;

  return("<img $attr />") ;

} # fin de fonction img

#######################################################################################

function imgh( $src , $alt="",$he="") {
if ($alt=="") { $alt="non su" ; } ;
if ($he=="") { $hei="" ; } else { $hei = "height=\"$he\"" ; } ;
echo "<!-- img src='$src' alt='$alt' -->\n" ;
return "<img src='$src' alt='$alt' $hei />" ;
} # fin de fonction imgh

#######################################################################################

function ancre( $href , $nomh="",$cla="",$id="",$xtra="") {

#######################################################################################

  $attr = "" ;
  if ($nomh=="")  { $nomh=$href ; } ;
  if (!$href=="") { $attr .= " href='$href'" ; } ;
  if (!$cla=="")  { $attr .= " class='$cla'" ; } ;
  if (!$id=="")   { $attr .= " id='$id'"     ; } ;
  if (!$xtra=="") { $attr .= " $xtra"     ; } ;
  return("<a $attr>$nomh</a>") ;

} # fin de fonction ancre

#######################################################################################

function ahref( $href , $nomh="",$cla="",$id="",$xtra="") {
  return ancre($href , $nomh,$cla,$id,$xtra) ;
} # fin de fonction ahref

#######################################################################################

function href( $href , $nomh="",$cla="",$id="",$xtra="") {
  return ancre($href , $nomh,$cla,$id,$xtra) ;
} # fin de fonction href

#######################################################################################

function aname($chen , $ref) {
return "<a name=\"$ref\">$chen</a>" ;
} # fin de fonction aname

#######################################################################################

function showurlcmtbr($chen,$cmt) {

# affiche un lien suivi de br

  echo "<a href=\"$chen\">$cmt</a><br />" ;

} # fin de fonction showurlcmtbr

#######################################################################################

function showurlcmt($chen,$cmt) {

# affiche un lien

  echo "<a href=\"$chen\">$cmt</a>" ;

} # fin de fonction showurlcmt

#######################################################################################

# affiche une url en "href" et en "cmt

function showurl($chen) {
  showurlcmt($chen,$chen) ;
} # fin de fonction showurl

#######################################################################################

# affiche une url en "href" et en "cmt" suivi de br

function showurlbr($chen) {
  showurlcmtbr($chen,$chen) ;
} # fin de fonction showurlbr

#######################################################################################

function js($instr_js="") {

echo "<script type='text/javascript'>" ;
if (!$instr_js=="")  { echo $instr_js ; } ;
echo "</script>\n" ;

} # fin de fonction js

#######################################################################################

function jsf($fic_js="",$instr_js="",$charset="") {

#######################################################################################

$chrs = "" ;  # exemple : jsf2("D3node_leapdb/d3.js","","utf-8") ;

if ($charset!="") { $chrs = " charset='$charset'" ; } ;

if ($fic_js=="") {
    echo "<script type='text/javascript'$chrs>" ;
} else {
    echo "<script type='text/javascript' src='$fic_js'$chrs>" ;
} ; # fin de si
if (!$instr_js=="")  { echo $instr_js ; } ;
echo "</script>\n" ;

} # fin de fonction jsf

#######################################################################################

function debutPageMinimal($titre="",$styl="") {

#######################################################################################

echo "<?xml version='1.0' encoding='ISO-8859-1' ?>\n" ;
echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>\n" ;
echo "<html xmlns='http://www.w3.org/1999/xhtml' lang='fr' xml:lang='fr'>\n" ;

echo "<head>\n" ;
echo "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' /> \n" ;

# chargement de style(s) personnalisé(s)

if ($styl!="") {
   $tstyl = preg_split("/\s+/",trim($styl)) ;
   foreach ($tstyl as $fstyl) {
     echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$fstyl\" title=\"gh\" /> \n" ;
   } ; # fin pour
} ; # fin de si

echo "<title> \n" ;
echo "$titre&nbsp;\n" ;
echo "</title> \n" ;
echo "</head> \n" ;

echo "<body> \n" ;

} # fin de fonction debutPageMinimal

#######################################################################################

function finPageMinimal() {

#######################################################################################

echo "</body> \n" ;
echo "</html> \n" ;

} # fin de fonction finPageMinimal

#######################################################################################
#######################################################################################

function anonymousConnect($base="test") {

#######################################################################################

 mysql_connect("localhost","anonymous","anonymous") or die("probleme connexion mysql\n") ;
 mysql_query("use $base") or die("probleme mysql, base $base\n") ;

} # fin de fonction anonymousConnect

#######################################################################################

function comptageSqlSimple($champ,$table,$condition="",$dbgReq=0) {

#######################################################################################

   $esc = "COUNT($champ)";
   $req = " SELECT $esc FROM $table " ;
   if (strlen(trim($condition))>0) { $req .=  " WHERE $condition " ; } ;
   if ($dbgReq>0) { echo "\n$req\n" ; } ;
   $res = mysql_query($req) ;
   $tdr = mysql_fetch_array($res) ;
# print_r($tdr)  ;
   return( $tdr[$esc] ) ;

} # fin de fonction comptageSqlSimple

#######################################################################################

function fonctionSqlSimple($fonction,$champ,$table,$condition="",$dbgReq=0) {

#######################################################################################

   $esc = "$fonction($champ)";
   $req = " SELECT $esc FROM $table " ;
   if (strlen(trim($condition))>0) { $req .=  " WHERE $condition " ; } ;
   if ($dbgReq>0) { echo "\n$req\n" ; } ;
   $res = mysql_query($req) ;
   $tdr = mysql_fetch_array($res) ;
# print_r($tdr)  ;
   return( $tdr[$esc] ) ;

} # fin de fonction fonctionSqlSimple

#######################################################################################
#######################################################################################

function pct($nb,$tot,$nbdec=0) {

#######################################################################################

 $pct   = 100*$nb/$tot ;
 $fmt = "%5.".$nbdec."f" ;
 $f_pct = sprintf($fmt, $pct) ;
 return($f_pct) ;

} # fin de fonction pct

#######################################################################################
#######################################################################################

# Quelques objets sous le coude...

#######################################################################################
#######################################################################################

class tdm { # une table des matières cliquable

################################################################################

# Voir http://forge.info.univ-angers.fr/~gh/internet/montresource.php?nomfic=demotdmobj.php
# pour l'utilisation de cette classe

   var $rubriques = array() ;  # contient les rubriques
   var $numcrub             ;  # numéro de rubrique courante

   function tdm($rubs) {
     $this->rubriques = $rubs ;
     $this->numcrub   = 1     ;
   } # fin de fonction tdm

   function titre($tit="Table des matières cliquable") {
     h2($tit) ;
   } # fin de fonction titre

   function menu($optB="",$optN="",$cla="") {
     # le premier  paramètre, si non vide, produit un "blockquote"
     # le deuxième paramètre, si non vide, numérote les rubriques
     if (strlen($optB)>0) { blockquote() ; } ;
     $nbr = count($this->rubriques) ;
     for ($idr=1;$idr<=$nbr;$idr++) {
       p() ;
       $jdr = $idr ;
       if ($idr<10) { $jdr = "&nbsp;&nbsp;$idr" ; } ;
       if (strlen($optN)>0) { echo $jdr.". " ; } ;
          if ($cla=="") {
             echo href("#tdm$idr",$this->rubriques[$idr]) ;
          } else {
             echo href("#tdm$idr",$this->rubriques[$idr],$cla) ;
          } # fin si
       finp() ;
     } # fin pour idr
     if (strlen($optB)>0) { finblockquote() ; } ;
   } # fin de fonction menu

   function rubriqueParNumero($idrub) {
     h2(aname($this->rubriques[$idrub],"tdm$idrub")) ;
   } # fin de fonction rubriqueParNumero

   function afficheRubrique($optN="") {
     $laRub = "" ;
     if (strlen($optN)>0) {  $laRub .= $this->numcrub.". " ; } ;
     $laRub .= aname($this->rubriques[$this->numcrub],"tdm$this->numcrub") ;
     h2($laRub) ;
     $this->numcrub++  ;
   } # fin de fonction afficheRubrique

   function setNumcrub($numero) {
     $this->numcrub = $numero ;
   } # fin de fonction setNumcrub

}  # fin de classe tdm

#######################################################################################

function tableauDar($fn,$dec="") {

#######################################################################################

#
#  cette fonction affiche sous forme de tableau HTML un fichier .dar
#  le paramètre $dec contient un codage pour chacune des colonnes :
#     L pour justification à gauche
#     C pour justification centrée
#     x (numérique) pour justification à droite avec x décimales

if (!file_exists($fn)) {
  h3(" Fichier ".s_span($fn,"grouge")." non vu") ;
} else {
  $fh = fopen($fn,"r") ;
  table(1,10,"collapse") ;
  echo"\n" ;
  $nbl = 0 ;
  while (!feof ($fh)) {
    $lig = fgets($fh, 4096) ;
    if (strlen(trim($lig))>0) {
         $nbl++ ;
         tr() ;
         if ($nbl==1) {
            $entete = preg_split("/\s+/",(trim($lig))) ;
            foreach ($entete as $idc) {
              th() ;
                 echo $idc ;
              finth() ;
            } ; # fin pour chaque
         } else {
            $lignorm = preg_split("/\s+/",(trim($lig))) ;
            $jdc = -1 ;
            foreach ($lignorm as $idc) {
              $jdc++ ;
              $cdf = substr($dec,$jdc,1) ;
              $mef = $cdf ;
              $vdc = $idc ;
              if (is_numeric($cdf)) {
                 $mef = "R" ;
                 $vdc = sprintf("%0.".$cdf."f",$idc) ;
              } ; # fin si
              cmt($mef) ;
              td($mef) ;
                 echo $vdc ;
              fintd() ;
            } ; # fin pour chaque
         } ; # fin si
         fintr() ;
    } ; # fin si
  } ; # fin tant que
  fintable() ;
} ; # fin si

} # fin de fonction tableauDar

#######################################################################################

function wikifr($mot="") {

#######################################################################################

$url = "http://fr.wikipedia.org/wiki/".urlencode($mot) ;
return($url) ;

} # fin de fonction wikifr

#######################################################################################

function wikien($mot="") {

#######################################################################################

$url = "http://en.wikipedia.org/wiki/$mot" ;
return($url) ;

} # fin de fonction wikien

#######################################################################################

function objet($id="",$data="",$type="",$xtra="") {

#######################################################################################

  echo "<object" ;
  if ($id!="")   { echo ' id="'.$id.'"'     ; } ;
  if ($data!="") { echo ' data="'.$data.'"' ; } ;
  if ($type!="") { echo ' type="'.$type.'"' ; } ;
  if ($xtra!="") { echo ' '.$xtra           ; } ;
  echo " />\n" ;

} # fin de fonction objet

#######################################################################################

function debutobjet($id="",$data="",$type="",$xtra="") {

#######################################################################################

  echo "<object" ;
  if ($id!="")   { echo ' id="'.$id.'"'     ; } ;
  if ($data!="") { echo ' data="'.$data.'"' ; } ;
  if ($type!="") { echo ' type="'.$type.'"' ; } ;
  if ($xtra!="") { echo ' '.$xtra           ; } ;
  echo ">\n" ;

} # fin de fonction debutobjet

#######################################################################################

function finobjet() {

#######################################################################################

  echo "</object>\n" ;

} # fin de fonction finobjet

#######################################################################################

function svg($encoding="latin",$width=500,$height=500) {

#######################################################################################

  if ($encoding=="") { $encoding = "latin1" ; } ;
  header("Content-type: image/svg+xml") ;
  #echo '<'.'?xml version="1.0" encoding="'.$encoding.'" ?'.'>'."\n" ;
  echo '<svg xmlns="http://www.w3.org/2000/svg" width="'.$width.'" height="'.$height.'" >'."\n" ;

} # fin de fonction svg

#######################################################################################

function finsvg() {

#######################################################################################

  echo "</svg>\n" ;

} # fin de fonction finsvg

#######################################################################################

function rect($x=0,$y=0,$width=100,$height=100,$fill="white",$stroke="black",$stroke_width=5) {

#######################################################################################

  echo '<rect x="'.$x.'" y="'.$y.'" width="'.$width.'" height="'.$height.'" fill="'.$fill.'"' ;
  echo ' stroke="'.$stroke.'" stroke-width="'.$stroke_width.'" />'."\n" ;

} # fin de fonction rect

#######################################################################################
?>
