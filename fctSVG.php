<?php	

//general
function svg($height, $width,$largeurLettre,$class=""){
	echo "<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" class=\"$class\" width=\"".($width+$largeurLettre)."\" height=\"$height\">\n";
}// fin de fonction svg

function finSvg(){
	echo "</svg>\n";
}// fin de fonction finSvg


//axes
//affiche un axe X avec une lettre de tab par unité
function axeGrapheX($hauteur, $largeurLettre, $tab, $nbDec, $quadrillage){
	$hauteur-=100;
	//axe
	echo "<g class=\"grille\" id=\"xGrid\">\n";
  	echo "<line x1=\"$largeurLettre\" x2=\"".(count($tab)*$largeurLettre+$largeurLettre)."\" y1=\"".($hauteur)."\" y2=\"".($hauteur)."\"></line>\n";
	echo "</g> \n";

	//ajout d'un quadrillage
	if($quadrillage == "oui"){
		echo "<g class=\"quadrillage\">\n";
		for($i=2; $i<count($tab)+2; $i++){
			echo "<line x1=\"".($largeurLettre*$i)."\" x2=\"".($largeurLettre*$i)."\" y1=\"$hauteur\" y2=\"100\"></line>\n";
		}//fin for
		echo "</g>\n";
	}//fin if

	//legendes
	echo "<g  class=\"legende legendeX\">\n";
	$i = $largeurLettre + $largeurLettre/2;
	foreach($tab as $cle => $elem){
		echo "<text x=\"".($i)."\" y=\"".($hauteur+20)."\">$cle (".(round($elem, $nbDec))." %)</text>\n";
		$i += $largeurLettre;
	}//fin foreach
	$i = (count($tab)*$largeurLettre+$largeurLettre+$largeurLettre) /2 ;
	echo "<text x=\"$i\" y=\"".($hauteur+50)."\" class=\"titreAxe\">Lettre</text>\n";
	echo "</g>\n";
}// fin de fonction axeGrapheX

function axeSeqX($hauteur, $largeurLettre, $tab, $tabTitres, $texteSeqCla){	
	$hauteur-=100;
	//axe
	echo "<g class=\"grille\" id=\"xGrid\">\n";
  	echo "<line x1=\"$largeurLettre\" x2=\"".(count($tab)*$largeurLettre+$largeurLettre)."\" y1=\"".($hauteur)."\" y2=\"".($hauteur)."\"></line>\n";
	echo "</g> \n";

	//legendes
	echo "<g  class=\"legende legendeX\">\n";
	$i = $largeurLettre + $largeurLettre/2;
	foreach($tabTitres as $cle => $elem){
		echo "<text x=\"".($i)."\" y=\"".($hauteur+20)."\">$elem</text>\n";
		$i += $largeurLettre;
	}//fin foreach
	$i = (count($tab)*$largeurLettre+$largeurLettre+$largeurLettre) /2 ;
	$texteSeqCla[0] = strtoupper($texteSeqCla[0]);
	echo "<text x=\"$i\" y=\"".($hauteur+50)."\" class=\"titreAxe\">$texteSeqCla</text>\n";	
	echo "</g>\n";
}// fin de fonction axeSeqX

//affiche un axeY avec des %age 
function axeGrapheY($hauteur, $max, $zoom, $largeurLettre, $tab, $quadrillage){
	//on garde 100 pour en haut, 100 pour en bas
	$hauteur -= 100;
	$hauteurZone = ($hauteur-100)/$zoom;
	$max = $max*$hauteur/100;
	$maxAxe = $hauteurZone * $zoom;
	//axe
	echo "<g class=\"grille\">\n";
	echo "<line x1=\"$largeurLettre\" x2=\"$largeurLettre\" y1=\"".($hauteur-$maxAxe)."\" y2=\"".($hauteur)."\"></line>\n";
	echo "</g>\n";

	//ajout d'un quadrillage
	if($quadrillage == "oui"){
		echo "<g class=\"quadrillage\">\n";
		for($i=0; $i<=$zoom; $i++){
			echo "<line x1=\"".($largeurLettre)."\" x2=\"".($largeurLettre*(count($tab)+1))."\" y1=\"".($hauteur-$hauteurZone*$i)."\" y2=\"".($hauteur-$hauteurZone*$i)."\"></line>\n";
		}//fin for
		echo "</g>\n";
	}//fin if

	//legendes
	echo "<g  class=\"legende legendeY\">\n";
	for($i=0;$i<=$zoom;$i++){
		echo "<text x=\"".($largeurLettre-10)."\" y=\"".($hauteur-$hauteurZone*$i)."\">".(25*$i)."</text>\n";
	}//fin for
	echo "<text x=\"".($largeurLettre-50)."\" y=\"".($hauteur-$maxAxe/2)."\" class=\"titreAxe\">%</text>\n";
	echo "</g>\n";
}// fin de fonction axeGrapheY
 
function axeSeqY($hauteur, $largeurLettre){
	//on garde 100 pour en haut, 100 pour en bas
	$hauteur -= 100;
	$hauteurZone = ($hauteur-100)/4;
	//axe
	echo "<g class=\"grille\">\n";
	echo "<line x1=\"$largeurLettre\" x2=\"$largeurLettre\" y1=\"100\" y2=\"".($hauteur)."\"></line>\n";
	echo "</g>\n";

	//legendes
	echo "<g  class=\"legende legendeY\">\n";
	echo "<text x=\"".($largeurLettre-50)."\" y=\"".($hauteur-$hauteurZone*2)."\" class=\"titreAxe\">%</text>\n";
	echo "</g>\n";
}// fin de fonction axeSeqY

//lettres
//ecrit une lettre lettre de largeur largeurLettre avec l'epaisseur epai a la pos x, y
function lettre($hauteur, $largeurLettre, $lettre, $taille, $x, $y){
	//cas espace 
	if($lettre == "_"){
		$lettre = " ";
	}//fin if	
	//variables
	$hauteur -= 100;
	//lettres
	$classe = preg_replace("/\+/", "p", $lettre);
	$classe = preg_replace("/\-/", "m", $classe);
	echo "<g class=\"lettre lettre".($classe)."\">\n";
	echo "<text style=\"font-size:".($taille*((($hauteur-100)*14)/1000))."px\" lengthAdjust=\"spacingAndGlyphs\" textLength=\"".($largeurLettre)."\" ";
	echo "y=\"".($hauteur-$y)."\" x=\"".($largeurLettre*$x)."\">";
	echo "$lettre</text>\n";
	echo "</g>\n";
}// fin de fonction lettre

?>