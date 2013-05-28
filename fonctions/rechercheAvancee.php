<?php

				/*
				*@description: La recherche avancée
				*@author : Sur'Einstein
				*
				*/
		if(isset($_POST['chercherPiece'])){
				
			
			
			
<<<<<<< HEAD
			
			
			/*$tab=explode(' ',$details);
			
=======
>>>>>>> 314e513651ab0df076ea16c7aa256855edeef642
			$statut=	($_POST['statut']);
			$lieuRamassage=	($_POST['lieuRamassage']);
			$lieuPerte=	($_POST['lieuPerte']);
			$dateRamassage=	($_POST['dateRamassage']);
			$dateDeclaration=	($_POST['dateDeclaration']);
			$idProprietaire=	($_POST['idProprietaire']);
			$idRamasseur=	($_POST['idRamasseur']);
			$photo=	($_POST['photo']);
			$archive=	($_POST['archive']);
<<<<<<< HEAD
			$tag=	($_POST['tag']);*/
			
			//print_r($_POST);
				//$numeroPiece=	($_POST['numeroPiece']);
				$nomTitulaire=	($_POST['nomTitulaire']);
				
				$prenomTitulaire=	($_POST['prenomTitulaire']);
				$dateNaissance=	($_POST['dateNaissance']);
=======
			$tag=	($_POST['tag']);
			
			$tab=explode(' ',$details);
			
			
			
			//print_r($_POST);
				$numeroPiece=	($_POST['numeroPiece']);
				$nomTitulaire=	($_POST['nomTitulaire']);
				/*$lieuPerte=	($_POST['lieuPerte']);
				$datePerte=	($_POST['datePerte']);
				$details=	($_POST['details']);*/
				$prenomTitulaire=	($_POST['prenomTitulaire']);
				
>>>>>>> 314e513651ab0df076ea16c7aa256855edeef642
				require_once("./connexion.php");
					$req = $bdd->query("SELECT *
										FROM piece 
										WHERE nomTitulaire='$nomTitulaire' 
										OR prenomTitulaire='$prenomTitulaire'
<<<<<<< HEAD
										OR dateNaissance='$dateNaissance'");
=======
										OR numeroPiece='$numeroPiece'");
>>>>>>> 314e513651ab0df076ea16c7aa256855edeef642
					$data=$req->fetch();
					echo "<br>";
					//print_r($data['idPiece']);
					echo "<br>";
					//print_r($data);
					$idPiece=$data['idPiece'];
					$reg = $bdd->query("SELECT *
										FROM objet 
										WHERE idPiece='$idPiece'");
					if($donnee=$reg->fetch())
					{
						$id=$donnee['idObjet'];
	?>					
<<<<<<< HEAD
						<a href="details.php?id='<?php echo $id; ?>'"> <?php echo "".$data['nomTitulaire']." ".$data['prenomTitulaire']; ?> </a> 
=======
						<a href="details_objet.php?id='<?php echo $id; ?>'"> <?php echo "".$data['nomTitulaire']." ".$data['prenomTitulaire']; ?> </a> 
>>>>>>> 314e513651ab0df076ea16c7aa256855edeef642
	<?php
					}
					else
						
						echo "No result Found";
				}
			
		
		
		
				/*
				*commentaire : nous sommes dans le cas de "Autres" By Sur'Einstein
				*
				*/
		if(isset($_POST['chercherPiece'])){
				$marque =	($_POST['marque']);
				
				$modele =	($_POST['modele']);
				$couleur =	($_POST['couleur']);
				require_once("./connexion.php");
					$req = $bdd->query("SELECT *
										FROM autres 
										WHERE modele = '$modele' 
										OR marque = '$marque'
										OR couleur = '$couleur'");
					$data=$req->fetch();
					echo "<br>";
					$path = $data['photo'];
					//print_r($data['idPiece']);
					echo "<br>";
					//print_r($data);
					$idAutres=$data['idAutres'];
					$reg = $bdd->query("SELECT *
										FROM objet 
										WHERE idAutres='$idAutres'");
					if($donnee=$reg->fetch())
					{
						$id=$donnee['idObjet'];
						echo "<img src=".$path."/>";
	?>					
						<a href="details.php?id='<?php echo $id; ?>'"> <?php echo "".$data['modele']." ".$data['marque']; ?> </a> 
	<?php
					}
					else
						
						echo "No result Found";
				}			
	
	?>