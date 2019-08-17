<?php
session_start();
      if(!isset($_SESSION['submited'])  || $_SESSION['profile']!='Directeur')
        {
          header("location:../login.php");
        }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Indicateurs</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="../stats.png" />
</head>
<body>
<div id="taux" style="width: 600px;height:400px;"></div>
<header>

		<div id="main_menu">
			<nav id="nav1">			
				<ul>
					<li class="btnmenu" id="acceuil"><a href="#">Acceuil<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="21px" height="21px" viewBox="0 0 460.298 460.297" style="enable-background:new 0 0 460.298 460.297;" xml:space="preserve">

			<g>
				<path d="M230.149,120.939L65.986,256.274c0,0.191-0.048,0.472-0.144,0.855c-0.094,0.38-0.144,0.656-0.144,0.852v137.041    c0,4.948,1.809,9.236,5.426,12.847c3.616,3.613,7.898,5.431,12.847,5.431h109.63V303.664h73.097v109.64h109.629    c4.948,0,9.236-1.814,12.847-5.435c3.617-3.607,5.432-7.898,5.432-12.847V257.981c0-0.76-0.104-1.334-0.288-1.707L230.149,120.939    z" fill="#1bccb4"/>
				<path d="M457.122,225.438L394.6,173.476V56.989c0-2.663-0.856-4.853-2.574-6.567c-1.704-1.712-3.894-2.568-6.563-2.568h-54.816    c-2.666,0-4.855,0.856-6.57,2.568c-1.711,1.714-2.566,3.905-2.566,6.567v55.673l-69.662-58.245    c-6.084-4.949-13.318-7.423-21.694-7.423c-8.375,0-15.608,2.474-21.698,7.423L3.172,225.438c-1.903,1.52-2.946,3.566-3.14,6.136    c-0.193,2.568,0.472,4.811,1.997,6.713l17.701,21.128c1.525,1.712,3.521,2.759,5.996,3.142c2.285,0.192,4.57-0.476,6.855-1.998    L230.149,95.817l197.57,164.741c1.526,1.328,3.521,1.991,5.996,1.991h0.858c2.471-0.376,4.463-1.43,5.996-3.138l17.703-21.125    c1.522-1.906,2.189-4.145,1.991-6.716C460.068,229.007,459.021,226.961,457.122,225.438z" fill="#1bccb4"/>
			</g>

			</svg></a></li>
					<li class="btnmenu" id="myaccount" ><a href="#">Mon compte<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 488 488" style="enable-background:new 0 0 488 488;" xml:space="preserve" width="21px" height="21px">

			<g>
				<path d="M453.5,389.6C396,342.3,333.9,311,321.3,304.8c-1.4-0.7-2.3-2.1-2.3-3.7v-89.6c11.3-7.5,18.7-20.3,18.7-34.9V83.7    C337.7,37.5,300.2,0,254,0h-10h-10c-46.2,0-83.7,37.5-83.7,83.7v92.9c0,14.5,7.4,27.3,18.7,34.9V301c0,1.6-0.9,3-2.3,3.7    c-12.6,6.2-74.7,37.5-132.2,84.8c-10.4,8.5-16.4,21.3-16.4,34.8V488h196.2l19.4-88.8c-39.2-54.6,2.9-57.3,10.3-57.3l0,0l0,0    c7.3,0.1,49.4,2.7,10.3,57.3l19.4,88.8h196.2v-63.7C469.9,410.9,463.9,398.1,453.5,389.6z" fill="#1bccb4"/>
			</g>
			</svg></a></li>
					<li id="show_indicateurs" ><a href="#" class="btnmenu" id="Indicateurs">Indicateurs<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 487.343 487.343" style="enable-background:new 0 0 487.343 487.343;" xml:space="preserve" width="21px" height="21px">

			<g>
				<path d="M51.725,354.622c-3.7,3.7-8.1,6.7-12.8,8.7v25.5v42.2c0,10.1,8.2,18.2,18.2,18.2h41c10.1,0,18.2-8.2,18.2-18.2v-42.2    v-53.8v-42.2c0-0.9-0.1-1.8-0.2-2.6L51.725,354.622z" fill="#1bccb4"/>
				<path d="M476.325,90.722c-0.4,0-0.8,0-1.3,0c-27.6,1.3-55.3,2.6-82.9,3.9c-4.3,0.2-8.5,0.4-10.9,5.6c-2.4,5.1,0.3,8,3.3,11    c8.5,8.5,16.9,17.1,25.5,25.4l-9.4,9.4l-76.5,76.5l-6.8,6.8l-16.7,16.7l-65.8,65.8l-3.8-3.8l-78.7-78.7l-16.7-16.7l-4.5-4.5    c-3.6-3.6-8.2-5.3-12.9-5.3s-9.3,1.8-12.9,5.3l-4.5,4.5l-95.5,95.5c-7.1,7.1-7.1,18.7,0,25.8l4.5,4.5c3.6,3.6,8.2,5.3,12.9,5.3    s9.3-1.8,12.9-5.3l82.6-82.6l3.8,3.8l78.7,78.7l16.7,16.7l4.5,4.5c3.6,3.6,8.2,5.3,12.9,5.3s9.3-1.8,12.9-5.3l4.5-4.5l78.7-78.7    l16.7-16.7l6.8-6.8l76.5-76.5l9.3-9.3l25,24.8c2.3,2.3,4.6,4.8,7.9,4.8c1.2,0,2.6-0.4,4.1-1.2c5-2.7,6.1-7.1,6.3-12    c1.2-27,2.5-53.9,3.8-80.9C487.625,94.422,484.225,90.722,476.325,90.722z" fill="#1bccb4"/>
				<path d="M190.025,207.222c7.9,3.8,16.3,5.8,24.8,7.1c6.7,1.1,6.9,1.4,7,8.3c0,3.2,0.1,6.3,0.1,9.5c0,4,2,6.3,6,6.4    c4.7,0.1,9.3,0.1,14,0c3.8-0.1,5.8-2.2,5.8-6c0-4.3,0.2-8.6,0-13s1.7-6.6,5.9-7.8c9.7-2.7,18-7.9,24.4-15.6    c17.7-21.5,10.9-53-14.2-66.9c-7.9-4.4-16.2-7.7-24.5-11.1c-4.8-2-9.4-4.3-13.4-7.6c-8-6.4-6.5-16.7,2.9-20.8    c2.6-1.1,5.4-1.5,8.3-1.7c10.8-0.6,21.1,1.4,31,6.1c4.9,2.4,6.5,1.6,8.2-3.5c1.7-5.4,3.2-10.8,4.8-16.3c1.1-3.6-0.2-6.1-3.7-7.6    c-6.3-2.8-12.8-4.8-19.5-5.8c-8.9-1.4-8.9-1.4-8.9-10.3c-0.1-12.6-0.1-12.6-12.6-12.6c-1.8,0-3.7,0-5.5,0c-5.9,0.2-6.9,1.2-7,7.1    c-0.1,2.7,0,5.3,0,8c0,7.9-0.1,7.8-7.6,10.5c-18.2,6.6-29.5,19-30.7,38.9c-1.1,17.6,8.1,29.5,22.5,38.1    c8.9,5.3,18.8,8.5,28.2,12.6c3.7,1.6,7.2,3.5,10.3,6c9.1,7.5,7.4,20-3.4,24.7c-5.8,2.5-11.8,3.1-18.1,2.4    c-9.6-1.2-18.9-3.7-27.6-8.3c-5.1-2.7-6.6-2-8.3,3.6c-1.5,4.8-2.8,9.6-4.1,14.4C183.225,202.622,183.825,204.222,190.025,207.222z    " fill="#1bccb4"/>
				<path d="M201.025,371.422l-16.7-16.7l-36-36c-1.6,2.7-2.5,5.9-2.5,9.2v7.2v88.8v7.2c0,10.1,8.2,18.2,18.2,18.2h41    c10.1,0,18.2-8.2,18.2-18.2v-7.2v-37.5c-6.6-1.9-12.7-5.5-17.7-10.5L201.025,371.422z" fill="#1bccb4"/>
				<path d="M268.525,371.422l-4.5,4.5c-3.3,3.3-7.1,6-11.3,8v40v7.2c0,10.1,8.2,18.2,18.2,18.2h41c10.1,0,18.2-8.2,18.2-18.2v-7.2    v-88.8v-7.2c0-5-2-9.5-5.3-12.8L268.525,371.422z" fill="#1bccb4"/>
				<path d="M370.725,269.122l-6.8,6.8l-4.4,4.4v12.5v8.6v33.6v8.6v45.1v42.2c0,10.1,8.2,18.2,18.2,18.2h41c10.1,0,18.2-8.2,18.2-18.2    v-42.2v-45v-8.6v-33.6v-8.6v-45.2v-42.2c0-0.8-0.1-1.6-0.2-2.4L370.725,269.122z" fill="#1bccb4"/>
			</g>
		</svg></a>		
						
					</li>
					<li class="btnmenu" id="administrationBtn"><a href="http://localhost/projet/administration.php">Administration<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="21px" height="21px" viewBox="0 0 33.375 33.375" style="enable-background:new 0 0 33.375 33.375;" xml:space="preserve">
			<g>
				<path d="M27.96,1.375h-0.682V1c0-0.552-0.447-1-1-1c-0.552,0-1,0.448-1,1v0.375h-1.837V1c0-0.552-0.448-1-1-1s-1,0.448-1,1v0.375    h-1.837V1c0-0.552-0.447-1-1-1c-0.552,0-1,0.448-1,1v0.375h-1.837V1c0-0.552-0.448-1-1-1c-0.552,0-1,0.448-1,1v0.375h-1.837V1    c0-0.552-0.448-1-1-1c-0.552,0-1,0.448-1,1v0.375H8.094V1c0-0.552-0.448-1-1-1c-0.552,0-1,0.448-1,1v0.375H5.412    c-2.605,0-4.725,2.12-4.725,4.726v22.547c0,2.605,2.12,4.727,4.727,4.727H27.96c2.606,0,4.728-2.12,4.728-4.727V6.101    C32.687,3.495,30.567,1.375,27.96,1.375z M25.78,1c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v6.482c0,0.276-0.224,0.5-0.5,0.5    s-0.5-0.224-0.5-0.5V1z M21.943,1c0-0.276,0.225-0.5,0.5-0.5c0.276,0,0.5,0.224,0.5,0.5v6.482c0,0.276-0.224,0.5-0.5,0.5    c-0.275,0-0.5-0.224-0.5-0.5V1z M18.106,1c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v6.482c0,0.276-0.224,0.5-0.5,0.5    s-0.5-0.224-0.5-0.5V1z M14.269,1c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v6.482c0,0.276-0.224,0.5-0.5,0.5    s-0.5-0.224-0.5-0.5V1z M10.432,1c0-0.276,0.224-0.5,0.5-0.5s0.5,0.224,0.5,0.5v6.482c0,0.276-0.224,0.5-0.5,0.5    s-0.5-0.224-0.5-0.5V1z M6.595,1c0-0.276,0.224-0.5,0.5-0.5c0.276,0,0.5,0.224,0.5,0.5v6.482c0,0.276-0.224,0.5-0.5,0.5    c-0.276,0-0.5-0.224-0.5-0.5V1z M30.279,28.648c0,1.277-1.04,2.317-2.318,2.317H5.414c-1.278,0-2.318-1.04-2.318-2.317V6.101    c0-1.278,1.04-2.318,2.318-2.318h0.682v2.513c-0.339,0.286-0.56,0.709-0.56,1.187c0,0.86,0.699,1.56,1.56,1.56    c0.861,0,1.56-0.699,1.56-1.56c0-0.478-0.221-0.9-0.56-1.187V3.783h1.837v2.513c-0.339,0.286-0.56,0.709-0.56,1.187    c0,0.86,0.699,1.56,1.56,1.56c0.861,0,1.56-0.699,1.56-1.56c0-0.478-0.221-0.9-0.56-1.187V3.783h1.837v2.513    c-0.339,0.286-0.56,0.709-0.56,1.187c0,0.86,0.699,1.56,1.56,1.56s1.56-0.699,1.56-1.56c0-0.478-0.221-0.9-0.56-1.187V3.783h1.837    v2.513c-0.339,0.286-0.56,0.709-0.56,1.187c0,0.86,0.699,1.56,1.56,1.56s1.561-0.699,1.561-1.56c0-0.478-0.222-0.9-0.561-1.187    V3.783h1.837v2.513c-0.339,0.286-0.56,0.709-0.56,1.187c0,0.86,0.699,1.56,1.56,1.56c0.861,0,1.56-0.699,1.56-1.56    c0-0.478-0.221-0.9-0.56-1.187V3.783h1.837v2.513c-0.339,0.286-0.56,0.709-0.56,1.187c0,0.86,0.698,1.56,1.56,1.56    s1.561-0.699,1.561-1.56c0-0.478-0.221-0.9-0.561-1.187V3.783h0.682c1.277,0,2.317,1.04,2.317,2.318L30.279,28.648L30.279,28.648z    " fill="#1bccb4"/>
				<rect x="11.322" y="13.089" width="4.596" height="4.089" fill="#1bccb4"/>
				<rect x="17.458" y="13.089" width="4.595" height="4.089" fill="#1bccb4"/>
				<rect x="23.591" y="13.089" width="4.596" height="4.089" fill="#1bccb4"/>
				<rect x="5.187" y="18.547" width="4.596" height="4.086" fill="#1bccb4"/>
				<rect x="11.322" y="18.547" width="4.596" height="4.086" fill="#1bccb4"/>
				<rect x="17.458" y="18.547" width="4.595" height="4.086" fill="#1bccb4"/>
				<rect x="23.591" y="18.547" width="4.596" height="4.086" fill="#1bccb4"/>
				<rect x="5.187" y="24.003" width="4.596" height="4.086" fill="#1bccb4"/>
				<rect x="11.322" y="24.003" width="4.596" height="4.086" fill="#1bccb4"/>
				<rect x="17.458" y="24.003" width="4.595" height="4.086" fill="#1bccb4"/>
			</g>
		</svg></a></li>
					<li class="btnmenu" id="fdsBtn"><a href="http://localhost/projet/branche/branche.php">Fiches de suivi<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 470 470" style="enable-background:new 0 0 470 470;" xml:space="preserve" width="21px" height="21px">
		<g>
			<path d="M360.828,384.339c1.705-1.374,2.798-3.478,2.798-5.839c0-0.066,0-341,0-341c0-4.143-3.357-7.5-7.5-7.5H139.141   C133.79,12.647,117.605,0,98.52,0C79.742,0,63.311,12.514,57.906,30H33.874c-4.143,0-7.5,3.357-7.5,7.5v425   c0,4.143,3.357,7.5,7.5,7.5h238.187c2.425,0,4.527-1.092,5.902-2.794L360.828,384.339z M279.626,444.328V386h58.327   L279.626,444.328z M98.52,15c10.663,0,19.922,6.105,24.482,15H74.036C78.64,21.052,88.011,15,98.52,15z M41.374,45h84.646v52.5   c0,6.893-5.607,12.5-12.5,12.5s-12.5-5.607-12.5-12.5v-30c0-4.143-3.357-7.5-7.5-7.5s-7.5,3.357-7.5,7.5v30   c0,15.163,12.337,27.5,27.5,27.5s27.5-12.337,27.5-27.5V45h207.606v326h-76.5c-4.143,0-7.5,3.357-7.5,7.5V455H41.374V45z" fill="#1bccb4"/>
			<path d="M296.126,345.5c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5H93.874c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5   H296.126z" fill="#1bccb4"/>
			<path d="M93.874,300.5h202.252c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5H93.874c-4.143,0-7.5,3.357-7.5,7.5   S89.731,300.5,93.874,300.5z" fill="#1bccb4"/>
			<path d="M93.874,255.5h202.252c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5H93.874c-4.143,0-7.5,3.357-7.5,7.5   S89.731,255.5,93.874,255.5z" fill="#1bccb4"/>
			<path d="M93.874,210.5h202.252c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5H93.874c-4.143,0-7.5,3.357-7.5,7.5   S89.731,210.5,93.874,210.5z" fill="#1bccb4"/>
			<path d="M93.874,165.5h202.252c4.143,0,7.5-3.357,7.5-7.5s-3.357-7.5-7.5-7.5H93.874c-4.143,0-7.5,3.357-7.5,7.5   S89.731,165.5,93.874,165.5z" fill="#1bccb4"/>
			<path d="M396.126,30h-10c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h2.5v410h-80.072c-4.143,0-7.5,3.357-7.5,7.5   s3.357,7.5,7.5,7.5h87.572c4.143,0,7.5-3.357,7.5-7.5v-425C403.626,33.357,400.269,30,396.126,30z" fill="#1bccb4"/>
			<path d="M436.126,30h-10c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5h2.5v410h-2.5c-4.143,0-7.5,3.357-7.5,7.5s3.357,7.5,7.5,7.5   h10c4.143,0,7.5-3.357,7.5-7.5v-425C443.626,33.357,440.269,30,436.126,30z" fill="#1bccb4"/>
		</g></svg></a></li>
				</ul>

				<h2>NAFTAL GPL</h2>	
			</nav>
			<img src="shuttdown1.png" alt="disconnect" title="se déconnecter">

		</div>


		<div ><div id="animateme1">&nbsp;</div><h1 id="animateme">Acceuil</h1><div id="animateme2">&nbsp;</div></div>
</header>

		<!***************************************************HEADER END ********************************************************>


