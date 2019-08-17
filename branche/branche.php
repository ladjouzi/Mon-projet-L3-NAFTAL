<?php
session_start();
if(!isset($_SESSION['submited'])  || $_SESSION['profile']!='Branche' &&  $_SESSION['profile']!='Directeur')
{
   header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Suivi-Bojectifs Qualité</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="../stats.png" />
	<link rel="stylesheet" type="text/css" href="styles.css">	
</head>

<body ondragstart="return false;" ondrop="return false;">

<div id="boite"> <! ici BOITE DE RECEPTION>
	
			<h1>SUIVI DES DEMANDES CLIENTS RECUE</h1>
			<div id="recue">
				<input type="month" name="monthselect" id="monthselect">
				<table id="tabrecu">
					<thead>
						<tr>
							<th>District</th>
							<th>Fiche Recue</th>
							<th>Date d'envoi</th>
							<th>Envoyé par</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>

</div>
<div id="affichersvdc"> <!ici>

</div>


<div id="menu">
		<span id="tmenu">
		<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 width="42px" height="42px" viewBox="0 0 572.686 572.686" style="enable-background:new 0 0 572.686 572.686;"
			 xml:space="preserve">

			<g>
				<path d="M533.652,47.137H133.282c-21.524,0-39.034,17.509-39.034,39.034c0,21.524,17.509,39.033,39.034,39.033h400.371
					c21.523,0,39.033-17.509,39.033-39.033C572.686,64.646,555.176,47.137,533.652,47.137z"/>
				<path d="M533.652,183.662H133.282c-21.524,0-39.034,17.509-39.034,39.034c0,21.524,17.509,39.033,39.034,39.033h400.371
					c21.523,0,39.033-17.509,39.033-39.033C572.686,201.171,555.176,183.662,533.652,183.662z"/>
				<path d="M533.652,314.184H133.282c-21.524,0-39.034,17.508-39.034,39.033c0,21.523,17.509,39.033,39.034,39.033h400.371
					c21.523,0,39.033-17.51,39.033-39.033C572.686,331.691,555.176,314.184,533.652,314.184z"/>
				<path d="M533.652,447.488H133.282c-21.524,0-39.034,17.51-39.034,39.033c0,21.525,17.509,39.033,39.034,39.033h400.371
					c21.523,0,39.033-17.508,39.033-39.033C572.686,464.998,555.176,447.488,533.652,447.488z"/>
				<path d="M39.034,125.197c21.524,0,39.027-17.509,39.027-39.033s-17.51-39.033-39.027-39.033C17.516,47.131,0,64.64,0,86.164
					S17.51,125.197,39.034,125.197z"/>
				<path d="M39.034,261.729c21.524,0,39.027-17.509,39.027-39.033s-17.51-39.034-39.027-39.034C17.516,183.662,0,201.171,0,222.695
					C0,244.219,17.51,261.729,39.034,261.729z"/>
				<path d="M39.034,392.25c21.524,0,39.027-17.51,39.027-39.033c0-21.525-17.51-39.033-39.027-39.033
					C17.516,314.184,0,331.691,0,353.217C0,374.74,17.51,392.25,39.034,392.25z"/>
				<path d="M39.034,525.549c21.524,0,39.027-17.508,39.027-39.033c0-21.523-17.51-39.033-39.027-39.033
					C17.516,447.482,0,464.992,0,486.516C0,508.041,17.51,525.549,39.034,525.549z"/>
			</g>

		</svg>
		<span>
			<button id="bt5" class="menubtns">Acceuil</button>
			<button id="bt4" class="menubtns">Boit de récéption</button>
			<button id="bt6" class="menubtns">Consulter d'ancien fiches</button>
			<button id="bt1" class="menubtns">Changer nom de compte</button>    <!ces button ne sont pas inclu dans la forme>
			<button id="bt2" class="menubtns">Changer mot de passe</button>       <!j'utilise ajax pour changer le mdp>	
			<button id="bt3" class="menubtns">Déconnexion</button>
</div>


<div id="Acceuil">
			<header>
					<table id="header_tab">
						   <tr>
						        <td rowspan="3" id="firstcol"><img src="logo.png" alt="logo"><h3>Branche GPL</h3></td>
						        <td rowspan="3" id="secondcol">Fiche de Suivi - Objectifs Qualité</td>
						        <td class="lastcol" id="lastcol1">EQ BGPL MQ 19 V2</td>
						   </tr>
						   <tr>
						   	    <td class="lastcol" id="lastcol2">Date d'application : 17.07.15</td>
						   </tr>
						   <tr>
						   	    <td class="lastcol" id="lastcol3">Page <input type="number" class="numpage" name="number"/> sur <input type="number" class="numpage"/> </td>
						   </tr>
					</table>	
			</header>

			<div id="objectanndiv"> <!table de suivi des objectifs annuel>
				<table id="objectifannee">
					<tr>
						<th>Processus :<br>M.S</th>
						<th style="text-align: left; padding-left: 7px;">Période de<br>Mesure :</th>
						<th>Jan<br><span class="yearNum"></span></th>
						<th>Fév<br><span class="yearNum"></span></th>
						<th>Mars<br><span class="yearNum"></span></th>
						<th>Avril<br><span class="yearNum"></span></th>
						<th>Mai<br><span class="yearNum"></span></th>
						<th>Juin<br><span class="yearNum"></span></th>
						<th>Juill<br><span class="yearNum"></span></th>
						<th>Aout<br><span class="yearNum"></span></th>
						<th>Sept<br><span class="yearNum"></span></th>
						<th>Oct<br><span class="yearNum"></span></th>
						<th>Nov<br><span class="yearNum"></span></th>
						<th>Déc<br><span class="yearNum"></span></th>
					</tr>
					<tr>
                       <td rowspan="7" class="rightborder"><span style="position: absolute; top: 43px; left: 7px;">Nbr d'objectif:</span></td>
					</tr>
					<tr class="lignegris">
                       <td class="rightborder" style="text-align: left; padding-left: 7px;">Objectif1.</td>
                       <td class="rightborder"><input type="number" class="rightnumber"></td>
                       <td class="rightborder"><input type="number" class="rightnumber"></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
                       <td class="rightborder"><input type="number" class="rightnumber" ></td>
					</tr>
					<tr>
                       <td class="rightborder" style="text-align: left; padding-left: 7px;">Objectif2.</td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
					</tr>
					<tr class="lignegris">
                       <td class="rightborder" style="text-align: left; padding-left: 7px;">Objectif3.</td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td> 
					</tr>
					<tr>
                       <td class="rightborder" style="text-align: left; padding-left: 7px;">Objectif4.</td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td> 
					</tr>
					<tr class="lignegris">
                       <td class="rightborder" style="text-align: left; padding-left: 7px;">Objectif5.</td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td>
                       <td class="rightborder"></td> 
					</tr>	
					<tr>
                       <td class="borderme" style="text-align: left; padding-left: 7px;">Objectif6.</td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td>
                       <td class="borderme"></td> 
					</tr>	
				</table>
				<p id="NB">(<span style="font-weight: bold; text-decoration: underline;">NB</span> : Afficher les resultats de mesure des objectifs du processus du mois et ceux des mois précédents.)</p>
			</div>
       <div id="helpandmaintab">
       	
	           <div id="helptab">       <!table d'aide>

						<table id="help">

								<tr>
									<th>Désignation de l'objectif</th>
									<th>Désignation de<br>l'indicateur de<br>Mesure</th>
									<th style="width: 420px;">Mode de calcul</th>
								</tr>
								<tr>
									<td style="text-align: left;"><span style="position: absolute; top: 60px; left: 12px;" >Satisfaire 80% des demandes<br>exprimées</span></td>
									<td style="width: 180px;"><span id="tauxspan" style="position: absolute; top: 60px; left:407px;">Taux de satisfaction<br>client</span></td>
									<td style="font-size: 0.9em;">[Nb demandes Satisfaites (mois M-1)<br>+<br>Nb demandes satisfaires (M)] * 100/ [Nb Demandes Exprimées (mois<br>M-1)<br>+<br>Nb demandes Exprimées (mois M)]</td>
								</tr>

						
						</table>

			   </div>

	   <div id="maintab">
			   	  	
						<table id="main" >     <!table principale>
							
								<tr>
									<th>District</th>
									<th colspan="2" style="width:130px; ">Mesure</th>
									<th>Ecart</th>
									<th style="width: 250px;">Cause</th>
									<th class="actioncorr">Actions Correctives</th>
								</tr>
								<tr id="pginf"><!positive GINF>
									<td rowspan="2" class="maintabcolor">GINF</td>         
									<td style="width:55px; height: 27px;">


										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg>
									</td> 									
									<td style="width: 55px;"><input type="number" name="mesureginf" style="width: 58px;height:20px;" id="mpginf"></td>
									<td></td>
									<td rowspan="2" class="cause"><textarea placeholder="Obsérvation obligatoire si Ecart inférieur à 0" style="height: 60px; padding:2px; resize: none; overflow:hidden; font-weight: bold; width: 235px;" maxlength="110" ></textarea></td>
									<td rowspan="2" ><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:2px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="nginf"> <!negative GINF>
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg>
</td>
									<td><input type="number" name="mesureginf" style="width: 58px;height:20px;" id="mnginf"></td>
									<td></td >
								</tr> 
								<tr id="palger">   <!positive alger>   								
									<td rowspan="2" class="maintabcolor">Alger / INF</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td> 
									<td></td> 
									<td rowspan="2" class="cause"></td> 
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="nalger"> <!negative alger> 
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								<tr id="pbejaia">   <!positive bejaia>    								
									<td rowspan="2" class="maintabcolor">Bejaia / INF</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
									<td rowspan="2" class="cause"></td>
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="nbejaia"> <!negative bejaia> 
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								<tr id="poran">  <!positive ORAN>    								
									<td rowspan="2" class="maintabcolor">Oran / INF</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
									<td rowspan="2" class="cause"></td>
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="noran"> <!negative ORAN>
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								<tr id="pconstantine">   <!positive CONSTANTINE>   		 						
									<td rowspan="2" class="maintabcolor">Constantine<br>/INF</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
									<td rowspan="2" class="cause"></td>
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="nconstantine"> <!negative CONSTANTINE> 
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								<tr id="ptelemcen">   <!positive TELEMCEN>    								
									<td rowspan="2" class="maintabcolor">Telemcen / INF</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
									<td rowspan="2" class="cause"></td>
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="ntelemcen"> <!negative TELEMCEN>   
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								<tr id="pbba">      <!positive BBA>   								
									<td rowspan="2" class="maintabcolor">BBA / INF</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
									<td rowspan="2" class="cause"></td>
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="nbba"> <!negative BBA>   	
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								<tr id="pbatna">     <!positive batna>   	  								
									<td rowspan="2" class="maintabcolor">Batna / INF</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
									<td rowspan="2" class="cause"></td>
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="nbatna">   <!negative batna>   	
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								<tr id="pbéchar">      	<!positive bechar>   								
									<td rowspan="2" class="maintabcolor">Béchar / INF</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
									<td rowspan="2" class="cause"></td>
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>
								<tr id="nbéchar">   <!negative BECHAR>   	
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								<tr id="pmsinf">  <!positive MS INF>   	     								
									<td rowspan="2" class="maintabcolor">Processus MS<br>(INF)</td>         
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.966" cy="236.966" r="236.966"/>
<g>
	<path style="fill:#333333;" d="M383.164,237.123c-1.332,80.699-65.514,144.873-146.213,146.206
		c-80.702,1.332-144.907-67.52-146.206-146.206c-0.198-12.052-18.907-12.071-18.709,0c1.5,90.921,73.993,163.414,164.914,164.914
		c90.929,1.5,163.455-76.25,164.922-164.914C402.071,225.052,383.362,225.071,383.164,237.123L383.164,237.123z"/>
	<circle style="fill:#333333;" cx="164.937" cy="155.227" r="37.216"/>
	<circle style="fill:#333333;" cx="305.664" cy="155.227" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
									<td rowspan="2" class="cause"><textarea placeholder="Obsérvation obligatoire si Ecart inférieur à 0" style="height: 60px; padding:2px; resize: none; overflow:hidden; font-weight: bold; width: 235px;" maxlength="110" ></textarea></td>
									<td rowspan="2"><textarea placeholder="Action obligatoire si Ecart inférieur à 0" style="color: blue;height: 60px; padding:6px; resize: none; overflow:hidden; font-weight: bold;width: 185px; font-size: 0.9em;" maxlength="110" ></textarea></td>
								</tr>

								<tr id="nmsinf"> <!negative MS INF> 
									<td style="width:55px; height: 27px;"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 473.935 473.935" style="enable-background:new 0 0 473.935 473.935; position: relative; top: 2px; left: 0px;" xml:space="preserve" width="25px" height="25px">
<circle style="fill:#FFC10E;" cx="236.967" cy="236.967" r="236.967"/>
<g>
	<path style="fill:#333333;" d="M356.671,354.1c-66.226-67.618-174.255-67.337-240.096,0.703
		c-8.389,8.666,4.827,21.912,13.227,13.227c58.87-60.83,154.386-61.204,213.641-0.703C351.896,375.96,365.116,362.721,356.671,354.1
		L356.671,354.1z"/>
	<circle style="fill:#333333;" cx="164.938" cy="155.232" r="37.216"/>
	<circle style="fill:#333333;" cx="305.667" cy="155.232" r="37.216"/>
</g>
</svg></td>
									<td></td>
									<td></td>
								</tr>
								
								
						</table>

			   </div>
				<div id="footer">
					<h3>Date : <span id="rempliredate"></span></h3>
				    <h3>Visa du Pilote Processus</h3>
				</div>
			   
		</div>

		 <button id="imprimer">Imprimer</button>

	</div> <!fin acceuil>

<script type="text/javascript">

(function () {

/*obligation d'utiliser javascript*/
	window.onload=function(){
     document.body.style.display='block';
      }
/**/

// RECUPERATION DES TAUX et des obsérvation du mois m de l'anné a POUR CHAQUE DISTRICT DEPUIS LA BASE DE DONNEE AVEC LA FONCTION recup_taux

var d=new Date(),
    m=d.getMonth()+1; /*mois et annee courant*/
    a=d.getFullYear();

//generer l'anné automatiquement dans le tableau des objectifs
var yearNum=document.getElementsByClassName("yearNum");
for(var i=0;i<yearNum.length;i++) yearNum[i].innerHTML=a;

 var mpginf=document.getElementById('mpginf'),
     mnginf=document.getElementById('mnginf');

     mpginf.addEventListener('keyup',function (e) {
     	if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || (e.keyCode == 8) || (e.keyCode == 46)) 
     	{
     		mpginf.parentNode.nextElementSibling.innerHTML='';

     		if(mpginf.value) mpginf.parentNode.nextElementSibling.innerHTML=(e.target.value-80.00).toFixed(2)+' %';
     		
     	}
     	 });

    mnginf.addEventListener('keyup',function (e) {
     	if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || (e.keyCode == 8) || (e.keyCode == 46)) 
     	{
     		mnginf.parentNode.nextElementSibling.innerHTML='';
     		if(mnginf.value) mnginf.parentNode.nextElementSibling.innerHTML=(e.target.value-80.00).toFixed(2)+' %';
     		
     	} 
     	 });   
  
     	
    

function recup_taux_cause_ecart (m,a) //m:mois  a:annee
{
	var xhr=new XMLHttpRequest();
	xhr.open('GET','http://localhost/projet/branche/brancheserver.php?recuptaux='+true+'&m='+m+'&a='+a);
	xhr.send(null);

	xhr.addEventListener('readystatechange',function () {
		if(xhr.readyState===4 && xhr.status===200)
		{
               var data=JSON.parse(xhr.responseText),id,districtname,taux,ecart,
               datalength=data.length;
              
               for(var i=0;i<datalength;i++)
               {          	
               	    //ecrir la donné dans la colomne conrressendante avec setMesure mais d'abord
               	    //verifié si taux > 0.8 ou taux < 0.8 pour savoire ou ecrire dans (p)district ou (n)district
               	    districtname=data[i].district;

               	    taux=data[i].taux;
               	    cause=data[i].obsérvation;
               	    ecart=(taux-0.8).toFixed(4);

                    if ( taux >= 0.8 )
                    {
                    	//recupération des district et fabrication des id en fonction des district ex Alger devient palger
		               	if(districtname!='Bordj bou arreridj') id='p'+districtname.toLowerCase();
		               	else id='pbba';  

                    }
                    else if( taux < 0.8 )
                    {
						if(districtname!='Bordj bou arreridj') id='n'+districtname.toLowerCase();
		               	else id='nbba';
		               	setCause('p'+districtname.toLowerCase(),cause);
                    }
                    else alert('une ERREUR valeur taux inattendu dans la fonction recup_taux(m,a)'); 
                    setMesure(id,((taux*100).toFixed(2))+' %');
                    setEcart(id,((ecart*100).toFixed(2))+' %');             
               }
                 var xhr1=new XMLHttpRequest();
				 xhr1.open("GET","http://localhost/projet/branche/brancheserver.php?m="+m+"&a="+a+"&getmsitaux="+true);
				 xhr1.send(null);
				 xhr1.addEventListener('readystatechange',function () {
				 	if(xhr1.readyState===4 && xhr1.status===200)
				 	{

				 		var msitaux=parseFloat(xhr1.responseText);
				 		var ecart=((msitaux-0.8)*100).toFixed(2)+" %";
				 		if(msitaux && msitaux<0.8) 
				 		{
				 			document.getElementById('nmsinf').firstElementChild.nextElementSibling.innerHTML=(msitaux*100).toFixed(2)+" %";
				 			document.getElementById('nmsinf').firstElementChild.nextElementSibling.nextElementSibling.innerHTML=ecart;
				 		}
				 		else
				 		{ 
				 			document.getElementById('pmsinf').firstElementChild.nextElementSibling.nextElementSibling.innerHTML=(msitaux*100).toFixed(2)+" %";
				 			document.getElementById('pmsinf').firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML=ecart;
				 		}	
				 	}
				 });
		}
	});
}

	recup_taux_cause_ecart(m,a); /*au chargement les taux du mois courant de l'anné courante seront afficher*/

/*get et set pour recuperer les donner et inserer les donner dans la fiche de suivi objective -qualité*/

function getMesure (id) { //je donne l'id de la ligne par exemple positive alger = palger retourne la mesure
	var ligne=document.getElementById(id);
	if(id.charAt(0)=='p')return(ligne.firstElementChild.nextElementSibling.nextElementSibling.innerHTML);
	else if(id.charAt(0)=='n') return(ligne.firstElementChild.nextElementSibling.innerHTML);
	else return false;
}
function setMesure (id,value) {
    var ligne=document.getElementById(id);
	if(id.charAt(0)=='p')ligne.firstElementChild.nextElementSibling.nextElementSibling.innerHTML=value;
	else if(id.charAt(0)=='n') ligne.firstElementChild.nextElementSibling.innerHTML=value;	
}
function getCause (id) {
	var ligne=document.getElementById(id);
	return(ligne.lastElementChild.previousElementSibling.innerHTML);
}
function setCause (id,value) {

	var ligne=document.getElementById(id);
	ligne.lastElementChild.previousElementSibling.innerHTML=value;	
}

function getEcart (id) {
	var ligne=document.getElementById(id);
	if(id.charAt(0)=='p')return(ligne.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML);
	else if(id.charAt(0)=='n') return(ligne.firstElementChild.nextElementSibling.nextElementSibling.innerHTML);
	else return false;
}

function setEcart (id,value) {
    var ligne=document.getElementById(id);
	if(id.charAt(0)=='p')ligne.firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML=value;
	else if(id.charAt(0)=='n') ligne.firstElementChild.nextElementSibling.nextElementSibling.innerHTML=value;	
}


// GESTION DE LA BOITE DE RECEPTION ///////////////////////////////////////////////////////////////////////////////////////////
/* ICI JE CHARGE LA PAGE A AFFICHER LOR DE CLICK SUR AFFICHER DE BOITE D'ENVOI et je la met dans un div avec un display none*/
				var insert=document.createElement('div'),affichersvdc=document.getElementById('affichersvdc'),
				xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/branche/tablesvdc.php');
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () {
		        	if(xhr.readyState===4 && xhr.status===200)
		        	{
		                    insert.innerHTML=xhr.responseText;	
		                    affichersvdc.appendChild(insert);
		                    document.getElementById('main_table').style.tableLayout = 'fixed'; 
		        	}
		        });

