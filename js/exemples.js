
//exemples
function affEx(numEx){
	var res= document.getElementById("result");
	var delim = document.getElementById("delimiteur");
	var zoneTexte = document.getElementById("zoneTexte");
	var texte = document.getElementById("texte");
	var fasta = document.getElementById("fasta");
	var decoupeFastaClasse = document.getElementById("classe");
	var decoupeFastaUnique = document.getElementById("unique");
	//reini
	result.style.visibility="hidden";
	delim.value="";
	zoneTexte.value="";
	decoupeFastaUnique.checked = "checked";
	//fasta
	if(numEx == 1){
		fasta.checked = "checked";
		zoneTexte.value = ">AAD44166.1 cytochrome b [Elephas maximus maximus]\n\
LCLYTHIGRNIYYGSYLYSETWNTGIMLLLITMATAFMGYVLPWGQMSFWGATVITNLFSAIPYIGTNLV\n\
EWIWGGFSVDKATLNRFFAFHFILPFTMVALAGVHLTFLHETGSNNPLGLTSDSDKIPFHPYYTIKDFLG\n\
LLILILLLLLLALLSPDMLGDPDNHMPADPLNTPLHIKPEWYFLFAYAILRSVPNKLGGVLALFLSIVIL\n\
GLMPFLHTSKHRSMMLRPLSQALFWTLTMDLLTLTWIGSQPVEYPYTIIGQMASILYFSIILAFLPIAGX\n\
IENY";
	} //fin if
	if(numEx == 2){
		fasta.checked = "checked";
		zoneTexte.value = ">NG_001742.2 Mus musculus olfactory receptor GA_x5J8B7W2GLP-600-794 (LOC257854) pseudogène on chromosome 2\n\
AGCCTGCCAAGCAAACTTCACTGGAGTGTGCGTAGCATGCTAGTAACTGCATCTGAATCTTTCAGCTGCT\n\
TGTTGGGCCTCTCACAAGGCAGAGTGTCTTCATGGGACTTTGATATTTATTTTTGTACAACCTAAGAGGA\n\
ACAAATCCTTTGACACTGACAAATTGGCTTCCATATTTTATACCTTAATCATCTCCATGTTGAATTCATT\n\
GATCAACAGTTTAAGAAAAAAAGATGTAAAAATGCTTTTAGAAAGAGAGGCAAAGTTATGCACAATAACT\n\
TCTCATGAAGTCACAGTTTGTTAAAAGTTGCCTTAGTTCACAATAAATAATTATGTATGCTCTATAATTT\n\
CAGTGA"; 
	} //fin if
	if(numEx == 3){
		fasta.checked = "checked";
		zoneTexte.value = ">NP_001278775.1 DNA-binding protein Ikaros isoform 16 [Homo sapiens]\n\
MDADEGQDMSQVSGKESPPVSDTPDEGDEPMPIPEDLSTTSGGQQSSKSDRVVVTYGADDFRDFHAIIPK\n\
SFSLLEL\n\
>OVAX_CHICK GENE X PROTEIN (OVALBUMIN-RELATED)\n\
QIKDLLVSSSTDLDTTLVLVNAIYFKGMWKTAFNAEDTREMPFHVTKQESKPVQMMCMNNSFNVATLPAE\n\
KMKILELPFASGDLSMLVLLPDEVSDLERIEKTINFEKLTEWTNPNTMEKRRVKVYLPQMKIEEKYNLTS\n\
VLMALGMTDLFIPSANLTGISSAESLKISQAVHGAFMELSEDGIEMAGSTGVIEDIKHSPESEQFRADHP\n\
FLFLIKHNPTNTIVYFGRYWSP\n\
>AAD44166.1 cytochrome b [Elephas maximus maximus]\n\
LCLYTHIGRNIYYGSYLYSETWNTGIMLLLITMATAFMGYVLPWGQMSFWGATVITNLFSAIPYIGTNLV\n\
EWIWGGFSVDKATLNRFFAFHFILPFTMVALAGVHLTFLHETGSNNPLGLTSDSDKIPFHPYYTIKDFLG\n\
LLILILLLLLLALLSPDMLGDPDNHMPADPLNTPLHIKPEWYFLFAYAILRSVPNKLGGVLALFLSIVIL\n\
GLMPFLHTSKHRSMMLRPLSQALFWTLTMDLLTLTWIGSQPVEYPYTIIGQMASILYFSIILAFLPIAGI\n\
ENY\n\
>HumanLysozyme E102 Mutant Labelled With 2',3'-Epoxypropyl Glycoside Of N-Acetyllactosamine\n\
KVFERCELARTLKRLGMDGYRGISLANWMCLAKWESGYNTRATNYNAGDRSTDYGIFQINSRYWCNDGKT\n\
PGAVNACHLSCSALLQDNIADAVACAKRVVREPQGIRAWVAWRNRCQNRDVRQYVQGCGV\n\
>NP_001278774.1 DNA-binding protein Ikaros isoform 15 [Homo sapiens]\n\
MDADEGQDMSQVSGKESPPVSDTPDEGDEPMPIPEDLSTTSGGQQSSKSDRVVVTYGADDFRDFHAIIPK\n\
SFSRKYMPCFWKTKACLHLLSCKYRTCMFLHQPPRYIKYSLFYSLDTYHIIFGYLYHKVQNEGLGSCAVS\n\
WEHGSGVTVRVGVTVALMGLLLRRCCWTALRLLL";
	} //fin if
	if(numEx == 4){
		fasta.checked = "checked";
		zoneTexte.value = ">HSGLTH1 Human theta 1-globin gene\n\
CCACTGCACTCACCGCACCCGGCCAATTTTTGTGTTTTTAGTAGAGACTAAATACCATATAGTGAACACCTAAGA\n\
CGGGGGGCCTTGGATCCAGGGCGATTCAGAGGGCCCCGGTCGGAGCTGTCGGAGATTGAGCGCGCGCGGTCCCGG\n\
GATCTCCGACGAGGCCCTGGACCCCCGGGCGGCGAAGCTGCGGCGCGGCGCCCCCTGGAGGCCGCGGGACCCCTG\n\
GCCGGTCCGCGCAGGCGCAGCGGGGTCGCAGGGCGCGGCGGGTTCCAGCGCGGGGATGGCGCTGTCCGCGGAGGA\n\
CCGGGCGCTGGTGCGCGCCCTGTGGAAGAAGCTGGGCAGCAACGTCGGCGTCTACACGACAGAGGCCCTGGAAAG\n\
GTGCGGCAGGCTGGGCGCCCCCGCCCCCAGGGGCCCTCCCTCCCCAAGCCCCCCGGACGCGCCTCACCCACGTTC\n\
CTCTCGCAGGACCTTCCTGGCTTTCCCCGCCACGAAGACCTACTTCTCCCACCTGGACCTGAGCCCCGGCTCCTC\n\
ACAAGTCAGAGCCCACGGCCAGAAGGTGGCGGACGCGCTGAGCCTCGCCGTGGAGCGCCTGGACGACCTACCCCA\n\
CGCGCTGTCCGCGCTGAGCCACCTGCACGCGTGCCAGCTGCGAGTGGACCCGGCCAGCTTCCAGGTGAGCGGCTG\n\
CCGTGCTGGGCCCCTGTCCCCGGGAGGGCCCCGGCGGGGTGGGTGCGGGGGGCGTGCGGGGCGGGTGCAGGCGAG\n\
TGAGCCTTGAGCGCTCGCCGCAGCTCCTGGGCCACTGCCTGCTGGTAACCCTCGCCCGGCACTACCCCGGAGACT\n\
TCAGCCCCGCGCTGCAGGCGTCGCTGGACAAGTTCCTGAGCCACGTTATCTCGGCGCTGGTTTCCGAGTACCGCT\n\
GAACTGTGGGTGGGTGGCCGCGGGATCCCCAGGCGACCTTCCCCGTGTTTGAGTAAAGCCTCTCCCAGGAGCAGC\n\
CTTCTTGCCGTGCTCTCTCGAGGTCAGGACGCGAGAGGAAGGCGC\n\
>HSBGPG Human gene for bone gla protein (BGP)\n\
GGCAGATTCCCCCTAGACCCGCCCGCACCATGGTCAGGCATGCCCCTCCTCATCGCTGGGCACAGCCCAGAGGGT\n\
ATAAACAGTGCTGGAGGCTGGCGGGGCAGGCCAGCTGAGTCCTGAGCAGCAGCCCAGCGCAGCCACCGAGACACC\n\
ATGAGAGCCCTCACACTCCTCGCCCTATTGGCCCTGGCCGCACTTTGCATCGCTGGCCAGGCAGGTGAGTGCCCC\n\
CACCTCCCCTCAGGCCGCATTGCAGTGGGGGCTGAGAGGAGGAAGCACCATGGCCCACCTCTTCTCACCCCTTTG\n\
GCTGGCAGTCCCTTTGCAGTCTAACCACCTTGTTGCAGGCTCAATCCATTTGCCCCAGCTCTGCCCTTGCAGAGG\n\
GAGAGGAGGGAAGAGCAAGCTGCCCGAGACGCAGGGGAAGGAGGATGAGGGCCCTGGGGATGAGCTGGGGTGAAC\n\
CAGGCTCCCTTTCCTTTGCAGGTGCGAAGCCCAGCGGTGCAGAGTCCAGCAAAGGTGCAGGTATGAGGATGGACC\n\
TGATGGGTTCCTGGACCCTCCCCTCTCACCCTGGTCCCTCAGTCTCATTCCCCCACTCCTGCCACCTCCTGTCTG\n\
GCCATCAGGAAGGCCAGCCTGCTCCCCACCTGATCCTCCCAAACCCAGAGCCACCTGATGCCTGCCCCTCTGCTC\n\
CACAGCCTTTGTGTCCAAGCAGGAGGGCAGCGAGGTAGTGAAGAGACCCAGGCGCTACCTGTATCAATGGCTGGG\n\
GTGAGAGAAAAGGCAGAGCTGGGCCAAGGCCCTGCCTCTCCGGGATGGTCTGTGGGGGAGCTGCAGCAGGGAGTG\n\
GCCTCTCTGGGTTGTGGTGGGGGTACAGGCAGCCTGCCCTGGTGGGCACCCTGGAGCCCCATGTGTAGGGAGAGG\n\
AGGGATGGGCATTTTGCACGGGGGCTGATGCCACCACGTCGGGTGTCTCAGAGCCCCAGTCCCCTACCCGGATCC\n\
CCTGGAGCCCAGGAGGGAGGTGTGTGAGCTCAATCCGGACTGTGACGAGTTGGCTGACCACATCGGCTTTCAGGA\n\
GGCCTATCGGCGCTTCTACGGCCCGGTCTAGGGTGTCGCTCTGCTGGCCTGGCCGGCAACCCCAGTTCTGCTCCT\n\
CTCCAGGCACCCTTCTTTCCTCTTCCCCTTGCCCTTGCCCTGACCTCCCAGCCCTATGGATGTGGGGTCCCCATC\n\
ATCCCAGCTGCTCCCAAATAAACTCCAGAAG";
	} //fin if
	//texte
	if(numEx == 5){
		texte.checked = "checked";
		zoneTexte.value = "L'ennemi par Charles Baudelaire\n\
\n\
Ma jeunesse ne fut qu'un ténébreux orage,\n\
Traversé çà et là par de brillants soleils ;\n\
Le tonnerre et la pluie ont fait un tel ravage,\n\
Qu'il reste en mon jardin bien peu de fruits vermeils.\n\
\n\
Voilà que j'ai touché l'automne des idées, \n\
Et qu'il faut employer la pelle et les râteaux \n\
Pour rassembler à neuf les terres inondées, \n\
Où l'eau creuse des trous grands comme des tombeaux. \n\
\n\
Et qui sait si les fleurs nouvelles que je rêve \n\
Trouveront dans ce sol lavé comme une grève \n\
Le mystique aliment qui ferait leur vigueur ?\n\
\n\
- Ô douleur ! ô douleur ! Le Temps mange la vie, \n\
Et l'obscur Ennemi qui nous ronge le coeur \n\
Du sang que nous perdons croît et se fortifie !";
	} //fin if
	if(numEx == 6){
		texte.checked = "checked";
		zoneTexte.value = "The Owl and the Pussycat by Edward Lear \n\
\n\
The Owl and the Pussy-cat went to sea \n\
In a beautiful pea green boat, \n\
They took some honey, and plenty of money, \n\
Wrapped up in a five pound note. \n\
The Owl looked up to the stars above, \n\
And sang to a small guitar, \n\
“O lovely Pussy! O Pussy my love, \n\
What a beautiful Pussy you are, \n\
You are, \n\
You are! \n\
What a beautiful Pussy you are!” \n\
\n\
Pussy said to the Owl, “You elegant fowl! \n\
How charmingly sweet you sing! \n\
O let us be married! too long we have tarried: \n\
But what shall we do for a ring?” \n\
They sailed away, for a year and a day, \n\
To the land where the Bong-tree grows \n\
And there in a wood a Piggy-wig stood \n\
With a ring at the end of his nose, \n\
His nose, \n\
His nose, \n\
With a ring at the end of his nose.";
	}//fin if
	if(numEx == 7){
		delim.value="distique";
		texte.checked="checked";
		zoneTexte.value="Maud Muller by John Greenleaf Whitthier \n\
distique\n\
Maud Muller on a summer\'s day \n\
Raked the meadow sweet with hay.\n\
distique\n\
Beneath her torn hat glowed the wealth \n\
Of simple beauty and rustic health.\n\
distique\n\
Singing, she wrought, and her merry gleee \n\
The mock-bird echoed from his tree.\n\
distique\n\
But when she glanced to the far-off town \n\
White from its hill-slope looking down,\n\
distique\n\
The sweet song died, and a vague unrest \n\
And a nameless longing filled her breast,\n\
distique\n\
A wish that she hardly dared to own, \n\
For something better than she had known.\n\
distique\n\
The Judge rode slowly down the lane, \n\
Smoothing his horse's chestnut mane.\n\
distique\n\
He drew his bridle in the shade \n\
Of the apple-trees, to greet the maid,\n\
distique\n\
And asked a draught from the spring that flowed \n\
Through the meadow across the road.\n\
distique\n\
She stooped where the cool spring bubbled up, \n\
And filled for him her small tin cup, \n\
distique\n\
And blushed as she gave it, looking down \n\
On her feet so bare, and her tattered gown. \n\
distique\n\
\"Thanks!\" said the Judge; \"a sweeter draught \n\
From a fairer hand was never quaffed.\" \n\
distique\n\
He spoke of the grass and flowers and trees, \n\
Of the singing birds and the humming bees; \n\
distique\n\
Then talked of the haying, and wondered whether \n\
The cloud in the west would bring foul weather. \n\
distique\n\
And Maud forgot her brier-torn gown \n\
And her graceful ankles bare and brown; \n\
distique\n\
And listened, while a pleased surprise \n\
Looked from her long-lashed hazel eyes. \n\
distique\n\
At last, like one who for delay \n\
Seeks a vain excuse, he rode away. \n\
distique\n\
Maud Muller looked and sighed: \"Ah me! \n\
That I the Judge\'s bride might be! \n\
distique\n\
\"He would dress me up in silks so fine, \n\
And praise and toast me at his wine. \n\
distique\n\
\"My father should wear a broadcloth coat; \n\
My brother should sail a pointed boat. \n\
distique\n\
\"I\'d dress my mother so grand and gay, \n\
And the baby should have a new toy each day. \n\
distique\n\
\"And I\'d feed the hungry and clothe the poor, \n\
And all should bless me who left our door.\" \n\
distique\n\
The Judge looked back as he climbed the hill, \n\
And saw Maud Muller standing still. \n\
distique\n\
\"A form more fair, a face more sweet, \n\
Ne'er hath it been my lot to meet. \n\
distique\n\
\"And her modest answer and graceful air \n\
Show her wise and good as she is fair. \n\
distique\n\
\"Would she were mine, and I to-day, \n\
Like her, a harvester of hay. \n\
distique\n\
\"No doubtful balance of rights and wrongs, \n\
Nor weary lawyers with endless tongues, \n\
distique\n\
\"But low of cattle and song of birds, \n\
And health and quiet and loving words.\" \n\
distique\n\
But he thought of his sisters, proud and cold, \n\
And his mother, vain of her rank and gold. \n\
distique\n\
So, closing his heart, the Judge rode on, \n\
And Maud was left in the field alone. \n\
distique\n\
But the lawyers smiled that afternoon, \n\
When he hummed in court an old love-tune; \n\
distique\n\
And the young girl mused beside the well \n\
Till the rain on the unraked clover fell. \n\
distique\n\
He wedded a wife of richest dower, \n\
Who lived for fashion, as he for power. \n\
distique\n\
Yet oft, in his marble hearth's bright glow, \n\
He watched a picture come and go; \n\
distique\n\
And sweet Maud Muller's hazel eyes \n\
Looked out in their innocent surprise. \n\
distique\n\
Oft, when the wine in his glass was red, \n\
He longed for the wayside well instead; \n\
distique\n\
And closed his eyes on his garnished rooms \n\
To dream of meadows and clover-blooms. \n\
distique\n\
And the proud man sighed, and with a secret pain, \n\
\"Ah, that I were free again! \n\
distique\n\
\"Free as when I rode that day, \n\
Where the barefoot maiden raked her hay.\" \n\
distique\n\
She wedded a man unlearned and poor, \n\
And many children played round her door. \n\
distique\n\
But care and sorrow, and childbirth pain, \n\
Left their traces on heart and brain. \n\
distique\n\
And oft, when the summer sun shone hot \n\
On the new-mown hay in the meadow lot, \n\
distique\n\
And she heard the little spring brook fall \n\
Over the roadside, through a wall, \n\
distique\n\
In the shade of the apple-tree again \n\
She saw a rider draw his rein; \n\
distique\n\
And, gazing down with timid grace, \n\
She felt his pleased eyes read her face. \n\
distique\n\
Sometimes her narrow kitchen walls \n\
Stretched away into stately halls\; \n\
distique\n\
The weary wheel to a spinet turned, \n\
The tallow candle an astral burned, \n\
distique\n\
And for him who sat by the chimney lug, \n\
Dozing and grumbling o'er pipe and mug, \n\
distique\n\
A manly form at her side she saw, \n\
And joy was duty and love was law. \n\
distique\n\
Then she took up her burden of life again, \n\
Saying only, \"It might have been.\" \n\
distique\n\
Alas for the maiden, alas for the Judge, \n\
For rich repiner and househole drudge! \n\
distique\n\
God pity them both and pity us all, \n\
Who vainly the dreams of youth recall. \n\
distique\n\
For of all sad words of tongue or pen, \n\
The saddest are these: \"It might have been!\" \n\
distique\n\
Ah, well! for us all some sweet hope lies \n\
Deeply buried from human eyes; \n\
distique\n\
And, in the hereafter, angels may \n\
Roll the stone from its grave away!";
	}//fin if
	if(numEx == 8){
		delim.value="sizain suivant";
		texte.checked="checked";
		zoneTexte.value="Mignonne, allons voir si la rose par Pierre de Ronsard \n\
sizain suivant\n\
Mignonne, allons voir si la rose \n\
Qui ce matin avait déclose \n\
Sa robe de pourpre au Soleil, \n\
A point perdu cette vesprée \n\
Les plis de sa robe pourprée, \n\
Et son teint au vôtre pareil.\n\
sizain suivant\n\
Las ! voyez comme en peu d'espace, \n\
Mignonne, elle a dessus la place \n\
Las ! las ! ses beautés laissé choir !\n\
Ô vraiment marâtre Nature, \n\
Puis qu'une telle fleur ne dure \n\
Que du matin jusques au soir !\n\
sizain suivant\n\
Donc, si vous me croyez, mignonne,\n\
Tandis que votre âge fleuronne \n\
En sa plus verte nouveauté, \n\
Cueillez, cueillez votre jeunesse :\n\
Comme à cette fleur la vieillesse \n\
Fera ternir votre beauté.";
	}//fin if
	if(numEx == 9){
		delim.value="next poem";
		texte.checked="checked";
		zoneTexte.value="La Complainte par Rutebeuf \n\
\n\
Que sont mes amis devenus \n\
Que j'avais de si près tenus \n\
Et tant aimés \n\
Ils ont été trop clairsemés \n\
Je crois le vent les a ôtés \n\
L'amour est morte \n\
Ce sont amis que vent me porte \n\
Et il ventait devant ma porte \n\
Les emporta \n\
\n\
Avec le temps qu'arbre défeuille \n\
Quand il ne reste en branche feuille \n\
Qui n'aille à terre \n\
Avec pauvreté qui m'atterre \n\
Qui de partout me fait la guerre \n\
Au temps d'hiver \n\
Ne convient pas que vous raconte \n\
Comment je me suis mis à honte \n\
En quelle manière \n\
\n\
Que sont mes amis devenus \n\
Que j'avais de si près tenus \n\
Et tant aimés \n\
Ils ont été trop clairsemés \n\
Je crois le vent les a ôtés \n\
L'amour est morte \n\
Le mal ne sait pas seul venir \n\
Tout ce qui m'était à venir \n\
M'est advenu \n\
\n\
Pauvre sens et pauvre mémoire \n\
M'a Dieu donné, le roi de gloire \n\
Et pauvre rente \n\
Et droit au cul quand bise vente \n\
Le vent me vient, le vent m'évente \n\
L'amour est morte \n\
Ce sont amis que vent emporte \n\
Et il ventait devant ma porte \n\
Les emporta \n\
\n\
next poem\n\
\n\
No Second Troy by William Butler Yeats \n\
\n\
Why should I blame her that she filled my days \n\
With misery, or that she would of late \n\
Have taught to ignorant men most violent ways, \n\
Or hurled the little streets upon the great. \n\
Had they but courage equal to desire? \n\
What could have made her peaceful with a mind \n\
That nobleness made simple as a fire, \n\
With beauty like a tightened bow, a kind \n\
That is not natural in an age like this, \n\
Being high and solitary and most stern? \n\
Why, what could she have done, being what she is? \n\
Was there another Troy for her to burn?\n\
\n\
next poem\n\
\n\
Definiendo el Amor por Francisco de Quevedo \n\
\n\
Es hielo abrasador, es fuego helado, \n\
es herida que duele y no se siente, \n\
es un soñado bien, un mal presente, \n\
es un breve descanso muy cansado. \n\
\n\
Es un descuido que nos ha cuidado, \n\
un cobarde con nombre de valiente, \n\
un andar solitario entre la gente, \n\
un amar solamente ser amado. \n\
\n\
Es una libertad encarcelada, \n\
que dura hasta el postrero parasismo, \n\
enfermedad que crece si es curada. \n\
\n\
Esta es el niño Amor, éste es tu abismo: \n\
mirad cual amistad tendrá con nada \n\
el que en todo es contrario de sí mismo.";
	}//fin if
	if(numEx == 10){
		fasta.checked="checked";
		decoupeFastaClasse.checked="checked";
		zoneTexte.value = ">1906384B_cl_5 \n\
MASQQERQQLDARARQGETVIPGGTGGKSLEAQEHLAEGRSRGGQTRKEQLGREGYQELGSKGGQTRKEQ \n\
IGTEGYQEMGRKGGLSTMDKSGVERAAEEGIDIDESKYRT \n\
 \n\
>1YYCA_cl_7 \n\
ASADEKVVEEKASVISSLLDKAKGFFAEKLANIPTPEATVDDVDFKGVTRDGVDYHAKVSVKNPYSQSIP \n\
ICQISYILKSATRTIASGTIPDPGSLVGSGTTVLDVPVKVAYSIAVSLMKDMCTDWDIDYQLDIGLTFDI \n\
PVVGDITIPVSTQGEIKLPSLRDFF \n\
 \n\
>A2XG55_cl_6 \n\
MASRQDRREARAEADARRAAEEIARARDERVMQAEVDARSAADEIARARADRGAATMGADTAHHAAAGGG \n\
ILESVQEGAKSFVSAVGRTFGGARDTAAEKTSQTADATRDKLGEYKDYTADKARETNDSVARKTNETADA \n\
TRDKLGEYKDYTADKTQETKDAVAQKASDASEATKNKLGEYKDALARKTRDAKDTTAQKATEFKDGVKAT \n\
AQETRDATKDTTQTAADKARETAATHDDATDKGQGQGLLGALGNVTGAIKEKLTVSPAATQEHLGGGEER \n\
AVKERAAEKAASVYFEEKDRLTRERAAERVDKCVEKCVEGCPDATCAHRHGKM \n\
 \n\
>A2ZDX4_cl_1 \n\
MEYQGQHGGHASSRADEHGNPAVTTGNAPTGMGAGHIQEPAREDKKTDGVLRRSGSSSSSSSSEDDGMGG \n\
RRKKGIKEKIKEKLPGGNKGNNQQQQQEHTTTTTGGAYGPQGHDTKIATGAHGGTAATTADAGGEKKGIV \n\
DKIKEKLPGQH \n\
 \n\
>A2ZDX6_cl_1 \n\
MENYQGQHGYGADRVDVYGNPVAGQYGGGATAPGGGHGVMGMGGHHAGAGGQFQPVKEEHKTGGILHRSG \n\
SSSSSSSSEDDGMGGRRKKGIKEKIKEKLPGGNKGNNHQQQQMMGNTGGAYGQQGHAGMTGAGTGTGVHG \n\
AEYGNTGEKKGFMDKIKEKLPGQH \n\
 \n\
>A2ZDX8_cl_1 \n\
MENYQGQHGYGADRVDVYGNPVGAGQYGGGATAPGGGHGAMGMGGHAGAGAGGQFQPAREDRKTGGILHR \n\
SGSSSSSSSSEDDGMGGRRKKGIKEKIKEKLPGGNKGNNQQQQQMMGNTGGAYGQQGHAGMTGAGTGVHG \n\
AEYGNAGEKKGFMDKIKEKLPGQH";
	}//fin if
	if(numEx == 11){
		fasta.checked="checked";
		decoupeFastaClasse.checked="checked";
		zoneTexte.value = ">1GMEA_cl_1 \n\
MSIVRRSNVFDPFADLWADPFDTFRSIVPAISGGGSETAAFANARMDWKETPEAHVFKADLPGVKKEEVK \n\
VEVEDGNVLVVSGERTKEKEDKNDKWHRVERSSGKFVRRFRLLEDAKVEEVKAGLENGVLTVTVPKAEVK \n\
KPEVKAIQISG  \n\
 \n\
>1ONSA_cl_20 \n\
TVQTSKNPQVDIAEDNAFFPSEYSLSQYTSPVSDLDGVDYPKPYRGKHKILVIAADERYLPTDNGKLFST \n\
GNHPIETLLPLYHLHAAGFEFEVATISGLMTKFEYWAMPHKDEKVMPFFEQHKSLFRNPKKLADVVASLN \n\
ADSEYAAIFVPGGHGALIGLPESQDVAAALQWAIKNDRFVISLCHGPAAFLALRHGDNPLNGYSICAFPD \n\
AADKQTPEIGYMPGHLTWYFGEELKKMGMNIINDDITGRVHKDRKLLTGDSPFAANALGKLAAQEMLAAY \n\
AG  \n\
 \n\
>1TVGA_cl_16 \n\
MGHHHHHHSHMRKIDLCLSSEGSEVILATSSDEKHPPENIIDGNPETFWTTTGMFPQEFIICFHKHVRIE \n\
RLVIQSYFVQTLKIEKSTSKEPVDFEQWIEKDLVHTEGQLQNEEIVAHGSATYLRFIIVSAFDHFASVHS \n\
VSAEGTVVSNLSS  \n\
 \n\
>2WJ7A_cl_99 \n\
GAMEMRLEKDRFSVNLDVKHFSPEELKVKVLGDVIEVHGKHEERQDEHGFISREFHRKYRIPADVDPLTI \n\
TSSLSSDGVLTVNGPRKQVSGPER  \n\
 \n\
>2Y1ZA_cl_99 \n\
GAMEMRLEKDRFSVNLDVKHFSPEELKVKVLGDVIEVHGKHEERQDEHGFISREFHGKYRIPADVDPLTI \n\
TSSMSSDGVLTVNGPRKQVSGPER  \n\
 \n\
>3L1EA_cl_99 \n\
GSGISEVRSDRDKFVIFLDVKHFSPEDLTVKVQEDFVEIHGKHNERQDDHGYISREFHRRYRLPSNVDQS \n\
ALSCSLSADGMLTFSGPKIPSGVDAGHSERAIPVSR  \n\
 \n\
>3L1GA_cl_99 \n\
GMRLEKDRFSVNLDVKHFSPEELKVKVLGDVIEVHGKHEERQDEHGFISREFHRKYRIPADVDPLTITSS \n\
LSSDGVLTVNGPRKQVSGPERTIPIT  \n\
 \n\
>3LWKA_cl_13 \n\
SMSAGPWKMVVWDEDGFQGRRHEFTAECPSVLELGFETVRSLKVLSGAWVGFEHAGFQGQQYILERGEYP \n\
SWDAWGGNTAYPAERLTSFRPAACANHRDSRLTIFEQENFLGKKGELSDDYPSLQAMGWEGNEVGSFHVH \n\
SGAWVCSQFPGYRGFQYVLECDHHSGDYKHFREWGSHAPTFQVQSIRRIQQ  \n\
 \n\
>AAA18335_cl_12 \n\
MTERRVPFSLLRTPSWGPFRDWYPAHSRLFDQAFGVPRLPDEWSQWFSAAGWPGYVRPLPAATAEGLAVT \n\
LAAPAFSRALNRQLSSGVSEIRQTADRWRVSLDVNHFAPEELTVKTKEGVVEITGKHEERQDEHGYISRC \n\
FTRKYTLPPGVDPTLVSSSLSPEGTLTVEAPLPKAVTQSAEITIPVTFEARAQIGGPEAGKSEQSGAK";
	}//fin if
}//fin function