<div id="moncompte">
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 96.154 96.154" style="enable-background:new 0 0 96.154 96.154;" xml:space="preserve">
		<g>
			<path d="M95.594,75.183L49.642,17.578c-0.76-0.951-2.367-0.951-3.127,0L0.559,75.187c-0.546,0.689-0.708,1.717-0.414,2.61   c0.061,0.187,0.13,0.33,0.187,0.437c0.349,0.649,1.025,1.056,1.763,1.056h91.967c0.737,0,1.414-0.405,1.763-1.056   c0.06-0.109,0.126-0.254,0.184-0.427C96.305,76.903,96.143,75.874,95.594,75.183z" fill="#202427"/>
		</g>
		</svg>
	    <div id="forms">
			    <div id="nameform">
			    	<form>
						<input type="text" name="username1" id="username1" placeholder="Nouveau nom de compte" autocomplete="off" required="" onpaste="return false;">
						<input type="text" name="username2" id="username2" placeholder="Confirmer nom de compte" autocomplete="off" required="" onpaste="return false;">
						<input type="submit" name="submite1" value="valider">


						<div id="information1Form1"><h3>Minimum 6 caractéres<br>Maximum 24 caractéres</h3>

							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 124.512 124.512" style="enable-background:new 0 0 124.512 124.512;" xml:space="preserve">
								<g>
									<path id="path1" d="M113.956,57.006l-97.4-56.2c-4-2.3-9,0.6-9,5.2v112.5c0,4.6,5,7.5,9,5.2l97.4-56.2   C117.956,65.105,117.956,59.306,113.956,57.006z" fill="red"/>
								</g>
							</svg>

						</div> 



						<div id="information2Form1"><h3>le nom doit etre le meme</h3>

							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 124.512 124.512" style="enable-background:new 0 0 124.512 124.512;" xml:space="preserve">
								<g>
									<path id="path2" d="M113.956,57.006l-97.4-56.2c-4-2.3-9,0.6-9,5.2v112.5c0,4.6,5,7.5,9,5.2l97.4-56.2   C117.956,65.105,117.956,59.306,113.956,57.006z" fill="#f50000"/>
								</g>
							</svg>

						</div>	

						<!****>


					</form>
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="58px" height="58px" viewBox="0 0 535.5 535.5" style="enable-background:new 0 0 535.5 535.5;" xml:space="preserve">

							<g id="person-location">
								<path d="M446.25,0h-357c-28.05,0-51,22.95-51,51v357c0,28.05,22.95,51,51,51h102l76.5,76.5l76.5-76.5h102c28.05,0,51-22.95,51-51    V51C497.25,22.95,474.3,0,446.25,0z M267.75,84.15c38.25,0,68.85,30.6,68.85,68.85s-30.6,68.85-68.85,68.85    S198.9,191.25,198.9,153S229.5,84.15,267.75,84.15z M420.75,357h-306v-22.95c0-51,102-79.05,153-79.05s153,28.05,153,79.05V357z" fill="#1bccb4"/>
							</g>
					</svg>
		</div>
				
				<div id="passform">

					<form>
						<input type="password" id="pass1" name="password1" placeholder="mot de passe actuel" autocomplete="off" required="" onpaste="return false;">
						<input type="password" id="pass2" name="password2" placeholder="Nouveau mot de passe" autocomplete="off" required="" onpaste="return false;">
						<input type="password" id="pass3" name="password3" placeholder="Confirmer mot de passe" autocomplete="off" required="" onpaste="return false;">
						<input type="submit" name="submite2" value="valider">


						<div id="information1Form2"><h3>Incorrect !</h3>

							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 124.512 124.512" style="enable-background:new 0 0 124.512 124.512;" xml:space="preserve">
								<g>
									<path id="path3" d="M113.956,57.006l-97.4-56.2c-4-2.3-9,0.6-9,5.2v112.5c0,4.6,5,7.5,9,5.2l97.4-56.2   C117.956,65.105,117.956,59.306,113.956,57.006z" fill="red"/>
								</g>
							</svg>

						</div> 



						<div id="information2Form2"><h3>Minimum 8 caractéres<br>Maximum 24 caractéres</h3>

							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 124.512 124.512" style="enable-background:new 0 0 124.512 124.512;" xml:space="preserve">
								<g>
									<path id="path4" d="M113.956,57.006l-97.4-56.2c-4-2.3-9,0.6-9,5.2v112.5c0,4.6,5,7.5,9,5.2l97.4-56.2   C117.956,65.105,117.956,59.306,113.956,57.006z" fill="#f50000"/>
								</g>
							</svg>

						</div>	

						<div id="information3Form2"><h3>le mot de passe<br>doit etre le meme</h3>

							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="18px" height="18px" viewBox="0 0 124.512 124.512" style="enable-background:new 0 0 124.512 124.512;" xml:space="preserve">
								<g>
									<path id="path5" d="M113.956,57.006l-97.4-56.2c-4-2.3-9,0.6-9,5.2v112.5c0,4.6,5,7.5,9,5.2l97.4-56.2   C117.956,65.105,117.956,59.306,113.956,57.006z" fill="#f50000"/>
								</g>
							</svg>

						</div>	
					</form>			 
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  x="0px" y="0px" width="64px" height="64px" viewBox="0 0 492.069 492.069" style="enable-background:new 0 0 492.069 492.069;" xml:space="preserve">

						<g>
							<path d="M268.656,144.27c0-62.697-50.998-113.699-113.698-113.699C92.253,30.571,41.26,81.573,41.26,144.27v57.25     C15.735,229.147,0,265.962,0,306.537v125.508c0,16.266,13.189,29.454,29.472,29.454h250.987     c16.266,0,29.454-13.188,29.454-29.454v-125.5c0-40.583-15.735-77.407-41.256-105.034L268.656,144.27L268.656,144.27z      M176.852,317.049v35.949c0,12.095-9.805,21.898-21.894,21.898c-12.094,0-21.898-9.805-21.898-21.898v-35.949     c-8.916-6.691-14.765-17.252-14.765-29.256c0-20.242,16.413-36.649,36.664-36.649s36.664,16.407,36.664,36.649     C191.621,299.797,185.767,310.356,176.852,317.049z M219.127,165.625c-19.573-8.934-41.26-14.038-64.169-14.038     c-22.913,0-44.596,5.104-64.168,14.038V144.27c0-35.384,28.775-64.169,64.168-64.169c35.389,0,64.169,28.785,64.169,64.169     V165.625L219.127,165.625z" fill="#1bccb4"/>
							<path d="M409.326,86.457c-45.691,0-82.741,37.045-82.741,82.754c0,32.483,18.877,60.298,46.109,73.847v137.433     c0,28.134,22.812,50.948,50.947,50.948c12.317,0,22.314-9.979,22.314-22.298V243.058c27.214-13.544,46.113-41.363,46.113-73.847     C492.071,123.502,455.018,86.457,409.326,86.457z M409.326,154.496c-10.738,0-19.443-8.705-19.443-19.434     c0-10.729,8.705-19.438,19.443-19.438s19.442,8.709,19.442,19.438S420.064,154.496,409.326,154.496z" fill="#1bccb4"/>
						</g>
					</svg>
					<div id="cross1" >
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 27.965 27.965" style="enable-background:new 0 0 27.965 27.965;" xml:space="preserve" width="20px" height="20px">
						<g >
							<path d="M13.98,0C6.259,0,0,6.261,0,13.983c0,7.721,6.259,13.982,13.98,13.982c7.725,0,13.985-6.262,13.985-13.982    C27.965,6.261,21.705,0,13.98,0z M19.992,17.769l-2.227,2.224c0,0-3.523-3.78-3.786-3.78c-0.259,0-3.783,3.78-3.783,3.78    l-2.228-2.224c0,0,3.784-3.472,3.784-3.781c0-0.314-3.784-3.787-3.784-3.787l2.228-2.229c0,0,3.553,3.782,3.783,3.782    c0.232,0,3.786-3.782,3.786-3.782l2.227,2.229c0,0-3.785,3.523-3.785,3.787C16.207,14.239,19.992,17.769,19.992,17.769z" fill="#d90000"/>
						</g>

						</svg>
					</div>
                    
				</div>
		
		</div>
	<div id="showmoncompte">&nbsp;</div>		
</div>

	<!***************************************************mon compte END********************************************************>

<div id="reponsediv"></div> <!reponse lors de changement de pass / user>

<!div id="container" style="width:800px; height:500px; position:absolute; z-index: 1;left: 25%; top: 16%">
<div id="displayIndic">

 		
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="22px" height="22px" viewBox="0 0 96.154 96.154" style="enable-background:new 0 0 96.154 96.154;" xml:space="preserve">
		<g>
			<path d="M95.594,75.183L49.642,17.578c-0.76-0.951-2.367-0.951-3.127,0L0.559,75.187c-0.546,0.689-0.708,1.717-0.414,2.61   c0.061,0.187,0.13,0.33,0.187,0.437c0.349,0.649,1.025,1.056,1.763,1.056h91.967c0.737,0,1.414-0.405,1.763-1.056   c0.06-0.109,0.126-0.254,0.184-0.427C96.305,76.903,96.143,75.874,95.594,75.183z" fill="#202427"/>
		</g>
		</svg>

		<button id="update_database" title="uploader les donnees depuis un fichier .csv contenant la table de donnée extraite depuis modus"><span style="position:relative; top:-7px;">Mise a jour de la base</span></button>
		<button id="leav" title="fermer">X</button>


		<nav id="nav2">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 485.8 485.8" style="enable-background:new 0 0 485.8 485.8;" xml:space="preserve" width="32px" height="32px">

	<g>
		<path d="M346.3,440.6h2.3c-24-3-36.8-12.6-43.6-22.3H180.8c-6.8,9.7-19.6,19.3-43.6,22.3h1.5c-7.5,0-13.5,6.1-13.5,13.5    c0,7.5,6.1,13.5,13.5,13.5h207.6c7.5,0,13.5-6.1,13.5-13.5C359.9,446.6,353.8,440.6,346.3,440.6z" fill="#202427"/>
		<path d="M485.8,307.8V53.5c0-19.5-15.8-35.3-35.3-35.3H35.3C15.8,18.2,0,34,0,53.5V314c0,0.1,0,0.3,0,0.4v47.2c0,0.2,0,0.4,0,0.6    v2.6c0,0.2,0,0.4,0,0.6v0.7l0,0C0.6,382.7,14.3,396,31.1,396h143.3h14.3H297h8.8h148.8c16.8,0,30.4-13.3,31.1-29.9l0,0    L485.8,307.8L485.8,307.8z M271.1,362.1c0,4.3-3.5,7.8-7.8,7.8h-40.9c-4.3,0-7.8-3.5-7.8-7.8v-5.4c0-4.3,3.5-7.8,7.8-7.8h40.9    c4.3,0,7.8,3.5,7.8,7.8V362.1z M450.5,320.2H35.3c-3.4,0-6.2-2.8-6.2-6.2V53.5c0-3.4,2.8-6.2,6.2-6.2h415.1c3.4,0,6.2,2.8,6.2,6.2    V314l0,0C456.6,317.4,453.9,320.2,450.5,320.2z" fill="#202427"/>
		<path d="M344.2,173.3h15.6l0.5-0.5c0-4.8-0.4-9.7-1.1-14.5L344.2,173.3z" fill="#202427"/>
		<path d="M308.4,84.7l-49.5,49.5v15.6l59-59C314.8,88.5,311.6,86.5,308.4,84.7z" fill="#202427"/>
		<path d="M286.4,75.6l-27.5,27.5v15.6l39-39C294.2,78,290.3,76.7,286.4,75.6z" fill="#202427"/>
		<path d="M273.6,72.9c-4.8-0.7-9.6-1.1-14.5-1.1l-0.2,0.2v15.6L273.6,72.9z" fill="#202427"/>
		<path d="M297.6,173.3l49.7-49.7c-1.8-3.2-3.8-6.4-6.1-9.5L282,173.3H297.6z" fill="#202427"/>
		<path d="M334.3,105.4c-1.2-1.3-2.4-2.6-3.7-3.9c-1.3-1.3-2.7-2.6-4.1-3.9l-67.6,67.7v7.9h7.6L334.3,105.4z" fill="#202427"/>
		<path d="M328.7,173.3l27.8-27.8c-1.1-3.9-2.5-7.7-4-11.5l-39.3,39.3H328.7z" fill="#202427"/>
		<path d="M241.2,89.3c-56.2,0-101.8,45.6-101.8,101.8S185,292.9,241.2,292.9S343,247.3,343,191.1H241.2V89.3z" fill="#202427"/>
	</g>
</svg>
			<button id="displaySatisfaction" style="font-size:1em;">Taux de satisfaction par district</button>
			<button id="Evolution_mensuelle_Interactions" style="font-size:1em;">Evolution mensuelle Interactions</button>
			<button id="Evolution_mensuelle_ecart_Interactions" style="font-size:1em;">Evolution mensuelle écart d'Interactions</button>
			<button id="Evolution_mensuelle_Taux_Satisfaction" >Evolution mensuelle du Taux Satisfaction</button>
			<button id="Taux_par_canal_ess">Taux de satisfaction par canal ESS</button>
			<button id="Total_interactions_par_an" style="font-size:1em;">Qualité du sérvice</button>
			<button id="etat_interactions_gpl" style="font-size:1em;">Interaction GPL par état</button>
			<button id="Classement_des_employé_par_nombre_de_cloture" >Classement des employé par nombre de cloture</button>
			<button id="categorie_interactions_gpl" style="font-size:1em;">Interaction GPL par Catégorie</button>
			<button id="Charge_interaction_par_sérvice_concerné">Charge d'interaction par sérvice concerné</button>
			<button id="Taux_de_charge_des_sérvice">Taux de charge des sérvice</button>
			<button id="Taux_de_Résolution_par_sérvice">Taux de Résolution par sérvice</button>
			<button id="Interactions_par_domaine">Interactions par domaine</button>
			<button id="Temp_moyen_de_résolution_des_intéractions">Temp moyen de résolution des intéractions GPL</button>
		</nav>
		<nav id="nav3">
			
		</nav>
		<div id="option">
			
		</div>

		
	
	<div id="tauxDeSatisfaction"> <!<<<<::::::::::::::displaySatisfaction>
 			
    </div>	
	
</div>

<div id="update">
		<button id="back" class="btnn"><span>Annuler</span></button>
		<h2 style="position: fixed; left:46px; text-align: center; margin-top: 50px; padding:20px;border:2px dashed orange; background: black;"><span style="color: orange; font-size: 1.1em; text-decoration: underline;">Notice :&nbsp;</span>vous devez choisir un fichier de type .csv respectant la structure de la base de donné modus !</h2>
		<div id="update_manip"><img  id='delete_all_update' src="delete-file.png" title="suprrimer toute la table incidents"><br>&nbsp;<span id="incidents_row_count"></span><img  id='delete_all_update2' src="delete-file.png" title="suprrimer toute la table interaction"><br>&nbsp;<span id="interactions_row_count"></span></div>
		<form  method="post" action="Directeurserver.php" enctype="multipart/form-data">
			<input id="myfile" type="file" name="myfile" multiple>
			<input type="submit" name="update" value="Confirmer" class="btnn" id="submitupdate">
		</form>
</div>
	
<script src="http://localhost/projet/directeur/echarts/dist/echarts.js"></script>
<script src="http://localhost/projet/directeur/echarts/dist/echarts-liquidfill-master/dist/echarts-liquidfill.js"></script>

<script type="text/javascript">



function disconnect () {

		var disconnect=document.querySelector('img[src="shuttdown1.png" ]');
		disconnect.addEventListener('mouseover',function () {
			disconnect.src="shuttdown2.png";
		});
		disconnect.addEventListener('mouseout',function () {
			disconnect.src="shuttdown1.png";
		});

		disconnect.addEventListener('click',function () {
			window.location.href="http://localhost/projet/login.php"
		});  //boutton de déconnexion               //traitemten de boutton de déconnexion
}

function get_taux_de_satisfaction (date)    //affichage des taux de satisfaction via echarts
{

	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="taux0"></div><div id="taux1"></div><div id="taux2"></div><div id="taux3"></div><div id="taux4"></div><div id="taux5"></div><div id="taux6"></div><div id="taux7"></div>';
		var allTauxDivs=document.querySelectorAll('#tauxDeSatisfaction div');
	    var allTauxDivsLength=allTauxDivs.length;

				moisCourant.innerHTML=monthselect.value;

				for(var i=0;i<allTauxDivsLength;i++) if(echarts.getInstanceByDom(allTauxDivs[i])) echarts.dispose(allTauxDivs[i]);
	

				var taux=[], district=[],observation=[];
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?taux='+true+'&date='+date);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		            
		           if(xhr.readyState===4 && xhr.status===200)
		           {
		                 var data=JSON.parse(xhr.responseText);
		                 
		                 for(var i in data)
		                  {
		                  	if(!isNaN(data[i].taux))
		                  	{
		                  		district.push(data[i].district);
		                    	taux.push(data[i].taux);
		                    	observation.push(data[i].obsérvation);
		                  	}
		                       
		                 }
		                 var nbTaux=taux.length;

		                    var myRedColor=['#D90000','#B30000','#7D0000','#8A0000'];
		                    for(var i=0;i<nbTaux;i++) 
		                    {

		                        if(district[i]=='Bordj bou arreridj') district[i]='Bordj\nbou\narreridj';
		                        if(taux[i]<0.8)
		                        {
		                                echarts.init(document.getElementById('taux'+i)).setOption({               
		                                    series:
		                                    [ 
		                                            {   
		                                                name:district[i],
		                                                type:'liquidFill',
		                                                data:[taux[i],0.4,0.3,0.2],
		                                                color:myRedColor,
		                                                radius:'85%',
		                                                backgroundStyle:{
                                                  				  color:'none'
                                                  			},
		                                                label:{
		                                                        formatter:'{a}\n\n'+(taux[i]*100).toFixed(2)+'%',
		                                                        color:'red',
		                                                        fontSize : '30'      
		                                                },
		                                                outline:{
		                                                    itemStyle: {
		                                                            borderWidth: 5,
		                                                            borderColor: 'red',
		                                                            shadowBlur:20,
		                                                            shadowColor: 'red'

		                                                    }

		                                                 }

		                                           }
		                 
		                                    ],
		                                     tooltip:
		                                     {
		                                          show:true,
		                                          formatter:observation[i],
		                                          textStyle:{
		                                          	color:'red',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)'
		                                     }
		                              
		                                 });
		                            }
		                            else
		                            {
		                                    echarts.init(document.getElementById('taux'+i)).setOption({ 
		                                             
		                                    series:
		                                    [ 
		                                            {   
		                                                name:district[i],
		                                                type:'liquidFill',
		                                                data:[taux[i],0.4,0.3,0.2],
		                                                radius:'85%',
		                                                backgroundStyle:{
                                                  				  color:'none'
                                                  			},
		                                                 label:{
		                                                        formatter:'{a}\n\n'+(taux[i]*100).toFixed(2)+'%',
		                                                        color:'green',
		                                                        fontSize : '30'         
		                                                },
		                                                outline:{
		                                                    itemStyle: {
		                                                            borderWidth: 5,
		                                                            borderColor: 'green',
		                                                            shadowBlur:5,
		                                                            shadowColor: 'green'

		                                                    }

		                                                 }

		                                           }
		                 
		                                    ]
		                              
		                                 });
		                            }

		                    }

		                

		            }
		        }); 
}

