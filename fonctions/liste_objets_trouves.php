<?php
	include "../includes/header.php";
	require_once "../includes/connexion.php";
	
	$req = $bdd->query("SELECT * 
							FROM objet
							WHERE statut = 'recherche' ");
							
	?>
			<table>
				<tr> 
					<th> LIBELLE</th>
					<th> CATEGORIE</th>
					<th> LIEU RAMASSAGE</th>
					<th> DATE RAMASSAGE</th>
					<th> VOIR FICHE</th>
				</tr>
			<?php
			while($donnees = $req->fetch()){
			
				$idAutres=$donnees['idAutres'];
				$idPiece=$donnees['idPiece'];
				if (isset($idAutres)){
				
					$req2 = $bdd->query("SELECT * 
										FROM autres
										WHERE idAutres = '$idAutres' ");
				$data = $req2-> fetch();
			?>
			<tr> 
					<td><?php echo $donnees['libelle']; ?></td>
					<td>AUTRES</td>
					<td><?php echo $donnees['lieuRamassage']; ?></td>
					<td><?php echo $donnees['dateRamassage']; ?></td>
					<td><a href="details_objet.php?details=<?php echo $donnees['idObjet']; ?>"> voir </a></td>
					
				</tr>
			
			<?php 
			}
			else if(isset($idPiece)){
				$req2 = $bdd->query("SELECT * 
							FROM piece
							WHERE idPiece = '$idPiece' ");
				$data = $req2-> fetch();
		?>
			
				
				<tr> 
					<td><?php echo $donnees['libelle']; ?></td>
					<td>PIECE</td>
					<td><?php echo $donnees['lieuRamassage']; ?></td>
					<td><?php echo $donnees['dateRamassage']; ?></td>
					<td><a href="details_objet.php?details=<?php echo $donnees['idObjet']; ?>"> voir </a></td>
					
				</tr>
			
		<?php 
			}
		?>
		
			<?php
			}
			?>
			</table>
			