// ICI CELLE LA PERMET D'AFFICHER LE CONTENU DE LA BOITE D'ENVOI
function display_demandes (cond) 
		 		{ 		/*liste de demandes avec les boutton afficher*/

						//pour regler la date automatiquement au chargement de la page
						var monthselect=document.getElementById('monthselect')
						if(cond)
						{
							var date=new Date(),
							month=date.getMonth()+1;
							if(month.toString().length==1) monthselect.value=date.getFullYear()+'-0'+month; 
							else monthselect.value=date.getFullYear()+'-'+month; 
						}
						

						
						var xhr=new XMLHttpRequest(),tabrecu=document.getElementById('tabrecu');
						xhr.open('GET','http://localhost/projet/branche/brancheserver.php?displaydemandes='+true+'&monthselect='+monthselect.value);
						xhr.send(null);
						xhr.addEventListener('readystatechange',function () {
							if(xhr.readyState===4 && xhr.status===200)
							{
					           tabrecu.lastElementChild.innerHTML=xhr.responseText; //ecrire dans tbody

					           var afficherDem=document.getElementsByClassName('afficher_dem'),afficherDemLength=afficherDem.length;
									for(var i=0;i<afficherDemLength;i++)
									{
										afficherDem[i].addEventListener('click',function (e) 
										{
											   //e.target.lastElementChild.innerHTML l'id dans la table
											   var xhr=new XMLHttpRequest();
											   xhr.open('GET','http://localhost/projet/branche/brancheserver.php?svdcdisplay='+true+'&id='+e.target.lastElementChild.innerHTML);
											   xhr.send(null);
											   xhr.addEventListener('readystatechange',function () {
											   	  if(xhr.readyState===4 && xhr.status===200)
											   	  {
											   	  	var data=xhr.responseText.split('|'),
	                                                user=data[0],a=data[1],b=data[2],c=data[3],d=data[4],reste=data[5],taux=data[6],observation=data[7],district=data[8],date_envoi1=data[9].split('-'),moisnum=date_envoi1[1],annee=date_envoi1[0];

	                                                const monthNames = ["JANVIER", "FEVRIER", "MARS", "AVRIL", "MAY", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE"];
                                                    
                                                    var mois=monthNames[parseInt(moisnum)-1];

	                                                display_svdc(user,a,b,c,d,reste,taux,observation,district,mois,annee);
											   	  }
											   });
										   
					                       

										});
									}

							}
						});

	                    monthselect.addEventListener('change',function () { //si il change la valeur de la date
								display_demandes(false);
						});	
						
				}

//AFFICHER LA PAGE CHARGé ay début et lui passer les donnéer
function display_svdc (user,a,b,c,d,reste,taux,observation,district,mois,annee)
		{
			var ficheimprimer=document.createElement('button'),
			revenir=document.createElement('button');

			revenir.className='afficher_dem';
			revenir.id='revenir';
			revenir.style.position='fixed';
			revenir.style.left='41.6%';
			revenir.style.zIndex = '1';
			revenir.style.width='200px';
			revenir.innerHTML='<svg id="mysvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="35px" height="25px" viewBox="0 0 340.533 340.533" style="enable-background:new 0 0 340.533 340.533;" xml:space="preserve"><path d="M145.768,290.197c-6.137,0-12.25-5.831-13.412-7.002c-4.194-3.092-115.082-86.691-127.269-98.856      c-4.422-4.444-5.203-8.894-5.074-11.856c0.288-7.089,5.768-11.935,6.389-12.463L129.738,57.946      c1.351-1.474,7.617-7.611,13.577-7.611c2.717,0,9.031,1.243,9.031,12.691v52.623H326.47c0.486-0.081,1.135-0.156,1.903-0.156      c2.03,0,12.16,0.774,12.16,15.976v80.87c0,11.187-7.927,14.153-12.118,14.153H156.012v48.23      C156.012,288.191,149.593,290.197,145.768,290.197z M145.768,280.451v4.87V280.451L145.768,280.451z" fill="#f09d02"/></svg> REVENIR';
			ficheimprimer.id='ficheimprimer';
            ficheimprimer.innerHTML='Imprimer';
			var acceuil=document.getElementById('Acceuil'),
			boite=document.getElementById('boite'),
			affichersvdc=document.getElementById('affichersvdc');
			affichersvdc.appendChild(revenir);
			affichersvdc.appendChild(ficheimprimer);

		    //afficher la table
                acceuil.style.display='none';
		    	boite.style.display='none';
		        affichersvdc.style.display='block';
		        
		  	//style du button revenir de la fleche
				revenir.addEventListener('mouseover',function () {
					revenir.innerHTML='<svg id="mysvg" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="35px" height="25px" viewBox="0 0 340.533 340.533" style="enable-background:new 0 0 340.533 340.533;" xml:space="preserve"><path d="M145.768,290.197c-6.137,0-12.25-5.831-13.412-7.002c-4.194-3.092-115.082-86.691-127.269-98.856c-4.422-4.444-5.203-8.894-5.074-11.856c0.288-7.089,5.768-11.935,6.389-12.463L129.738,57.946c1.351-1.474,7.617-7.611,13.577-7.611c2.717,0,9.031,1.243,9.031,12.691v52.623H326.47c0.486-0.081,1.135-0.156,1.903-0.156c2.03,0,12.16,0.774,12.16,15.976v80.87c0,11.187-7.927,14.153-12.118,14.153H156.012v48.23C156.012,288.191,149.593,290.197,145.768,290.197z M145.768,280.451v4.87V280.451L145.768,280.451z"/></svg> REVENIR';
				});
					revenir.addEventListener('mouseout',function () {
					revenir.innerHTML='<svg id="mysvg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="35px" height="25px" viewBox="0 0 340.533 340.533" style="enable-background:new 0 0 340.533 340.533;" xml:space="preserve"><path d="M145.768,290.197c-6.137,0-12.25-5.831-13.412-7.002c-4.194-3.092-115.082-86.691-127.269-98.856      c-4.422-4.444-5.203-8.894-5.074-11.856c0.288-7.089,5.768-11.935,6.389-12.463L129.738,57.946      c1.351-1.474,7.617-7.611,13.577-7.611c2.717,0,9.031,1.243,9.031,12.691v52.623H326.47c0.486-0.081,1.135-0.156,1.903-0.156      c2.03,0,12.16,0.774,12.16,15.976v80.87c0,11.187-7.927,14.153-12.118,14.153H156.012v48.23      C156.012,288.191,149.593,290.197,145.768,290.197z M145.768,280.451v4.87V280.451L145.768,280.451z" fill="#f09d02"/></svg> REVENIR';
				});
		    
		     //revenir en arriere

				revenir.addEventListener('click',function(e)
				{
					revenir.remove();
					ficheimprimer.remove();
					acceuil.style.display='none';
			    	boite.style.display='block';
			        affichersvdc.style.display='none';
				});
				
			
             //imprimer svdc
				
				ficheimprimer.addEventListener('click', function inmpri () 
				{
		             var  bla=document.getElementById('bla'),
		             headerTab1=document.getElementById('header_tab1'),griffe=document.getElementById('griffe')/*,griffContent=griffe.innerHTML,divGriffeContent=document.createElement('div')*/,br=document.getElementById('br'),naftalproperty=document.getElementById('naftalproperty'),menu=document.getElementById('menu');  

		            /*avant le window.print nssagam da3wa*/
		             
		             griffe.style.position='relative';
		             griffe.style.top='125px';
		             griffe.style.left='-6px';

		             revenir.style.display='none';

		             ficheimprimer.style.display='none';  

		             bla.style.top="40%";
		             headerTab1.style.left='0px';
		             headerTab1.style.top='10px';         
		            /* griffe.innerHTML="";
		            
		             divGriffeContent.innerHTML=griffContent;
		             divGriffeContent.id="dgfc";*/
		              
		             br.innerHTML="DEPARTEMENT<br>INFORMATIQUE";
		             
		             naftalproperty.style.top="200px";

		             menu.style.display='none';
		                    
		             window.print();

		             /*aprés le window.print remetrre les chause a leur place*/  

		             griffe.style.position='';
		             griffe.style.top='';

		             revenir.style.display='';

		             ficheimprimer.style.display='';    

		             bla.style.top="";
		             headerTab1.style.left='';
		             headerTab1.style.top='';

		  
		             /*griffe.innerHTML=griffContent;
		             divGriffeContent.remove();*/

		             br.innerHTML="DEPARTEMENT INFORMATIQUE";

		             naftalproperty.style.top="";
		 
		             menu.style.display='';
				});	

             //remplire les données

            document.getElementById('a').innerHTML=a;	
            document.getElementById('b').innerHTML=b;
            document.getElementById('c').innerHTML=c;
            document.getElementById('d').innerHTML=d;
            document.getElementById('reste').innerHTML=reste;
            document.getElementById('taux').innerHTML=(parseFloat(taux)*100).toFixed(2)+' %' ;
            var observationdoc=document.getElementById('observation');
            observationdoc.style.wordWrap='break-word';
            observationdoc.style.fontSize= '0.7em';
            observationdoc.innerHTML=observation;
            document.getElementById('district').innerHTML=district;
            document.getElementById('mois').innerHTML=mois;
            document.getElementById('annee').innerHTML=annee;
		}


/* imprimer  fiche branche*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      var imprimer=document.getElementById('imprimer'),menu=document.getElementById('menu'),helpandmaintab=document.getElementById('helpandmaintab'),header_tab=document.getElementById('header_tab'),objectifannee=document.getElementById('objectifannee');
      imprimer.addEventListener('click',function () {
            var NB=document.getElementById('NB'),
            textare=document.getElementsByTagName('textarea');
            var textareaValue; var textNode; var main=document.getElementById('main');var help=document.getElementById('help');
            var tauxspan=document.getElementById('tauxspan');
            var number=document.querySelectorAll('input[type="number"]');
            var numberValue; var numberTextNode;
            NB.style.marginLeft='-120px';
	      	menu.style.display='none';
	      	helpandmaintab.style.top='850px';
	      	main.style.width="1100px";help.style.width="1100px";
	        header_tab.style.left='55px';
	        objectifannee.style.left='-74px';
	        imprimer.style.display='none';
	        for(var i=0;i<textare.length;i++)
	        {
	         textareaValue=textare[i].value;
	         textNode=document.createTextNode(textareaValue);
	         textare[i].style.display="none";
	         textare[i].parentNode.appendChild(textNode);
	        }
	        for(var i=0;i<number.length;i++)
	        {
	         numberValue=number[i].value;
	         if(numberValue)
	         {
	         		numberTextNode=document.createElement("span");
	         		numberTextNode.innerHTML=numberValue; 	   		
	         		if(number[i].className!="numpage") 
	         		{
	         			 numberTextNode.innerHTML+=" %"; 
	         			 number[i].parentNode.appendChild(numberTextNode);
	         		} else
	         		{  
	         			 numberTextNode.className="mytextnodes";  
	         		 	 number[i].parentNode.insertBefore(numberTextNode, number[i]);
			        }
	     	 }
	         number[i].style.display="none";
	         
	        }
	        tauxspan.style.left="505px";
	      	window.print();
	      	tauxspan.style.left="407px";
	      	main.style.width="";help.style.width="";
	      	for(var i=0;i<textare.length;i++)
	      	{
	      	 textare[i].parentNode.lastChild.remove();
	      	 textare[i].style.display="";
	      	}
	      	for(var i=0;i<number.length;i++) 
	      	{
	      			if(number[i].previousSibling && number[i].previousSibling.nodeName.toLowerCase()=="span") number[i].previousSibling.remove();
	      			else if(number[i].parentNode.lastElementChild.nodeName.toLowerCase()=="span") number[i].parentNode.lastElementChild.remove();
	      			number[i].style.display='';
	      	}		
	      	NB.style.marginLeft='';
	      	menu.style.display='';
	      	helpandmaintab.style.top='';
	        header_tab.style.left='';
	        objectifannee.style.left='';
	        imprimer.style.display='';

      });


      /*date*/
      const monthNames = ["JANVIER", "FEVRIER", "MARS", "AVRIL", "MAY", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE"];
var today = new Date();
var dd = today.getDate();
var yyyy = today.getFullYear();
if(dd<10) {
    dd = '0'+dd
} 


     var rempliredate=document.getElementById('rempliredate');
      rempliredate.innerHTML=dd+' '+monthNames[today.getMonth()]+' '+yyyy;

/*le MENU*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 function display_user_change(arg)
 {
    	if(arg=="on")
    	{
    		var backgroundDiv=document.createElement('div');
    		backgroundDiv.id='backgroundDiv';
            var inputDialog=document.createElement('form'),
            oldUser=document.createElement('input'),
            newUser=document.createElement('input'),
            confirm=document.createElement('input'),
            croix=document.createElement('svg');
            croix.id="croixsvg";
            croix.innerHTML='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 27.965 27.965" style="enable-background:new 0 0 27.965 27.965;" xml:space="preserve" width="25px" height="25px"><g id="c142_x"><path d="M13.98,0C6.259,0,0,6.261,0,13.983c0,7.721,6.259,13.982,13.98,13.982c7.725,0,13.985-6.262,13.985-13.982C27.965,6.261,21.705,0,13.98,0z M19.992,17.769l-2.227,2.224c0,0-3.523-3.78-3.786-3.78c-0.259,0-3.783,3.78-3.783,3.78l-2.228-2.224c0,0,3.784-3.472,3.784-3.781c0-0.314-3.784-3.787-3.784-3.787l2.228-2.229c0,0,3.553,3.782,3.783,3.782c0.232,0,3.786-3.782,3.786-3.782l2.227,2.229c0,0-3.785,3.523-3.785,3.787C16.207,14.239,19.992,17.769,19.992,17.769z"/></g></svg>';

            var usersvg=document.createElement('svg');
            usersvg.id="usersvg";
            usersvg.innerHTML='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 248.349 248.349" style="enable-background:new 0 0 248.349 248.349;" xml:space="preserve" width="32px" height="32px"><g><path style="fill:#010002;" d="M9.954,241.305h228.441c3.051,0,5.896-1.246,7.805-3.416c1.659-1.882,2.393-4.27,2.078-6.723c-5.357-41.734-31.019-76.511-66.15-95.053c-14.849,14.849-35.348,24.046-57.953,24.046s-43.105-9.197-57.953-24.046C31.09,154.65,5.423,189.432,0.071,231.166c-0.315,2.453,0.424,4.846,2.078,6.723C4.058,240.059,6.903,241.305,9.954,241.305z"/><path style="fill:#010002;" d="M72.699,127.09c1.333,1.398,2.725,2.73,4.166,4.019c12.586,11.259,29.137,18.166,47.309,18.166s34.723-6.913,47.309-18.166c1.441-1.289,2.834-2.622,4.166-4.019c1.327-1.398,2.622-2.828,3.84-4.329c9.861-12.211,15.8-27.717,15.8-44.6c0-39.216-31.906-71.116-71.116-71.116S53.059,38.95,53.059,78.16c0,16.883,5.939,32.39,15.8,44.6C70.072,124.262,71.366,125.687,72.699,127.09z"/></g></svg>';

           var erreur_div=document.createElement('div');
	       erreur_div.id="erreur_div";
           erreur_div.display='none';

            croix.addEventListener('click',function () {
            	backgroundDiv.remove();
            });

            oldUser.type="text";
            oldUser.className="inputchange";
            oldUser.id="oldUser";
            oldUser.name="DisUserNameChange1";
            oldUser.placeholder="Nouveau Nom d'utilisateur";
            oldUser.maxLength="24";
            oldUser.required=true;
            oldUser.autocomplete="off";
            oldUser.oncopy=function () {
            	return false;
            }
            oldUser.onpaste=function () {
            	return false;
            }

            newUser.type="text";
            newUser.className="inputchange";
            newUser.id="newUser";
            newUser.name="DisUserNameChange2";
            newUser.placeholder="Confirmer Nom d'utilisateur";
            newUser.maxLength="24";
            newUser.required=true;
            newUser.autocomplete="off";
            newUser.oncopy=function () {
            	return false;
            }
            newUser.onpaste=function () {
            	return false;
            }

            confirm.name="submit";
            confirm.value="Confirmer";
            confirm.type="submit";
            confirm.id="confirmBTN";

            inputDialog.id='inputDialog';  /*ICI FORM*/
            inputDialog.action="brancheserver.php";
            inputDialog.method="post";

            inputDialog.appendChild(croix);
            inputDialog.appendChild(erreur_div);
    		inputDialog.appendChild(oldUser);
    		inputDialog.appendChild(usersvg);
    		inputDialog.appendChild(newUser);
    		inputDialog.appendChild(confirm);
    		usersvg2=usersvg.cloneNode(true);
    		usersvg2.id="usersvg2";
    		inputDialog.appendChild(usersvg2);

            backgroundDiv.appendChild(inputDialog);

    		document.body.appendChild(backgroundDiv);
    		return inputDialog;
    	}
    	else if (arg=="off") {
            document.getElementById('backgroundDiv').remove();
    	}
 }
   
   function display_changed_sucess(arg,cond) //le screen vert du succé
   {
   	 if(!document.getElementById('green'))
   	 {
        var green = document.createElement("div");
		green.id='green';
		document.body.appendChild(green);  	 	 
   	 }
   	 else var green= document.getElementById('green');

     green.style.background='';
     green.style.color='';

   	 if(cond==1)
		  {		 					
				green.innerHTML="Votre nouveau nom d'utilisateur est désormais : "+arg;			
		  }
		  else if(cond==2)
		  {

				green.innerHTML="Votre Mot de pass a été changer avec succé !";
				
		  }
		  else if(cond==3)
		  {
		  	   green.innerHTML="Envoi efféctué avec succé ";
		  }
		  else if(cond==4)
		  {
		  	   green.innerHTML="Suppression effectuée avec succès"
		  }
		  else if(cond==5)
		  {
		  	   green.style.background='red';
		  	   green.style.color='black';
		  }
		  return green;
   }

