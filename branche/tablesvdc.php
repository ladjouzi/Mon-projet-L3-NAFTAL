<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Suivi-Bojectifs Qualité</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="../stats.png" />
	<link rel="stylesheet" type="text/css" href="styles.css">	
</head>
	<body>

			
					<header>
						<table id="header_tab1">   
							   <tr>
							       <td rowspan="3" id="firstcol"><img src="logo.png" alt="logo"><h3>Branche GPL</h3></td>
							        <td rowspan="3" id="secondcol">SUIVI DES DEMANDES CLIENTS</td>
							        <td class="lastcol" id="lastcol1">EQ BGPL MS 08 V1</td>
							   </tr>
							   <tr>
							   	    <td class="lastcol" id="lastcol2">Date d'application : 11 mars 2013</td>
							   </tr>
							   <tr>
							   	    <td class="lastcol" id="lastcol3">Page 1 sur 1</td>
							   </tr>
						</table>	
					</header>



					<div id="bla">
						<table id="direction-tab">  
					           <tr>
					           	 <td id="direction1">DIRECTION SIEGE :<br>DISTRICT DMR :</td>
					           	 <td id="direction2">BRANCHE GPL<br>DISTRICT <span id="district"></span></td>
					           	 <td id="direction3">Mois : <span id="mois"></span><br>Année : <span id="annee"></span></td>
					           </tr>
					    </table>

					    <table id="main_table">
								<tr>
									 <td rowspan="2" class="gris" >STRUCTURE</td>
									 <td colspan="2" class="gris" >Nombre demandes exprimées</td>
									 <td colspan="2" class="gris">Nombre demandes satisfaites</td>
									 <td class="gris">Reste à satisfaire</td>
									 <td class="gris">Taux satisfaction clients</td>
									 <td rowspan="2" class="gris">Obsérvations</td>
								</tr>
								<tr>
									 <td style="width: 100px;">Antérieures non satisfaites<br>« A »</td>
									 <td>Mois M<br>« B »</td>
									 <td>Antérieurs<br>« C »</td>
									 <td>Mois M<br>« D »</td>
									 <td>(A-C)+(B-D)</td>
									 <td>(C+D) / (A+B)</td>
								</tr>
								<tr>
									<td class="ligne2" id="br">DEPARTEMENT INFORMATIQUE</td>
									<td class="ligne2" id="a"></td>
									<td class="ligne2" id="b"></td>
									<td class="ligne2" id="c"></td>
									<td class="ligne2" id="d"></td>
									<td class="ligne2" id="reste"></td>
									<td class="ligne2" id="taux"></td>
									<td class="ligne2" id="observation"></td>
								</tr>
								<tr>
									<td colspan="8" style="text-align: left; padding: 8px;" class="gris">Griffe et signature du responsable de la structure</td>
								</tr>
								<tr>
									<td colspan="8" id="griffe" style="text-align: left; font-weight:normal; font-size: 0.8em; padding-left:5px;"><strong>A</strong> : Demandes antérieurs exprimées non satisfaites<br><strong>B</strong> : Demandes exprimées du mois<br><strong>C</strong> : Demandes satisfaites durant le mois M des demandes antérieures non satisfaites<br><strong>D</strong> : Demandes satisfaites du mois M<br><strong>*</strong>&nbsp;&nbsp;: sont concernées uniquement les département du GI siege, des Districts et Service Informatique DMR et Moyens Télécom DAM (siége) et PMC des Districts et DMR</td>
								</tr>
					    </table>
					    <div id="naftalproperty">
					    		<div id="trait">&nbsp;</div>
					    		<h4>Propriété NAFTAL GPL - Reporoduction interdite</h4>
					    	</div>

				

	</body>


</html>

