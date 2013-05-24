<?php 

	if($_GET['type']){
	
	$type = $_GET['type'];
		
		include("connexion.php");
		
		
		
		
		
		if (strcmp($type,"autres")==0){
		$req = $bdd->query("SELECT * 
							FROM objet
							WHERE statut = 'trouve' 
							AND idAutres IS NOT NULL ");
		//print_r($donnees);
			?>
			<table>
				<tr> 
					<th> LIBELLE</th>
					<th> MARQUE</th>
					<th> MODELE</th>
					<th> COULEUR</th>
					<th> LIEU RAMASSAGE</th>
					<th> DATE RAMASSAGE</th>
					<th> DETAILS</th>
				</tr>
				<?php
			while($donnees = $req->fetch()){
			
				$idAutres=$donnees['idAutres'];
				$req2 = $bdd->query("SELECT * 
							FROM autres
							WHERE idAutres = '$idAutres' ");
				$data = $req2-> fetch();
			?>
			
				
				<tr> 
					<td><?php echo $donnees['libelle']; ?></td>
					<td><?php echo $data['marque']; ?></td>
					<td><?php echo $data['modele']; ?></td>
					<td><?php echo $data['couleur']; ?></td>
					<td><?php echo $donnees['lieuRamassage']; ?></td>
					<td><?php echo $donnees['dateRamassage']; ?></td>
					<td><a href="details_objet.php?details=<?php echo $donnees['idObjet']; ?>"> voir </a></td>
					
				</tr>
			
			<?php 
			}
			?>
		</table>			
		<?php
		}
		else{
		$req = $bdd->query("SELECT * 
							FROM objet
							WHERE statut = 'trouve' 
							AND idPiece IS NOT NULL ");
			
		?>	<table>
				<tr> 
					<th> LIBELLE</th>
					<th> NUMERO</th>
					<th> PRENOM TITULAIRE</th>
					<th> NOM TITULAIRE</th>
					<th> LIEU RAMASSAGE</th>
					<th> DATE RAMASSAGE</th>
					<th> DETAILS</th>
				</tr>
		<?php
			while($donnees = $req->fetch()){
			
				$idPiece=$donnees['idPiece'];
				$req2 = $bdd->query("SELECT * 
							FROM piece
							WHERE idPiece = '$idPiece' ");
				$data = $req2-> fetch();
		?>
			
				
				<tr> 
					<td><?php echo $donnees['libelle']; ?></td>
					<td><?php echo $data['numeroPiece']; ?></td>
					<td><?php echo $data['prenomTitulaire']; ?></td>
					<td><?php echo $data['nomTitulaire']; ?></td>
					<td><?php echo $donnees['lieuRamassage']; ?></td>
					<td><?php echo $donnees['dateRamassage']; ?></td>
					<td><a href="details_objet.php?details=<?php echo $donnees['idObjet']; ?>"> voir </a></td>
					
				</tr>
			
		<?php 
			}
		?>
		</table>			
		<?php }
	}
	?>
		