/**/

	function display_menu () 
	{
		var menubtns = document.getElementsByClassName('menubtns'),menubtnsLength=menubtns.length, 
		    menu=document.getElementById('menu'),bt1=document.getElementById('bt1'),bt2=document.getElementById('bt2'),
		    bt3=document.getElementById('bt3'),bt4=document.getElementById('bt4'),bt5=document.getElementById('bt5');

		menu.addEventListener('mouseover',function (e)  
		{
			var relatedtarget=e.relatedTarget;
			while(relatedtarget!=menu && relatedtarget.nodeName!="body" && relatedtarget!= document)
			{
				relatedtarget=relatedtarget.parentNode;
			}
			if(relatedtarget!=menu)
			{
				 setTimeout(
	             function () 
	             {
			            
		                for(var i=0;i<menubtnsLength;i++)
		                { 
		                	menubtns[i].style.display="block";  /*pour un bon affichange c'est comme transition*/
		                }
		         	
	             },200);
			}			
		});

		menu.addEventListener('mouseout',function (e) 
		{
		  var relatedtarget=e.relatedTarget;

		 while(relatedtarget!=menu && relatedtarget.nodeName!="body" && relatedtarget!= document) relatedtarget=relatedtarget.parentNode; 
			if(relatedtarget!=menu)
		       {
		       	 
		           for(var i=0;i<menubtnsLength;i++)
		           {  
		               menubtns[i].style.display="none";

		           }
		       } 	   				
		});

		bt1.addEventListener('click',function ()  //affichage du menu du changement username
		{
			bt1.style.background='#FF8800';
			bt1.style.fontFamily="'theboldfont',arial,sans-serif";
			bt1.style.fontSize="0.8em"; 
			bt1.style.fontWeight="bold";

		    bt2.style.background='';
		    bt2.style.fontFamily="";
			bt2.style.fontSize=""; 
			bt2.style.fontWeight="";

		    bt3.style.background='';
		    bt3.style.fontFamily="";
			bt3.style.fontSize=""; 
			bt3.style.fontWeight="";

		    bt4.style.background='';
		    bt4.style.fontFamily="";
			bt4.style.fontSize=""; 
			bt4.style.fontWeight="";

			bt5.style.background='';
			bt5.style.fontFamily="";
			bt5.style.fontSize=""; 
			bt5.style.fontWeight="";

			bt6.style.background='';
		    bt6.style.fontFamily="";
			bt6.style.fontSize=""; 
			bt6.style.fontWeight="";

		    var backgroundDiv=document.getElementById('backgroundDiv');
	        if(!backgroundDiv)
	        {  
	          	display_user_change("on");
	            var form=document.getElementById('inputDialog');

	            form.addEventListener('submit',function (e)   
			            {   
			               var erreur_div=document.getElementById('erreur_div');
				           if(document.getElementById('oldUser').value!=document.getElementById('newUser').value || document.getElementById('oldUser').value.length<6)
				            {
				            	   
				                    erreur_div.innerHTML='valeurs différentes ou nom trop petit';
				                    erreur_div.display='inline-block';
				            }
				            else 
				            {
				            	var xhr=new XMLHttpRequest();
				            	xhr.open('POST','http://localhost/projet/branche/brancheserver.php');
				            	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				            	xhr.send('DisUserNameChange1='+document.getElementById('oldUser').value+'&DisUserNameChange2='+document.getElementById('newUser').value+'&submit='+document.getElementById('confirmBTN').value);
				            	xhr.addEventListener('readystatechange',function () {
				            		if(xhr.readyState===4 && xhr.status===200)
				            		{
			                             if(xhr.responseText!="2") 
			                             {
				                             	 display_user_change('off');
				                             	 var green=display_changed_sucess(xhr.responseText,1);
				                             	 setTimeout(function () {
				                             	 	green.remove();
				                             	 },10000);

			                             }
			                             else if (xhr.responseText=="2") 
			                             {
			                             	 erreur_div.innerHTML='Nom d\'utilisateur déja pris !';
				                   			 erreur_div.display='inline-block';
			                             }
				            		}
				            	});
				            }  

				            e.preventDefault();
	           });
	        } 
	        else if(document.getElementById('oldUser').name=="DisUserPassChange1")
	        {
	          	document.getElementById('inputDialog').reset();
	          	document.getElementById('erreur_div').innerHTML='';
	              	 document.getElementById('usersvg').innerHTML='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 248.349 248.349" style="enable-background:new 0 0 248.349 248.349;" xml:space="preserve" width="32px" height="32px"><g><path style="fill:#010002;" d="M9.954,241.305h228.441c3.051,0,5.896-1.246,7.805-3.416c1.659-1.882,2.393-4.27,2.078-6.723c-5.357-41.734-31.019-76.511-66.15-95.053c-14.849,14.849-35.348,24.046-57.953,24.046s-43.105-9.197-57.953-24.046C31.09,154.65,5.423,189.432,0.071,231.166c-0.315,2.453,0.424,4.846,2.078,6.723C4.058,240.059,6.903,241.305,9.954,241.305z"/><path style="fill:#010002;" d="M72.699,127.09c1.333,1.398,2.725,2.73,4.166,4.019c12.586,11.259,29.137,18.166,47.309,18.166s34.723-6.913,47.309-18.166c1.441-1.289,2.834-2.622,4.166-4.019c1.327-1.398,2.622-2.828,3.84-4.329c9.861-12.211,15.8-27.717,15.8-44.6c0-39.216-31.906-71.116-71.116-71.116S53.059,38.95,53.059,78.16c0,16.883,5.939,32.39,15.8,44.6C70.072,124.262,71.366,125.687,72.699,127.09z"/></g></svg>';
	          	 document.getElementById('usersvg2').innerHTML='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 248.349 248.349" style="enable-background:new 0 0 248.349 248.349;" xml:space="preserve" width="32px" height="32px"><g><path style="fill:#010002;" d="M9.954,241.305h228.441c3.051,0,5.896-1.246,7.805-3.416c1.659-1.882,2.393-4.27,2.078-6.723c-5.357-41.734-31.019-76.511-66.15-95.053c-14.849,14.849-35.348,24.046-57.953,24.046s-43.105-9.197-57.953-24.046C31.09,154.65,5.423,189.432,0.071,231.166c-0.315,2.453,0.424,4.846,2.078,6.723C4.058,240.059,6.903,241.305,9.954,241.305z"/><path style="fill:#010002;" d="M72.699,127.09c1.333,1.398,2.725,2.73,4.166,4.019c12.586,11.259,29.137,18.166,47.309,18.166s34.723-6.913,47.309-18.166c1.441-1.289,2.834-2.622,4.166-4.019c1.327-1.398,2.622-2.828,3.84-4.329c9.861-12.211,15.8-27.717,15.8-44.6c0-39.216-31.906-71.116-71.116-71.116S53.059,38.95,53.059,78.16c0,16.883,5.939,32.39,15.8,44.6C70.072,124.262,71.366,125.687,72.699,127.09z"/></g></svg>';
	          	 document.getElementById('oldUser').type="text";
	          	 document.getElementById('oldUser').name="DisUserNameChange1";
	             document.getElementById('oldUser').placeholder="Ancien Nom d'utilisateur";
	             document.getElementById('newUser').type="text";
	             document.getElementById('newUser').name="DisUserNameChange2";
	             document.getElementById('newUser').placeholder="Nouveau Nom d'utilisateur";    //affichage du menu du changement user
	        }
		});

        bt2.addEventListener('click',function ()   //affichage du menu du changement mdp
        {

        	bt2.style.background='#FF8800';
			bt2.style.fontFamily="'theboldfont',arial,sans-serif";
			bt2.style.fontSize="0.8em"; 
			bt2.style.fontWeight="bold";

		    bt1.style.background='';
		    bt1.style.fontFamily="";
			bt1.style.fontSize=""; 
			bt1.style.fontWeight="";

		    bt3.style.background='';
		    bt3.style.fontFamily="";
			bt3.style.fontSize=""; 
			bt3.style.fontWeight="";

		    bt4.style.background='';
		    bt4.style.fontFamily="";
			bt4.style.fontSize=""; 
			bt4.style.fontWeight="";

			bt5.style.background='';
			bt5.style.fontFamily="";
			bt5.style.fontSize=""; 
			bt5.style.fontWeight="";

			bt6.style.background='';
		    bt6.style.fontFamily="";
			bt6.style.fontSize=""; 
			bt6.style.fontWeight="";

          var backgroundDiv=document.getElementById('backgroundDiv');
          if(!backgroundDiv)
          {
          	 display_user_change("on");	
          	 document.getElementById('usersvg').innerHTML='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="32px" height="32px"><g><path d="M437.333,192h-32v-42.667C405.333,66.99,338.344,0,256,0S106.667,66.99,106.667,149.333V192h-32C68.771,192,64,196.771,64,202.667v266.667C64,492.865,83.135,512,106.667,512h298.667C428.865,512,448,492.865,448,469.333V202.667C448,196.771,443.229,192,437.333,192z M287.938,414.823c0.333,3.01-0.635,6.031-2.656,8.292c-2.021,2.26-4.917,3.552-7.948,3.552h-42.667c-3.031,0-5.927-1.292-7.948-3.552c-2.021-2.26-2.99-5.281-2.656-8.292l6.729-60.51c-10.927-7.948-17.458-20.521-17.458-34.313c0-23.531,19.135-42.667,42.667-42.667s42.667,19.135,42.667,42.667c0,13.792-6.531,26.365-17.458,34.313L287.938,414.823z M341.333,192H170.667v-42.667C170.667,102.281,208.948,64,256,64s85.333,38.281,85.333,85.333V192z"/></g></svg>';
          	 document.getElementById('usersvg2').innerHTML='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="32px" height="32px"><g><path d="M437.333,192h-32v-42.667C405.333,66.99,338.344,0,256,0S106.667,66.99,106.667,149.333V192h-32C68.771,192,64,196.771,64,202.667v266.667C64,492.865,83.135,512,106.667,512h298.667C428.865,512,448,492.865,448,469.333V202.667C448,196.771,443.229,192,437.333,192z M287.938,414.823c0.333,3.01-0.635,6.031-2.656,8.292c-2.021,2.26-4.917,3.552-7.948,3.552h-42.667c-3.031,0-5.927-1.292-7.948-3.552c-2.021-2.26-2.99-5.281-2.656-8.292l6.729-60.51c-10.927-7.948-17.458-20.521-17.458-34.313c0-23.531,19.135-42.667,42.667-42.667s42.667,19.135,42.667,42.667c0,13.792-6.531,26.365-17.458,34.313L287.938,414.823z M341.333,192H170.667v-42.667C170.667,102.281,208.948,64,256,64s85.333,38.281,85.333,85.333V192z"/></g></svg>';
          	 document.getElementById('oldUser').type="password";
          	 document.getElementById('oldUser').name="DisUserPassChange1";
             document.getElementById('oldUser').placeholder="Nouveau Mot de pass";
             document.getElementById('newUser').type="password";
             document.getElementById('newUser').name="DisUserPassChange2";
             document.getElementById('newUser').placeholder="Confirmer Mot de pass";


            var form=document.getElementById('inputDialog');

            form.addEventListener('submit',function (e)   
            {     var erreur_div=document.getElementById('erreur_div');
	            if(document.getElementById('oldUser').value!=document.getElementById('newUser').value || document.getElementById('oldUser').value.length<8)
	            {
	            	   
	                    erreur_div.innerHTML='valeurs différentes ou pass trop petit';
	                    erreur_div.display='inline-block';
	            }
	            else 
	            {
	            	var xhr=new XMLHttpRequest();
	            	xhr.open('POST','http://localhost/projet/branche/brancheserver.php');
	            	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	            	xhr.send('DisUserPassChange1='+document.getElementById('oldUser').value+'&DisUserPassChange2='+document.getElementById('newUser').value+'&submit='+document.getElementById('confirmBTN').value);

	            	xhr.addEventListener('readystatechange',function () {
	            		if(xhr.readyState===4 && xhr.status===200)
	            		{
                             if(xhr.responseText!="2") 
                             {
                             	 	 display_user_change('off');
	                             	 var green=display_changed_sucess(xhr.responseText,2);
	                             	 setTimeout(function () {
	                             	 	green.remove();
	                             	 },10000);
                             }
                             else if (xhr.responseText=="2") 
                             {
                             	 erreur_div.innerHTML='ERREUR !';
	                   			 erreur_div.display='inline-block';
                             }
	            		}
	            	});
	            }  

	            e.preventDefault();
            });
            


          }
          else
          {
          	 if(document.getElementById('oldUser').name=="DisUserNameChange1") 
          	 {
          	 	erreur_div.innerHTML='';
          	 	document.getElementById('inputDialog').reset();
          	 	document.getElementById('usersvg').innerHTML='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="32px" height="32px"><g><path d="M437.333,192h-32v-42.667C405.333,66.99,338.344,0,256,0S106.667,66.99,106.667,149.333V192h-32C68.771,192,64,196.771,64,202.667v266.667C64,492.865,83.135,512,106.667,512h298.667C428.865,512,448,492.865,448,469.333V202.667C448,196.771,443.229,192,437.333,192z M287.938,414.823c0.333,3.01-0.635,6.031-2.656,8.292c-2.021,2.26-4.917,3.552-7.948,3.552h-42.667c-3.031,0-5.927-1.292-7.948-3.552c-2.021-2.26-2.99-5.281-2.656-8.292l6.729-60.51c-10.927-7.948-17.458-20.521-17.458-34.313c0-23.531,19.135-42.667,42.667-42.667s42.667,19.135,42.667,42.667c0,13.792-6.531,26.365-17.458,34.313L287.938,414.823z M341.333,192H170.667v-42.667C170.667,102.281,208.948,64,256,64s85.333,38.281,85.333,85.333V192z"/></g></svg>';
          	 document.getElementById('usersvg2').innerHTML='<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"	viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="32px" height="32px"><g><path d="M437.333,192h-32v-42.667C405.333,66.99,338.344,0,256,0S106.667,66.99,106.667,149.333V192h-32C68.771,192,64,196.771,64,202.667v266.667C64,492.865,83.135,512,106.667,512h298.667C428.865,512,448,492.865,448,469.333V202.667C448,196.771,443.229,192,437.333,192z M287.938,414.823c0.333,3.01-0.635,6.031-2.656,8.292c-2.021,2.26-4.917,3.552-7.948,3.552h-42.667c-3.031,0-5.927-1.292-7.948-3.552c-2.021-2.26-2.99-5.281-2.656-8.292l6.729-60.51c-10.927-7.948-17.458-20.521-17.458-34.313c0-23.531,19.135-42.667,42.667-42.667s42.667,19.135,42.667,42.667c0,13.792-6.531,26.365-17.458,34.313L287.938,414.823z M341.333,192H170.667v-42.667C170.667,102.281,208.948,64,256,64s85.333,38.281,85.333,85.333V192z"/></g></svg>';
          	 	document.getElementById('oldUser').type="password";
          	 	document.getElementById('oldUser').name="DisUserPassChange1";
             	document.getElementById('oldUser').placeholder="Nouveau Mot de pass";
             	document.getElementById('newUser').type="password";
             	document.getElementById('newUser').name="DisUserPassChange2";
             	document.getElementById('newUser').placeholder="Confirmer Mot de pass";
          	 }
          }         	
		});
        
		bt3.addEventListener('click',function ()  //deconnxion
		{
		  	bt3.style.background='#FF8800';
			bt3.style.fontFamily="'theboldfont',arial,sans-serif";
			bt3.style.fontSize="0.8em"; 
			bt3.style.fontWeight="bold";

		    bt1.style.background='';
		    bt1.style.fontFamily="";
			bt1.style.fontSize=""; 
			bt1.style.fontWeight="";

		    bt2.style.background='';
		    bt2.style.fontFamily="";
			bt2.style.fontSize=""; 
			bt2.style.fontWeight="";

		    bt4.style.background='';
		    bt4.style.fontFamily="";
			bt4.style.fontSize=""; 
			bt4.style.fontWeight="";

			bt5.style.background='';
			bt5.style.fontFamily="";
			bt5.style.fontSize=""; 
			bt5.style.fontWeight="";

			bt6.style.background='';
		    bt6.style.fontFamily="";
			bt6.style.fontSize=""; 
			bt6.style.fontWeight="";

			window.location.href="http://localhost/projet/login.php";
		}); 

		//ajouter bt4 et bt5 

	    bt4.addEventListener('click',function ()  /////////////////////////////////////////////////////////////////////////////
		{    

			bt4.style.background='#FF8800';
			bt4.style.fontFamily="'theboldfont',arial,sans-serif";
			bt4.style.fontSize="0.8em"; 
			bt4.style.fontWeight="bold";

		    bt1.style.background='';
		    bt1.style.fontFamily="";
			bt1.style.fontSize=""; 
			bt1.style.fontWeight="";

		    bt2.style.background='';
		    bt2.style.fontFamily="";
			bt2.style.fontSize=""; 
			bt2.style.fontWeight="";

		    bt3.style.background='';
		    bt3.style.fontFamily="";
			bt3.style.fontSize=""; 
			bt3.style.fontWeight="";

			bt5.style.background='';
			bt5.style.fontFamily="";
			bt5.style.fontSize=""; 
			bt5.style.fontWeight="";

			bt6.style.background='';
		    bt6.style.fontFamily="";
			bt6.style.fontSize=""; 
			bt6.style.fontWeight="";

			var acceuil=document.getElementById('Acceuil'),
			boite=document.getElementById('boite'),revenir=document.getElementById('revenir'),
			ficheimprimer=document.getElementById('ficheimprimer');
			affichersvdc=document.getElementById('affichersvdc');
		    acceuil.style.display='none';
		    boite.style.display='block';
		    affichersvdc.style.display='none';		
		    if(ficheimprimer || revenir)
		    {
		    	revenir.remove();
		    	ficheimprimer.remove();
		    }	
	        display_demandes(true);		                	                         		            
		}); 

		bt5.addEventListener('click',function () 
		{

			bt5.style.background='#FF8800';
			bt5.style.fontFamily="'theboldfont',arial,sans-serif";
			bt5.style.fontSize="0.8em"; 
			bt5.style.fontWeight="bold";

		    bt1.style.background='';
		    bt1.style.fontFamily="";
			bt1.style.fontSize=""; 
			bt1.style.fontWeight="";

		    bt2.style.background='';
		    bt2.style.fontFamily="";
			bt2.style.fontSize=""; 
			bt2.style.fontWeight="";

		    bt3.style.background='';
		    bt3.style.fontFamily="";
			bt3.style.fontSize=""; 
			bt3.style.fontWeight="";

			bt4.style.background='';
			bt4.style.fontFamily="";
			bt4.style.fontSize=""; 
			bt4.style.fontWeight="";

			bt6.style.background='';
		    bt6.style.fontFamily="";
			bt6.style.fontSize=""; 
			bt6.style.fontWeight="";

			var acceuil=document.getElementById('Acceuil'),
			boite=document.getElementById('boite'),
			affichersvdc=document.getElementById('affichersvdc'),
			revenir=document.getElementById('revenir'),
			ficheimprimer=document.getElementById('ficheimprimer');
			acceuil.style.display='block';
		    boite.style.display='none';
		    affichersvdc.style.display='none';
		    if(ficheimprimer || revenir)
		    {
		    	revenir.remove();
		    	ficheimprimer.remove();
		    }	
		}); 

		bt6.addEventListener('click',function ()  //deconnxion
		{
		  
			  	bt6.style.background='#FF8800';
				bt6.style.fontFamily="'theboldfont',arial,sans-serif";
				bt6.style.fontSize="0.8em"; 
				bt6.style.fontWeight="bold";

			    bt1.style.background='';
			    bt1.style.fontFamily="";
				bt1.style.fontSize=""; 
				bt1.style.fontWeight="";

			    bt2.style.background='';
			    bt2.style.fontFamily="";
				bt2.style.fontSize=""; 
				bt2.style.fontWeight="";

				bt3.style.background='';
			    bt3.style.fontFamily="";
				bt3.style.fontSize=""; 
				bt3.style.fontWeight="";

			    bt4.style.background='';
			    bt4.style.fontFamily="";
				bt4.style.fontSize=""; 
				bt4.style.fontWeight="";

				bt5.style.background='';
				bt5.style.fontFamily="";
				bt5.style.fontSize=""; 
				bt5.style.fontWeight="";
             var searchBackgroundDiv=document.getElementById("backgroundDiv2");
			 if(!searchBackgroundDiv)
			 {
				var backgroundDiv2=document.createElement('div');
	    		backgroundDiv2.id='backgroundDiv2';
	    		var inputMonth=document.createElement("input");
	    		var h1Search=document.createElement("h1");
	    		var Rechercher=document.createElement("button");
	    		var Annuler=document.createElement("button");
	    		var pAdd=document.createElement('p');
	    		pAdd.id="padd";
	    		pAdd.innerHTML='<span style="color:orange; font-weight:bold; font-size:1.5em;">Note : </span>Si aucune fiche n\'est trouvée les champs ne seront pas rempli !';
	    		Rechercher.innerHTML="Rechercher";
	    		Annuler.innerHTML="Annuler"
	    		Rechercher.id="rechercher";
	    		Annuler.id="annuler";
	    		h1Search.id="h1Search";
	    		h1Search.innerHTML="Choisisser le mois et l\'année";
	    		inputMonth.id="inputMonth";
	    		inputMonth.type="month";

	    		backgroundDiv2.appendChild(inputMonth);
	    		backgroundDiv2.appendChild(h1Search);
	    		backgroundDiv2.appendChild(Rechercher);
	    		backgroundDiv2.appendChild(Annuler);
	    		backgroundDiv2.appendChild(pAdd);

	    		 backgroundDiv2.addEventListener('click',function (e) {
	    		 	if(e.target.id!="inputMonth" && e.target.id!="rechercher")
	    		 	backgroundDiv2.remove();
	    		 });

	    		 Annuler.addEventListener('click',function () {
	    		 	backgroundDiv2.remove();
	    		 });

	    		 Rechercher.addEventListener('click',function () {
	    		 	 if(inputMonth.value)
	    		 	 {
	    		 	 	var allTr=document.getElementsByTagName('tr');
	    		 	 	var allTrLength=allTr.length;
	    		 	 	var tousLesInput=document.querySelectorAll('input[type="number"]');
	    		 		for(var i=0;i<tousLesInput.length;i++) tousLesInput[i].value=''; 
	    		 	 	for(var i=0;i<allTrLength;i++)
	    		 	 	{
	    		 		 			  
	    		 	 		if( allTr[i].id.charAt(0)=='n')
	    		 	 		{	
	    		 	 			if(allTr[i].id!="nginf") allTr[i].firstElementChild.nextElementSibling.innerHTML="";	
	    		 	 			allTr[i].firstElementChild.nextElementSibling.nextElementSibling.innerHTML="";
	    		 	 			
	    		 	 		}
	    		 	 		else if (allTr[i].id.charAt(0)=='p') 
	    		 	 		{
	    		 	 			if(allTr[i].id!="pginf") 
	    		 	 			{
	    		 	 				allTr[i].firstElementChild.nextElementSibling.nextElementSibling.innerHTML="";
	    		 	 				if(allTr[i].id!="pmsinf")
	    		 	 				allTr[i].firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML="";
	    		 	 			}

	    		 	 			allTr[i].firstElementChild.nextElementSibling.nextElementSibling.nextElementSibling.innerHTML="";
	    		 	 			
	    		 	 		}
	    		 	 	}
	    		 	 	 
	    		 	 	const monthNames = ["JANVIER", "FEVRIER", "MARS", "AVRIL", "MAY", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE"];
	    		 	 	var data=inputMonth.value.split('-');
	    		 		recup_taux_cause_ecart (data[1],data[0]);

	    		 		var rempliredate=document.getElementById('rempliredate');
	    		 		var today = new Date();
						var dd = today.getDate();
						var yyyy = today.getFullYear();

						var yearNum=document.getElementsByClassName('yearNum');
   						if(data[1]>=today.getMonth()+1 && data[0]>=yyyy)  rempliredate.innerHTML=dd+' '+monthNames[today.getMonth()]+' '+yyyy;
     					 else rempliredate.innerHTML='30 '+monthNames[data[1]-1]+' '+data[0];

     					for(var i=0;i<yearNum.length;i++)
     					{
     						yearNum[i].innerHTML=data[0];
     					}
     							
     					 backgroundDiv2.remove();
     					 bt5.click();
	    		 	 } 
	    		 	 else alert('Aucune date n\'a été selectionnée');	 
	    		 });
 				
	    		document.body.appendChild(backgroundDiv2);
	    	 }
		}); 
	}

      


display_menu();

})();

</script>
</body>
</html>
