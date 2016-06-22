function incDec(champ, nb, pas){
	var nbAct = Number(champ.value)
	if(nbAct+pas <= nb){
		champ.value = Number(champ.value)+pas;
	}//fin if
}//fin function

function decDec(champ, nb, pas){
	var nbAct = Number(champ.value)
	if(nbAct-pas >= nb){
		champ.value = Number(champ.value)-pas;
	}//fin if 
}//fin function

function FastaClk(){
	document.getElementById("FastaOptions1").style.visibility = "visible";
	document.getElementById("FastaOptions2").style.visibility = "visible";
}//fin function

function TexteClk(){
	document.getElementById("FastaOptions1").style.visibility = "hidden";
	document.getElementById("FastaOptions2").style.visibility = "hidden";
}//fin function