function taux_de_satisfaction (click) {	 //traitement de boutton taux de satisfaction et appel a la fonction get_taux_de_satisfaction


	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Taux de satisfaction pour :&nbsp;&nbsp;<span id="moisCourant"></span></h1><label for="monthselect">Filtrer par mois :&nbsp;&nbsp;</label> <input type="month" name="monthselect" id="monthselect">';

	 	var allTauxDivs=document.querySelectorAll('#tauxDeSatisfaction div');
	    var allTauxDivsLength=allTauxDivs.length;

	    var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
        var moisCourant=document.getElementById('moisCourant');
        var monthselect=document.getElementById('monthselect');
	    var displayIndic=document.getElementById('displayIndic');
	    

	    var displaySatisfaction=document.getElementById('displaySatisfaction');

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
	    		//traitement de boutton
				displaySatisfaction.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				displaySatisfaction.style.color='orange';
				displaySatisfaction.style.textShadow='0px 2px 5px black';
				displaySatisfaction.style.width='104%';
				displaySatisfaction.style.boxShadow='8px 8px 3px black';
			    tauxDeSatisfaction.style.display='flex';
			    displayIndic.style.height='1400px'; 
			    displayIndic.style.width='';
			    

			    var date=new Date();
			    month=date.getMonth()+1;
				if(month.toString().length==1) monthselect.value=date.getFullYear()+'-0'+month; 
				else monthselect.value=date.getFullYear()+'-'+month;
				get_taux_de_satisfaction (monthselect.value);

				// affichage des taux
				       
		 		monthselect.addEventListener('change',function () 
		 		{
		 
					get_taux_de_satisfaction (monthselect.value);  
				});

		}
		else   // faire disparaitre les taux et traitement de boutton
		{

				for(var i=0;i<allTauxDivsLength;i++) if(echarts.getInstanceByDom(allTauxDivs[i])) echarts.dispose(allTauxDivs[i]);

				displaySatisfaction.style.textShadow='';
				displaySatisfaction.style.background = '';
				displaySatisfaction.style.color='';
				displaySatisfaction.style.width='';
				displaySatisfaction.style.boxShadow='';


				optionDiv.style.display='';
			    optionDiv.innerHTML='';

				tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}       
}


function initialisation (lastTarget) {		//initialisation de tous

	var clicked=false;
	if(lastTarget)
	{
		lastTarget.style.background='';
		lastTarget.style.borderBottom='';
	}

	// au chargement de la page maitre la couleur de acceil = blanc
		var acceuil=document.getElementById('acceuil');
		acceuil.style.background='white';					
		acceuil.style.borderBottom = '2px solid #1BCCB4';
		lastTarget=acceuil;
	// traitement de boutton disconnect   
	disconnect();	
	//pour maintenir la couleur de boutton clické a blank cette fonction prend lasttarget comme parametre qui est acceuil dans notre cas

											

	var myaccount=document.getElementById('myaccount'); //boutton mon compte
	var moncompte=document.getElementById('moncompte'); //le div qui apparait
	var cross1=document.querySelector('#cross1'); //fleche exit 
	var showmoncompte=document.getElementById('showmoncompte');


	var displayIndic=document.getElementById('displayIndic');

	
														////////*acceuil*///////

			acceuil.addEventListener('click',function () {
				 	if(clicked) clicked=false;
					moncompte.style.display='';
					displayIndic.style.display='';
					acceuil.style.background='white';					
					acceuil.style.borderBottom = '2px solid #1BCCB4';
					if(lastTarget!=acceuil)
					{
						lastTarget.style.background='';					
						lastTarget.style.borderBottom = '';
					}
					
					lastTarget=acceuil;
					//initialisation(lastTarget);
			});											


														////////*myaccount*///////

			myaccount.addEventListener('click', function (e)
			{	
				if(!clicked)
				{
					clicked=true;
					moncompte.style.display='block';
					displayIndic.style.display='';
				    target=e.target;		   
					while(target.id!='myaccount') target=target.parentNode;
					target.style.background='white';
					target.style.borderBottom='2px solid #1BCCB4';	
					lastTarget.style.background='';
					lastTarget.style.borderBottom='';	
					lastTarget=myaccount;	
				}
				else 
				{
					cross1.click();
				}
					
		    });

		    cross1.addEventListener('click',function () {
		    	if(clicked){ clicked=false; acceuil.click(); }
		    	else  moncompte.style.display='';
		    	/*moncompte.style.display='';	
		        myaccount.style.background='';
		        myaccount.style.borderBottom='';
		        acceuil.style.background='white';					
				acceuil.style.borderBottom = '2px solid #1BCCB4';
				lastTarget=acceuil;*/

		    });

		 	myaccount.addEventListener('mouseover',function () {
		 		
		 			moncompte.style.display='block';
		 			showmoncompte.style.display='block';	

		 	});

		 	myaccount.addEventListener('mouseout',function (e) {
		 		if(e.relatedTarget.id!='showmoncompte' && !clicked)
		 		{
		 			moncompte.style.display='';	
		 			showmoncompte.style.display='';
		 		}
		 	});

		 	moncompte.addEventListener('mouseout',function (e) {
		         target=e.relatedTarget;
		         while(target!=moncompte && target.nodeName!='body' && target!=document) target=target.parentNode;
		         if(target!=moncompte && !clicked)
		         {
		         	moncompte.style.display='';	
		         	showmoncompte.style.display='';
		         }
		 	});

		 	show_indicateurs.addEventListener('click',function (e) {
		 		clicked=false;
		 		moncompte.style.display='';
			    target=e.target;		   
				while(target.id!='show_indicateurs') target=target.parentNode;
				target.style.background='white';
				target.style.borderBottom=' 2px solid #1BCCB4';	
				lastTarget.style.background='';
				lastTarget.style.borderBottom='';
				lastTarget=show_indicateurs;

				display_all_indicateurs('on');	
					
		 		
		 	});	
		 	var form1=document.querySelector('#nameform form');	 	

		 	var username1=document.getElementById('username1');
		 	var username2=document.getElementById('username2');	

		 	var information1Form1=document.getElementById('information1Form1');
		 	var information2Form1=document.getElementById('information2Form1');

		 	var	information1=information1Form1.firstElementChild.innerHTML;
		 	var information2=information2Form1.firstElementChild.innerHTML;

            var information1Form1Path=document.querySelector('#path1');
            var information2Form1Path=document.querySelector('#path2');


           
		 	var verfication1=false;
		 	var verfication2=false;

		  /////////traitement information username 1
		 		
		 		username1.addEventListener('keyup',function () {
		 				
		 			if(username1.value.length<6 || username1.value.length>24)
		 			{
		 				
		 				information1Form1.firstElementChild.innerHTML=information1;
		 				information1Form1.style.background='';
		 				information1Form1Path.style.fill='';
                        information1Form1.style.display='block';
		 				username1.style.border='1px solid red';
		 				username1.style.boxShadow='0px 0px 15px 1px red';
		 				verfication1=false;
		 			}
		 			else{

                        var xhr=new XMLHttpRequest();
                        xhr.open('GET','http://localhost/projet/directeur/directeurserver.php?verifusername='+true+'&username1='+encodeURIComponent(username1.value));
                        xhr.send(null);
                        xhr.addEventListener('readystatechange',function () 
                        {
                           if(xhr.readyState===4 && xhr.status===200)
                           {
                           	if(xhr.responseText!=2)
                           	{
                           		timer=setTimeout('if(information1Form1.style.background==\'green\'){information1Form1.style.display=\'\';clearTimeout(timer);}',2000);
                           		information1Form1.style.display='block';
                           		information1Form1.style.background='green';
                           		information1Form1Path.style.fill='green';
				 				information1Form1.firstElementChild.innerHTML=xhr.responseText;
				 				username1.style.border='1px solid green';
				 				username1.style.boxShadow='0px 0px 15px 1px green';
				 				verfication1=true; 
                           	}
                           	else 
                           		{
                           			username1.style.border='1px solid red';
		 							username1.style.boxShadow='0px 0px 15px 1px red';
		 							information1Form1.style.display='block';
		 							information1Form1Path.style.fill='';
		 							information1Form1.style.background='';
                           			information1Form1.firstElementChild.innerHTML='Nom de compte déja pris !';
                           			verfication1=false;
                           		}
                               
                           }
                        })	
		 			}
		 			if(username2.style.borderColor=='green')
		 			{
		 				username2.style.border='1px solid red';
		 				username2.style.boxShadow='0px 0px 15px 1px red';
		 			}	

		 		});
		 		username1.addEventListener('focus',function () {
		 			if(username1.style.borderColor != 'green')
		 			{
			 			if(username1.value.length<6 || username1.value.length>24)
			 			{
			 				
			 				information1Form1.firstElementChild.innerHTML=information1;
			 				information1Form1.style.background='';
			 				information1Form1Path.style.fill='';
	                        information1Form1.style.display='block';
			 				username1.style.border='1px solid red';
			 				username1.style.boxShadow='0px 0px 15px 1px red';
			 				verfication1=false;
			 			}
			 			else{

	                        var xhr=new XMLHttpRequest();
	                        xhr.open('GET','http://localhost/projet/directeur/directeurserver.php?verifusername='+true+'&username1='+encodeURIComponent(username1.value));
	                        xhr.send(null);
	                        xhr.addEventListener('readystatechange',function () {
	                           if(xhr.readyState===4 && xhr.status===200)
	                           {
	                           	if(xhr.responseText!=2)
	                           	{
	                           		timer=setTimeout('if(information1Form1.style.background==\'green\'){information1Form1.style.display=\'\';clearTimeout(timer);}',2000);
	                           		information1Form1.style.display='block';
	                           		information1Form1.style.background='green';
	                           		information1Form1Path.style.fill='green';
					 				information1Form1.firstElementChild.innerHTML=xhr.responseText;
					 				username1.style.border='1px solid green';
					 				username1.style.boxShadow='0px 0px 15px 1px green';
					 				verfication1=true; 
	                           	}
	                           	else 
	                           		{
	                           			username1.style.border='1px solid red';
			 							username1.style.boxShadow='0px 0px 15px 1px red';
			 							information1Form1.style.display='block';
			 							information1Form1Path.style.fill='';
			 							information1Form1.style.background='';
	                           			information1Form1.firstElementChild.innerHTML='Nom de compte déja pris !';
	                           			verfication1=false;
	                           		}
	                               
	                           }
	                        })	
			 			}
			 		}
		 		});

		 		username1.addEventListener('blur',function () {
		 			information1Form1.style.display='';
		 		});

		 /////////traitement information username 2
		  		username2.addEventListener('keyup',function () {
		  			if(username2.value!=username1.value)
		 			{
		 				
		 				information2Form1.firstElementChild.innerHTML=information2;
		 				information2Form1.style.background='';
		 				information2Form1Path.style.fill='';
                        information2Form1.style.display='block';
		 				username2.style.border='1px solid red';
		 				username2.style.boxShadow='0px 0px 15px 1px red';
		 				verfication2=false;
		 			}
		 			else{    
                           		timer=setTimeout('if(information2Form1.style.background==\'green\'){information2Form1.style.display=\'\';clearTimeout(timer);}',2000);
                           		information2Form1.style.display='block';
                           		information2Form1.style.background='green';
                           		information2Form1Path.style.fill='green';
				 				information2Form1.firstElementChild.innerHTML='Correct';
				 				username2.style.border='1px solid green';
				 				username2.style.boxShadow='0px 0px 15px 1px green';
				 				verfication2=true; 
                            
                        }            
		 			
		  		});
		  		username2.addEventListener('focus',function () {
 					if(username2.value!=username1.value )
		 			{
		 				
		 				information2Form1.firstElementChild.innerHTML=information2;
		 				information2Form1.style.background='';
		 				information2Form1Path.style.fill='';
                        information2Form1.style.display='block';
		 				username2.style.border='1px solid red';
		 				username2.style.boxShadow='0px 0px 15px 1px red';
		 				verfication2=false;
		 			}
		 			else{    
                           		timer=setTimeout('if(information2Form1.style.background==\'green\'){information2Form1.style.display=\'\';clearTimeout(timer);}',2000);
                           		information2Form1.style.display='block';
                           		information2Form1.style.background='green';
                           		information2Form1Path.style.fill='green';
				 				information2Form1.firstElementChild.innerHTML='Correct';
				 				username2.style.border='1px solid green';
				 				username2.style.boxShadow='0px 0px 15px 1px green';
				 				verfication2=true; 
                            
                        }            
		 						
		  		});
		 		username2.addEventListener('blur',function () {
		 				information2Form1.style.display='';
		 		});

		 	form1.addEventListener('submit',function (e) {
		 		var verfication=verfication1 && verfication2;
		 		if(verfication)
		 		{
			 		var xhr=new XMLHttpRequest();
			 	    xhr.open('GET','http://localhost/projet/directeur/directeurserver.php?changeusername='+true+'&username1='+encodeURIComponent(username1.value)+'&username2='+encodeURIComponent(username2.value));
	                xhr.send(null);
	                        xhr.addEventListener('readystatechange',function () 
	                        {
	                           if(xhr.readyState===4 && xhr.status===200)
	                           {
		                           	if(xhr.responseText!='2')
		                           	{
		                           			display_success(1,xhr.responseText);
		                           			form1.reset();
		                           			username1.style.border='';
			 								username1.style.boxShadow='';
			 								username2.style.border='';
			 								username2.style.boxShadow='';
		                           	} 
		                           	else
		                           	{
		                           		display_success(2);
		                           	}
	                           }
	                     });
			 	}
			 	else
			 	{
			 		display_success(2);
			 	}
			 		
		 			e.preventDefault();
		 	});	


		//////////FORM2////////////

			var form2=document.querySelector('#passform form');

			var pass1=document.getElementById('pass1');
			var pass2=document.getElementById('pass2');	
			var pass3=document.getElementById('pass3');

		 	var information1Form2=document.getElementById('information1Form2');
		 	var information2Form2=document.getElementById('information2Form2');
		 	var information3Form2=document.getElementById('information3Form2');

		 	var	information12=information1Form2.firstElementChild.innerHTML;
		 	var information22=information2Form2.firstElementChild.innerHTML;
		 	var	information32=information3Form2.firstElementChild.innerHTML;

            var information1Form2Path=document.querySelector('#path3');
           	var information2Form2Path=document.querySelector('#path4');
            var information3Form2Path=document.querySelector('#path5');

            var verification3=false;
            var verification4=false;
            var verification5=false;
 
    /////traitement pass1
 			
 			pass1.addEventListener('keyup',function () {
 				if(pass1.value.length<8 || pass1.value.length>24)
		 			{
		 				
		 				information1Form2.firstElementChild.innerHTML=information12;
		 				information1Form2.style.background='';
		 				information1Form2Path.style.fill='';
                       	information1Form2.style.display='block';
		 				pass1.style.border='1px solid red';
		 				pass1.style.boxShadow='0px 0px 15px 1px red';
		 				verfication3=false;

		 			}
		 			else{

                        var xhr=new XMLHttpRequest();
                        xhr.open('GET','http://localhost/projet/directeur/directeurserver.php?verifpass='+true+'&pass1='+pass1.value);
                        xhr.send(null);
                        xhr.addEventListener('readystatechange',function () 
                        {
                           if(xhr.readyState===4 && xhr.status===200)
                           {

                           	if(xhr.responseText!='2')
                           	{

                           		timer=setTimeout('if(information1Form2.style.background==\'green\'){information1Form2.style.display=\'\';clearTimeout(timer);}',2000);
                           		information1Form2.style.display='block';
                           		information1Form2.style.background='green';
                           		information1Form2Path.style.fill='green';
				 				information1Form2.firstElementChild.innerHTML=xhr.responseText;
				 				pass1.style.border='1px solid green';
				 				pass1.style.boxShadow='0px 0px 15px 1px green';
				 				verfication3=true; 
                           	}
                           	else 
                           	{
                           			pass1.style.border='1px solid red';
		 							pass1.style.boxShadow='0px 0px 15px 1px red';
		 							information1Form2.style.display='block';
		 							information1Form2Path.style.fill='';
		 							information1Form2.style.background='';
                           			information1Form2.firstElementChild.innerHTML=information12;
                           			verfication3=false;
                           	}
                               
                           }
                        })	
		 			}

 			});
 			pass1.addEventListener('focus',function () {
 				if(pass1.value.length<8 || pass1.value.length>24)
		 			{
		 				
		 				information1Form2.firstElementChild.innerHTML=information12;
		 				information1Form2.style.background='';
		 				information1Form2Path.style.fill='';
                       	information1Form2.style.display='block';
		 				pass1.style.border='1px solid red';
		 				pass1.style.boxShadow='0px 0px 15px 1px red';
		 				verfication3=false;

		 			}
		 			else{

                        var xhr=new XMLHttpRequest();
                        xhr.open('GET','http://localhost/projet/directeur/directeurserver.php?verifpass='+true+'&pass1='+pass1.value);
                        xhr.send(null);
                        xhr.addEventListener('readystatechange',function () 
                        {
                           if(xhr.readyState===4 && xhr.status===200)
                           {
                           	
                           	if(xhr.responseText!='2')
                           	{

                           		timer=setTimeout('if(information1Form2.style.background==\'green\'){information1Form2.style.display=\'\';clearTimeout(timer);}',2000);
                           		information1Form2.style.display='block';
                           		information1Form2.style.background='green';
                           		information1Form2Path.style.fill='green';
				 				information1Form2.firstElementChild.innerHTML=xhr.responseText;
				 				pass1.style.border='1px solid green';
				 				pass1.style.boxShadow='0px 0px 15px 1px green';
				 				verfication3=true; 
                           	}
                           	else 
                           	{
                           			pass1.style.border='1px solid red';
		 							pass1.style.boxShadow='0px 0px 15px 1px red';
		 							information1Form2.style.display='block';
		 							information1Form2Path.style.fill='';
		 							information1Form2.style.background='';
                           			information1Form2.firstElementChild.innerHTML=information12;
                           			verfication3=false;
                           	}
                               
                           }
                        })	
		 			}

 			});
 			pass1.addEventListener('blur',function () {
		 			information1Form2.style.display='';
		 		});

    /////traitement pass2
    	pass2.addEventListener('keyup',function () {
 				if(pass2.value.length<8 || pass2.value.length>24)
		 			{
		 				
		 				information2Form2.firstElementChild.innerHTML=information22;
		 				information2Form2.style.background='';
		 				information2Form2Path.style.fill='';
                       	information2Form2.style.display='block';
		 				pass2.style.border='1px solid red';
		 				pass2.style.boxShadow='0px 0px 15px 1px red';
		 				verfication4=false;

		 			}
		 			else{

                           		timer=setTimeout('if(information2Form2.style.background==\'green\'){information2Form2.style.display=\'\';clearTimeout(timer);}',2000);
                           		information2Form2.style.display='block';
                           		information2Form2.style.background='green';
                           		information2Form2Path.style.fill='green';
				 				information2Form2.firstElementChild.innerHTML='<span style="position:absolute; top:10px; left:115px;">Correct</span>';
				 				pass2.style.border='1px solid green';
				 				pass2.style.boxShadow='0px 0px 15px 1px green';
				 				verfication4=true; 
				 	}

				 	if(pass3.style.borderColor=='green')
		 			{
		 				pass3.style.border='1px solid red';
		 				pass3.style.boxShadow='0px 0px 15px 1px red';
		 			}	
           

 			});
 		pass2.addEventListener('focus',function () {
 				if(pass2.value.length<8 || pass2.value.length>24)
		 			{
		 				
		 				information2Form2.firstElementChild.innerHTML=information22;
		 				information2Form2.style.background='';
		 				information2Form2Path.style.fill='';
                       	information2Form2.style.display='block';
		 				pass2.style.border='1px solid red';
		 				pass2.style.boxShadow='0px 0px 15px 1px red';
		 				verfication4=false;

		 			}
		 			else{

                           		timer=setTimeout('if(information2Form2.style.background==\'green\'){information2Form2.style.display=\'\';clearTimeout(timer);}',2000);
                           		information2Form2.style.display='block';
                           		information2Form2.style.background='green';
                           		information2Form2Path.style.fill='green';
				 				information2Form2.firstElementChild.innerHTML='<span style="position:absolute; top:10px; left:115px;">Correct</span>';
				 				pass2.style.border='1px solid green';
				 				pass2.style.boxShadow='0px 0px 15px 1px green';
				 				verfication4=true; 
				 	}


 			});
 			pass2.addEventListener('blur',function () {
		 			information2Form2.style.display='';
		 		});		
	
	/////traitement pass3
		

		pass3.addEventListener('keyup',function () {
		  			if(pass3.value!=pass2.value)
		 			{
		 				
		 				information3Form2.firstElementChild.innerHTML=information32;
		 				information3Form2.style.background='';
		 				information3Form2Path.style.fill='';
                        information3Form2.style.display='block';
		 				pass3.style.border='1px solid red';
		 				pass3.style.boxShadow='0px 0px 15px 1px red';
		 				verfication5=false;
		 			}
		 			else{    
                           		timer=setTimeout('if(information2Form1.style.background==\'green\'){information2Form1.style.display=\'\';clearTimeout(timer);}',2000);
                           		information3Form2.style.display='block';
                           		information3Form2.style.background='green';
                           		information3Form2Path.style.fill='green';
				 				information3Form2.firstElementChild.innerHTML='<span style="position:absolute; top:10px; left:115px;">Correct</span>';
				 				pass3.style.border='1px solid green';
				 				pass3.style.boxShadow='0px 0px 15px 1px green';
				 				verfication5=true; 
                            
                        }            
		 			
		  		});
 		pass3.addEventListener('focus',function () {
		  			if(pass3.value!=pass2.value)
		 			{
		 				
		 				information3Form2.firstElementChild.innerHTML=information32;
		 				information3Form2.style.background='';
		 				information3Form2Path.style.fill='';
                        information3Form2.style.display='block';
		 				pass3.style.border='1px solid red';
		 				pass3.style.boxShadow='0px 0px 15px 1px red';
		 				verfication5=false;
		 			}
		 			else{    
                           		timer=setTimeout('if(information2Form1.style.background==\'green\'){information2Form1.style.display=\'\';clearTimeout(timer);}',2000);
                           		information3Form2.style.display='block';
                           		information3Form2.style.background='green';
                           		information3Form2Path.style.fill='green';
				 				information3Form2.firstElementChild.innerHTML='<span style="position:absolute; top:10px; left:115px;">Correct</span>';
				 				pass3.style.border='1px solid green';
				 				pass3.style.boxShadow='0px 0px 15px 1px green';
				 				verfication5=true; 
                            
                        }            
		 			
		  		});
 			pass3.addEventListener('blur',function () {
		 			information3Form2.style.display='';
		 		});	

	form2.addEventListener('submit',function (e) {
		 		var verfication=verfication3 && verfication4 && verfication5;
		 		if(verfication)
		 		{
			 		var xhr=new XMLHttpRequest();
			 	    xhr.open('GET','http://localhost/projet/directeur/directeurserver.php?changepass='+true+'&pass2='+encodeURIComponent(pass2.value)+'&pass3='+encodeURIComponent(pass3.value)+'&pass1='+encodeURIComponent(pass1.value));
	                xhr.send(null);
	                        xhr.addEventListener('readystatechange',function () 
	                        {
	                           if(xhr.readyState===4 && xhr.status===200)
	                           {
		                           	if(xhr.responseText!='2')
		                           	{
		                           			display_success(3);
		                           			form2.reset();
		                           			pass1.style.border='';
			 								pass1.style.boxShadow='';
			 								pass2.style.border='';
			 								pass2.style.boxShadow='';
			 								pass3.style.border='';
			 								pass3.style.boxShadow=''
		                           	} 
		                           	else
		                           	{
		                           			display_success(2);
		                           	}
	                           }
	                     });
			 	}
			 	else
			 	{
			 		display_success(2);
			 	}
			 		
		 			e.preventDefault();
		 	});	
	
}

