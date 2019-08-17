<?php
session_start();
if(!isset($_SESSION['submited'])  || stripos($_SESSION['profile'],"D.")!==0 &&  $_SESSION['profile']!='Directeur')
{
   header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Suivi des demandes clients</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/x-icon" href="../stats.png" />
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>

<body ondragstart="return false;" ondrop="return false;">
<div id="boite"> <! ici HISTORIQUE d'envoi>
	<h1>Historique d'envoi seuelement les <span style="font-size: 1.1em;">22</span> derniers :</h1>
	<div id="historique"></div>
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
			<button id="bt4" class="menubtns">Mon historique</button>
			<button id="bt6" class="menubtns">Historique de mon district</button>
			<button id="bt1" class="menubtns">Changer nom de compte</button>    <!ces button ne sont pas inclu dans la forme>
			<button id="bt2" class="menubtns">Changer mot de passe</button>       <!j'utilise ajax pour changer le mdp>	
			<button id="bt3" class="menubtns">Déconnexion</button>
		</div>
		<div id="Acceuil">
		<header>
			<table id="header_tab">    <!/////////////////////////////////>
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

		<form method="post" action="svdcserver.php" id="myForm">  <!ici ma debut form >

		<div id="bla">
			<table id="direction-tab">  
		           <tr>
		           	 <td id="direction1">DIRECTION SIEGE :<br>DISTRICT DMR :</td>
		           	 <td id="direction2">BRANCHE GPL<br>DISTRICT <span id="mySpan"></span></td>
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
						<td class="ligne2" class="numero" ><input type="number" name="numA" id="numA" onCut="return false" onpaste="return false;" required ></td>
						<td class="ligne2" class="numero"><input type="number" name="numB" id="numB" onCut="return false" onpaste="return false;"required></td>
						<td class="ligne2" class="numero"><input type="number" name="numC" id="numC" onCut="return false" onpaste="return false;" required></td>
						<td class="ligne2" class="numero"><input type="number" name="numD" id="numD" onCut="return false" onpaste="return false;" required></td>
						<td class="ligne2" id="calcM1"></td>
						<td class="ligne2" id="calcM2"></td>
						<td class="ligne2"><textarea placeholder="Obsérvation obligatoire si taux inférieur à 80%" style="color: blue;height: 134px; padding:6px; resize: none; overflow:hidden; font-weight: bold;" maxlength="110" ></textarea></td>
					</tr>
					<tr>
						<td colspan="8" style="text-align: left; padding: 8px;" class="gris">Griffe et signature du responsable de la structure</td>
					</tr>
					<tr>
						<td colspan="8" id="griffe" style="text-align: left; font-weight:normal; font-size: 0.8em; padding-left:5px;"><strong>A</strong> : Demandes antérieurs exprimées non satisfaites<br><strong>B</strong> : Demandes exprimées du mois<br><strong>C</strong> : Demandes satisfaites durant le mois M des demandes antérieures non satisfaites<br><strong>D</strong> : Demandes satisfaites du mois M<br><strong>*</strong>&nbsp;&nbsp;: sont concernées uniquement les département du GI siege, des Districts et Service Informatique DMR et Moyens Télécom DAM (siége) et PMC des Districts et DMR</td>
					</tr>
		    </table>
		    <div id="buttons">
		    	<input type="reset" value="reinitialiser" id="reinit" >
		    	<input type="submit" value="Envoyer" name="envoyer" id="envoyer">
		    	<input type="button" value="Imprimer" id="imprimer">
		    </div>
		    <div id="naftalproperty">
		    		<div id="trait">&nbsp;</div>
		    		<h4>Propriété NAFTAL GPL - Reporoduction interdite</h4>
		    	</div>
		    </form>  						<!ici fin Form>
		</div>
</div>
<script type="text/javascript">

(function () {

/**/
	window.onload=function(){
     document.body.style.display='block';
      }

    function getDistrict()  //renvoir le district ex pour D.alger renvoi alger
    {
    	var mySpan=document.getElementById('mySpan');

    	 var district=
    	 {
			Alger :'D.Alger',
			Bejaia :'D.Bejaia',
			Oran :'D.Oran',
			Constantine :'D.Constantine',
			Telemcen :'D.Telemcen',
			//Bordj bou arreridj :'D.Bordj bou arreridj',
			Batna :'D.Batna',
			Béchar :'D.Béchar'	
      	 };
      var xhr=new XMLHttpRequest();
      xhr.open('GET','http://localhost/projet/district/svdcserver.php?Dprofil='+true);
      xhr.send(null);
      xhr.addEventListener('readystatechange',function () 
      {
      	 if(xhr.readyState===4 && xhr.status===200)
      	 {
              if(xhr.responseText !="2")
              {
              	      for(var id in district)
     				 {
     				 	    if (xhr.responseText=="D.Bordj bou arreridj") 
     				 	    {
                                 mySpan.innerHTML="Bordj bou arreridj";
                                 break;
     				 	    }
                            else if (district[id]==xhr.responseText) 
                            {
                        	
                                  mySpan.innerHTML=id;
                                  break;
                            }
      				 }
              } 
      	 }

      });
    }

    
   
      getDistrict();

      /*get month and year*/
      const monthNames = ["JANVIER", "FEVRIER", "MARS", "AVRIL", "MAY", "JUIN", "JUILLET", "AOUT", "SEPTEMBRE", "OCTOBRE", "NOVEMBRE", "DECEMBRE"];
      const date = new Date();
      document.getElementById('mois').innerHTML=monthNames[date.getMonth()];
      document.getElementById('annee').innerHTML=date.getFullYear();
      


	  var numA=document.getElementById('numA'),numB=document.getElementById('numB'),numC=document.getElementById('numC'),numD=document.getElementById('numD'),calcM1=document.getElementById('calcM1'),calcM2=document.getElementById('calcM2'),reinit=document.getElementById('reinit'),textarea=document.getElementsByTagName('textarea'),
            imprimer = document.getElementById('imprimer');
            textarea[0].required=false;
		var numbers=document.querySelectorAll('input[type="number"]'),numbersLength=numbers.length;


		for(var i=0;i<numbersLength;i++)
		{
			numbers[i].addEventListener('keyup',function (e) 
			{
                if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) ) //0-9 seulement
                { 
                	textarea[0].required=false;
                                   
                   if(numA.value && numB.value && numC.value && numD.value)
                   {
                   	   		
                   	   	
                   	   			var result1=(Math.abs(numA.value) -Math.abs(numC.value)) + (Math.abs(numB.value)-Math.abs(numD.value)),
        result2=((Math.abs(numC.value)+Math.abs(numD.value)) / (Math.abs(numA.value)+Math.abs(numB.value))).toFixed(4);

		                            if(result1<0 || result2<0) 
		                            {
		                            	alert('Résultat négative revérifier les valeurs !'); reinit.click(); calcM1.innerHTML=""; calcM2.innerHTML="";
		                            }
		                            else
		                            {
											result2=(result2*100).toFixed(2);
				                            var text1=document.createTextNode(result1);
				                            text2=document.createTextNode(result2+" %");
				                            calcM1.innerHTML=text1.textContent;
		                                    calcM2.innerHTML=text2.textContent;
		                                    if(result2<80.00) textarea[0].required=true;


		                            }              

                   }
                }
                else if((e.keyCode == 8) || (e.keyCode == 46) )
                {
                  calcM1.innerHTML=""; calcM2.innerHTML="";
                  if(numA.value && numB.value && numC.value && numD.value)
                   {
                   	   		textarea[0].required=false;
 
                   	   			var result1=(Math.abs(numA.value) -Math.abs(numC.value)) + (Math.abs(numB.value)-Math.abs(numD.value)),
        					result2=((Math.abs(numC.value)+Math.abs(numD.value)) / (Math.abs(numA.value)+Math.abs(numB.value))).toFixed(4);

		                            if(result1<0 || result2<0) 
		                            {
		                            	alert('Résultat négative revérifier les valeurs !'); reinit.click(); calcM1.innerHTML=""; calcM2.innerHTML="";
		                            }
		                            else
		                            {
		                            		result2=(result2*100).toFixed(2);
				                            var text1=document.createTextNode(result1),
				                            text2=document.createTextNode(result2+" %");
				                            calcM1.innerHTML=text1.textContent;
		                                     calcM2.innerHTML=text2.textContent;
		                                     	if(result2<80.00) textarea[0].required=true;
		                            }
		                        
                   	   		
                            

                   }  

                }
			});
		}
		/**/

/* juste pour un beau affichage (je sais pas pk mais avec ca ybanou kbare) */
for(var i=0;i<numbersLength;i++)
{
	numbers[i].parentNode.style.color='blue';numbers[i].parentNode.style.fontSize = '1.7em';
}
/**/
		imprimer.addEventListener('click', function () 
		{
             var  bla=document.getElementById('bla'),
             headerTab=document.getElementById('header_tab'),buttons=document.getElementById('buttons'),griffe=document.getElementById('griffe'),griffContent=griffe.innerHTML,divGriffeContent=document.createElement('div'),form=document.getElementsByTagName('form'),br=document.getElementById('br'),naftalproperty=document.getElementById('naftalproperty'),menu=document.getElementById('menu');
             parents=new Array();
                
            /*avant le window.print nssagam da3wa*/    
             for(var i=0;i<numbersLength;i++)
             {
             	
             	parents.push(numbers[i].parentNode);
             	numbers[i].parentNode.innerHTML=numbers[i].value;
             }

             textarea[0].style.border='none';
             textarea[0].style.background='none';
             textarea[0].style.outline='none';
             textarea[0].placeholder="";
             
             bla.style.top="50%";
             headerTab.style.left='0px';
             headerTab.style.top='40px';
             
             buttons.style.display='none';
             
             griffe.innerHTML="";
            
             divGriffeContent.innerHTML=griffContent;
             divGriffeContent.id="dgfc";
             form[0].appendChild(divGriffeContent);
              
             br.innerHTML="DEPARTEMENT<br>INFORMATIQUE";
             
             naftalproperty.style.top="200px";

             menu.style.display='none';
            
         
             window.print();

             /*aprés le window.print remetrre les chause a leur place*/    
             for(var i=0;i<numbersLength;i++)
             {
             	parents[i].innerHTML="";
             	parents[i].appendChild(numbers[i]);
             }

             textarea[0].style.border='';
             textarea[0].style.background='';
             textarea[0].style.outline='';

             bla.style.top="";
             headerTab.style.left='';
             headerTab.style.top='';

             buttons.style.display='';
  
             griffe.innerHTML=griffContent;
             divGriffeContent.remove();

             br.innerHTML="DEPARTEMENT INFORMATIQUE";

             naftalproperty.style.top="";
 
             menu.style.display='';
             textarea[0].placeholder="Obsérvation obligatoire si taux inférieur à 80%";    
		});

		reinit.addEventListener('click',function () {
			calcM1.innerHTML=""; calcM2.innerHTML="";
		});
 
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
            inputDialog.action="svdcserver.php";
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
		    menu=document.getElementById('menu'),bt1=document.getElementById('bt1'),bt2=document.getElementById('bt2'),bt3=document.getElementById('bt3');

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
		                	menubtns[i].style.display="block";
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

		bt1.addEventListener('click',function () 
		{
	    var backgroundDiv=document.getElementById('backgroundDiv');
        if(!backgroundDiv)
        {  
          	display_user_change("on");
            var form=document.getElementById('inputDialog');
            form.addEventListener('submit',function (e)   
            {     var erreur_div=document.getElementById('erreur_div');
	            if(document.getElementById('oldUser').value!=document.getElementById('newUser').value || document.getElementById('oldUser').value.length<6)
	            {
	            	   
	                    erreur_div.innerHTML='valeurs différentes ou nom trop petit';
	                    erreur_div.display='inline-block';
	            }
	            else 
	            {
	            	var xhr=new XMLHttpRequest();
	            	xhr.open('POST','http://localhost/projet/district/svdcserver.php');
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
	            	xhr.open('POST','http://localhost/projet/district/svdcserver.php');
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
             	document.getElementById('oldUser').placeholder="Ancien Mot de pass";
             	document.getElementById('newUser').type="password";
             	document.getElementById('newUser').name="DisUserPassChange2";
             	document.getElementById('newUser').placeholder="Nouveau Mot de pass";
          	 }
          }         	
		});
        
		bt3.addEventListener('click',function () {  //deconnxion
			window.location.href="http://localhost/projet/login.php";
		});    
	}

/* GESTION DE LA FORME ET DE L'ENVOI VERS LA TABLE*/
var time;
		function ENVOI (aval,bval,cval,dval,m1,m2,txtval,district)
	    {
			
	            var xhr=new XMLHttpRequest();
	            xhr.open('POST','http://localhost/projet/district/svdcserver.php');
	            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	            xhr.send('numA=' +aval+'&numB='+bval+'&numC='+cval+'&numD='+dval+'&reste='+m1+'&taux='+m2.toFixed(4)+'&obsérvation='+txtval+'&district='+district+'&envoyer='+true);

	            xhr.addEventListener('readystatechange',function () 
	            {
	            	if(xhr.readyState===4 && xhr.status===200)
	            	{

	            		if(xhr.responseText=='1')
	            		{
	                       		var green=display_changed_sucess(xhr.responseText,3);
	                       		clearTimeout(time);
		                        time=setTimeout(function () {
		                        green.remove();
		                        },10000);
	            		}
	            		else 
	            		{
		            			var green=display_changed_sucess(xhr.responeText,5);
		            			green.innerHTML='L\'utilisateur qui à pour nom de compte <span style="color:#EDEDED;"> '+xhr.responseText+' </span> à déja envoyé une fiche ce mois - seulement lui peut annuler l\'envoi depuis son historique !';
		            			clearTimeout(time);
		            			time=setTimeout(function () {
		            			green.remove();
		            			},12000);           			
	            		}
	            	}
	            });
		}

		var myForm=document.getElementById('myForm');
		myForm.addEventListener('submit',function (e)
		{
			
			var result1=(Math.abs(numA.value) -Math.abs(numC.value)) + (Math.abs(numB.value)-Math.abs(numD.value)),
		        result2=(Math.abs(numC.value)+Math.abs(numD.value)) / (Math.abs(numA.value)+Math.abs(numB.value)),
		        mySpan=document.getElementById('mySpan');
			ENVOI(Math.abs(numA.value),Math.abs(numB.value),Math.abs(numC.value),Math.abs(numD.value),result1,result2,textarea[0].value,mySpan.innerHTML);
			myForm.reset();
			calcM1.innerHTML="";
		    calcM2.innerHTML="";
			e.preventDefault();
/**/		});


/* GESTION DE L'historique'*/
	var bt4=document.getElementById('bt4');
	bt4.addEventListener('click',function () 
	{
		var acceuil=document.getElementById('Acceuil'),
		boite=document.getElementById('boite'),
		historique=document.getElementById('historique');

	    acceuil.style.display='none';
	    boite.style.display='block';

	    var xhr=new XMLHttpRequest();
		    xhr.open('POST','http://localhost/projet/district/svdcserver.php');
		    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhr.send('donnemoi='+true);
 			xhr.addEventListener('readystatechange',function () 
			{
			 if(xhr.readyState===4 && xhr.status===200)
			 {
                 historique.innerHTML=xhr.responseText;
                 var supprimer=document.getElementsByTagName('img'),suppLength=supprimer.length;
                 for(var i=0;i<suppLength;i++)
                 {

	                 supprimer[i].addEventListener('click',function (e) 
	                 {
	                 	   var xhr=new XMLHttpRequest();
	                 	   xhr.open('GET','http://localhost/projet/district/svdcserver.php?supprimer='+true+'&id='+e.target.nextElementSibling.innerHTML);
	                 	   xhr.send(null);
	                 	   xhr.addEventListener('readystatechange',function () {
	                 	   	   if(xhr.readyState===4 && xhr.status===200)
	                 	   	   {
	                 	   	   	   if(xhr.responseText=='DONE') 
	                 	   	   	   {
	                 	   	   	   	 var green=display_changed_sucess(xhr.responseText,4);
	                 	   	   	   	 bt4.click(); 
	                 	   	   	   	 clearTimeout(time);  	 
	                 	   	   	   	 time=setTimeout(function () {
	                             	 	green.remove();
	                             	 },10000);                 	   	   	   	 
	                 	   	   	   }
	                 	   	   	   	
	                 	   	   }
	                 	   });
	                 });

                 }
                 
			 }
			});                      	           
                  		            
	});

	bt5.addEventListener('click',function () 
	{

		var acceuil=document.getElementById('Acceuil'),
		boite=document.getElementById('boite');
		acceuil.style.display='';
	    boite.style.display='';
	    
	});
/*historique du district*/

bt6	.addEventListener('click',function () 
	{

		var acceuil=document.getElementById('Acceuil'),
		boite=document.getElementById('boite'),
		historique=document.getElementById('historique');

	    acceuil.style.display='none';
	    boite.style.display='block';

	    var xhr=new XMLHttpRequest();
		    xhr.open('POST','http://localhost/projet/district/svdcserver.php');
		    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    xhr.send('donnemoitous='+true+'&district='+document.getElementById('mySpan').innerHTML);
 			xhr.addEventListener('readystatechange',function () 
			{
			 if(xhr.readyState===4 && xhr.status===200)
			 {
                 historique.innerHTML=xhr.responseText;     
			 }
			});                      	           
	    
	});




display_menu();

})();
</script>
</body>
</html>
