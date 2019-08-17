<?php
 session_start();
     if(!isset($_SESSION['submited'])  || ($_SESSION['profile']!='Administrateur' &&  $_SESSION['profile']!='Directeur')){
          header("location:login.php");
        }
        try{$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));}
        catch(Exception $e){die('ERREUR :'.$e->getMessage());} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
	<link rel="stylesheet" type="text/css" href="style-admin.css">
	<link rel="shortcut icon" type="image/x-icon" href="stats.png" />
	<meta charset="utf-8">
</head>
<body>
<?php include("static.php");
		echo "<h2 id=\"user\" >Connecté en tant que: <span style=\"font-style: italic;\">".strip_tags( $_SESSION['username'])."</span> . Nombre d'utilisateurs : <span id=\"countUser\" style=\"font-style: italic;\">".strip_tags($_SESSION['count_bdd_users'])."</span><h1>";
?>
<div id="users-container">
	<h3>Liste des utilisateurs</h3> 
	<div id="filter">
		     <input type="radio" name="choose" value="user-filter" id="user-filter" checked title="filtrage par défaut utilisateur , ecrire dans la barre de recherche le nom d'utilisateur"><label for="user-filter">Utilisateur</label><br />
             <input type="radio" name="choose" value="profile-filter" id="profile-filter" title="Filtrage par profile ecrire dans la barre de recherche le nom de profile ex:administrateur"><label for="profile-filter">Profile</label><br />
             <input id="date-filter" type="Date" name="date-filter" title="Date d'inscription">
	</div>
	<div id="search-box">
		<button><img src="search-icon.png"></button>
		<input type="text" id="search" autocomplete="off" placeholder="Nom d'utilisateur / profil">
		<div id="results"></div>
	</div>
    
	<div id="table">
	 <table>
		 	<tr>
		         <th style="cursor: default;" title="Vous pouvez modifier le Nom d'utilisateur"><span>Nom d'utilisateur</span><img src="edit-document.png" ></th>
		         <th style="cursor: default;" title="Vous pouvez modifier le Mot de passe"><span>Mot de passe</span><img src="edit-document.png" ></th>
		         <th style="cursor: default;" title="Vous pouvez modifier le Profil"><span>Profil</span><img src="edit-document.png" ></th>
		         <th style="cursor: default;" title="Vous ne pouvez pas modifier la Date d'inscription">Date d'inscription</th>
		         <th style="cursor: default;" title="Vous ne pouvez pas modifier la Date de Derniere connexion">Derniere connexion</th>
		         <th style="cursor: default;" title="Choisir l'utilisateur a supprimer">Supprimer utilisateur</th>
		 	</tr>
	 	    <tbody id="table-body"></tbody>
	 </table>
	 <button id="precedent" >Précédent</button>	
	 <button id="suivant" >Suivant</button>
	</div>