function display_success(value,name) {      //msg resultant de changement de mdp / user

	var reponsediv=document.getElementById('reponsediv');
	var timer=setTimeout('reponsediv.style.display=\'\';clearTimeout(timer);',6000);
	reponsediv.style.display='block';

	if(value==1)
	{
		reponsediv.style.background='';
		reponsediv.innerHTML='<span style="position:relative; top:5px;">Votre nouveau nom de compte est désormais:<span style="font-style:italic;font-family:\'coolvetica\',arial,sans-serif; font-size:1.1em letter-spacing:2px;"> '+name+'</span></span>';
		
	}
	else if(value==3)
	{
		reponsediv.style.background='';
		reponsediv.innerHTML='<span style="font-style:italic;font-family:\'coolvetica\',arial,sans-serif; font-size:1.1em letter-spacing:2px;">Votre mot de pass a été changé avec succé !</span>';	
	}
	else if(value==2)
	{
		reponsediv.style.background='red';
		reponsediv.innerHTML='<span style="position:relative; top:5px;">Erreur dans le formulaire ou depuis le serveur !</span>';
	}
	
}

function display_all_indicateurs(option)   //affichage du div des indicateurs
{
 	var displayIndic=document.getElementById('displayIndic');
 	var nav2=document.getElementById('nav2');
 	var nav2Buttons=document.querySelectorAll('#nav2 button');
 	var nav2Svg=document.querySelector('#nav2 svg');
 	nav2.addEventListener('mouseover',function (e) {
 		var target=e.relatedTarget;
 		nav2Svg.style.display='none';
 		try{
 			while(target!=document.body && target!=nav2 && target!=document) target=target.parentNode;
	 		if(target!=nav2)
	 		{

			                for(var i=0;i<nav2Buttons.length;i++)
			                { 
			                	nav2Buttons[i].style.display="block";  /*pour un bon affichange c'est comme transition*/
			                }

	 		}

 		}
 		catch(error)
 		{
 			for(var i=0;i<nav2Buttons.length;i++)
		 	{ 
			   	nav2Buttons[i].style.display="block";  /*pour un bon affichange c'est comme transition*/
			}
 		}

 		
 	});
 	nav2.addEventListener('mouseout',function (e) {
 		/*if(e.clientX )*/
 		var target=e.relatedTarget;
 		nav2Svg.style.display='block';
 		try{
 			while(target!=document.body && target!=nav2 && target!=document) target=target.parentNode;
 			if(target!=nav2)
 			{
 
		           for(var i=0;i<nav2Buttons.length;i++)
		           { 
		              nav2Buttons[i].style.display="none";  /*pour un bon affichange c'est comme transition*/
		           }         	          
 			}

 		}
 		catch(error)
 		{
 			for(var i=0;i<nav2Buttons.length;i++)
		           { 
		              nav2Buttons[i].style.display="none";  /*pour un bon affichange c'est comme transition*/
		           } 
 		}		
 	});
 	traitement_base_de_donnee();
   if(option=='on') displayIndic.style.display='block';
   else displayIndic.style.display='none'; 
}

//traitement form mise ajour de la base de donné

function get_incident_rows_count()
{

	var xhr1=new XMLHttpRequest();
	xhr1.open('GET','http://localhost/projet/directeur/Directeurserver.php?get_incident_rows_count='+true);
	xhr1.send(null);
	xhr1.addEventListener('readystatechange',function () {
		if(xhr1.readyState===4 && xhr1.status===200)
		{
			if(xhr1.responseText!='2')	
			{
			    var incidents='Incidents : <span style="color:orange;">'+xhr1.responseText+'</span>';
			    var incidents_row_count=document.getElementById('incidents_row_count');
				incidents_row_count.innerHTML=incidents;
			}
		}
		
	});
}

function get_interaction_rows_count()
{

	var xhr1=new XMLHttpRequest();
	xhr1.open('GET','http://localhost/projet/directeur/Directeurserver.php?get_interaction_rows_count='+true);
	xhr1.send(null);
	xhr1.addEventListener('readystatechange',function () {
		if(xhr1.readyState===4 && xhr1.status===200)
		{
			if(xhr1.responseText!='2')	
			{
			    var interactions='Interactions : <span style="color:orange;">'+xhr1.responseText+'</span>';
			    var interactions_row_count=document.getElementById('interactions_row_count');
				interactions_row_count.innerHTML=interactions;
			}
		}
		
	});
}

