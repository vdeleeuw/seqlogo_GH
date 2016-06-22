<?php

/***************************************
******* DE LEEUW VALERIAN 2016 *********
***** PROJET MASTER 1 INFO ANGERS ******
******* TUTEUR : GILLES HUNAULT ********
***************************************/


error_reporting(E_ALL|E_NOTICE|E_STRICT); 
require_once("fct.php");
require_once("fctSVG.php");

/***************************************
****** variables initialisations *******
***************************************/
//texte
$texte="";
$lien="";
$fichier="";
$typeTexte="fasta";

//traitement
$tri="alphabetique";
$espace="non";
$chiffre="oui";
$nbDec=0;
$pMini=0;

//delim
$decoupeFasta = "unique";
$casse = "non";
$delimiteur="";
$ignoreClasse="";

//graphiques
//seqlogo
$yAxe="entier";
$quadrillage="oui";
$largeurLettre = 100;
$largeurLettreGroupement = 200;
$hauteurSeq = 500;

//arbre
$nbNiveauArbre = 3;
$largeurArbre = 1000;
$hauteurArbre= 500;

//krona
$nbNiveauKrona = 3;
$sensKrona = "normal";
$fusion = "non";


/***************************************
******* variables récupérations ********
***************************************/
//texte
if(isset($_POST["typeTexte"])){
	$typeTexte = $_POST["typeTexte"];
}//fin if
if(isset($_POST["texte"])){
	$texte = $_POST["texte"];
}//fin if
if(isset($_POST["lien"])){
	$lien = $_POST["lien"];
}//fin if

//traitement
if(isset($_POST["nbDec"])){
	$nbDec = $_POST["nbDec"];
}//fin if
if(isset($_POST["triTexte"])){
	$tri = $_POST["triTexte"];
}//fin if
if(isset($_POST["pMini"])){
	$pMini = $_POST["pMini"];
}//fin if
if(isset($_POST["espace"])){
	$espace = $_POST["espace"];
}//fin if
if(isset($_POST["chiffre"])){
	$chiffre = $_POST["chiffre"];
}//fin if

//delimiteur
if(isset($_POST["delimiteur"])){
	$delimiteur = $_POST["delimiteur"];
}//fin if
if(isset($_POST["casse"])){
	$casse = $_POST["casse"];
}//fin if
if(isset($_POST["decoupeFasta"])){
	$decoupeFasta = $_POST["decoupeFasta"];
}//fin if
if(isset($_POST["ignoreClasse"])){
	$ignoreClasse = $_POST["ignoreClasse"];
}//fin if

//graphiques
//seqlogos
if(isset($_POST["largeurLettre"])){
	$largeurLettre = $_POST["largeurLettre"];
}//fin if
if(isset($_POST["largeurLettreGroupement"])){
	$largeurLettreGroupement = $_POST["largeurLettreGroupement"];
}//fin if
if(isset($_POST["hauteurSeq"])){
	$hauteurSeq = $_POST["hauteurSeq"];
}//fin if
if(isset($_POST["quadrillage"])){
	$quadrillage = $_POST["quadrillage"];
}//fin if
if(isset($_POST["yAxe"])){
	$yAxe = $_POST["yAxe"];
}//fin if

//arbre
if(isset($_POST["nbNiveauArbre"])){
	$nbNiveauArbre = $_POST["nbNiveauArbre"];
}//fin if
if(isset($_POST["hauteurArbre"])){
	$hauteurArbre = $_POST["hauteurArbre"];
}//fin if
if(isset($_POST["largeurArbre"])){
	$largeurArbre = $_POST["largeurArbre"];
}//fin if


//krona
if(isset($_POST["nbNiveauKrona"])){
	$nbNiveauKrona = $_POST["nbNiveauKrona"];
}//fin if
if(isset($_POST["sensKrona"])){
	$sensKrona = $_POST["sensKrona"];
}//fin if
if(isset($_POST["fusion"])){
	$fusion = $_POST["fusion"];
}//fin if


/***************************************
******** Debut de la page HTML *********
***************************************/
headerPage("SeqLogos");
	cssPage("./css/style.css");
	//si des graphiques sont déssinés et que l'on en a besoin
	if(isset($_FILES["fichier"]) || isset($_POST["texte"]) || isset($_POST["lien"])){
		cssPage("./css/seqlogo.css");
		cssPage("./css/arbre.css");
		jsPage("./js/d3.js");
		jsPage("./js/sorttable.js");
	}//fin if
	jsPage("./js/krona.js");	//krona doit être chargé ici sinon ne fonctionne pas
	jsPage("./js/fct.js");
	jsPage("./js/exemples.js");
finHeaderPage();


h1("Génération de SeqLogos");

//exemples
h3("Exemples avec texte non délimité (texte unique)\n");
	p();
	buttonEx(2, "Fasta ADN");
	buttonEx(1, "Fasta Protéines");
	buttonEx(5, "Texte Français");
	buttonEx(6, "Texte Anglais");
	br();
finP();
h3("Exemples avec texte délimité (plusieurs textes pour comparer)\n");
p();
	buttonEx(4, "Fasta ADN");
	buttonEx(3, "Fasta Protéines");
	buttonEx(8, "Texte Français");
	buttonEx(7, "Texte Anglais");
	buttonEx(9, "Texte Francais/Anglais/Espagnol");
	br();
