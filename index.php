
<html>
    <head>
        <title>Saytu - Je cherche, J'ai trouvé</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/accueil.css" />
    </head>
    <body>
        <?php
            include 'includes/header.php';            
            include 'includes/search.php';
       ?>
        
        <form id="pieces" method="post" action="declare_pieces_perdus.php" enctype="multipart/form-data">
            
          <fieldset class="CIN">
              <h3 align='center'>Je cherche</h3>
		  <p> <select>
					<option name='piece'>Une pièce administrative</option>
					<option name='piece'>Autres</option>
				</select>
		</p>
		  <p><input type="text" name="numeroPiece" placeholder="Numero de la Pièce" required/></p>
		  <p><input type="text" name="nomTitulaire"    placeholder="Nom du Titulaire"  required/></p>
		  <p><input type="text" name="prenomTitulaire"    placeholder="Prénom du Titulaire" required /></p>
                  <p><input type="text" name="lieuPerte"    placeholder="Lieu de perte" required /></p>
                  <p><input type="hidden" value="perdu" name="statut" /></p>
		  <p><input type="date" name="datePerte"  /></p>
                  <p><textarea name="details" placeholder="Un peu plus de détails"></textarea></p>
		  
		  <p><input class="clik" type="submit" name="valider" value="valider" />
                    <input class="clik" type="reset" name="effacer" value="Réinitialiser"/></p>
	  </fieldset>
        </form>
        <form id="pieces" method="post" action="declare_objet_perdu.php" enctype="multipart/form-data">
           
            <fieldset class="CIN1">
                     <h3 align='center'>J'ai ramassé</h3>
		  <p> <select>
					<option name='piece'>Une pièce administrative</option>
					<option name='piece'>Autres</option>
				</select>
		</p>
		  <p><input type="text" name="numeroPiece" placeholder="Numero de la Pièce" required/></p>
		  <p><input type="text" name="nomTitulaire"    placeholder="Nom du Titulaire"  required/></p>
		  <p><input type="text" name="prenomTitulaire"    placeholder="Prénom du Titulaire" required /></p>
                  <p><input type="text" name="lieuPerte"    placeholder="Lieu de perte" required /></p>
                  <p><input type="hidden" value="perdu" name="statut" /></p>
		  <p><input type="date" name="datePerte"  /></p>
                  <p><textarea name="details" placeholder="Un peu plus de détails"></textarea></p>
		  
		  <p><input class="clik" type="submit" name="valider" value="valider" />
                    <input class="clik" type="reset" name="effacer" value="Réinitialiser"/></p>
	  </fieldset>
	</form>
        <br><br>
	
	<?php include 'footer.php';?>
	
    </body>
</html>