function move_progress_bar(in_file_rows_number,myBar,width,linePointer,update,updateValue)
{
	var result;
	
	if(width<100)
	{
				var xhr3=new XMLHttpRequest();
				xhr3.open('GET','http://localhost/projet/directeur/Directeurserver.php?updateData='+true+'&linePointer='+linePointer);	
				xhr3.send(null);
				xhr3.addEventListener('readystatechange',function () {
						if(xhr3.readyState===4 && xhr3.status===200)
						{
							result=xhr3.responseText; 
							var regex=/Integrity constraint violation/;
							if(regex.test(result))
							{
								var dupId=result.match(/champ \'.*\'/);
								dupId=dupId[0].split(' ');
								dupId=dupId[1];
							update.innerHTML='<div id="chargement" style="color:red; position: fixed;top: 145px;left:50px;letter-spacing:2px;font-size: 1.7em;font-weight:bold;">ERREUR->l\'id : '+dupId+'&nbsp;Contenu dans votre fichier est déja présent dans la base . l\'id sert a identifier chaque ligne il doit etre unique !</div><button id="ok" class="btnn" style="font-size:1em; height:70px; width:200px; margin-left:600px; margin-top:250px; border:2px solid black;font-size: 1.4em;">OK</button>';
									var ok=document.getElementById('ok');
								ok.addEventListener('click',function () {		
									update.innerHTML=updateValue;
									traitement_base_de_donnee ();
								});
							}
							else
							{
								width=Math.round((parseInt(result)/(in_file_rows_number-4))*100); 
								myBar.style.width=width+'%';
								if(width!=100) myBar.style.opacity=(width+20)/100;
								if(width>93) document.getElementById('nbLigne2').style.color='black';
								document.getElementById('mywidth').innerHTML=width;
								document.getElementById('effectuer').innerHTML=result;
								linePointer=linePointer+150;			
								move_progress_bar(in_file_rows_number,myBar,width,linePointer,update,updateValue);
							}
							
						}
				});
	}
	else
	{
		document.getElementById('myBar').style.animationDuration = '0s';
	
					var terminer=document.createElement('ul');
					terminer.id='terminer';
					var array=['T','E','R','M','I','N','é'.toUpperCase()];
					for(var i=0;i<7;i++)
					{
						var myul=document.createElement('li');
						myul.innerHTML=array[i];
						terminer.appendChild(myul);
					}
					update.firstElementChild.replaceWith(terminer);
			update.innerHTML+='<button id="ok7" class="btnn" style="font-size:1.2em; height:40px; position:fixed;top:65%;left:52%;transform: translate(-50%,-50%); border:2px solid black;">Ok</button>';
			var ok7=document.getElementById('ok7');
					 		ok7.addEventListener('click',function () {
					 				update.innerHTML=updateValue;
									traitement_base_de_donnee ();
					 		});

		
	}
}

function traitement_base_de_donnee () 
{
		var in_file_rows_number;
		get_incident_rows_count();
		get_interaction_rows_count();
		var acceuil=document.getElementById('acceuil')
		var displayIndic=document.getElementById('displayIndic');
		var update=document.getElementById('update');
		var updateValue=update.innerHTML;
		var update_database=document.getElementById('update_database');
		var update_form=document.querySelector('#update form');
		var back=document.getElementById('back');
		var leav=document.getElementById('leav');
		var delete_all_update=document.getElementById('delete_all_update');
		var delete_all_update2=document.getElementById('delete_all_update2');
		var h3=document.createElement('h3');
		h3.id='myh3';

		delete_all_update.addEventListener('mouseover',function () {
			delete_all_update.src='delete-file-orange.png';
		});
		delete_all_update.addEventListener('mouseout',function () {
			delete_all_update.src='delete-file.png';
		});

				delete_all_update.addEventListener('click',function () 
				{
					update.innerHTML='<div id="chargement" style="color:red; position: fixed;top: 130px;left:100px;letter-spacing:2px;font-size: 3em;font-weight:bold;">Vous etes sur le point de supprimer tous les données<div style="display:flex; position:relative; left:-200px;"><button id="ok1" class="btnn" style="font-size:1em;width:250px;  height:100px; margin-left:330px; margin-top:50px; border:2px solid black;">Annuler</button><button id="ok2" class="btnn" style="font-size:1em; width:250px; height:100px; margin-left:380px; margin-top:50px; border:2px solid black;">Confirmer</button></div></div>';
					var ok1=document.getElementById('ok1');
					var ok2=document.getElementById('ok2');
					ok1.addEventListener('click',function () {
						update.innerHTML=updateValue;
						traitement_base_de_donnee (); 
					});
					ok2.addEventListener('click',function () {
						var xhr=new XMLHttpRequest();
						xhr.open('GET','http://localhost/projet/directeur/Directeurserver.php?delete_all_update='+true);
						xhr.send(null);
						update.innerHTML='<ul id="chargement"><li>C</li><li>H</li><li>A</li><li>R</li><li>G</li><li>E</li><li>M</li><li>E</li><li>N</li><li>T</li></ul>';

						

						xhr.addEventListener('readystatechange',function () {
							if(xhr.readyState===4 && xhr.status===200)
							{
								if(xhr.responseText=='delete_all_update_done'){

									update.innerHTML='<div id="chargement" style="color:green; position: fixed;top: 130px;left:110px;letter-spacing:4px;font-size: 4.5em;font-weight:bold;">Suppression effectuée avec succé<button id="ok3" class="btnn" style="font-size:1em; height:100px; margin-left:480px; margin-top:50px; border:2px solid black;">OK</button></div>';

									var ok3=document.getElementById('ok3');
									ok3.addEventListener('click',function () {
										update.innerHTML=updateValue;
										traitement_base_de_donnee ();
									});
								}
								
							}
						});
					});

				});

		delete_all_update2.addEventListener('mouseover',function () {
			delete_all_update2.src='delete-file-orange.png';
		});
		delete_all_update2.addEventListener('mouseout',function () {
			delete_all_update2.src='delete-file.png';
		});

				delete_all_update2.addEventListener('click',function () 
				{
					update.innerHTML='<div id="chargement" style="color:red; position: fixed;top: 130px;left:100px;letter-spacing:2px;font-size: 3em;font-weight:bold;">Vous etes sur le point de supprimer tous les données<div style="display:flex; position:relative; left:-200px;"><button id="ok1" class="btnn" style="font-size:1em;width:250px;  height:100px; margin-left:330px; margin-top:50px; border:2px solid black;">Annuler</button><button id="ok2" class="btnn" style="font-size:1em; width:250px; height:100px; margin-left:380px; margin-top:50px; border:2px solid black;">Confirmer</button></div></div>';
					var ok1=document.getElementById('ok1');
					var ok2=document.getElementById('ok2');
					ok1.addEventListener('click',function () {
						update.innerHTML=updateValue;
						traitement_base_de_donnee (); 
					});
					ok2.addEventListener('click',function () {
						var xhr=new XMLHttpRequest();
						xhr.open('GET','http://localhost/projet/directeur/Directeurserver.php?delete_all_update2='+true);
						xhr.send(null);
						update.innerHTML='<ul id="chargement"><li>C</li><li>H</li><li>A</li><li>R</li><li>G</li><li>E</li><li>M</li><li>E</li><li>N</li><li>T</li></ul>';

						

						xhr.addEventListener('readystatechange',function () {
							if(xhr.readyState===4 && xhr.status===200)
							{
								if(xhr.responseText=='delete_all_update_done'){

									update.innerHTML='<div id="chargement" style="color:green; position: fixed;top: 130px;left:110px;letter-spacing:4px;font-size: 4.5em;font-weight:bold;">Suppression effectuée avec succé<button id="ok3" class="btnn" style="font-size:1em; height:100px; margin-left:480px; margin-top:50px; border:2px solid black;">OK</button></div>';

									var ok3=document.getElementById('ok3');
									ok3.addEventListener('click',function () {
										update.innerHTML=updateValue;
										traitement_base_de_donnee ();
									});
								}
								
							}
						});
					});

				});


		update_database.addEventListener('click',function () {
			update.style.display='block';
			if(update.lastElementChild.nodeName.toLowerCase()=='h3') h3.remove();
		});

		back.addEventListener('click',function () {
			update.style.display='none';
			if(update.lastElementChild.nodeName.toLowerCase()=='h3') h3.remove();
		});
		leav.addEventListener('click',function () { /********************************************************************/
			if(update.lastElementChild.nodeName.toLowerCase()=='h3') h3.remove();
			acceuil.click();
		});


		var updateForm=document.querySelector('#update form');
		var myfile=document.getElementById('myfile');

		myfile.addEventListener('change',function () {
			if(update.lastElementChild.nodeName.toLowerCase()=='h3') h3.remove();
			update.appendChild(h3);
			h3.style.left='';
			if(myfile.files[0].name.split('.').pop()!='csv')
			{		
				h3.id='myh3';	
				myfile.value='';	
				h3.innerHTML='Seulement les fichiers .csv sont supportée !&nbsp;<div>X</div>';

			} 
			else
			{
					h3.id='mygreenh3';
					h3.innerHTML='Fichier : '+myfile.files[0].name+'<br>derniere modification du fichier : '+myfile.files[0].lastModifiedDate+'<br>taille : '+((myfile.files[0].size/1024)/1024).toFixed(2)+' MB';
					
			} 
		});


		updateForm.addEventListener('submit',function(e){
		e.preventDefault();
		if(!myfile.files[0]) 
		{
			if(update.lastElementChild.nodeName.toLowerCase()=='h3') h3.remove();	
			update.appendChild(h3);
			h3.id='myh3';
			h3.style.left='38%';
			h3.innerHTML='Vous devez choisir un fichier !&nbsp;<div>X</div>';
		}
		else
		{
			var formData=new FormData(updateForm);
			formData.append('upload',true);
			var xhr=new XMLHttpRequest();
			update.innerHTML='<ul id="chargement"><li>C</li><li>H</li><li>A</li><li>R</li><li>G</li><li>E</li><li>M</li><li>E</li><li>N</li><li>T</li></ul><div id="progression"><div id="myBar1"></div></div>';	
			var myBar1=document.getElementById('myBar1');
			var width=0;

			xhr.upload.addEventListener('progress',function (e) {
				if(width<=100)
				{
					width=Math.round((e.loaded/e.total)*100);
					myBar1.style.width=width+'%';
				}
			});

			xhr.open('post','http://localhost/projet/directeur/Directeurserver.php');
			xhr.send(formData);	
			xhr.addEventListener('readystatechange',function() {
				 if(xhr.readyState===4 && xhr.status===200)
				 {
				 	if(xhr.responseText!='2')
				 	{
				 		in_file_rows_number=parseInt(xhr.responseText);
				 		update.firstElementChild.remove();
				 		update.innerHTML+='<div id="nbLigne">Upload terminé avec succé vous pouvez désormais maitre a jour la base</div><button id="ok4" class="btnn" style="font-size:1.2em; height:40px; position:fixed;top:66%;left:42%;transform: translate(-50%,-50%); border:2px solid black;">Annuler</button><button id="ok5" class="btnn" style="font-size:1.2em; height:40px; position:fixed;top:66%;left:62%;transform: translate(-50%,-50%); border:2px solid black;">Continuer</button>';
				 		var ok4=document.getElementById('ok4');
				 		ok4.addEventListener('click',function () {
				 				update.innerHTML=updateValue;
								traitement_base_de_donnee ();
				 		});
				 		var ok5=document.getElementById('ok5');
				 		ok5.addEventListener('click',function () {
				 			myBar1.remove();
				 			width=0;
				 			update.innerHTML='<ul id="chargement"><li>C</li><li>H</li><li>A</li><li>R</li><li>G</li><li>E</li><li>M</li><li>E</li><li>N</li><li>T</li></ul><div id="progression"><div id="myBar"></div></div><div id="nbLigne2"><span id="mywidth">0</span>%</div><div id="nbrdeLigne"><span id="effectuer" style="color:white;"></span> Lignes ont été insérées</div>';

				 			var myBar=document.getElementById('myBar');
				 			move_progress_bar(in_file_rows_number,myBar,width,4,update,updateValue);
				 		});
				 	}
				 }
			});

		}

		});		 	
}

function hide_last_clicked (click,idLastClicked) {
	
	switch (idLastClicked) {
		case 'displaySatisfaction':
			taux_de_satisfaction(click);
			break;
		case 'Evolution_mensuelle_Interactions':
			month_interaction_evolution (click); 
			break;	
		case 'Evolution_mensuelle_ecart_Interactions':
			month_ecart_interaction_evolution (click); 
			break;
		case 'Evolution_mensuelle_Taux_Satisfaction':
			month_taux_satisfaction_evolution (click); 
			break;
		case 'Taux_par_canal_ess':
			month_taux_ess_canal_evolution(click); 
			break;
		case 'Total_interactions_par_an':
			year_interactions(click); 
			break;
		case 'etat_interactions_gpl':
			 status_of_interactions_gpl(click); 
			break;
		case 'Charge_interaction_par_sérvice_concerné':
			  status_of_Charge_interaction_par_sérvice_concerné(click); 
			break;
		case 'Taux_de_charge_des_sérvice':
			  status_of_Taux_de_charge_des_sérvice(click); 
			break;	
		case 'Taux_de_Résolution_par_sérvice':
			  status_of_Taux_de_Résolution_par_sérvice(click); 
			break;
		case 'Interactions_par_domaine':
			  status_of_Interactions_par_domaine(click); 
			break;
		case 'Temp_moyen_de_résolution_des_intéractions':
			  status_of_Temp_moyen_de_résolution_des_intéractions(click);
			break;
		case 'categorie_interactions_gpl':
			  status_of_categorie_interactions_gpl(click);
			break;
		case 'Classement_des_employé_par_nombre_de_cloture':
			  status_of_Classement_des_employé_par_nombre_de_cloture(click);
			break;
		default:
			alert('erreur idLastClicked not defined !');
			break;
	}
}

function status_of_Classement_des_employé_par_nombre_de_cloture(click)
{
		var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Classement assistant par nombre de cloture</h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
				get_status_of_Classement_des_employé_par_nombre_de_cloture();
	       	 		
	    		//traitement de boutton
	    		Classement_des_employé_par_nombre_de_cloture.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Classement_des_employé_par_nombre_de_cloture.style.color='orange';
				Classement_des_employé_par_nombre_de_cloture.style.textShadow='0px 2px 5px black';
				Classement_des_employé_par_nombre_de_cloture.style.width='104%';
				Classement_des_employé_par_nombre_de_cloture.style.boxShadow='8px 8px 3px black';
	    		
				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Classement_des_employé_par_nombre_de_cloture.style.textShadow='';
				Classement_des_employé_par_nombre_de_cloture.style.background = '';
				Classement_des_employé_par_nombre_de_cloture.style.color='';
				Classement_des_employé_par_nombre_de_cloture.style.width='';
				Classement_des_employé_par_nombre_de_cloture.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}  
}
function get_status_of_Classement_des_employé_par_nombre_de_cloture()
{

	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');

		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?get_status_of_Classement_des_employé_par_nombre_de_cloture='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{
		           		var Clôturé_par=[];
		           		var nbr_cloture=[]
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{
		           			Clôturé_par.push(mydata[i].Clôturé_par); 
		           			nbr_cloture.push(mydata[i].nbr_cloture); 
		           		}
		           		 
		           		 option = {

						    tooltip: {
						        trigger: 'item'
						    },
						
						 
						    xAxis: [
						        {
						            type: 'category',
						            show: false,
						            data: Clôturé_par
						        }
						    ],
						    yAxis: [
						        {
						            type: 'value',
						            show: false
						        }
						    ],
						    series: [
						        {
						            type: 'bar',
						            barGap: 0.1,
						            barCategoryGap: 0.01,
						            itemStyle: {
						                normal: {
						                    color: function(params) {
						                        // build a color map as your need.
						                        var colorList = [
						                          '#C1232B','#B5C334','#FCCE10','#E87C25','#27727B',
						                           '#FE8463','#9BCA63','#FAD860','#F3A43B','#60C0DD',
						                           '#D7504B','#C6E579','#F4E001','#F0805A','#26C0C0'
						                        ];
						                        return colorList[params.dataIndex]
						                    },
						                    label: {
						                        show: true,
						                        position: 'top',
						                        formatter: '{b}\n{c}'
						                    },
						                    shadowBlur: 80,
						                    shadowColor: 'rgba(0, 0, 0, 0.5)'
						                }
						            },
						            data:nbr_cloture
						        }
						    ],
						    dataZoom:[{
                            	type:'inside'
                            }
                            ]
						};
                    
	
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption(option);	           		

		           		
		           	}
		        });
}

function  status_of_categorie_interactions_gpl(click)
{
	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Intéraction GPL par Catégorie</h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
				get_status_of_status_of_categorie_interactions_gpl();
	       	 		
	    		//traitement de boutton
	    		categorie_interactions_gpl.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				categorie_interactions_gpl.style.color='orange';
				categorie_interactions_gpl.style.textShadow='0px 2px 5px black';
				categorie_interactions_gpl.style.width='104%';
				categorie_interactions_gpl.style.boxShadow='8px 8px 3px black';
	    		
				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				categorie_interactions_gpl.style.textShadow='';
				categorie_interactions_gpl.style.background = '';
				categorie_interactions_gpl.style.color='';
				categorie_interactions_gpl.style.width='';
				categorie_interactions_gpl.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		} 

}

function get_status_of_status_of_categorie_interactions_gpl()
{
	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');

		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?get_status_of_status_of_categorie_interactions_gpl='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{
		           		var Catégorie=[];
		           		var result=[]
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{
		           			Catégorie.push(mydata[i].Catégorie); 
		           			result.push(mydata[i].result); 
		           		}
		           		 var lightBlue = {
						    type: 'linear',
						    x: 0,
						    y: 0,
						    x2: 1,
						    y2: 1,
						    colorStops: [{
						        offset: 0,
						        color: '#9D00FF' 
						    }, {
						        offset: 1,
						        color: 'black' 
						    }]};
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           		
                            xAxis:{
                                type:'category',
                                //nameGap:35,
                                //boundaryGap:false,
                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:45	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                data:Catégorie
                            },
                            yAxis:{
                                type:'value',
                                name:'Nombre d\'interactions',
                                nameLocation:'center',
                                nameGap:50,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold'
                                },
                                 splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                 axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:-2,
                                		shadowOffsetY:0
                                	}
                                }
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								right:'10%',
       								top:'0%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
                            series:[{
                                data:result,
                                type: 'bar',
                                name: 'Catégorie',
                            
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'orange'
                                },
                                itemStyle:{
                                	color:lightBlue
                                }
                                
                            },
                            {
					            name:'Catégorie',
					            type:'pie',
					            radius: ['30%', '50%'],
					            label: {
					                normal: {
					                    show: false,
					                    position: 'center'
					                },
					                emphasis: {
					                    show: true,
					                    textStyle: {
					                        fontSize: '30',
					                        fontWeight: 'bold'
					                    }
					                }
					            },
					            center:['87%','35%'],
					            labelLine: {
					                normal: {
					                    show: false
					                }
					            },
					            data:[
					                {value:result[0], name:Catégorie[0], itemStyle:{color:'orange'}},
					                {value:result[1], name:Catégorie[1],  itemStyle:{color:'blue'}},
					                {value:result[2], name:Catégorie[2],  itemStyle:{color:'green'}},
					                {value:result[3], name:Catégorie[3],  itemStyle:{color:'red'}},
					            ]
                                
                            }
                            ]
                            ,

                            				tooltip:
		                                     {
		                                          show:true,
		                                          formatter:'{a} : <span style="color:orange;">{b}</span><br>Nombre d\'interactions : <span style="color:orange;">{c}</span>',
		                                          textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)'
		                                     }

                         });  
		           		
		           	}
		        });

} 

function status_of_Temp_moyen_de_résolution_des_intéractions(click)
{
	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Temp moyen pour la résolution d\'intéraction</h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
				get_status_of_Temp_moyen_de_résolution_des_intéractions();
	       	 		
	    		//traitement de boutton
	    		Temp_moyen_de_résolution_des_intéractions.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Temp_moyen_de_résolution_des_intéractions.style.color='orange';
				Temp_moyen_de_résolution_des_intéractions.style.textShadow='0px 2px 5px black';
				Temp_moyen_de_résolution_des_intéractions.style.width='104%';
				Temp_moyen_de_résolution_des_intéractions.style.boxShadow='8px 8px 3px black';
	    		
				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Temp_moyen_de_résolution_des_intéractions.style.textShadow='';
				Temp_moyen_de_résolution_des_intéractions.style.background = '';
				Temp_moyen_de_résolution_des_intéractions.style.color='';
				Temp_moyen_de_résolution_des_intéractions.style.width='';
				Temp_moyen_de_résolution_des_intéractions.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		} 

}

function get_status_of_Temp_moyen_de_résolution_des_intéractions()
{
 	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
		
		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?get_status_of_Temp_moyen_de_résolution_des_intéractions='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{	     	

		           		var tempResult=parseInt(xhr.responseText);
		           		option = {
						    tooltip : {
						        formatter: "{b} : <span style='color:orange; font-weight:bold;'>{c} Jours en moyenne pour la résolution d'une intéraction </span>"
						    },
						    itemStyle:{
						    	shadowBlur:10,
						    	shadowColor:'orange'
						    },
						    series: [
						        {
						            type: 'gauge',
						            detail: {formatter:'{value} Jours'},
						            data: [{value: tempResult, name: 'Temps moyen nécessaire'}]
						        }
						    ]
						};
						echarts.init(evolution_interaction_graphe).setOption(option);
		           		
		           	}
		        }); 

}
function status_of_Interactions_par_domaine(click)
{
	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Modélisation des Intéractions par domaine</h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
				get_status_of_Interactions_par_domaine();
	       	 		
	    		//traitement de boutton
	    		Interactions_par_domaine.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Interactions_par_domaine.style.color='orange';
				Interactions_par_domaine.style.textShadow='0px 2px 5px black';
				Interactions_par_domaine.style.width='104%';
				Interactions_par_domaine.style.boxShadow='8px 8px 3px black';
	    		
				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Interactions_par_domaine.style.textShadow='';
				Interactions_par_domaine.style.background = '';
				Interactions_par_domaine.style.color='';
				Interactions_par_domaine.style.width='';
				Interactions_par_domaine.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		} 

}

