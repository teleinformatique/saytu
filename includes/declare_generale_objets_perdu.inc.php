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
	<?php
		include "header.php";
	?>
		<li><a href="javascript:montrer('pieces')">Déclaration de Pièces</a></li>
		<li><a href="javascript:montrer('autres')">Déclaration d'autres objets</a></li>
    <form id="pieces" method="post" action="../fonctions/declaration_objets_perdu_piece.php" enctype="multipart/form-data" style="display:none">
	<fieldset>
     <fieldset class="CIN" >
       <legend>Déclaration de Perte piéces</legend>
		  
		  <p><input type="text" name="numeroPiece"    placeholder="Numero de la Pièce"  /></p>
		  <p><input type="text" name="nomTitulaire"    placeholder="Nom Titulaire" /> </p>
		  <p><input type="text" name="prenomTitulaire" placeholder="Prénom Titulaire" /> </p>   
	 </fieldset>
			
	  <fieldset class="personne" >
       <legend>Mes Contacts</legend>
		  
		  <p><input type="text" name="nom"    placeholder="nom"  /></p>
		  <p><input type="text" name="prenom"    placeholder="prenom" /> </p>
		  <p><input type="tel" name="telephone" placeholder="telephone" /></p>
		  <p><input type="email" name="email" placeholder="emails" /></p>
		  
	  </fieldset>
	  <input type="hidden" />
			<p>
			  <input class="clik" type="submit" name="valider" placeholder="valider" />
			  <input class="clik" type="reset" name="effacer" placeholder="Réinitialiser"/>
			</p>
	 </fieldset>
	  
	   
    </form>
	
	<form id="autres" method="post" action="../fonctions/declaration_objet_perdu_autres.php" enctype="multipart/form-data">
	<fieldset>
     <fieldset class="CIN" >
       <legend>Déclaration de Perte d'autres objets</legend>
		  
		  <p><input type="text" name="marque"    placeholder="marque"  /></p>
		  <p><input type="text" name="modele"    placeholder="modele" /> </p>
		  <p><input type="text" name="couleur" placeholder="couleur" /> </p>   
		  <p><input type="file" name="photo" placeholder="photo" /></p>
	 </fieldset>
			
	  <fieldset class="personne" >
       <legend>Mes Contacts</legend>
		  
		  <p><input type="text" name="nom"    placeholder="nom"  /></p>
		  <p><input type="text" name="prenom"    placeholder="prenom" /> </p>
		  <p><input type="tel" name="telephone" placeholder="telephone" /></p>
		  <p><input type="email" name="email" placeholder="emails" /></p>
		  
	  </fieldset>
	  <input type="hidden" />
			<p>
			  <input class="clik" type="submit" name="valider" placeholder="valider" />
			  <input class="clik" type="reset" name="effacer" placeholder="Réinitialiser"/>
			</p>
	 </fieldset>
	  
	   
    </form>
     
    
    </body>
    

</html>

	<title>test</title>