finP();
h3("Exemples avec des extraits de LEAPdb et SHSPdb \n");
p();
	buttonEx(10, "Ex LEAPdb");
	buttonEx(11, "Ex SHSPdb");
	br();br();
finP();

//aide
h4("Documentation et aide");
p();
	echo "Si une option vous semble floue, vous pouvez la survoler avec votre souris pour avoir une infobulle la détaillant.";
	br();
	echo "Vous pouvez aussi consulter la page d'";
	ahref("./aide.php", "aide");
	br();
	echo "Une documentation des fonctions en php conceptuel est disponible ";
	ahref("./doc/docFct.php", "ici");
	br();
	echo "Une autre documentation des fonctions servant pour le svg est disponible ";
	ahref("./doc/docFctSVG.php", "là");
	br();
	echo "Le code source de ce site est ";
	ahref("./seqlogo.zip", "téléchargeable");
	br();br();
finP();

/***************************************
********* Debut du formulaire **********
***************************************/
//formulaire
form("seqlogo.php");
	p();
	echo "Valider l'exemple : ";
	submitButton();	
	finP();
	//texte
	fieldset("Texte", "Le texte qui sera traité par le site.");
		echo "Saisissez votre texte...\n";
		br();
		textareaField("texte", "zoneTexte", 100, 25, $texte);
		br();
		echo "ou utilisez votre fichier :\n";
		ficField("ficEntree", "fichier");
		br();
		echo "ou utilisez un lien :\n";
		textField("lien",$lien);
		//format
		br(); br();
		label("Type de données :", "Le type du texte entré afin d'effectuer son traitement.");
		buttonRadio("typeTexte","fasta", $typeTexte, "fasta", "FastaClk()"); 
		buttonRadio("typeTexte","texte", $typeTexte, "texte", "TexteClk()"); 
	//traitement
	br();
	finFieldset();
	fieldSet("Traitement", "Tout ce qui concerne la façon de traiter notre texte.");
		//tri
		label("Type de tri : ", "Permet de préciser comment trier les données pour l'affichage en tableau et en graphique.");
		buttonRadio("triTexte","alphabetique",$tri); 
		buttonRadio("triTexte","occurence",$tri);
		//espace
		br();
		label("Considérer l'espace comme une lettre : ", "Permet de compter les espaces afin de les gérer comme une lettre.");
		buttonRadio("espace","oui",$espace); 
		buttonRadio("espace","non",$espace);
		//chiffres
		br();
		label("Considérer les chiffres comme des lettres : ", "Permet de compter les chiffres afin de les gérer comme des lettres.");
		buttonRadio("chiffre","oui",$chiffre); 
		buttonRadio("chiffre","non",$chiffre);
		//décimales
		br();br();
		label("Nombre de décimales :", "Précise le nombre de décimales à afficher dans les tableaux.", "nbDec");
		textField("nbDec",$nbDec);
		button("+","incDec(nbDec,10,1)");
		button("-","decDec(nbDec,0,1)");
		br();
		//%age mini
		label("Afficher à partir de (%) :", "Fait en sorte d'afficher uniquement les lettres plus présentes que le pourcentage indiqué.", "pMini"); 
		textField("pMini",$pMini);
		button("+","incDec(pMini,100,1)");
		button("-","decDec(pMini,0,1)");
	finFieldset();
	//delimiteur
	fieldSet("Délimiteur", "Tout ce qui concerne le découpage du texte en sous-parties afin de les comparer.");
		div("", "FastaOptions1");
		label("Type de découpage Fasta :", "Le découpage du texte Fasta entré afin d'effectuer son traitement.");
		buttonRadio("decoupeFasta","classe", $decoupeFasta, "classe"); 
		buttonRadio("decoupeFasta","unique", $decoupeFasta, "unique"); 		
		br();	
		label("Classes à ignorer :", "Définit les numéros des classes à ignorer (à séparer avec un espace).", "ignoreClasse"); 
		textField("ignoreClasse",$ignoreClasse);
		br();br();
		finDiv();
		label("Sensible à la casse : ", "Si le délimiteur est sensible à la casse, il faut respecter les majuscules/minuscules !");
		buttonRadio("casse","oui",$casse);
		buttonRadio("casse","non",$casse);
		br();
		label("Délimiteur du texte :", "Définit un mot ou une phrase pour découper le texte en sous-parties.", "delimiteur"); 
		textField("delimiteur",$delimiteur);
	finFieldset();
	//graphique
	fieldSet("Graphiques", "Paramètres des graphiques à générer.");	
		fieldSet("Seqlogos", "Graphique sous forme d'histogramme avec des lettres aux lieu des barres habituelles.");			
			label("Hauteur de l'axe Y :", "Permet d'afficher ou non l'axe Y en entier ou de l'adapter a la plus grande valeur de nos données"); 
			buttonRadio("yAxe","entier", $yAxe); 
			buttonRadio("yAxe","automatique", $yAxe); 
			br();
			label("Quadrillage :", "Permet d'afficher ou non un quadrillage sur le graphique."); 
			buttonRadio("quadrillage","oui", $quadrillage); 
			buttonRadio("quadrillage","non", $quadrillage); 
			br();br();
			label("Hauteur des graphiques :", "Permet de définir la hauteur maximum du seqlogo.", "hauteurSeq"); 
			textField("hauteurSeq",$hauteurSeq);
			button("+","incDec(hauteurSeq,1000,100)");
			button("-","decDec(hauteurSeq,100,100)");
			br();
			label("Largeur par lettre :", "Permet de définir la largeur de chaque lettre sur le seqlogo.", "largeurLettre"); 
			textField("largeurLettre",$largeurLettre);
			button("+","incDec(largeurLettre,1000,100)");
			button("-","decDec(largeurLettre,100,100)");
			br();
			div("", "FastaOptions2");
			label("Largeur par groupement de lettres :", "Permet de définir la largeur des groupements de lettre pour les groupements protéiniques", "largeurLettreGroupement"); 
			textField("largeurLettreGroupement",$largeurLettreGroupement);
			button("+","incDec(largeurLettreGroupement,1000,100)");
			button("-","decDec(largeurLettreGroupement,100,100)");
			finDiv();
		finFieldSet();
		fieldSet("Arbre", "Correspond à un graphique en arbre des lettres de notre texte.");	
			label("Largeur de l'arbre :", "Permet de définir la largeur maximum de l'arbre.", "largeurArbre"); 
			textField("largeurArbre",$largeurArbre);
			button("+","incDec(largeurArbre,2000,100)");
			button("-","decDec(largeurArbre,100,100)");
			br();
			label("Hauteur de l'arbre :", "Permet de définir la hauteur maximum de l'arbre.", "hauteurArbre"); 
			textField("hauteurArbre",$hauteurArbre);
			button("+","incDec(hauteurArbre,2000,100)");
			button("-","decDec(hauteurArbre,100,100)");
			br();	
			label("Profondeur de l'arbre :", "Correspond au nombre de lettres à prendre à la fois pour découper le texte.", "nbNiveauKrona" ); 
			textField("nbNiveauArbre",$nbNiveauArbre);
			button("+","incDec(nbNiveauArbre,10,1)");
			button("-","decDec(nbNiveauArbre,1,1)");
		finFieldSet();
		fieldSet("Krona", "Correspond à un graphique en camembert des lettres de notre texte.");
			label("Fusion des catégories uniques : ", "Fusionne ou non les catégories sur le graphique krona (option collapse)");
			buttonRadio("fusion","oui",$fusion);
			buttonRadio("fusion","non",$fusion);
			br();
			label("Sens de la lecture : ", "Permet de découper le texte en partant du début ou de la fin.");
			buttonRadio("sensKrona","normal",$sensKrona);
			buttonRadio("sensKrona","inverse",$sensKrona);
			br();br();
			label("Nombre de niveaux :", "Correspond au nombre de lettres à prendre à la fois pour découper le texte.", "nbNiveauKrona" ); 
			textField("nbNiveauKrona",$nbNiveauKrona);
			button("+","incDec(nbNiveauKrona,10,1)");
			button("-","decDec(nbNiveauKrona,1,1)");
		finFieldSet();
	finFieldset();	
