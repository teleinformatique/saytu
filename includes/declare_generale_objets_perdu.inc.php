<html>
    <head>
		<script type="text/javascript">
			function montrer(element){
				var les_elements = new Array("pieces","autres");
				
				for(var i=0; i<les_elements.length;i++)
					document.getElementById(les_elements[i]).style.display = 'none';
					document.getElementById(element).style.display = 'block';
				
			}
		</script>
	
    </head>
    <body>
		<li><a href="javascript:montrer('pieces')">Déclaration de Pièces</a></li>
		<li><a href="javascript:montrer('autres')">Déclaration d'autres objets</a></li>
    <form id="autres" method="post" action="../fonctions/declaration_objet_perdu_autres.php" enctype="multipart/form-data" style="display:none">
	<fieldset>
     <fieldset class="CIN" >
       <legend>Déclaration de Perte d'autres objets</legend>
		  <input type="file" name="photo" placeholder="photo" /><br>
		  <input type="text" name="marque"    placeholder="marque"  /><br>
		  <input type="text" name="modele"    placeholder="modele" /> <br>
		  <input type="text" name="couleur" placeholder="couleur" /> </p>   
	 </fieldset>
			
	  <fieldset class="personne" >
       <legend>Mes Contacts</legend>
		  
		  <input type="text" name="nom"    placeholder="nom"  /><br>
		  <input type="text" name="prenom"    placeholder="prenom" /> <br>
		  <input type="tel" name="telephone" placeholder="telephone" /><br>
		  <input type="email" name="email" placeholder="emails" /><br>
		  
	  </fieldset>
	  <input type="hidden" />
		  <input class="clik" type="submit" name="valider" placeholder="valider" />
		  <input class="clik" type="reset" name="effacer" placeholder="Réinitialiser"/>
	 </fieldset>
	  
	   
    </form>
	
	<form id="pieces" method="post" action="../fonctions/declaration_objets_perdu_piece.php" enctype="multipart/form-data">
	<fieldset>
     <fieldset class="CIN" >
       <legend>Déclaration de Perte piéces</legend>
		  <input type="file" name="photo" placeholder="photo" /><br>
		  <input type="text" name="marque"    placeholder="marque"  /><br>
		  <input type="text" name="modele"    placeholder="modele" /> <br>
		  <input type="text" name="couleur" placeholder="couleur" /> </p>   
	 </fieldset>
			
	  <fieldset class="personne" >
       <legend>Mes Contacts</legend>
		  
		  <input type="text" name="nom"    placeholder="nom"  /><br>
		  <input type="text" name="prenom"    placeholder="prenom" /> <br>
		  <input type="tel" name="telephone" placeholder="telephone" /><br>
		  <input type="email" name="email" placeholder="emails" /><br>
		  
	  </fieldset>
	  <input type="hidden" />
		  <input class="clik" type="submit" name="valider" placeholder="valider" />
		  <input class="clik" type="reset" name="effacer" placeholder="Réinitialiser"/>
	 </fieldset>
	  
	   
    </form>
     
    
    </body>
    

</html>

	<title>test</title>