function get_status_of_Interactions_par_domaine()
{
	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
	
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?get_status_of_Interactions_par_domaine='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{   		
		           		var domaine=[];
		           		var nombreResult=[];
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{	           			
		           			 domaine.push(mydata[i].Domaine); 
		           			 nombreResult.push(parseInt(mydata[i].nbr));
		           		}
		           		var som=0;
		           		for(var i in  nombreResult) som=som+nombreResult[i];

		           	 /*var appusage_data = [{
								    name: "app4",
								    value: 34
								}, {
								    name: "app11",
								    value: 46
								}, {
								    name: "app8",
								    value: 53
								}, {
								    name: "app3",
								    value: 68
								}, {
								    name: "app16",
								    value: 79
								}];*/
								var option = {
								   
								        "top": "4%",
								        "left": "2.2%",
								         "legend": {
							    		show:true,
									        "icon": "circle",
									        "x": "center",
									        "y": "3%",
									        "textStyle": {
									            "color": "#fff"
									        }
									    },
								    "tooltip": {
								        show:true,
								        formatter:"{b} <br>{a} : {c}"
								    },
								    "grid": {
								        "left": "8%",
								        "right": "10%",
								        "bottom": "12%",
								        "containLabel": true
								    },
								    "yAxis": [{
								        "type": "category",
								        "data": domaine,
								        "axisLine": {
								            "show": false
								        },
								        "axisTick": {
								            "show": false,
								            "alignWithLabel": true
								        },
								        "axisLabel": {
								            "textStyle": {
								                "color": "#ffb069"
								            }
								        }
								    }],
								    "xAxis": [{
								        "type": "value",
								        "axisLine": {
								            "show": false
								        },
								        "axisTick": {
								            "show": false
								        },
								        "axisLabel": {
								            "show": false
								        },
								        "splitLine": {
								            "show": false
								        }
								    }],

								    "series": [{
								        "name": "Nombre d\'intéraction ",
								        "type": "bar",
								        "data": nombreResult,
								        "barCategoryGap": "35%",
								        "label": {
								            "normal": {
								                "show": true,
								                "position": "right",   
								                "textStyle": {
								                    "color": "#bcbfff" //color of value
								                }
								            }
								        },
								        "itemStyle": {
								            "normal": {
								                "color": new echarts.graphic.LinearGradient(0, 0, 1, 0, [{
								                    "offset": 0,
								                    "color": "#ffb069" 
								                }, {
								                    "offset": 1,
								                    "color": "#ec2e85" 
								                }], false)
								            }
								        }
								    }
								   ,
								   {
								   	 type: 'pie',    
							            radius : '35%',    
							            center: ['87%', '33%'],
							            data:[
							            {name:domaine[0] ,value: ((nombreResult[0]/som)*100).toFixed(2)},
							            {name:domaine[1] ,value: ((nombreResult[1]/som)*100).toFixed(2)},
							            {name:domaine[2] ,value: ((nombreResult[2]/som)*100).toFixed(2)},
							            {name:domaine[3] ,value: ((nombreResult[3]/som)*100).toFixed(2)},
							            {name:domaine[4] ,value: ((nombreResult[4]/som)*100).toFixed(2)},
							            {name:domaine[5] ,value: ((nombreResult[5]/som)*100).toFixed(2)},
							            {name:domaine[6] ,value: ((nombreResult[6]/som)*100).toFixed(2)},
							            {name:domaine[7] ,value: ((nombreResult[7]/som)*100).toFixed(2)},
							            {name:domaine[8] ,value: ((nombreResult[8]/som)*100).toFixed(2)},
							            {name:domaine[9] ,value: ((nombreResult[9]/som)*100).toFixed(2)},
							            {name:domaine[10] ,value: ((nombreResult[10]/som)*100).toFixed(2)}
							            ],
							            tooltip:
							            {
							            	formatter:"{b} : {c} %"
							            },
							            itemStyle: {  
							                emphasis: {  
							                    shadowBlur: 10,  
							                    shadowOffsetX: 0, 
							                    shadowColor: 'rgba(0, 0, 0, 0.5)' 
							                }
							            }
								   }
								    ]
								};
								echarts.init( evolution_interaction_graphe).setOption(option);
		           		
		           	}
		        }); 

}

function status_of_Taux_de_Résolution_par_sérvice(click){

	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Etude comparative des Taux de Résolution d\'interaction par sérvice concerné</h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
				get_status_of_Taux_de_Résolution_par_sérvice();
	       	 		
	    		//traitement de boutton
	    		Taux_de_Résolution_par_sérvice.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Taux_de_Résolution_par_sérvice.style.color='orange';
				Taux_de_Résolution_par_sérvice.style.textShadow='0px 2px 5px black';
				Taux_de_Résolution_par_sérvice.style.width='104%';
				Taux_de_Résolution_par_sérvice.style.boxShadow='8px 8px 3px black';
	    		
				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Taux_de_Résolution_par_sérvice.style.textShadow='';
				Taux_de_Résolution_par_sérvice.style.background = '';
				Taux_de_Résolution_par_sérvice.style.color='';
				Taux_de_Résolution_par_sérvice.style.width='';
				Taux_de_Résolution_par_sérvice.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}  
}

function get_status_of_Taux_de_Résolution_par_sérvice()
{
 	
 	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
	
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?get_status_of_Taux_de_Résolution_par_sérvice='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{   		
		           		var service_concerné=[];
		           		var tauxResolution=[];
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{	           			
		           			 service_concerné.push(mydata[i].Service_concerné); 
		           			 tauxResolution.push(parseFloat(mydata[i].taux_resolution*100).toFixed(2));
		           		}

		           	var	color1={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#DC2424' // color at 0% position
							    }, {
							        offset: 1, color: '#4A569D' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
					var	color2={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#1CD8D2' // color at 0% position
							    }, {
							        offset: 1, color: '#93EDC7' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color3={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#134E5E' // color at 0% position
							    }, {
							        offset: 1, color: '#71B280' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
								
						var color4={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#4776E6' // color at 0% position
							    }, {
							        offset: 1, color: '#8E54E9' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color5={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#1F1C2C' // color at 0% position
							    }, {
							        offset: 1, color: '#928DAB' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color6={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: 'red' // color at 0% position
							    }, {
							        offset: 1, color: 'blue' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color7={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#FF8008' // color at 0% position
							    }, {
							        offset: 1, color: '#FFC837' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};	
						
						var color8={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#EB3349' // color at 0% position
							    }, {
							        offset: 1, color: '#F45C43' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color9={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#1FA2FF' // color at 0% position
							    }, {
							        offset: 1, color: '#A6FFCB' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color10={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#1D2B64' // color at 0% position
							    }, {
							        offset: 1, color: '#F8CDDA' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
							
						var color11= {
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#AA076B' // color at 0% position
							    }, {
							        offset: 1, color: '#61045F' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color12={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: 'red' // color at 0% position
							    }, {
							        offset: 1, color: 'blue' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color13={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#003973' // color at 0% position
							    }, {
							        offset: 1, color: '#E5E5BE' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color14={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#3CA55C' // color at 0% position
							    }, {
							        offset: 1, color: '#B5AC49' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color15={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#603813' // color at 0% position
							    }, {
							        offset: 1, color: '#b29f94' // color at 100% position
							    }],
							    globalCoord: false // false by default
					};
						
							           		var myColor=[color1,color2,color3,color4,color5,color6,color7,color8,color9,color10,color11,color12,color13,color14,color15];
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           		
                            xAxis:{
                                type:'value',
                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:0	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                }
                            },
                            yAxis:{
                                type:'category',
                                name:'Sérvice concérné',
                                nameLocation:'end',
                                nameGap:15,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold',
                                	color:'orange'
                                },

                                axisTick: {
				                    show: false
				                },
				                axisLine: {
				                    show: false
				                },

                                data:service_concerné
                            },
                            grid:{
                            	left:'15%',
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								right:'10%',
       								top:'0%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
                            series:[{
                                data:tauxResolution,
                                type: 'bar',
                                name: 'Service concerné',
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'orange'
                                },
                                itemStyle:{
                                	color:function(params) {
		                                var num=myColor.length;
		                                return myColor[params.dataIndex%num]
		                            },
                                }                               
                            }],
                            dataZoom:[{
                            	type:'inside'
                            }
                            ],

                            				tooltip:
		                                     {
		                                          show:true,
		                                          formatter:'{a} : <span style="color:orange;">{b}</span><br>Taux de résolution : <span style="color:orange;">{c}</span>',
		                                          textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)',
		                                          trigger: 'axis',
											        axisPointer: {
											            type: 'shadow'
											        }
		                                     }

                         });  
		           		
		           	}
		        }); 

}

function status_of_Taux_de_charge_des_sérvice(click)
{
	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Etude comparative des Taux Charge d\'interaction par sérvice concerné</h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
				get_status_of_Taux_de_charge_des_sérvice();
	       	 		
	    		//traitement de boutton
	    		Taux_de_charge_des_sérvice.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Taux_de_charge_des_sérvice.style.color='orange';
				Taux_de_charge_des_sérvice.style.textShadow='0px 2px 5px black';
				Taux_de_charge_des_sérvice.style.width='104%';
				Taux_de_charge_des_sérvice.style.boxShadow='8px 8px 3px black';
	    		
				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Taux_de_charge_des_sérvice.style.textShadow='';
				Taux_de_charge_des_sérvice.style.background = '';
				Taux_de_charge_des_sérvice.style.color='';
				Taux_de_charge_des_sérvice.style.width='';
				Taux_de_charge_des_sérvice.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}  

}

function get_status_of_Taux_de_charge_des_sérvice()
{
	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?get_status_of_Taux_de_charge_des_sérvice='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{	
		           		var Service_concerné=[];
		           		var tauxsResult=[];
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{	
		           			  Service_concerné.push(mydata[i].Service_concerné);
		           			  tauxsResult.push((parseFloat(mydata[i].taux)*100).toFixed(2));
		           		}
		           		
		           		option = {
							    toolbox: {
							        show: true,
							        right:20,
							        bottom:'2.5%',
							        feature: {
							            mark: {
							                show: true,
							            },
							            dataView: {
							                show: true,
							                readOnly: false,
							                title:'Voir les données'
							            },
							            magicType: {
							                show: true,
							                type: ['pie', 'funnel']
							            },
							            restore: {
							                show: true,
							                title:'Actualisé'
							            },
							            saveAsImage: {
							                show: true,
							                title:'Télecharger'
							            },
							        }
							    },
							    tooltip: {
							        "trigger": "item",
							        "formatter": "<span style='color:#1BCCB4;'>{b}</span> : {c} %",
							        backgroundColor:'rgba(0,0,0,0.9)',
							       textStyle:{
							       	color:'orange',
							       	fontWeight:'bold'
							       }
							    },
							   
							    "legend": {
							    	show:true,
							        "icon": "circle",
							        "x": "center",
							        "y": "3%",
							        "textStyle": {
							            "color": "#fff"
							        }
							    },
							    
							    "series": [{
							        "name": "Sérvice",
							        "type": "pie",
							        "radius": [
							            50,
							            160
							        ],
							        "avoidLabelOverlap": false,
							        "startAngle": 0,
							        "center": [
							            "50.1%",
							            "57%"
							        ],
							        "roseType": "area",
							        "selectedMode": "single",
							        "label": {
							            "normal": {
							                "show": true,
							                "formatter": "{b}: {c} %"
							            },
							            "emphasis": {
							                "show": true
							            }
							        },
							        itemStyle:{
							        	shadowColor:'orange',
							        	shadowBlur:5,

							        },
							        "labelLine": {
							            "normal": {
							                "show": true,
							                "smooth": false,
							                "length": 20,
							                "length2": 10
							            },
							            "emphasis": {
							                "show": true
							            }
							        },
							        "data": [{
							                "value": tauxsResult[0],
							                "name": Service_concerné[0],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#f845f1"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[1],
							                "name": Service_concerné[1],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#ad46f3"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[2],
							                "name": Service_concerné[2],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#5045f6"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[3],
							                "name": Service_concerné[3],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#4777f5"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[4],
							                "name": Service_concerné[4],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#44aff0"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[5],
							                "name": Service_concerné[5],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#45dbf7"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[6],
							                "name":Service_concerné[6],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#f6d54a"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[7],
							                "name": Service_concerné[7],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#f69846"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[8],
							                "name": Service_concerné[8],
							                "itemStyle": {
							                    "normal": {
							                        "color": "#ff4343"
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[9],
							                "name": Service_concerné[9],
							                "itemStyle": {
							                    "normal": {
							                        "label": {
							                            "show": false
							                        },
							                        "labelLine": {
							                            "show": false
							                        }
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[10],
							                "name": Service_concerné[10],
							                "itemStyle": {
							                    "normal": {
							                        "label": {
							                            "show": false
							                        },
							                        "labelLine": {
							                            "show": false
							                        }
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[11],
							                "name": Service_concerné[11],
							                "itemStyle": {
							                    "normal": {
							                        "label": {
							                            "show": false
							                        },
							                        "labelLine": {
							                            "show": false
							                        }
							                    }
							                }
							            },
							            {
							                "value":tauxsResult[12],
							                "name":Service_concerné[12],
							                "itemStyle": {
							                    "normal": {
							                        "label": {
							                            "show": false
							                        },
							                        "labelLine": {
							                            "show": false
							                        }
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[13],
							                "name": Service_concerné[13],
							                "itemStyle": {
							                    "normal": {
							                        "label": {
							                            "show": false
							                        },
							                        "labelLine": {
							                            "show": false
							                        }
							                    }
							                }
							            },
							            {
							                "value":tauxsResult[14],
							                "name": Service_concerné[14],
							                "itemStyle": {
							                    "normal": {
							                        "label": {
							                            "show": false
							                        },
							                        "labelLine": {
							                            "show": false
							                        }
							                    }
							                }
							            },
							            {
							                "value": tauxsResult[15],
							                "name": Service_concerné[15],
							                "itemStyle": {
							                    "normal": {
							                        "label": {
							                            "show": false
							                        },
							                        "labelLine": {
							                            "show": false
							                        }
							                    }
							                }
							            }
							        ]
							    }]
							};
	echarts.init(evolution_interaction_graphe).setOption(option);
			           		
			           	}
			        }); 

}

function status_of_Charge_interaction_par_sérvice_concerné(click)
{
	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Charge d\'interaction par sérvice concerné</h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		

				get_status_of_Charge_interaction_par_sérvice_concerné();
	       	 		
	    		//traitement de boutton
	    		Charge_interaction_par_sérvice_concerné.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Charge_interaction_par_sérvice_concerné.style.color='orange';
				Charge_interaction_par_sérvice_concerné.style.textShadow='0px 2px 5px black';
				Charge_interaction_par_sérvice_concerné.style.width='104%';
				Charge_interaction_par_sérvice_concerné.style.boxShadow='8px 8px 3px black';
	    		
				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Charge_interaction_par_sérvice_concerné.style.textShadow='';
				Charge_interaction_par_sérvice_concerné.style.background = '';
				Charge_interaction_par_sérvice_concerné.style.color='';
				Charge_interaction_par_sérvice_concerné.style.width='';
				Charge_interaction_par_sérvice_concerné.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}  

}
function get_status_of_Charge_interaction_par_sérvice_concerné()
{
		document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
	
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?Charge_interaction_par_sérvice_concerné='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{   		
		           		var service_concerné=[];
		           		var nbr_interactions=[];
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{	           			
		           			 service_concerné.push(mydata[i].Service_concerné); 
		           			 nbr_interactions.push(mydata[i].nbr_interactions);
		           		}

		           	var	color1={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#DC2424' // color at 0% position
							    }, {
							        offset: 1, color: '#4A569D' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
					var	color2={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#1CD8D2' // color at 0% position
							    }, {
							        offset: 1, color: '#93EDC7' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color3={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#134E5E' // color at 0% position
							    }, {
							        offset: 1, color: '#71B280' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
								
						var color4={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#4776E6' // color at 0% position
							    }, {
							        offset: 1, color: '#8E54E9' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color5={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#1F1C2C' // color at 0% position
							    }, {
							        offset: 1, color: '#928DAB' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color6={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: 'red' // color at 0% position
							    }, {
							        offset: 1, color: 'blue' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color7={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#FF8008' // color at 0% position
							    }, {
							        offset: 1, color: '#FFC837' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};	
						
						var color8={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#EB3349' // color at 0% position
							    }, {
							        offset: 1, color: '#F45C43' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color9={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#1FA2FF' // color at 0% position
							    }, {
							        offset: 1, color: '#A6FFCB' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color10={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#1D2B64' // color at 0% position
							    }, {
							        offset: 1, color: '#F8CDDA' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
							
						var color11= {
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#AA076B' // color at 0% position
							    }, {
							        offset: 1, color: '#61045F' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color12={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: 'red' // color at 0% position
							    }, {
							        offset: 1, color: 'blue' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color13={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#003973' // color at 0% position
							    }, {
							        offset: 1, color: '#E5E5BE' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color14={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#3CA55C' // color at 0% position
							    }, {
							        offset: 1, color: '#B5AC49' // color at 100% position
							    }],
							    globalCoord: false // false by default
						};
						
						var color15={
							    type: 'linear',
							    x: 0,
							    y: 0,
							    x2: 1,
							    y2: 1,
							    colorStops: [{
							        offset: 0, color: '#603813' // color at 0% position
							    }, {
							        offset: 1, color: '#b29f94' // color at 100% position
							    }],
							    globalCoord: false // false by default
					};
						
							           		var myColor=[color1,color2,color3,color4,color5,color6,color7,color8,color9,color10,color11,color12,color13,color14,color15];
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           		
                            xAxis:{
                                type:'value',
                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:0	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                }
                            },
                            yAxis:{
                                type:'category',
                                name:'Sérvice concérné',
                                nameLocation:'end',
                                nameGap:15,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold',
                                	color:'orange'
                                },

                                axisTick: {
                    show: false
                },
                axisLine: {
                    show: false
                },

                                data:service_concerné
                            },
                            grid:{
                            	left:'15%',
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								right:'10%',
       								top:'0%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
                            series:[{
                                data:nbr_interactions,
                                type: 'bar',
                                name: 'Service concerné',
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'orange'
                                },
                                itemStyle:{
                                	color:function(params) {
		                                var num=myColor.length;
		                                return myColor[params.dataIndex%num]
		                            },
                                }                               
                            }],
                            dataZoom:[{
                            	type:'inside'
                            }
                            ],

                            				tooltip:
		                                     {
		                                          show:true,
		                                          formatter:'{a} : <span style="color:orange;">{b}</span><br>Nombre d\'interactions : <span style="color:orange;">{c}</span>',
		                                          textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)',
		                                          trigger: 'axis',
											        axisPointer: {
											            type: 'shadow'
											        }
		                                     }

                         });  
		           		
		           	}
		        }); 

}

function status_of_interactions_gpl(click)
{
	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Etat courant d\'interactions GPL</h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		

				get_status_of_interactions_gpl ();
	       	 		
	    		//traitement de boutton
	    		etat_interactions_gpl.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				etat_interactions_gpl.style.color='orange';
				etat_interactions_gpl.style.textShadow='0px 2px 5px black';
				etat_interactions_gpl.style.width='104%';
				etat_interactions_gpl.style.boxShadow='8px 8px 3px black';

				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				etat_interactions_gpl.style.background = '';
				etat_interactions_gpl.style.color='';
				etat_interactions_gpl.style.textShadow='';
				etat_interactions_gpl.style.width='';
				etat_interactions_gpl.style.boxShadow='';


				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}       
}

function get_status_of_interactions_gpl ()
{
	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
	var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?get_status_of_interactions_gpl='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{
		           		


		           		var mydata=JSON.parse(xhr.responseText);
		           		var closed=mydata[0].closed;
		           		var open_callback=mydata[0].open_callback;
		           		var open_idle=mydata[0].open_idle;
		           		var open_linked=mydata[0].open_linked;
		           		var total=parseInt(closed) +parseInt(open_callback)+parseInt(open_idle)+parseInt(open_linked);
		           		var tauxclosed=((parseInt(closed)/total)*100).toFixed(2);
		           		var tauxopen_callback=((parseInt(open_callback)/total)*100).toFixed(2);
		           		var tauxopen_idle=((parseInt(open_idle)/total)*100).toFixed(2);
		           		var tauxopen_linked=((parseInt(open_linked)/total)*100).toFixed(2);
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           		
                            xAxis:{
                                type:'category',
                                //nameGap:35,
                                //boundaryGap:false,
                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:0	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                data:['closed','open callback','open idle','open linked']
                            },
                            yAxis:{
                                type:'value',
                                name:'Nombre d\'interactions',
                                nameLocation:'center',
                                nameGap:50,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold'
                                },
                                 splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                 axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:-2,
                                		shadowOffsetY:0
                                	}
                                }
                            },
                             grid:{
                            	top:'17%',
                            	left:'13%'
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								left:'	8%',
       								top:'2%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
                            series:[{
                                data:[closed,open_callback,open_idle,open_linked],
                                type: 'bar',
                                name: 'é'.toUpperCase()+'TAT',
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'orange'
                                },
                                itemStyle:{
                                	color:'orange',
                                }
                                
                            },
                            {
							   
                                data:[{value:tauxclosed, name:'Closed'},{value:tauxopen_callback, name:'open callback'},{value:tauxopen_idle,name:'open idle'},{value:tauxopen_linked,name:'open linked'}],
                                type: 'pie',
                                radius : '30%',
           						center: ['85%', '18%'], 
           						  itemStyle: {
						                normal: {
						                    shadowBlur: 10,
						                    shadowColor: '#05FBFF'
						                }
            						},
                            				tooltip:
		                                     {
		                                          show:true,
		                                          formatter:'ETAT : <span style="color:orange;">{b}</span><br>Nombre d\'interactions : <span style="color:orange;">{c} %</span>',
		                                          textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)'
		                                           
		                                     }

                            }
                            ],
                            dataZoom:[{
                            	type:'inside'
                            }
                            ],

                            				tooltip:
		                                     {
		                                          show:true,
		                                          formatter:'{a} : <span style="color:orange;">{b}</span><br>Nombre d\'interactions : <span style="color:orange;">{c}</span>',
		                                          textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)',
		                                           trigger: 'axis',
											        axisPointer: {
											            type: 'shadow'
											        }
		                                     }

                         });  
		           		
		           	}
		        }); 
}