</div>
<script type="text/javascript">

	(function() {
		//gestion de la barre de recherche
			 var search=document.getElementById('search'),
	             results=search.nextElementSibling,
	             previousRequest, //pour l'interrompre si une nouvelle requete arrive pour ne pas erroner les resultats
	             previousValue=search.innerHTML, //pour detecter l'evenement lorsque l'utilisateur tape un char dans le input evidament keyup ne suffit pas ,
	             selectedDIV=-1 ,//pour pouvoire manipuler les div resultats avec les flech et tt
                 searchButton=document.getElementById('search-box').firstElementChild;

	             /////////////

	               function getResults(key) {
	               	 	var xhr=new XMLHttpRequest();
	               	 	if (document.getElementById('user-filter').checked)
	               	 	{
	               	 		xhr.open('GET','http://localhost/projet/get_users_names.php?user='+encodeURIComponent(key));
	               	 	}
	               	 	else if (document.getElementById('profile-filter').checked) xhr.open('GET','http://localhost/projet/get_users_names.php?profile='+encodeURIComponent(key));
	               	 	xhr.send(null);
	                    xhr.addEventListener('readystatechange',function () {
	                    	if(xhr.readyState===4 && xhr.status===200)
	                    	{
	                               displayResults(xhr.responseText);
	                    	}
	                    });
	               
	               	 return xhr;
	               }

	               //////////////


	               function displayResults(string)
	               {
		               	 results.style.display=string.length ? 'block' : 'none';
		               	 string=string.split('|');
		               	 var stringLength=string.length;
		               	 if(stringLength)
		               	 {
		               	 	results.innerHTML='';
				               	 for(var i=0;i<stringLength;i++)
				               	 {
				               	 	 var div=document.createElement('div');
				               	 	 div.innerHTML=string[i];
				               	 	 results.appendChild(div);
				               	 	 div.addEventListener('click',function (e) {
				               	 	    search.value=e.target.innerHTML;
				               	 	    results.style.display='none';
				               	 	 });
				               	 }
				          }
	               }

	             ///////////


	             search.addEventListener('keyup',function (e) {
	          	     var divs=results.getElementsByTagName('div');
	          	     if(previousValue!=search.value)
	          	     { 
	          	           previousValue=search.value;
	                       if(previousRequest && previousRequest.readyState<XMLHttpRequest.DONE) previousRequest.abort();
	                       previousRequest=getResults(previousValue);
	                       selectedDIV=-1;
	          	     }
	          	     else if (e.keyCode==38 && selectedDIV>-1) //flech haut
	          	     {
	                       divs[selectedDIV].style.background='';
	                       divs[selectedDIV].style.color='';
	                       selectedDIV --;
	                       if(selectedDIV>-1)
	                       {
	                       	 divs[selectedDIV].style.background='orange';
	                       	 divs[selectedDIV].style.color='black';
	                       }
	          	     }
	          	     else if (e.keyCode==40 && selectedDIV<divs.length - 1) // fleche bas
	          	     {

	                       results.style.display='block';
	                       if(selectedDIV>-1) {divs[selectedDIV].style.background='';divs[selectedDIV].style.color=''}
	                       selectedDIV++;
	                       divs[selectedDIV].style.background='orange';
	                       divs[selectedDIV].style.color='black';
	          	     }
	          	     else if (e.keyCode==13 && selectedDIV>-1) 
	          	     { 
	                      search.value=divs[selectedDIV].innerHTML
	                      results.style.display='none';
	                      
	          	     }
	             });
	             
	             search.addEventListener('focus',function(e){
	             	var button=search.previousElementSibling;
	             	button.style.background='rgba(0,0,0,1)';

	             });
	              search.addEventListener('blur',function(e){
	             	var button=search.previousElementSibling;
	             	button.style.background='';
	             })

	             ////////////
	             document.addEventListener('click',function(e){
	             	 results.style.display='none';
	             });
       //affichage de tableau avec les bouttons
        function affichageTableau(){
		 var search=document.getElementById('search'),
	         suivant=document.getElementById('suivant'),
		     precedent=document.getElementById('precedent'),
		     dateFilter=document.getElementById('date-filter'),
		     userFilter=document.getElementById('user-filter'),
		     profilFilter=document.getElementById('profile-filter'),
		     searchButton=document.getElementById('search-box').firstElementChild,
		     adress,page=0,
		     tbody=document.getElementById('table-body'),
		     begin, //pour le boutton précédent on enregistre juste le debut de la page courante dans le bloc de suivant
		     xhr=new XMLHttpRequest();
             precedent.disabled=true; /////////************************////////////////
		     suivant.disabled=true;///////////************************////////////////
		     //precedent.disabled=true; //au debut precedent ne doit pas etre active il s'actie au premier click sur suivant
          
             if(!search.value)
             {
		          if(!dateFilter.value) adress='http://localhost/projet/get_users_names.php';
		          else adress='http://localhost/projet/get_users_names.php?only-date='+dateFilter.value;             
             }
             else
             {
               if(!dateFilter.value)
               {
               	  if(userFilter.checked) adress='http://localhost/projet/get_users_names.php?user-filter='+search.value;
               	  else adress='http://localhost/projet/get_users_names.php?profil-filter='+search.value;
               }
               else
               {
               	 if(userFilter.checked) adress='http://localhost/projet/get_users_names.php?user-filter='+search.value+'&date-filter='+dateFilter.value;
               	 else adress='http://localhost/projet/get_users_names.php?profil-filter='+search.value+'&date-filter='+dateFilter.value;
               }
             }

			 xhr.open('GET',adress);
			 xhr.send(null);
			 xhr.addEventListener('readystatechange',function(e)
			 {
				  if(xhr.readyState===4 && xhr.status===200)
				  { 	
				  	 if(document.getElementById('noresultdiv')) document.getElementById('noresultdiv').remove();
					  	if(xhr.responseText=='nothing')
					  	{
					  		tbody.innerHTML="";
					  		var tablediv=document.getElementById('table');
                            var noresultdiv=document.createElement('div');
					  		noresultdiv.innerHTML='Aucun resultat ne correspond aux Filtres/Termes de recherche spécifiés...<img src="croix.png" alt="cross">';
					  		noresultdiv.id='noresultdiv';
                            tablediv.appendChild(noresultdiv);
					  	}
					  	else
					  	{
					  		          
					  					var data=JSON.parse(xhr.responseText);
					                 	var dataLength=data.length;
					                 	if (dataLength>22) suivant.disabled=false;/////////////////***********************//////////////////
									  	var html="";
									  	for(var i=page; i<page+22 && i<dataLength ;i++)
									  	{
										  		html+="<tr>";
											  		 html+="<td class=\"modify-user\">"+data[i].user+"</td>";
											  		 html+="<td class=\"modify-password\">"+data[i].password+"</td>";
											  		 html+="<td class=\"modify-profile\">"+data[i].profile+"</td>";
											  		 html+="<td class=\"modify-date_inscription\">"+data[i].date_inscription+"</td>";
											  		 html+="<td class=\"modify-date_last_connexion\">"+data[i].date_last_connexion+"</td>";
											  		 html+="<td class=\"rubbish-bin\"><img src=\"delete.png\"></td>";
										  		html+="</tr>";
									  	}
									  	page=i;
									  	tbody.innerHTML=html;
                                        modifyTable();
												     suivant.addEventListener('mouseup',function () {
												     	
												           if(page<dataLength)
												           {
												                    precedent.disabled=false;/////////////////***************///////
												                    suivant.disabled=false;
												                    html="";
												                    begin=page;
														     	   	for(var i=page; i<page+22 && i<dataLength ;i++)
																  	{

																	  		html+="<tr>";
																		  		 html+="<td class=\"modify-user\">"+data[i].user+"</td>";
																		  		 html+="<td class=\"modify-password\">"+data[i].password+"</td>";
																		  		 html+="<td class=\"modify-profile\">"+data[i].profile+"</td>";
																		  		 html+="<td class=\"modify-date_inscription\">"+data[i].date_inscription+"</td>";
																		  		 html+="<td class=\"modify-date_last_connexion\">"+data[i].date_last_connexion+"</td>";
																		  		  html+="<td class=\"rubbish-bin\"><img src=\"delete.png\"></td>";
																	  		html+="</tr>";
																  	}
																  	page=i;
																  	tbody.innerHTML=html;
																  	modifyTable(); //pour pouvoire modifier la table
																  	if (page==dataLength)
																  	{
																  		suivant.disabled=true;
	
																  	} 
														  }
												     });

												    precedent.addEventListener('mouseup',function () {
												           if(page>22)
												           {
												           	        suivant.disabled=false;
												           	        precedent.disabled=false;
												                    html="";

														     	   	for(var i=begin-22; i<begin && i<dataLength ;i++)
																  	{

																	  		html+="<tr>";
																		  		 html+="<td class=\"modify-user\">"+data[i].user+"</td>";
																		  		 html+="<td class=\"modify-password\">"+data[i].password+"</td>";
																		  		 html+="<td class=\"modify-profile\">"+data[i].profile+"</td>";
																		  		 html+="<td class=\"modify-date_inscription\">"+data[i].date_inscription+"</td>";
																		  		 html+="<td class=\"modify-date_last_connexion\">"+data[i].date_last_connexion+"</td>";
																		  		  html+="<td class=\"rubbish-bin\"><img src=\"delete.png\"></td>";
																	  		html+="</tr>";
																  	}
																  	page=i;
																  	begin=begin-22;
																  	tbody.innerHTML=html;
																  	modifyTable(); //pour pouvoire modifier la table
																  	if (page<=22) {
																  		precedent.disabled=true;

																  	}
														  }
												     });
												    

						}

				  }
		     });
	    }
          
        
	    searchButton.addEventListener('mouseup',function () { ///********************ICI L'affichage démmare***************************///
	             	 affichageTableau();
                    
	                 });

	   //gerer la modification du tableau
	    function erreurDiv (argument) { /*boit de dialogue d'erreur dans le cas du nom d'utilisateur deja existant lors de ca modification sera utilisé dans modifytable*/
		     if(argument=="display")
		     {
		         var backgroundDiv=document.createElement('div');
		    	 var erreur=document.createElement('div');
		    	 var erreurOk=document.createElement('button');
		    	 backgroundDiv.id='backgroundDiv';
		    	 erreurOk.innerHTML='Continuer';
		    	 erreurOk.id='erreurOk';
	             erreur.className='erreur-interface';
	             erreur.innerHTML='ERREUR : Nom d\'utilisateur déja pris ou la valeur donnée est trop (petite/grande/vide) ou vous n\'avez pas le droit de modifier ce champ ... <img src="croix.png">';
	             erreur.appendChild(erreurOk);
	             backgroundDiv.appendChild(erreur);
	             var container=document.getElementById('users-container');
	             document.body.appendChild(backgroundDiv); 
	             return erreurOk;
		     }
		     else if(argument=="hide")
		     {
                var backgroundDiv=document.getElementById('backgroundDiv');
                if(backgroundDiv)
                {
                	backgroundDiv.remove();
                }
		     }
	    }

        function confirmDiv (argument,username) { 
		     if(argument=="display")
		     {
		         var backgroundDiv=document.createElement('div'),
		    	     confirm=document.createElement('div'),
		    	     confirmOk=document.createElement('button'),
		    	     annuler=document.createElement('button');
		    	 backgroundDiv.id='backgroundDiv';
		    	 confirmOk.innerHTML='Confirmer';
		    	 confirmOk.id='confirmOk';
		    	 annuler.innerHTML='Annuler'
		    	 annuler.id='annuler'
	             confirm.className='erreur-interface';
	             confirm.innerHTML='Supprmier <span style="color:#49C700;font-size: 1.1em;">'+username+'</span> définitivement ?' ;
	             confirm.appendChild(confirmOk);
	             confirm.appendChild(annuler);
	             backgroundDiv.appendChild(confirm);
	             var container=document.getElementById('users-container');
	             document.body.appendChild(backgroundDiv); 
                 return{
                    confirmOk:confirmOk,
                    annuler:annuler
                 };
		     }
		     else if(argument=="hide")
		     {
                var backgroundDiv=document.getElementById('backgroundDiv');
                if(backgroundDiv)
                {
                	backgroundDiv.remove();
                }
		     }
	    }
	    
	    function modifyTable () 
	    {
	    /*selectionner tous les colomnes*/
	         			var mdfUser=document.getElementsByClassName('modify-user'), mdflength=mdfUser.length,
					    mdfPwd=document.getElementsByClassName('modify-password'),
					    mdfProfile=document.getElementsByClassName('modify-profile');
					    rowDelete=document.getElementsByClassName('rubbish-bin');
					     /*pour chaque colomne ajouter un evenlistner sur le click*/
					    for(var i=0;i<mdflength;i++)
					    {
					    	/*gestion de la modification de la colomne d'utilisateur*/
					    	mdfUser[i].addEventListener('click',function (e) 
					    	{
							    		 /*quand je click je cree un input pour entrer les donneés*/
							    	    	var inputUser=document.createElement('input'),
							    	    	inputValue,oldValue;
							    	    	inputUser.type="text";
							    	    	inputUser.id="inputUser";
							    	    	inputUser.name="inputUser";
							    	    	if(e.target.firstChild.nodeName=="#text") 
							    	    	{
							    	    		oldValue=e.target.firstChild.textContent;
							    	    	    e.target.firstChild.remove();
							    	    	    e.target.style.border='3px dashed black';
							    	    	    e.target.appendChild(inputUser);
							    	    	}
							    	    /*quand je termine soit avec blur ou bien keycode==13 je prend la valeur entrer ou si rien n'a ete entrer je remet l'ancien valeur*/
							    	    	inputUser.addEventListener('blur',function (e1) 
							    	    	{
							    	    		     e.target.style.border=''; //remettre les bordures d'origine
				                                     inputValue=e1.target.value; //enregistrer la nouvelle valeur
				                                     e1.target.remove();  //enlever le input
				                                     if(inputValue.trim() && inputValue.length>=6 && inputValue.length<24 && oldValue!="behlouli" ) //si l'utilisateur a tapé qlq chause
				                                     {      
						                                var xhr=new XMLHttpRequest();
						                                xhr.open('GET','http://localhost/projet/get_users_names.php?inputValue='+encodeURIComponent(inputValue)+'&oldValue='+encodeURIComponent(oldValue));//envoi dees deux valeur la nouvelle et l'anciene la nouvelle pour verifier si il existe deja et l'ancienne pour savoir ou modifier dans la table
						                                xhr.send(null);
						                                xhr.addEventListener('readystatechange',function (e2) {
						                                	if(xhr.readyState===4 && xhr.status===200 )
						                                	{
						                                		if(xhr.responseText!="invalide") e.target.innerHTML=inputValue; //si c'est valid je modifie le contenu html pour afficher le changement
						                                		else 
						                                		{    //erreur doc remettre l'ancien valeur
						                                			  e.target.innerHTML=oldValue; 
						                                			  var erreurOk=erreurDiv("display"); //afficher le div d'erreur
                                                                      erreurOk.addEventListener('click',function ()  //clicker sur continuer
                                                                      {
                                                                      	   erreurDiv("hide"); //fait disparaitre le div d'erreur
                                                                      });
						                                		}
						                                			      
						                                	}
						                                });
				                                     }
				                                     else
				                                     {
				                                     	var erreurOk=erreurDiv("display");
				                                     	erreurOk.addEventListener('click',function ()  //clicker sur continuer
                                                        {
                                                           erreurDiv("hide"); //fait disparaitre le div d'erreur
                                                        });
				                                     	e.target.innerHTML=oldValue;
				                                     }  
				                                     	
							    	    	});	
							    	        inputUser.addEventListener('keyup',function (e1)  //click entré
							    	        {
                                                
							    	        	if(e1.keyCode==13)
							    	        	{ 									    	        	
				                                     if(inputValue)
				                                     {      
						                                e.target.innerHTML=inputValue;
				                                     }
				                                     else
				                                     {
				                                        e.target.innerHTML=oldValue;
				                                     }
							    	        	}
							    	        
							    	    	});	 
							    	    	document.addEventListener('keyup',function (e2)    // click échape la c'est sur document pour plus de fluidité
							    	    	{
							    	    		if(e2.keyCode==27)
							    	        	{
								    	        	 e.target.innerHTML=oldValue;
	                                          		 e.target.style.border='';
							    	        	}
							    	    	})    
					    	});


					    	/*gestion de la modification de la colomne de MOT DE PASSE*/
					        mdfPwd[i].addEventListener('click',function (e) 
					    	{
							    		 /*quand je click je cree un input pour entrer les donneés*/
							    	    	var inputUser=document.createElement('input'),
							    	    	inputValue,oldValue,userValue=e.target.previousElementSibling.firstChild.textContent;
							    	    	inputUser.type="text";
							    	    	inputUser.id="inputUser";
							    	    	inputUser.name="inputUser";
							    	    	if(e.target.firstChild) 
							    	    	{
							    	    		oldValue=e.target.firstChild.textContent;
							    	    	    e.target.firstChild.remove();
							    	    	    e.target.style.border='3px dashed black';
							    	    	    e.target.appendChild(inputUser);
							    	    	}
							    	    /*quand je termine soit avec blur ou bien keycode==13 je prend la valeur entrer ou si rien n'a ete entrer je remet l'ancien valeur*/
							    	    	inputUser.addEventListener('blur',function (e1) {
							    	    		     e.target.style.border=''; //remettre les bordures d'origine
				                                     inputValue=e1.target.value; //enregistrer la nouvelle valeur
				                                     e1.target.remove();  //enlever le input
				                                     if(inputValue.trim() && inputValue.length>7 && inputValue.length<24 && userValue!="behlouli") //si l'utilisateur a tapé qlq chause
				                                     {      
						                                var xhr=new XMLHttpRequest();
						                                xhr.open('GET','http://localhost/projet/get_users_names.php?inputValue='+encodeURIComponent(inputValue)+'&userValue='+encodeURIComponent(userValue));//envoi dees deux valeur la nouvelle et l'anciene la nouvelle pour verifier si il existe deja et l'ancienne pour savoir ou modifier dans la table
						                                xhr.send(null);
						                                xhr.addEventListener('readystatechange',function (e2) {
						                                	if(xhr.readyState===4 && xhr.status===200 )
						                                	{
						                                		e.target.innerHTML=inputValue; //si c'est valid je modifie le contenu html pour afficher le changement			      
						                                	}
						                                });
				                                     }
				                                     else 
				                                     {
				                                     	             //erreur doc remettre l'ancien valeur
						                                			   
						                                			  var erreurOk=erreurDiv("display"); //afficher le div d'erreur
                                                                      erreurOk.addEventListener('click',function ()  //clicker sur continuer
                                                                      {
                                                                      	   erreurDiv("hide"); //fait disparaitre le div d'erreur
                                                                      });
                                                                      e.target.innerHTML=oldValue;
				                                     }
							    	    	});	
							    	        inputUser.addEventListener('keyup',function (e1) {
							    	        	if(e1.keyCode==13)
							    	        	{
				                                     if(inputValue)
				                                     {      
						                                e.target.innerHTML=inputValue;
				                                     }
				                                     else
				                                     {
				                                        e.target.innerHTML=oldValue;
				                                     }
							    	        	}
							    	    	});	
							    	     document.addEventListener('keyup',function (e3) 
                                          {
                                          	if(e3.keyCode==27)
                                          	{
                                          		 e.target.innerHTML=oldValue;
                                          		 e.target.style.border='';
                                          	}
                                          });   	        
					    	});

					    	/*gestion de la modification de profile*/
                            mdfProfile[i].addEventListener('click',function (e) 
					    	{ 
					    		 var newValue=e.target.textContent; //new et old value au meme temp
						    	 if(e.target.firstChild.nodeName=="#text")
						    	 {       var userValue=e.target.parentNode.firstChild.textContent;
						    	 	     /*enlever le text node courant*/
						    	 	     e.target.firstChild.remove();
							    		/*creation du select*/
							    		var select=document.createElement('select'),
							    		    array=[], optgroup1=document.createElement('optgroup'),
							    		    optgroup2=document.createElement('optgroup');
		 	                                for(var i=0;i<12;i++)
		 	                                {
		                                       array.push(document.createElement('option'));
		 	                                }
		                                   select.id="mdfProfile";
                                          array[0].value="none"; array[0].innerHTML="Selectionner le profil";
			                              array[1].value="Administrateur"; array[1].innerHTML="Administrateur";
			                              array[2].value="Directeur"; array[2].innerHTML="Directeur";
			                              array[3].value="Branche"; array[3].innerHTML="Branche";
			                              array[4].value="D.Alger"; array[4].innerHTML="D.Alger";
			                              array[5].value="D.Bejai"; array[5].innerHTML="D.Bejai";
			                              array[6].value="D.Oran"; array[6].innerHTML="D.Oran";
			                              array[7].value="D.Constantine"; array[7].innerHTML="D.Constantine";
			                              array[8].value="D.Telemcen"; array[8].innerHTML="D.Telemcen";
			                              array[9].value="D.Bordj bou arreridj"; array[9].innerHTML="D.Bordj bou arreridj";
			                              array[10].value="D.Batna"; array[10].innerHTML="D.Batna";
			                              array[11].value="D.Béchar"; array[11].innerHTML="D.Béchar";
			            
			                              optgroup1.label="BRANCHE"; optgroup2.label="DISTRICT";
                                         select.appendChild(array[0]);select.appendChild(optgroup1); select.appendChild(optgroup2);
			                              optgroup1.appendChild(array[1]);optgroup1.appendChild(array[2]);optgroup1.appendChild(array[3]);
		                                  optgroup2.appendChild(array[4]);optgroup2.appendChild(array[5]);optgroup2.appendChild(array[6]);optgroup2.appendChild(array[7]);optgroup2.appendChild(array[8]);optgroup2.appendChild(array[9]);optgroup2.appendChild(array[10]);optgroup2.appendChild(array[11]);
                                         /* ajout du select dans la case */
		                                  e.target.appendChild(select);
                                          
                                         /*a chaque change modifier la base de donnés*/ 
		                                  select.addEventListener('change',function () 
		                                  {
                                             if(userValue!="behlouli")
                                             {
			                                  	 var xhr=new XMLHttpRequest();
			                                  	 xhr.open('GET','http://localhost/projet/get_users_names.php?mdfProfile='+encodeURIComponent(select.options[select.selectedIndex].innerHTML)+'&userValue='+encodeURIComponent(userValue));
			                                  	 xhr.send(null);
			                                  	 xhr.addEventListener('readystatechange',function ()
			                                  	 {
			                                  	 	      if(xhr.readyState===4 && xhr.status===200)
			                                  	 	      {
	                                                            newValue=select.options[select.selectedIndex].textContent;
	                                                            select.remove();
	                                                            e.target.innerHTML=newValue;
			                                  	 	      }
			                                  	 });
			                                 }
			                                 else
			                                 {
                                                   var erreurOk=erreurDiv("display"); //afficher le div d'erreur
                                                   erreurOk.addEventListener('click',function ()  //clicker sur continuer
                                                   {
                                                     erreurDiv("hide"); //fait disparaitre le div d'erreur
                                                   });
                                                    e.target.innerHTML=newValue;

			                                 }

		                                  });
		                                  select.addEventListener('blur',function () 
		                                  {
		                                  	  e.target.innerHTML=newValue;
		                                  });
                                          document.addEventListener('keyup',function (e3) 
                                          {
                                          	if(e3.keyCode==27)
                                          	{
                                          		e.target.innerHTML=newValue;
                                          	}
                                          });
                                    
	                              }


					    	});
                            /*gestion de la suppression d'utilisateur*/
                           rowDelete[i].addEventListener('click',function (e) {
		                           	var confirm,deleteValue; //deletValue c'est le nom d'utilisateur a supprimer et confirm va contenir le retunr de notre méthode  confirmDiv donc deux boutton un pour confirmation et l'autre refus
		                           	/*soit il vont cliker sur l'icone ou bien sur la colomne selon le cas afficher le message*/
		                           	if(e.target.parentNode.nodeName != 'TD') 
		                           	{  
		                           		deleteValue=e.target.parentNode.firstChild.innerHTML;
		                           		confirm=confirmDiv('display',deleteValue); 

		                           	}
		                            else
		                            { 
		                            	deleteValue=(e.target.parentNode).parentNode.firstChild.innerHTML;
		                            	confirm = confirmDiv('display',deleteValue);
		                            }
		                            /**/
		                            confirm.confirmOk.addEventListener('click',function () {
		                            	//ici supprimer l'utilisateur et restaurer
                                        var xhr=new XMLHttpRequest();
                                        xhr.open('GET','http://localhost/projet/get_users_names.php?deleteValue='+encodeURIComponent(deleteValue));
                                        xhr.send(null);
                                        xhr.addEventListener('readystatechange',function () {
                                        	if(xhr.readyState===4 && xhr.status===200)
                                        	{
                                        		if(xhr.responseText!="impossible")
                                        		{
		                                              document.getElementById('countUser').innerHTML=xhr.responseText;
		                                              confirmDiv('hide');
		                                              affichageTableau();
                                        		}
                                        		else alert("IMPOSSIBLE DE SUPPRMIER CE COMPTE ! c'est le compte du directeur ou celui de votre session actuel ");

                                        	}
                                        });
		                            	
		                            });
		                            confirm.annuler.addEventListener('click',function () {
		                            	//ici restaurer l'affichage son suppréssion 
		                            	confirmDiv('hide');
		                            });
                             
                           });
                              

					    }
	    }   


	})();

</script>
</body>
</html>