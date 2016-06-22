//    (gH)   -_-  stdphp.js  ;  TimeStamp (unix) : 06 Février 2010 vers 19:56

// ########################################################################
function changeLesLargeurs() {
// ########################################################################
	changeLaLargeur("corps")   ;
	changeLaLargeur("exemple") ;
	changeLaLargeur("stdphp")  ;
} ; // fin de fonction changeLesLargeurs

// ########################################################################
	function changeLaLargeur(noeud) {
// ########################################################################
	if (document.getElementById(noeud)) {
	   document.getElementById(noeud).cols  = document.getElementById("lrg").value
	} ; // # fin si
} ; // fin de fonction changeLaLargeur

// ########################################################################