function year_interactions(click)
{
	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Evolution du service pendant les septs dernieres années </h1>';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
	    		
				get_year_interactions();
		       

	    		//traitement de boutton
	    		Total_interactions_par_an.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Total_interactions_par_an.style.color='orange';
				Total_interactions_par_an.style.textShadow='0px 2px 5px black';
				Total_interactions_par_an.style.width='104%';
				Total_interactions_par_an.style.boxShadow='8px 8px 3px black';
				displayIndic.style.height='730px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Total_interactions_par_an.style.background = '';
				Total_interactions_par_an.style.color='';
				Total_interactions_par_an.style.textShadow='';
				Total_interactions_par_an.style.width='';
				Total_interactions_par_an.style.boxShadow='';


				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		} 
}

function get_year_interactions()
{
		document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');

		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?get_year_interactions='+true);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{
		           		
		           		var yearsResult=[];
		           		var sumResult=[];
		           		var sSumResult=[];
		           		var allS=0,allSS=0;
		           		var pieTaux;
		           		mydata=JSON.parse(xhr.responseText);

		           		for(var i in mydata)
		           		{
		           			 yearsResult.push(mydata[i].Y); 
		           			 sumResult.push(mydata[i].S);	 
		           			 sSumResult.push(mydata[i].SS);
		           			 if(mydata[i].S != null && mydata[i].S!=null)
		           			 {
		           			 	allS=allS+mydata[i].S;
		           			 	allSS=allSS+mydata[i].SS;
		           			 }
		           			     			 
		           		}
		           		pieTaux=allSS/allS;
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           		
                            xAxis:{
                                type:'category',
                                //nameGap:35,
                                //boundaryGap:false,
                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:45	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                data:yearsResult
                            },
                            yAxis:{
                                type:'value',
                                name:'Nombre de demandes',
                                nameLocation:'center',
                                nameGap:50,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold'
                                },
                                 splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                 axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:-2,
                                		shadowOffsetY:0
                                	}
                                }
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								right:'15%',
       								top:'0%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
                            series:[{
                                data:sumResult,
                                type: 'bar',
                                name: 'Nombre de demandes pour l\'année',
                                legendHoverLink:true,	
                                itemStyle:{
                                	color: {
					                    type: 'linear',
					                    x: 0,
					                    y: 0,
					                    x2: 0,
					                    y2: 1,
					                    colorStops: [{
					                        offset: 0,
										    color: '#00d386' 
					                    }, {
					                        offset: 1,
					                        color: '#0076fc' 
					                    }],
					                    globalCoord: false 
					                },
                                }
                                
                            },
                            {
                                data:sSumResult,
                                type: 'bar',
                                name: 'Nombre de demandes SATISFAITES pour l\'année',
                                legendHoverLink:true,	
                                itemStyle:{
                                	color:'green',
                                }
                                
                            },
                            {
                                data:sumResult,
                                type: 'line',
                                symbol: 'circle',
                                symbolSize:20,
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'red'
                                },
                                itemStyle:{
                                	color:'red',
                                }
                                
                            },
                            {
                                data:sSumResult,
                                type: 'line',
                                symbol: 'circle',
                                symbolSize:20,
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'bottom',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'white'
                                },
                                itemStyle:{
                                	color:'green',
                                }
                                
                            },
                            {
                                
                               type: 'pie',
                                radius : '20%',
                                center: ['80%', '30%'],
                               data:[
                               {
                               	value:(pieTaux*100).toFixed(2),
                               	name:'Satisfaction Global (7 ans)',
                               	itemStyle:{
                                	color:'lightgreen',
                                }
                               },
                               {
                               	value:(100-((pieTaux*100).toFixed(2))).toFixed(2),
                               	name:'Non satisfaites',
                               	itemStyle:{
                                	color:'orange',
                                }
                               }], 
                                 roseType: 'radius',
                                 tooltip : {
								       formatter:'{b} : <span style="color:orange;">{c} %</span>'
								    },
                                
                            }
                            ],
                            dataZoom:[{
                            	type:'inside'
                            }
                            ],

                            				tooltip:
		                                     {
		                                          show:true,
		                                          formatter:'{a} : <span style="color:orange;">{b}</span><br>Nombre de demandes : <span style="color:orange;">{c}</span>',
		                                          textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)',

		                                     }

                         });  
		           		
		           	}
		        }); 
}

function month_taux_ess_canal_evolution(click)
{
	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Evolution mensuelle du taux de satisfaction par canal ESS pour :&nbsp;&nbsp;<span id="anneeCourante"></span></h1><label for="monthselect">Filtrer:&nbsp;&nbsp;</label> <input type="month" name="monthselect" id="monthselect">';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
	 var anneeCourante=document.getElementById('anneeCourante');
     var monthselect=document.getElementById('monthselect');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
	    		var date=new Date();
			    month=date.getMonth()+1;
				if(month.toString().length==1) monthselect.value=date.getFullYear()+'-0'+month; 
				else monthselect.value=date.getFullYear()+'-'+month;
				get_month_taux_ess_canal_evolution (monthselect.value+'-01');

				// affichage des taux
				       
		 		monthselect.addEventListener('change',function () 
		 		{
		 
					get_month_taux_ess_canal_evolution (monthselect.value+'-01');  
				});

	    		//traitement de boutton
	    		Taux_par_canal_ess.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Taux_par_canal_ess.style.color='orange';
				Taux_par_canal_ess.style.textShadow='0px 2px 5px black';
				Taux_par_canal_ess.style.width='104%';
				Taux_par_canal_ess.style.boxShadow='8px 8px 3px black';

				displayIndic.style.height='730px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Taux_par_canal_ess.style.background = '';
				Taux_par_canal_ess.style.color='';
				Taux_par_canal_ess.style.textShadow='';
				Taux_par_canal_ess.style.width='';
				Taux_par_canal_ess.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}     
}

function get_month_taux_ess_canal_evolution (date)
{
	document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
		evolution_interaction_graphe.style.top='120px';
		getYearValue=date.split('-');
		anneeCourante.innerHTML=getYearValue[0];
		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?Taux_par_canal_ESS='+true+'&date='+date);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{
		           		var months=['Janvier','Février','Mars','Avril','May','Juin','Juillet','Aout','Séptembre','Octobre','Novembre','Décembre'];
		           		var monthsResult=[];
		           		var Taux_par_canal_ESS=[];
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{
		           			 monthsResult.push(months[mydata[i].X - 1]+' '+getYearValue[0]); 
		           				Taux_par_canal_ESS.push((mydata[i].Y*100).toFixed(2)); 

		           		}
					    var lightBlue = {
						    type: 'linear',
						    x: 0,
						    y: 0,
						    x2: 0,
						    y2: 1,
						    colorStops: [{
						        offset: 0,
						        color: 'rgba(41, 121, 255, 1)' // 0% 处的颜色
						    }, {
						        offset: 1,
						        color: 'rgba(0, 192, 255, 1)' // 100% 处的颜色
						    }],
						    globalCoord: false 
						};
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           		backgroundColor: "#190c12",
                            xAxis:{

                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:45	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                data:monthsResult
                            },
                            yAxis:{
                                type:'value',
                                name:'Taux de satisfaction',
                                nameLocation:'center',
                                nameGap:50,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold'
                                },
                                 splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                 axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:-2,
                                		shadowOffsetY:0
                                	}
                                },
                                min:0,
                                max:100
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								right:'33%',
       								top:'2%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
                            series:[{
                                data:Taux_par_canal_ESS,
                                type: 'bar',
                                name: 'Evolution du Taux de satisfaction par canal ESS',
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'orange',

                                },
                                itemStyle:{
                                	color:lightBlue
                                }  
                            },
                            {
                                data:Taux_par_canal_ESS,
                                type: 'line',
                                name: 'Evolution du Taux de satisfaction par canal ESS',
                                legendHoverLink:true,	
                                
                                itemStyle:{
                                	color:'orange'
                                }  
                            },
                            {
			            type: 'line',
			            itemStyle: {
			                normal: {
			                    show: true,
			                    color:'red',
			                }
			            },
			            lineStyle:{
			            	type:'dashed',
			            	width:5,
			            },
			            zlevel: 2,
			            data:['40','40','40','40','40','40','40','40','40','40','40','40'] 
			        }

					      
                            ],
 
                            				tooltip:
		                                     {
		                                            show:true,
		                                            formatter:'{a} : <span style="color:orange;">{b}</span><br>Taux : <span style="color:orange;">{c} %</span>',
		                                            textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)',

		                                     }

                         });  
		           		
		           	}
		        }); 
}

function month_taux_satisfaction_evolution (click) {

	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Evolution mensuelle Taux de satisfaction pour :&nbsp;&nbsp;<span id="anneeCourante"></span></h1><label for="monthselect">Filtrer:&nbsp;&nbsp;</label> <input type="month" name="monthselect" id="monthselect">';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
	 var anneeCourante=document.getElementById('anneeCourante');
     var monthselect=document.getElementById('monthselect');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
	    		var date=new Date();
			    month=date.getMonth()+1;
				if(month.toString().length==1) monthselect.value=date.getFullYear()+'-0'+month; 
				else monthselect.value=date.getFullYear()+'-'+month;
				get_month_taux_satisfaction_evolution (monthselect.value+'-01');

				// affichage des taux
				       
		 		monthselect.addEventListener('change',function () 
		 		{
		 
					get_month_taux_satisfaction_evolution (monthselect.value+'-01');  
				});

	    		//traitement de boutton
	    		Evolution_mensuelle_Taux_Satisfaction.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Evolution_mensuelle_Taux_Satisfaction.style.color='orange';
				Evolution_mensuelle_Taux_Satisfaction.style.textShadow='0px 2px 5px black';
				Evolution_mensuelle_Taux_Satisfaction.style.width='104%';
				Evolution_mensuelle_Taux_Satisfaction.style.boxShadow='8px 8px 3px black';
				displayIndic.style.width='2000px';
				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Evolution_mensuelle_Taux_Satisfaction.style.background = '';
				Evolution_mensuelle_Taux_Satisfaction.style.color='';
				Evolution_mensuelle_Taux_Satisfaction.style.textShadow='';
				Evolution_mensuelle_Taux_Satisfaction.style.width='';
				Evolution_mensuelle_Taux_Satisfaction.style.boxShadow='';
				displayIndic.style.width='2000px';


				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}       
}

function get_month_taux_satisfaction_evolution (date)
{

		document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
		 evolution_interaction_graphe.style.width='1700px';
		getYearValue=date.split('-');
		anneeCourante.innerHTML=getYearValue[0];
		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?taux_satisfaction_evolution='+true+'&date='+date);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{
		           		var months=['Janvier','Février','Mars','Avril','May','Juin','Juillet','Aout','Séptembre','Octobre','Novembre','Décembre'];
		           		var monthsResult=[];
		           		var resolu_memes_mois=[];
		           		var taux_satisfaction_1=[];
		           		var taux_satisfaction_2=[];
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{
		           			 monthsResult.push(months[mydata[i].X - 1]+' '+getYearValue[0]); 
		           			 resolu_memes_mois.push((mydata[i].Y*100).toFixed(2)); 
		           			 taux_satisfaction_1.push((mydata[i].Z*100).toFixed(2)); 
		           			 taux_satisfaction_2.push((mydata[i].W*100).toFixed(2)); 

		           		}

		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           			grid: {
       							 left: '3%',
       							 right: '4%',
        						 bottom: '10%',
        						 containLabel: true
   							},
		           			 xAxis:[{
                                type:'category',
                                //nameGap:35,
                                //boundaryGap:false,
                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:0	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                data:monthsResult
                            },
                            {
                                type:'category'	
                            }
                            ],
                            yAxis:{
                                type:'value',
                                name:'Taux de satisfaction',
                                nameLocation:'center',
                                nameGap:50,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold'
                                },
                                 splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                 axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:-2,
                                		shadowOffsetY:0
                                	}
                                }
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								right:'33%',
       								top:'2%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
			    series: [{
			            type: 'bar',
			            xAxisIndex: 1,
			            zlevel: 1,
			            itemStyle: {
			                normal: {
			                    color: '#121847',
			                    borderWidth: 0,
			                    shadowBlur: {
			                        shadowColor: 'rgba(255,255,255,0.31)',
			                        shadowBlur: 10,
			                        shadowOffsetX: 0,
			                        shadowOffsetY: 2,
			                    },
			                }
			            },
			            barWidth: '10%',
			            data: [100,100,100,100,100,100,100,100,100,100,100,100]
			        }, {
			            type: 'bar',
			            xAxisIndex: 1,
			            barGap: '100%',
			            data: [100,100,100,100,100,100,100,100,100,100,100,100],
			            zlevel: 1,
			            barWidth: '10%',
			            itemStyle: {
			                normal: {
			                    color: '#121847',
			                    borderWidth: 0,
			                    shadowBlur: {
			                        shadowColor: 'rgba(255,255,255,0.31)',
			                        shadowBlur: 10,
			                        shadowOffsetX: 0,
			                        shadowOffsetY: 2,
			                    },
			                }
			            },
			        }, {
			            type: 'bar',
			            xAxisIndex: 1,
			            barGap: '100%',
			            data: [100,100,100,100,100,100,100,100,100,100,100,100],
			            zlevel: 1,
			            barWidth: '10%',
			            itemStyle: {
			                normal: {
			                    color: '#121847',
			                    borderWidth: 0,
			                    shadowBlur: {
			                        shadowColor: 'rgba(255,255,255,0.31)',
			                        shadowBlur: 10,
			                        shadowOffsetX: 0,
			                        shadowOffsetY: 2,
			                    },
			                }
			            },
			        }, {
			            name: 'Résolue dans le mois d\'ouverture',
			            type: 'bar',
			            itemStyle: {
			                normal: {
			                    show: true,
			                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
			                        offset: 0,
			                        color: '#f7734e'
			                    }, {
			                        offset: 1,
			                        color: '#e12945'
			                    }]),
			                    barBorderRadius: 50,
			                    borderWidth: 0,
			                }
			            },
			            zlevel: 2,
			            barWidth: '10%',
			            data: resolu_memes_mois
			        }, {
			            name: 'Taux de satisfaction scénario 1',
			            type: 'bar',
			            barWidth: '10%',
			            itemStyle: {
			                normal: {
			                    show: true,
			                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
			                        offset: 0,
			                        color: '#96d668'
			                    }, {
			                        offset: 1,
			                        color: '#01babc'
			                    }]),
			                    barBorderRadius: 50,
			                    borderWidth: 0,
			                }
			            },
			            zlevel: 2,
			            barGap: '100%',
			            data: taux_satisfaction_1
			        }, {
			            name: 'Taux de satisfaction scénario 2',
			            type: 'bar',
			            barWidth: '10%',
			            itemStyle: {
			                normal: {
			                    show: true,
			                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
			                        offset: 0,
			                        color: '#1a98f8'
			                    }, {
			                        offset: 1,
			                        color: '#7049f0'
			                    }]),
			                    barBorderRadius: 50,
			                    borderWidth: 0,
			                }
			            },
			            zlevel: 2,
			            barGap: '100%',
			            data: taux_satisfaction_2
			        },
			        {
			            type: 'line',
			            itemStyle: {
			                normal: {
			                    show: true,
			                    color:'red',
			                }
			            },
			            lineStyle:{
			            	type:'dashed'
			            },
			            zlevel: 2,
			            barGap: '100%',
			            data:['80','80','80','80','80','80','80','80','80','80','80','80'] 
			        }

			    ],

			                            				tooltip:
					                                     {
					                                          show:true,
					                                          formatter:'{a} : <span style="color:orange;">{b}</span><br>Taux : <span style="color:orange;">{c} %</span>',
					                                          textStyle:{
					                                          	color:'#05FBFF',
					                                          	fontWeight:'bold',
					                                          	textShadowBlur:5,
					                                          	textShadowOffsetX:0,
					                                          	textShadowOffsetY:2,
					                                          	textShadowColor:'black' 
					                                          },
					                                          backgroundColor:'rgba(0,0,0,0.9)'
					                                     }

					           		}); 
					           	}
					           });
}