finForm();


/***************************************
****** Generation des graphiques *******
***************************************/
div("", "result");
if(isset($_FILES["fichier"]) || isset($_POST["texte"]) || isset($_POST["lien"])){	
	//recuperation du texte   
	if($_FILES["fichier"]["error"] != UPLOAD_ERR_NO_FILE){
		$texte=file_get_contents($_FILES["fichier"]["tmp_name"]);
	}//fin if
	//url
	else if($_POST["lien"] != ""){
		$texte=file_get_contents($_POST["lien"]);
	}//fin if
	//texte
	else if($_POST["texte"] != ""){
		$texte=$_POST["texte"];
	}//fin if	
	//si rien
	else{
		h2("Vous devez saisir un texte à analyser !");
		break;
	}//fin else

	
	//verification des sequences fasta valides
	if($typeTexte == "fasta"){
		$texteTmp = strtoupper($texte);
		$texteTmp = preg_replace("/(>(.*)\n)/", "", $texteTmp); 
		if(preg_match("/[BJOUXZ]/",  $texteTmp)){
			h2("La séquence fasta saisie n'est pas valide !");
			p();
				echo "La séquence contient une lettre qui n'est pas un acide aminé (B, J, O, U, X, Z)\n";
			finP();
			break;
		}//fin if
	}//fin if	


	//suppression caracteres speciaux 
	setlocale(LC_CTYPE, "fr_FR.UTF-8");
	$texte=iconv("UTF-8", "ASCII//TRANSLIT//IGNORE", $texte);


	//test casse
	if($casse == "non"){
		$texte=strtoupper($texte);
		$delimiteur=strtoupper($delimiteur);
	}//fin if


	$texteSeqCla = "texte";
	//suppression fasta par classe
	if($typeTexte == "fasta"){
		$texteSeqCla="séquence";
		//par classe
		if($decoupeFasta == "classe"){
			$texteSeqCla="classe";
			//preparation des classes
			$texteTmp=preg_replace("/(>(.*)_(C|c)(l|L)_)/", "", $texte); 
			$texteTmp=preg_replace("/[\\n\\t\ \\r]/", "", $texteTmp); 
			while($texteTmp != ""){
				//traitement texte
				preg_match("/[0-9]{1,2}/", $texteTmp, $numClass);
				preg_match("/[A-Z]+/", $texteTmp, $texteClass);
				$texteDecoupe[$numClass[0]] .= $texteClass[0];
				$texteTmp = preg_replace("/".($texteClass[0])."/", "", $texteTmp, 1);
				$texteTmp = preg_replace("/".($numClass[0])."/", "", $texteTmp, 1);
			}//fin while
			//classes a ignorer
			$tabIgnoreClass = explode(" ", $ignoreClasse);
			foreach($tabIgnoreClass as $cle => $elem){
				unset($texteDecoupe[$elem]);
			}//fin foreach
			ksort($texteDecoupe);

			//titres
			foreach($texteDecoupe as $cle => $elem){
				$tabTitres[$cle] = $cle;
			}//fin foreach
		}//fin if

		//par sequence
		if($decoupeFasta == "unique"){
			$delimiteur="-#!#!#-";
			$i=0;

			//premier nom
			preg_match("/(>(.*)\n)/", $texte, $tabTitresTmp);
			$tabTitres[$i] = $tabTitresTmp[0];
			$texte=preg_replace("/(>(.*)\n)/", "", $texte, 1);
			$i++;

			//nom suivants
			while(preg_match("/(>(.*)\n)/", $texte, $tabTitresTmp)){
				$texte=preg_replace("/(>(.*)\n)/", $delimiteur, $texte, 1);  	
				$tabTitres[$i] = $tabTitresTmp[0];
				$i++;
			}//fin while

			foreach($tabTitres as $cle => $elem){	
				$tabTitres[$cle] = substr($elem, 1, strpos($elem, " "));
				if(strlen($tabTitres[$cle]) > 8){
					$tabTitres[$cle] = substr($tabTitres[$cle], 0, 8);
					$tabTitres[$cle] .= "...";
				}//fin if	
			}//fin foreach
		}//fin if
	}//fin if


	//decoupage via delimiteur
	$nbDelim = 0;
	if($decoupeFasta != "classe"){ 
		if($delimiteur != ""){
			$nbDelim = mb_substr_count($texte,$delimiteur);
		}//fin if

		$texteTmp = $texte;
		//traitement texte découpé
		for($i=0;$i<=$nbDelim;$i++){
			$texteDecoupe[$i] = strstr($texteTmp, $delimiteur, true);
			if($texteDecoupe[$i] == "" && $i == $nbDelim && $texteTmp != ""){
				$texteDecoupe[$i] = $texteTmp;
			}//fin if
			$texteTmp = preg_replace("/".preg_quote($texteDecoupe[$i])."/", "", $texteTmp, 1);
			$texteTmp = preg_replace("/".preg_quote($delimiteur)."/", "", $texteTmp, 1);
		}//fin for
	}//fin if

	//tableau de "titres"
	if($typeTexte == "texte" && count($texteDecoupe) > 1){
		foreach($texteDecoupe as $cle => $elem){
			$i = 8;
			while(strlen(trim(substr($elem, 0, $i))) < 8){
				$i++;
			}//fin while
			$titreTmp = trim(substr($elem, 0, $i));
			$titreTmp = preg_replace("/[^A-Z\ 0-9]/", "", $titreTmp);
			$titreTmp .= "..."; 

			$tabTitres[$cle] = $titreTmp;	
		}//fin foreach
	}//fin if

	//suprression caracteres spéciaux
	for($i=0;$i<=$nbDelim;$i++){
		$texteDecoupe[$i]=strtoupper($texteDecoupe[$i]);
		//chiffre
		if($chiffre == "non"){
			$texteDecoupe[$i]=preg_replace("/[0-9]", "", $texteDecoupe[$i]); 
		}//fin if
		//espace
		if($espace == "oui"){
			$texteDecoupe[$i]=preg_replace("/[\ \\t]/", "_", $texteDecoupe[$i]); 
		}
		$texteDecoupe[$i]=preg_replace("/[^A-Z\_0-9]/", "", $texteDecoupe[$i]); 
	}//fin for


	//verification si non vide
	foreach($texteDecoupe as $cle => $elem){
		if($elem == ""){
			unset($texteDecoupe[$cle]);
		}//fin if
	}//fin foreach

	//tableau de tout le texte
	$long = 0;
	foreach($texteDecoupe as $cle => $elem){
		for($j=0; $j<strlen($elem); $j++){
			$tabTotal[$elem[$j]] += 1;
			$long++;
		}//fin for
	}//fin foreach


	//tableau de tableau de chaque section découpé
	foreach($texteDecoupe as $cle => $elem){
		for($j=0; $j<strlen($elem); $j++){
			$tabSection[$cle][$elem[$j]] += 1;
		}//fin for
	}//fin foreach

	
	//mise en % de tout le texte 
	foreach($tabTotal as $cle => $elem){
		$tabTotal[$cle]=$elem*100/$long;
	}//fin foreach


	//mise en % de chaque section
	foreach($texteDecoupe as $cle => $elem){
		foreach($tabSection[$cle] as $cle1 => $elem1){
			$tabSection[$cle][$cle1]=$elem1*100/strlen($elem);
		}//fin foreach
	}//fin foreach


	//creation de tableau de groupement par section et total
	if($typeTexte == "fasta" && count($tabTotal)>4){
		//tab total
		$tabTotalGroupement["D+E"] = $tabTotal["D"]+$tabTotal["E"];
		$tabTotalGroupement["K+R"] = $tabTotal["K"]+$tabTotal["R"];
		$tabTotalGroupement["D+E+K+R"] = $tabTotal["D"]+$tabTotal["E"]+$tabTotal["K"]+$tabTotal["R"];
		$tabTotalGroupement["D+E-K-R"] = $tabTotal["D"]+$tabTotal["E"]-$tabTotal["K"]-$tabTotal["R"];
		$tabTotalGroupement["A+I+L+V"] = $tabTotal["A"]+$tabTotal["I"]+$tabTotal["L"]+$tabTotal["V"];
		$tabTotalGroupement["F+W+Y"] = $tabTotal["Y"]+$tabTotal["F"]+$tabTotal["W"];
		$tabTotalGroupement["N+Q"] = $tabTotal["Q"]+$tabTotal["N"];
		$tabTotalGroupement["S+T"] = $tabTotal["S"]+$tabTotal["T"];
		$tabTotalGroupement["C+W"] = $tabTotal["C"]+$tabTotal["W"];
		$tabTotalGroupement["R+E+S+P"] = $tabTotal["R"]+$tabTotal["E"]+$tabTotal["S"]+$tabTotal["P"];
		$tabTotalGroupement["C+F+Y+W"] = $tabTotal["C"]+$tabTotal["F"]+$tabTotal["Y"]+$tabTotal["W"];
		//Tab section
		if(count($tabSection) > 1){
			foreach($tabSection as $cle => $elem){
				$tabSectionGroupement[$cle]["D+E"] = $elem["D"]+$elem["E"];
				$tabSectionGroupement[$cle]["K+R"] = $elem["K"]+$elem["R"];
				$tabSectionGroupement[$cle]["D+E+K+R"] = $elem["D"]+$elem["E"]+$elem["K"]+$elem["R"];
				$tabSectionGroupement[$cle]["D+E-K-R"] = $elem["D"]+$elem["E"]-$elem["K"]-$elem["R"];
				$tabSectionGroupement[$cle]["A+I+L+V"] = $elem["A"]+$elem["I"]+$elem["L"]+$elem["V"];
				$tabSectionGroupement[$cle]["F+W+Y"] = $elem["Y"]+$elem["F"]+$elem["W"];
				$tabSectionGroupement[$cle]["N+Q"] = $elem["Q"]+$elem["N"];
				$tabSectionGroupement[$cle]["S+T"] = $elem["S"]+$elem["T"];
				$tabSectionGroupement[$cle]["C+W"] = $elem["C"]+$elem["W"];
				$tabSectionGroupement[$cle]["R+E+S+P"] = $elem["R"]+$elem["E"]+$elem["S"]+$elem["P"];
				$tabSectionGroupement[$cle]["C+F+Y+W"] = $elem["C"]+$elem["F"]+$elem["Y"]+$elem["W"];
			}//fin for
		}//fin if
	}//fin if


	//suppresion des trop petits %
	foreach($tabTotal as $cle => $elem){
		if($tabTotal[$cle] < $pMini){
			unset($tabTotal[$cle]);
		}//fin if
	}//fin foreach
	foreach($tabTotalGroupement as $cle => $elem){
		if($tabTotalGroupement[$cle] < $pMini){
			unset($tabTotalGroupement[$cle]);
		}//fin if
	}//fin foreach
	foreach($tabSection as $cle => $elem){
		foreach($elem as $cle1 => $elem1){
			if($elem[$cle1] < $pMini){
				unset($tabSection[$cle][$cle1]);
			}//fin if
		}//fin foreach
	}//fin foreach
	foreach($tabSectionGroupement as $cle => $elem){
		foreach($elem as $cle1 => $elem1){
			if($elem[$cle1] < $pMini){
				unset($tabSectionGroupement[$cle][$cle1]);
			}//fin if
		}//fin foreach
	}//fin foreach


	//tri
	if($tri == "alphabetique"){	
		ksort($tabTotal, SORT_STRING);
		ksort($tabTotalGroupement, SORT_STRING);
		foreach($tabSection as $cle => $elem){
			ksort($tabSection[$cle], SORT_STRING);
		}//fin foreach
		foreach($tabSectionGroupement as $cle => $elem){
			ksort($tabSectionGroupement[$cle], SORT_STRING);
		}//fin foreach
	}//fin if
	if($tri == "occurence"){	
		arsort($tabTotal);
		arsort($tabTotalGroupement);
		foreach($tabSection as $cle => $elem){
			arsort($tabSection[$cle]);
		}//fin foreach
		foreach($tabSectionGroupement as $cle => $elem){
			arsort($tabSectionGroupement[$cle]);
		}//fin foreach
	}//fin if


	/***************************************
	**** Generation du graphique Krona *****
	***************************************/
	//ecriture dans un fichier
	$tmpFnameKronaTxt = tempnam(sys_get_temp_dir(), "krona_");
	$tmpFnameKronaHtml = $tmpFnameKronaTxt.".html";
	$tmpFnameKronaTxt .= ".txt";
	$fp = fopen($tmpFnameKronaTxt, "w+");
	//traitement	
	foreach($texteDecoupe as $cleDec => $elemDec){
		//remise à zero
		$texteTmp = $elemDec;
		unset($tabTotalParNiveau);
		//sensKrona
		if($sensKrona == "inverse"){
			$texteTmp = strrev($texteTmp);
		}//fin if
		$texteParNiveau = str_split($texteTmp, $nbNiveauKrona);
		foreach($texteParNiveau as $cle => $elem){
			$tabTotalParNiveau[$elem] += 1;
		}//fin foreach
		foreach($tabTotalParNiveau as $cle => $elem){
			$tmpLigne = $elem;
			if(count($tabSection) > 1){
				$tmpLigne .= "\t";
				if($texteSeqCla == "classe"){
					$tmpLigne .= "classe "; 
				}//fin if
				$tmpLigne .= $tabTitres[$cleDec];
			}//fin if
			for($j=1;$j<$nbNiveauKrona;$j++){
				if(strlen($cle) > $j){
					$tmpLigne .= "\t";
					for($k=0;$k<$j;$k++){
						$tmpLigne .= $cle[$k];
					}//fin for
				}//fin if
			}//fin for
			$tmpLigne .= "\t".$cle."\n";
			fwrite($fp, $tmpLigne);
		}//fin foreach
	}//fin foreach
	fclose($fp);
	//execution
	exec("./krona/kronaGen.sh $tmpFnameKronaTxt $tmpFnameKronaHtml");


	/***************************************-
	****** Generation de l'arbre D3 ********
	***************************************/
	//ecriture dans un fichier
	$tmpFnameTreeData = tempnam(sys_get_temp_dir(), "treeData_");
	$tmpFnameTreeData .= ".js";
	$fp = fopen($tmpFnameTreeData, "w+");
	//debut du fichier
	fwrite($fp, "var margin = {top: 20, right: 100, bottom: 20, left: 100};\n");	
	fwrite($fp, "var width = $largeurArbre - margin.right - margin.left;\n");
	fwrite($fp, "var height = $hauteurArbre - margin.top - margin.bottom;\n\n");
	fwrite($fp, "var treeData = [ \n{ \"name\": \"all\",\n\"children\": [\n");
	//ecriture du fichier		
	foreach($texteDecoupe as $cleDec => $elemDec){
		//remise à zero
		unset($tabDecParNiveau);
		//debut ecriture
		if(count($tabSection) > 1){
			$tmpLigne = "{\"name\": \"";
			if($texteSeqCla == "classe"){
				$tmpLigne .= "classe "; 
			}//fin if
			$tmpLigne .= $tabTitres[$cleDec]." (".round(strlen($elemDec)/$long*100,$nbDec)." %)\",\n";
			$tmpLigne .= "\"children\": [\n";
			fwrite($fp, $tmpLigne);
		}//fin if
		//comptage
		$texteNiveau = str_split($elemDec, $nbNiveauArbre);
		foreach($texteNiveau as $cle => $elem){
			if(strlen($elem) != $nbNiveauArbre){
				break;
			}//fin if
			for($i=1;$i<=$nbNiveauArbre;$i++){
				$tabDecParNiveau[substr($elem,0,$i)] += 1;
			}//fin for
		}//fin foreach
		//tri
		ksort($tabDecParNiveau);
		//ecriture
		$nbFermeture = 0;
		$longCle = -1;
		foreach($tabDecParNiveau as $cle => $elem){
			if(strlen($cle) < $longCle){
				$nbDiff = $nbFermeture - strlen($cle) + 1;
				for($i=0;$i<$nbDiff;$i++){
					fwrite($fp, "]\n},\n");
				}//fin for
				$nbFermeture -= $nbDiff;
			}//fin if
			if(strlen($cle) != $nbNiveauArbre){
				fwrite($fp, "{\"name\": \"$cle ($elem)\",\n");
				fwrite($fp, "\"children\": [\n");
				$nbFermeture++;
			}//fin if
			else{
				fwrite($fp, "{\"name\": \"$cle ($elem)\"},\n");
			}//fin else
			$longCle = strlen($cle);
		}//fin foreach	
		for($i=0;$i<$nbFermeture;$i++){
			fwrite($fp, "]\n},\n");
		}//fin for
		if(count($tabSection) > 1){
			fwrite($fp, "]\n},\n");
		}//fin if
	}//fin foreach
	fwrite($fp, "]\n}\n];");
	fclose($fp);


	/***************************************
	******* Affichage des tableaux *********
	***************************************/
	h1("Statistiques");
	h3("Informations globales :");
	p();
		echo "Longueur totale du texte : $long lettres\n";
	finP();
	tab();
		tabR();
			tabH("lettre");
			foreach($tabTotal as $cle => $elem){
				tabH($cle);
			}//fin foreach
		finTabR();
		tabR();
			tabH("%");
			foreach($tabTotal as $cle => $elem){
				tabD(round($elem,$nbDec),"right");
			}//fin foreach
		finTabR();
	finTab();
	br();
	//info combi
	if(count($tabTotalGroupement)>0){
		tab();
			tabR();
				tabH("combinaison");
				foreach($tabTotalGroupement as $cle => $elem){
					tabH($cle, "center");
				}//fin foreach
			finTabR();
			tabR();
				tabH("%");
				foreach($tabTotalGroupement as $cle => $elem){
					tabD(round($elem,$nbDec),"right");
				}//fin foreach
			finTabR();
		finTab();
		br();
	}//fin if


	//affichages sections
	if(count($tabSection) > 1){
		foreach($tabSection as $cleSec => $elemSec){
			h3("Informations $texteSeqCla ".$tabTitres[$cleSec]." :");
			p();
				echo "Longueur de $texteSeqCla ".$tabTitres[$cleSec]." : ".strlen($texteDecoupe[$cleSec])." lettres\n";
			finP();
			tab();
				tabR();
					tabH("lettre");
					foreach($elemSec as $cle => $elem){
						tabH($cle);
					}//fin foreach
				finTabR();
				tabR();
					tabH("%");
					foreach($elemSec as $cle => $elem){
						tabD(round($elem,$nbDec),"right");
					}//fin foreach
				finTabR();
			finTab();
			br();
			//info class
			if(count($tabSectionGroupement[$cleSec])>0){
				tab();
					tabR();
						tabH("combinaison");
						foreach($tabSectionGroupement[$cleSec] as $cle => $elem){
							tabH($cle);
						}//fin foreach
					finTabR();
					tabR();
						tabH("%");				
						foreach($tabSectionGroupement[$cleSec] as $cle => $elem){
								tabD(round($elem, $nbDec), "right");
						}//fin foreach
					finTabR();
				finTab();
				br();
			}//fin if
		}//fin for
	}//fin if


	//comparaisons
	if(count($tabSection) > 1){
		h1("Comparaisons");

		h3("Longueurs :");
		tab();
			tabR();
				tabH("$texteSeqCla");
				foreach($texteDecoupe as $cle => $elem){
					tabH($tabTitres[$cle]);						
				}//fin foreach	
			finTabR();	
			tabR();
				tabH("longueur");
				foreach($texteDecoupe as $cle => $elem){
					tabD(strlen($elem), "right");
				}//fin foreach
			finTabR();	
		finTab();


		$tabTotalAlpha = $tabTotal;
		ksort($tabTotalAlpha);
		h3("Lettres :");
		tab("sortable");
			tabR();
				tabH("lettre");
				foreach($tabTotalAlpha as $cle => $elem){
					tabH($cle);						
				}//fin foreach	
			finTabR();	
			foreach($tabSection as $cle => $elem){
				tabR();
					tabH("% $texteSeqCla ".$tabTitres[$cle]);
					foreach($tabTotalAlpha as $cle1 => $elem1){
						$found = false;
						foreach($elem as $cle2 => $elem2){
							if($cle1 == $cle2){
								tabD(round($elem2, $nbDec),"right");	
								$found = true;
							}//fin if
						}//fin foreach	
						if(!$found){
							tabD("0", "right");
						}//fin if
					}//fin foreach	
				finTabR();	
			}//fin foreach
		finTab();


		if(count($tabTotalGroupement)>0){
			h3("Groupements :");
			tab("sortable");
				tabR();
					tabH("lettre");
					foreach($tabTotalGroupement as $cle => $elem){
						tabH($cle);						
					}//fin foreach	
				finTabR();	
				foreach($tabSectionGroupement as $cle => $elem){
					tabR();
					tabH("% $texteSeqCla ".$tabTitres[$cle]);
					foreach($tabTotalGroupement as $cle1 => $elem1){
						$found = false;
						foreach($elem as $cle2 => $elem2){
							if($cle1 == $cle2){
								tabD(round($elem2, $nbDec),"right");	
								$found = true;
							}//fin if
						}//fin foreach	
						if(!$found){
							tabD("0", "right");
						}//fin if
					}//fin foreach
					finTabR();		
				}//fin foreach
			finTab();
		}//fin if
	}//fin if



	/***************************************
	******* Affichage des graphiques *******
	***************************************/
	//seqlogos
	br();
	h1("Graphiques par lettres");

	$hauteurSeq+=200; 					//100 pour en haut, 100 pour en bas
	$largeur=count($tabTotal)*$largeurLettre+1; 		//on garde 1 largeurLettre pour legendeAxe

	//taille entiere
	if($yAxe == "entier"){
		svg($hauteurSeq, $largeur,$largeurLettre,"graphique");
		axeGrapheY($hauteurSeq, $hauteurSeq-$hauteurSeq/4, 4, $largeurLettre, $tabTotal, $quadrillage);
		axeGrapheX($hauteurSeq, $largeurLettre, $tabTotal, $nbDec, $quadrillage);
		$x = 1;
		foreach($tabTotal as $cle => $elem){
			lettre($hauteurSeq, $largeurLettre, strval($cle), $elem, $x, 0);
			$x++;
		}//fin foreach
	}//fin if
	//taille auto
	if($yAxe == "automatique"){
		//recherche max
		$max=0;
		foreach($tabTotal as $cle => $elem){
			if($max < $elem){
				$max = $elem;
			}//fin if
		}//fin foreach
		$nbIntervalle = 0;
		for($i=0;$i<$max;$i+=25){
			$nbIntervalle++;
		}//fin for
		$zoom = 100/($nbIntervalle*25);
		$max = $max*$hauteurSeq/($max*2);
		svg($max,$largeur,$largeurLettre,"graphique");
		axeGrapheY($max, $max, $nbIntervalle, $largeurLettre, $tabTotal, $quadrillage);
		axeGrapheX($max, $largeurLettre, $tabTotal, $nbDec, $quadrillage);
		$x = 1;
		foreach($tabTotal as $cle => $elem){
			lettre($max, $largeurLettre, strval($cle), $elem*$zoom, $x, 0);
			$x++;
		}//fin foreach
	}//fin if
	finSvg();

	br();

	//seqlogo
	if(count($tabSection) > 1){
		$largeur=(count($tabSection)+1)*$largeurLettre;
		svg($hauteurSeq, $largeur, $largeurLettre,"graphique");
		axeSeqX($hauteurSeq, $largeurLettre, $tabSection, $tabTitres, $texteSeqCla);
		axeSeqY($hauteurSeq, $largeurLettre);
		$i = 0;
		foreach($tabSection as $cleSec => $elemSec){
			foreach($elemSec as $cle => $elem){
				lettre($hauteurSeq, $largeurLettre, strval($cle), $elem, $i+1, $y);
				$y += ($elem*($hauteurSeq-200))/100;
			}//fin foreach
			$i++;
			$y = 0;
		}//fin foreach
		finSvg();
	}//fin if

	//seqlogo par groupement
	if(count($tabTotalGroupement)>0){
		br();
		h1("Graphiques par groupement");
		$largeur=count($tabTotalGroupement)*$largeurLettreGroupement; 		//on recalcule

		//taille entiere
		if($yAxe == "entier"){
			svg($hauteurSeq, $largeur,$largeurLettreGroupement,"graphique");
			axeGrapheY($hauteurSeq, $hauteurSeq-$hauteurSeq/4, 4, $largeurLettreGroupement, $tabTotalGroupement, $quadrillage);
			axeGrapheX($hauteurSeq, $largeurLettreGroupement, $tabTotalGroupement, $nbDec,$quadrillage);
			$x = 1;
			foreach($tabTotalGroupement as $cle => $elem){
				lettre($hauteurSeq, $largeurLettreGroupement, $cle, $elem, $x, 0);
				$x++;
			}//fin foreach
		}//fin if
		//taille auto
		if($yAxe == "automatique"){
			//recherche max
			$max=0;
			foreach($tabTotalGroupement as $cle => $elem){
				if($max < $elem){
					$max = $elem;
				}//fin if
			}//fin foreach
			$nbIntervalle = 0;
			for($i=0;$i<$max;$i+=25){
				$nbIntervalle++;
			}//fin for
			$zoom = 100/($nbIntervalle*25);
			$max = $max*$hauteurSeq/($max*2);
			svg($max,$largeur,$largeurLettreGroupement,"graphique");
			axeGrapheY($max, $max, $nbIntervalle, $largeurLettreGroupement, $tabTotalGroupement, $quadrillage);
			axeGrapheX($max, $largeurLettreGroupement, $tabTotalGroupement, $nbDec, $quadrillage);
			$x = 1;
			foreach($tabTotalGroupement as $cle => $elem){
				lettre($max, $largeurLettreGroupement, strval($cle), $elem*$zoom, $x, 0);
				$x++;
			}//fin foreach
		}//fin if
		finSvg();
	}//fin if


	//arbre d3 js
	
	h1("Arbre");
	button("Tout Ouvrir", "expandAll()");
	button("Tout Fermer", "collapseAll()");
	div("", "arbre");
	finDiv();
	scriptJS(file_get_contents("$tmpFnameTreeData"));
	jsPage("./js/tree.js");


	//krona
	h1("Krona");
	/*p();
		echo "Lien vers le graphique Krona du texte : \n";
		$url = $tmpFnameKronaHtml;
		if($fusion == "non"){
			$url .= "?collapse=false";
		}//fin if
		ahref($url,"là");
		br();
		echo "Lien vers les données du texte du graphique Krona : \n";
		ahref("$tmpFnameKronaTxt","ici");
	finP();*/
	div("", "divKrona");
	finDiv();
	//recuperation du graphique krona
	$kronaSRC=file_get_contents("$tmpFnameKronaHtml");		
	$posDeb=strpos($kronaSRC, "<body>")+7;		
	$posFin=strpos($kronaSRC, "</body>");
	$kronaSRC=substr($kronaSRC, $posDeb, $posFin-$posDeb);
	$kronaSRC.="\n";
	echo $kronaSRC;
}
finDiv();
finPage();

?>
