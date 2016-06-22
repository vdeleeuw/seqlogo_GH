<?php

/***************************************
******* DE LEEUW VALERIAN 2016 *********
***** PROJET MASTER 1 INFO ANGERS ******
******* TUTEUR : GILLES HUNAULT ********
***************************************/


error_reporting(E_ALL|E_NOTICE|E_STRICT); 
require_once("fct.php");


headerPage("SeqLogos");
	cssPage("./css/style.css");
finHeaderPage();

h1("Aide pour la génération de SeqLogos");
	p();

		h4("Catégorie Texte : Le texte qui sera traité par le site.");
		echo "Il est possible de le saisir directement, d'utiliser un fichier, ou un lien.\n";
		br();br();
		echo "Type de données : Le type du texte entré afin d'effectuer son traitement.\n";
		br();
		echo "On peut choisir Fasta (format pour les biologistes), ou un texte standard.\n"	;
		br();
		hr("50%","left");
		
		h4("Catégorie Traitement : Tout ce qui concerne la façon de traiter notre texte.");
		echo "Type de tri : Permet de préciser comment trier les données pour l'affichage en tableau et en graphique.\n";
		br();
		echo "Considérer l'espace comme une lettre : Permet de compter les espaces afin de les gérer comme une lettre.\n";
		br();
		echo "Considérer les chiffres comme des lettres :  Permet de compter les chiffres afin de les gérer comme des lettres.\n";
		br();
		echo "Nombre de décimales : Précise le nombre de décimales à afficher dans les tableaux.\n";
		br();		
		echo "Afficher à partir de (%) : Fait en sorte d'afficher uniquement les lettres plus présentes que le pourcentage indiqué.\n"; 
		br();
		hr("50%", "left");


		h4("Catégorie délimiteur : Tout ce qui concerne le découpage du texte en sous-parties afin de les comparer.");
		echo "Type de découpage Fasta : Le découpage du texte Fasta entré afin d'effectuer son traitement.\n";
		br();	
		echo "Classes à ignorer : Définit les numéros des classes à ignorer (à séparer avec un espace).\n"; 
		br();
		echo "Sensible à la casse :  Si le délimiteur est sensible à la casse, il faut respecter les majuscules/minuscules !\n";
		br();
		echo "Délimiteur du texte : Définit un mot ou une phrase pour découper le texte en sous-parties. \n"; 
		br();
		hr("50%", "left");

		h4("Catégorie graphiques : Paramètres des graphiques à générer.");
		hr("50%", "left");

		h4("Catégorie Seqlogos : Graphique sous forme d'histogramme avec des lettres aux lieu des barres habituelles.");	
		echo "Hauteur de l'axe Y : Permet d'afficher ou non l'axe Y en entier ou de l'adapter a la plus grande valeur de nos données\n"; 
		br();
		echo "Quadrillage : Permet d'afficher ou non un quadrillage sur le graphique.\n"; 
		br();
		echo "Hauteur des graphiques : Permet de définir la hauteur maximum du seqlogo.\n"; 
		br();
		echo "Largeur par lettre : Permet de définir la largeur de chaque lettre sur le seqlogo.\n"; 
		br();
		echo "Largeur par groupement de lettres : Permet de définir la largeur des groupements de lettre pour les groupements protéiniques.\n"; 
		br();
		hr("50%", "left");


		h4("Catégorie Arbre : Correspond à un graphique en arbre des lettres de notre texte.");
		echo "Largeur de l'arbre : Permet de définir la largeur maximum de l'arbre.\n"; 
		br();
		echo "Hauteur de l'arbre : Permet de définir la hauteur maximum de l'arbre.\n"; 
		br();	
		echo "Profondeur de l'arbre : Correspond au nombre de lettres à prendre à la fois pour découper le texte.\n"; 
		br();
		hr("50%", "left");


		h4("Catégorie Krona : Correspond à un graphique en camembert des lettres de notre texte.");
		echo "Fusion des catégories uniques :  Fusionne ou non les catégories sur le graphique krona (option collapse)\n";
		br();
		echo "Sens de la lecture :  Permet de découper le texte en partant du début ou de la fin.\n";
		br();
		echo "Nombre de niveaux : Correspond au nombre de lettres à prendre à la fois pour découper le texte.\n";  
		br();
		hr("50%", "left");
	finP();

	h4("Légendes pour groupements protéiniques :");
	tab();
		tabR();
			tabH("D+E");
			tabD("Fraction negative residues");
		finTabR();			
		tabR();
			tabH("K+R");			
			tabD("Fraction positive residues");
		finTabR();
		tabR();
			tabH("D+E+K+R");					
			tabD("Fraction charged residues");	
		finTabR();	
		tabR();
			tabH("D+E-K-R");
			tabD("Fraction net charge");
		finTabR();		
		tabR();
			tabH("A+I+L+V");
			tabD("Fraction hydrophobic residues");
		finTabR();		
		tabR();
			tabH("F+W+Y");
			tabD("Fraction aromatic residues");
		finTabR();		
		tabR();
			tabH("N+Q");
			tabD("Fraction amide residues");
		finTabR();		
		tabR();
			tabH("S+T");
			tabD("Fraction alcohol residues");
		finTabR();		
		tabR();
			tabH("C+W");
			tabD("Fraction rare/absent residues");
		finTabR();		
		tabR();
			tabH("R+E+S+P");
			tabD("Strong disorder promoting residues");
		finTabR();						
		tabR();
			tabH("C+F+Y+W");
			tabD("Strong order promoting residues");
		finTabR();
	finTab();
finPage();

?>
