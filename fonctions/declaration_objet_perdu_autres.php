
<?php
	
	if(isset($_POST['valider'])){
	
			
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$marque = $_POST['marque'];
		$modele = $_POST['modele'];
		$couleur = $_POST['couleur'];
	
				
		
			if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
			{
					// Testons si la photo n'est pas trop gros
					if ($_FILES['photo']['size'] <= 1024000 )
					{
							// Testons si l'extension est autorisée
							$infosphoto = pathinfo($_FILES['photo']['name']);
							$extension_upload = $infosphoto['extension'];
							$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
							if (in_array($extension_upload, $extensions_autorisees))
							{
									// On peut valider le photo et le stocker finitivement
									//move_uploaded_file($_FILES['monphoto']['tmp_name'], 'uploads/' . basename($_FILES['monphoto']['name']));
									
									echo $_FILES['photo']['name'] ;
									move_uploaded_file($_FILES['photo']['tmp_name'],"../media/imgObjet/".$_FILES['photo']['name']);
									echo "L'envoi a bien été effectué !";
									$photo = "media/imgObjet/".$_FILES['photo']['name'];
									
									echo $photo;
									
									//connection a la base de données
										
									include_once("../fonctions/connexion_bd.php");
									$req= $bdd->prepare("INSERT INTO autres(photo, marque, modele, couleur) VALUES(:photo, :marque, :modele, :couleur)");
									$req->execute(array('photo'=>$photo,'marque'=>$marque,'modele'=>$modele,'couleur'=>$couleur));
									$idAutres = $bdd->lastInsertId();
									$req->closeCursor();
									$req= $bdd->prepare("INSERT INTO personne(nom, prenom, telephone, email) VALUES(:nom, :prenom, :telephone, :email)");
									$req->execute(array('nom'=>$nom,'prenom'=>$prenom,'telephone'=>$telephone,'email'=>$email));
									$idProprietaire = $bdd->lastInsertId();
									$req->closeCursor();
									
									$req= $bdd->prepare("INSERT INTO objet(libelle, details, statut, lieuPerte, datePerte, idProprietaire, dateDeclaration,idAutres,archive) 
														VALUES(:libelle, :details, :statut, :lieuPerte,:datePerte, idProprietaire, NOW(), :idAutres, :archive)");
									$req->execute(array('libelle'=>$libelle,'details'=>$details,'statut'=>$statut,'lieuPerte'=>$lieuPerte,'idProprietaire'=>$idProprietaire, 'idAutres'=>$idAutres, 'archive'=>"non"));
									$req->closeCursor();
									$code="Votre Déclaration a été prise en compte !";
									
									
									
									
									header("Location:../administrator.php?type=".$type);
								
									
							}
					}
			}
			
	}
	
	else echo "failed";
	
	

?>