function month_ecart_interaction_evolution (click) {

	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Evolution mensuelle écart d\'Interactions pour :&nbsp;&nbsp;<span id="anneeCourante"></span></h1><label for="monthselect">Filtrer:&nbsp;&nbsp;</label> <input type="month" name="monthselect" id="monthselect">';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
	 var anneeCourante=document.getElementById('anneeCourante');
     var monthselect=document.getElementById('monthselect');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {
	    		
	    		var date=new Date();
			    month=date.getMonth()+1;
				if(month.toString().length==1) monthselect.value=date.getFullYear()+'-0'+month; 
				else monthselect.value=date.getFullYear()+'-'+month;
				get_month_ecart_interaction_evolution (monthselect.value+'-01');

				// affichage des taux
				       
		 		monthselect.addEventListener('change',function () 
		 		{
		 
					get_month_ecart_interaction_evolution (monthselect.value+'-01');  
				});

	    		//traitement de boutton
	    		Evolution_mensuelle_ecart_Interactions.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Evolution_mensuelle_ecart_Interactions.style.color='orange';
				Evolution_mensuelle_ecart_Interactions.style.textShadow='0px 2px 5px black';
				Evolution_mensuelle_ecart_Interactions.style.width='104%';
				Evolution_mensuelle_ecart_Interactions.style.boxShadow='8px 8px 3px black';

				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Evolution_mensuelle_ecart_Interactions.style.background = '';
				Evolution_mensuelle_ecart_Interactions.style.color='';
				Evolution_mensuelle_ecart_Interactions.style.textShadow='';
				Evolution_mensuelle_ecart_Interactions.style.width='';
				Evolution_mensuelle_ecart_Interactions.style.boxShadow='';

				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}       
}

function get_month_ecart_interaction_evolution (date)
{
		document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
		getYearValue=date.split('-');
		anneeCourante.innerHTML=getYearValue[0];
		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?taux_ecart_interaction_evolution='+true+'&date='+date);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{
		           		var months=['Janvier','Février','Mars','Avril','May','Juin','Juillet','Aout','Séptembre','Octobre','Novembre','Décembre'];
		           		var monthsResult=[];
		           		var ecart_charge_interaction_result=[];

		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{
		           			 monthsResult.push(months[mydata[i].X - 1]+' '+getYearValue[0]); 
		           			 ecart_charge_interaction_result.push(mydata[i].Y); 

		           		}
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           		
                            xAxis:{
                                type:'category',
                                //nameGap:35,
                                //boundaryGap:false,
                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:45	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                data:monthsResult
                            },
                            yAxis:{
                                type:'value',
                                name:'Nombre d\'interactions',
                                nameLocation:'center',
                                nameGap:50,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold'
                                },
                                 splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                 axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:-2,
                                		shadowOffsetY:0
                                	}
                                }
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								right:'33%',
       								top:'2%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
                            series:[{
                                data:ecart_charge_interaction_result,
                                type: 'line',
                                name: 'Ecart entre charge et interaction du mois X',
                                symbol: 'circle',
                                symbolSize:20,
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'orange'
                                },
                                itemStyle:{
                                	color:'red'
                                }
                                
                            }
                            ],
                             dataZoom:[{
                            	type:'inside'
                            }
                            ],

                            				tooltip:
		                                     {
		                                          show:true,
		                                          formatter:'{a} : <span style="color:orange;">{b}</span><br>Ecart d\'interactions : <span style="color:orange;">{c}</span>',
		                                          textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)'
		                                     }

                         });  
		           		
		           	}
		        }); 

}

function month_interaction_evolution (click) {

	var optionDiv=document.getElementById('option');
	    optionDiv.style.display='block';
			    optionDiv.innerHTML='<h1>Evolution mensuelle des interacctions pour :&nbsp;&nbsp;<span id="anneeCourante"></span></h1><label for="monthselect">Filtrer:&nbsp;&nbsp;</label> <input type="month" name="monthselect" id="monthselect">';
	
	 var tauxDeSatisfaction=document.getElementById('tauxDeSatisfaction');
	 var anneeCourante=document.getElementById('anneeCourante');
     var monthselect=document.getElementById('monthselect');
     var displayIndic=document.getElementById('displayIndic');
	 tauxDeSatisfaction.style.display='block';

	    if(click) // affichage des taux et traitement de boutton
	    {  		
	    		var date=new Date();	    		
			    month=date.getMonth()+1;
				if(month.toString().length==1) monthselect.value=date.getFullYear()+'-0'+month; 
				else monthselect.value=date.getFullYear()+'-'+month;
				get_month_interaction_evolution (monthselect.value+'-01');

				// affichage des taux
				       
		 		monthselect.addEventListener('change',function () 
		 		{
		 
					get_month_interaction_evolution (monthselect.value+'-01');  
				});

	    		//traitement de boutton
	    		Evolution_mensuelle_Interactions.style.background = 'linear-gradient(45deg,#202427,#1BCCB4 500%)';
				Evolution_mensuelle_Interactions.style.color='orange';
				Evolution_mensuelle_Interactions.style.textShadow='0px 2px 5px black';
				Evolution_mensuelle_Interactions.style.width='104%';
				Evolution_mensuelle_Interactions.style.boxShadow='8px 8px 3px black';

				displayIndic.style.height='700px';
	
			    
		}
		else   // faire disparaitre les taux et traitement de boutton
		{


				Evolution_mensuelle_Interactions.style.background = '';
				Evolution_mensuelle_Interactions.style.color='';
				Evolution_mensuelle_Interactions.style.textShadow='';
				Evolution_mensuelle_Interactions.style.width='';
				Evolution_mensuelle_Interactions.style.boxShadow='';


				optionDiv.style.display='';
			    optionDiv.innerHTML='';

			    displayIndic.style.width='';
			    tauxDeSatisfaction.style.display='none';
				document.getElementById('tauxDeSatisfaction').innerHTML='';              
		}       
}

function get_month_interaction_evolution (date)
{
		document.getElementById('tauxDeSatisfaction').innerHTML='<div id="evolution_interaction_graphe"></div>';
		var evolution_interaction_graphe=document.getElementById('evolution_interaction_graphe');
		getYearValue=date.split('-');
		anneeCourante.innerHTML=getYearValue[0];
		
		        var xhr=new XMLHttpRequest();
		        xhr.open('GET','http://localhost/projet/Directeur/directeurserver.php?taux_interaction_evolution='+true+'&date='+date);
		        xhr.send(null);
		        xhr.addEventListener('readystatechange',function () 
		        {
		           	if(xhr.readyState===4 && xhr.status===200)
		           	{
		           		var months=['Janvier','Février','Mars','Avril','May','Juin','Juillet','Aout','Séptembre','Octobre','Novembre','Décembre'];
		           		var monthsResult=[];
		           		var chargeResult=[];
		           		var satisfaiteResult=[];
		           		var exprimedResult=[];
		           		mydata=JSON.parse(xhr.responseText);
		           		for(var i in mydata)
		           		{
		           			 monthsResult.push(months[mydata[i].X - 1]+' '+getYearValue[0]); 
		           			 chargeResult.push(mydata[i].Y); 
		           			 satisfaiteResult.push(mydata[i].Z);
		           			 exprimedResult.push(mydata[i].W);
		           		}
		           		var myChart = echarts.init(evolution_interaction_graphe).setOption({
		           		
                            xAxis:{
                                type:'category',
                                //nameGap:35,
                                //boundaryGap:false,
                                axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:0,
                                		shadowOffsetY:2
                                	}
                                },
                                axisLabel:{
                                	show:true,
                                	interval:0,
                                	rotate:45	
                                },
                                splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                data:monthsResult
                            },
                            yAxis:{
                                type:'value',
                                name:'Nombre d\'interactions',
                                nameLocation:'center',
                                nameGap:50,
                                nameTextStyle:{
                                	fontSize:15,
                                	fontWeight:'bold'
                                },
                                 splitLine:{
                                	show:true,
                                	lineStyle:{
                                		opacity:0.1
                                	}
                                },
                                 axisLine:{
                                	show:true,
                                	lineStyle:{
                                		color:'#05FBFF',
                                		width:2,
                                		shadowBlur:2,
                                		shadowColor:'black',
                                		shadowOffsetX:-2,
                                		shadowOffsetY:0
                                	}
                                }
                            },
                            legend: {
       								show:true,
       								textStyle:{
       									color:'#fff',
       									fontSize:15
       								},
       								right:'10%',
       								top:'0%'

    						},
    						textStyle:{
    							color:'#1BCCB4'
    						},
                            series:[{
                                data:chargeResult,
                                type: 'line',
                                name: 'charge du mois X',
                                symbol: 'circle',
                                symbolSize:20,
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'orange'
                                },
                                itemStyle:{
                                	color:'orange',
                                }
                                
                            },
                            {
                                data:satisfaiteResult,
                                type: 'line',
                                name: 'Interactions satisfaites durant le mois X',
                                symbol: 'circle',
                                symbolSize:20,
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'bottom',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'green'
                                },
                                itemStyle:{
                                	color:'green',
                                }
                                
                            },
                            {
                                data:exprimedResult,
                                type: 'line',
                                name: 'Interactions Exprimées durant le mois X',
                                symbol: 'circle',
                                symbolSize:20,
                                legendHoverLink:true,	
                                label:{
                                	show:true,
                                	position:'top',
                                	fontStyle:'italic',
                                	fontWeight:'bold',
                                	color:'red'
                                },
                                itemStyle:{
                                	color:'red',
                                }
                                
                            }],
                            dataZoom:[{
                            	type:'inside'
                            }
                            ],

                            				tooltip:
		                                     {
		                                          show:true,
		                                          formatter:'{a} : <span style="color:orange;">{b}</span><br>Nombre d\'interactions : <span style="color:orange;">{c}</span>',
		                                          textStyle:{
		                                          	color:'#05FBFF',
		                                          	fontWeight:'bold',
		                                          	textShadowBlur:5,
		                                          	textShadowOffsetX:0,
		                                          	textShadowOffsetY:2,
		                                          	textShadowColor:'black' 
		                                          },
		                                          backgroundColor:'rgba(0,0,0,0.9)'
		                                     }

                         });  
		           		
		           	}
		        }); 
}

(function () {
initialisation(); 

var array_functions={};
var click=false;
var lastClicked=null;
var displaySatisfaction=document.getElementById('displaySatisfaction');
var Evolution_mensuelle_Interactions=document.getElementById('Evolution_mensuelle_Interactions');
var Evolution_mensuelle_ecart_Interactions=document.getElementById('Evolution_mensuelle_ecart_Interactions');
var Evolution_mensuelle_Taux_Satisfaction=document.getElementById('Evolution_mensuelle_Taux_Satisfaction');
var Taux_par_canal_ess=document.getElementById('Taux_par_canal_ess');
var Total_interactions_par_an=document.getElementById('Total_interactions_par_an');
var etat_interactions_gpl=document.getElementById('etat_interactions_gpl');
var categorie_interactions_gpl=document.getElementById('categorie_interactions_gpl');
var Charge_interaction_par_sérvice_concerné=document.getElementById('Charge_interaction_par_sérvice_concerné');
var Taux_de_charge_des_sérvice=document.getElementById('Taux_de_charge_des_sérvice');
var Taux_de_Résolution_par_sérvice=document.getElementById('Taux_de_Résolution_par_sérvice');
var Interactions_par_domaine=document.getElementById('Interactions_par_domaine');
var Temp_moyen_de_résolution_des_intéractions=document.getElementById('Temp_moyen_de_résolution_des_intéractions');
var Classement_des_employé_par_nombre_de_cloture=document.getElementById('Classement_des_employé_par_nombre_de_cloture');

displaySatisfaction.addEventListener('click', function () 
{	
	//si !null et le dernier cliké n'est pas ce boutton reinitialiser le click a false et exécuter tous les fonction avec un click false pour les faire disparaitre 
	if(lastClicked!=null && lastClicked!=displaySatisfaction) 
	{
		click=false;
		hide_last_clicked (false,lastClicked.id);	
	}
	if(!click)
	{
		click=true;
		lastClicked=displaySatisfaction;
	}
	else
	{
		click=false;
	}

	taux_de_satisfaction(click);
});

Evolution_mensuelle_Interactions.addEventListener('click',function()
{

	if(lastClicked!=null && lastClicked!=Evolution_mensuelle_Interactions)
	{
		 click=false;	
		 hide_last_clicked (false,lastClicked.id);	 
	}
	if(!click)
	{
		click=true;
		lastClicked=Evolution_mensuelle_Interactions;
	}
	else
	{
		click=false;
	}


	 month_interaction_evolution (click); 
});

Evolution_mensuelle_ecart_Interactions.addEventListener('click',function () {
	if(lastClicked!=null && lastClicked!=Evolution_mensuelle_ecart_Interactions)
	{
		 click=false;	
		 hide_last_clicked (false,lastClicked.id);	 
	}
	if(!click)
	{
		click=true;
		lastClicked=Evolution_mensuelle_ecart_Interactions;
	}
	else
	{
		click=false;
	}


	 month_ecart_interaction_evolution(click); 
});

Evolution_mensuelle_Taux_Satisfaction.addEventListener('click',function () {
 	if(lastClicked!=null && lastClicked!=Evolution_mensuelle_Taux_Satisfaction)
	{
		 click=false;	
		 hide_last_clicked (false,lastClicked.id);	 
	}
	if(!click)
	{
		click=true;
		lastClicked=Evolution_mensuelle_Taux_Satisfaction;
	}
	else
	{
		click=false;
	}


	 month_taux_satisfaction_evolution(click); 
});

Taux_par_canal_ess.addEventListener('click',function () {

	if(lastClicked!=null && lastClicked!=Taux_par_canal_ess)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=Taux_par_canal_ess;
		}
		else
		{
			click=false;
		}


		 month_taux_ess_canal_evolution(click); 
});

Total_interactions_par_an.addEventListener('click',function () {
	if(lastClicked!=null && lastClicked!=Total_interactions_par_an)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=Total_interactions_par_an;
		}
		else
		{
			click=false;
		}


		 year_interactions(click); 
});

etat_interactions_gpl.addEventListener('click',function () {
		if(lastClicked!=null && lastClicked!=etat_interactions_gpl)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=etat_interactions_gpl;
		}
		else
		{
			click=false;
		}


		 status_of_interactions_gpl(click); 
});

Charge_interaction_par_sérvice_concerné.addEventListener('click',function () {

	if(lastClicked!=null && lastClicked!=Charge_interaction_par_sérvice_concerné)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=Charge_interaction_par_sérvice_concerné;
		}
		else
		{
			click=false;
		}


		 status_of_Charge_interaction_par_sérvice_concerné(click);
});

Taux_de_charge_des_sérvice.addEventListener('click',function () {

	if(lastClicked!=null && lastClicked!=Taux_de_charge_des_sérvice)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=Taux_de_charge_des_sérvice;
		}
		else
		{
			click=false;
		}


		 status_of_Taux_de_charge_des_sérvice(click);
});

Taux_de_Résolution_par_sérvice.addEventListener('click',function () {
		
		if(lastClicked!=null && lastClicked!=Taux_de_Résolution_par_sérvice)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=Taux_de_Résolution_par_sérvice;
		}
		else
		{
			click=false;
		}

		 status_of_Taux_de_Résolution_par_sérvice(click);
});

Interactions_par_domaine.addEventListener('click',function () {

		if(lastClicked!=null && lastClicked!=Interactions_par_domaine)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=Interactions_par_domaine;
		}
		else
		{
			click=false;
		}

		status_of_Interactions_par_domaine(click);
});

Temp_moyen_de_résolution_des_intéractions.addEventListener('click',function () {

	if(lastClicked!=null && lastClicked!=Temp_moyen_de_résolution_des_intéractions)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=Temp_moyen_de_résolution_des_intéractions;
		}
		else
		{
			click=false;
		}

		status_of_Temp_moyen_de_résolution_des_intéractions(click);
});

categorie_interactions_gpl.addEventListener('click',function () {

	if(lastClicked!=null && lastClicked!=categorie_interactions_gpl)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=categorie_interactions_gpl;
		}
		else
		{
			click=false;
		}

		status_of_categorie_interactions_gpl(click);
});

Classement_des_employé_par_nombre_de_cloture.addEventListener('click',function () {

	if(lastClicked!=null && lastClicked!=Classement_des_employé_par_nombre_de_cloture)
		{
			 click=false;	
			 hide_last_clicked (false,lastClicked.id);	 
		}
		if(!click)
		{
			click=true;
			lastClicked=Classement_des_employé_par_nombre_de_cloture;
		}
		else
		{
			click=false;
		}

		status_of_Classement_des_employé_par_nombre_de_cloture(click);
});


})();
</script>
</body>

</html>