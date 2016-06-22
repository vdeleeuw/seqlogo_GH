<?php

/* general */
function headerPage($titre=""){
	echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n" ;
	echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n" ;
	echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"fr\" xml:lang=\"fr\">\n" ;
	echo "<head>\n" ;
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" /> \n" ;
	echo "<title> $titre </title> \n" ;
}// fin de fonction headerPage

function jsPage($js){
	echo "<script src=\"$js\" type=\"text/javascript\"></script>\n";	
}// fin de fonction jsPage

function cssPage($css){
	echo "<link href=\"$css\" type=\"text/css\" rel=\"stylesheet\"/>\n";
}// fin de fonction cssPage

function finHeaderPage(){
	echo "</head> \n" ;
	echo "<body> \n" ;
}// fin de fonction finHeaderPage

function finPage(){
	echo "</body> \n" ;
	echo "</html>" ;
}// fin de fonction finPage

function br(){
	echo "<br/>\n";
}// fin de fonction br

function div($classe="", $id=""){
	echo "<div";
	if($classe != ""){
		echo " class=\"$classe\"";
	}//fin if	
	if($id != ""){
		echo " id=\"$id\"";
	}//fin if
	echo ">\n";
}// fin de fonction div

function finDiv(){
	echo "</div>\n";
}// fin de fonction finDiv

function hr($largeur, $align){
	echo "<hr width=\"$largeur\" align=\"$align\">\n";
}// fin de fonction hr

/* textes */
function h1($titre=""){
	echo "<h1>$titre</h1>\n";
}// fin de fonction h1

function h2($titre=""){
	echo "<h2>$titre</h2>\n";
}// fin de fonction h2

function h3($titre=""){
	echo "<h3>$titre</h3>\n";
}// fin de fonction h3

function h4($titre=""){
	echo "<h4>$titre</h4>\n";
}// fin de fonction h4

function p($class="", $id=""){
	echo "<p";
	if($id != ""){
		echo " id=\"$id\"";
	}//fin if
	if($class != ""){
		echo " class=\"$class\"";
	}//fin if
	echo ">\n";
}// fin de fonction p

function finP(){
	echo "</p>\n";
}// fin de fonction finP

function ahref($url, $texte=""){
	echo "<a href=\"$url\">";
	if($texte != ""){
		echo $texte;
	}//fin if
	else{
		echo $url;
	}//fin else
	echo "</a>\n";
}// fin de fonction ahref


/* tableaux */
function tab($class=""){
	echo "<table";
		if($class != ""){
			echo " class=\"$class\"";
		}//fin if
	echo ">\n";
}// fin de fonction tab

function finTab(){
	echo "</table>\n";
}// fin de fonction finTab

function tabR(){
	echo "<tr>\n";
}// fin de fonction tabR

function finTabR(){
	echo "</tr>\n";
}// fin de fonction finTabR

function tabD($texte="", $align=""){
	echo "<td";
	if($align != ""){
		echo " align=\"$align\"";
	}//fin if
	echo ">$texte</td>\n";
}// fin de fonction tabD

function tabH($texte="", $align=""){
	echo "<th";
	if($align != ""){
		echo " align=\"$align\"";
	}//fin if
	echo ">$texte</th>\n";
}// fin de fonction tabH


/* formulaire */
function form($action){
	echo "<form method=\"post\" action=\"$action\" enctype=\"multipart/form-data\">\n";
}// fin de fonction form

function submitButton(){
	echo "<input type=\"submit\" value=\"Valider\"/>\n";
}// fin de fonction submitButton

function textareaField($name, $id="", $cols="", $rows="", $texte=""){
	echo "<textarea name=\"$name\" id=\"$id\" rows=\"$rows\" cols=\"$cols\">$texte</textarea>\n";
}// fin de fonction textareaField

function label($texte, $title, $id=""){
	echo "<label title=\"$title\"";
	if($id != ""){
		echo " for=\"$id\"";
	}//fin si 
	echo ">$texte</label>\n";
}// fin de fonction label

function textField($name,$value){
	echo "<input type=\"text\" id=\"$name\" name=\"$name\" value=\"$value\"/>\n";
}// fin de fonction textField

function ficField($id, $name){
	echo "<input type=\"file\" id=\"$id\" name=\"$name\"/>\n";
}// fin de fonction ficField

function fieldset($legend, $title){
	echo "<fieldset>\n";
	echo "<legend title=\"$title\">$legend</legend>\n";
}// fin de fonction fieldset

function finFieldset(){
	echo "</fieldset>\n";
}// fin de fonction finFieldset

function buttonRadio($name, $value, $checked="", $id="", $onclick=""){
	echo "<input type=\"radio\" ";
	if($id != ""){
		echo "id=\"$id\" ";
	}//fin if
	echo "name=\"$name\" value=\"$value\"";
	if($checked == $value){
		echo " checked=\"checked\"";
	}//fin if
	if($onclick != ""){
		echo " onclick=\"$onclick\"";
	}//fin if
	echo "/> $value\n";
}// fin de fonction buttonRadio

function button($value, $fct){
	echo "<input type=\"button\" name=\"$value\" value=\"$value\" onclick=\"$fct\"/>\n";
}// fin de fonction button

function finForm(){
	div();
	echo "<input type=\"reset\" value=\"Reset\"/>\n";
	submitButton();
	finDiv();
	echo "</form>\n";
}// fin de fonction finForm


/* exemples */
function buttonEx($id, $value){
	echo "<input type=\"button\" value=\"$value\" onclick=\"affEx($id)\"/>\n";
}// fin de fonction buttonEx


function scriptJS($script){
	echo "<script type=\"text/javascript\">\n";
	echo $script;
	echo "</script>\n";
}// fin de fonction scriptJS

?>
