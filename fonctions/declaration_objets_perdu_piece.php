
<?php
	
	if(isset($_POST['valider'])){
	
		
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$numeroPiece = $_POST['numeroPiece'];
		$nomTitulaire = $_POST['nomTitulaire'];
		$prenomTitulaire = $_POST['prenomTitulaire'];
		
					if (!empty($numeroPiece)){
									include_once("../fonctions/connexion_bd.php");
									$req= $bdd->prepare("INSERT INTO piece(numeroPiece, nomTitulaire, prenomTitulaire) VALUES(:numeroPiece, :nomTitulaire, :prenomTitulaire");
									$req->execute(array('numeroPiece'=>$numeroPiece,'nomTitulaire'=>$nomTitulaire,'prenomTitulaire'=>$prenomTitulaire));
									$idPiece = $bdd->lastInsertId();
									$req->closeCursor();
									
									$req= $bdd->prepare("INSERT INTO personne(nom, prenom, telephone, email) VALUES(:nom, :prenom, :telephone, :email)");
									$req->execute(array('nom'=>$nom,'prenom'=>$prenom,'telephone'=>$telephone,'email'=>$email));
									$idProprietaire= $bdd->lastInsertId();
									$req->closeCursor();
									
									$req= $bdd->prepare("INSERT INTO objet(libelle, details, statut, lieuPerte, datePerte, idProprietaire, dateDeclaration,idPiece,archive) 
														VALUES(:libelle, :details, :statut, :lieuPerte,:datePerte, idProprietaire, NOW(), :idPiece, :archive)");
									$req->execute(array('libelle'=>$libelle,'details'=>$details,'statut'=>$statut,'lieuPerte'=>$lieuPerte,'idProprietaire'=>$idProprietaire, 'idPiece'=>$idPiece, 'archive'=>"non"));
									$req->closeCursor();
									
									$code="Votre Déclaration a été prise en compte !";
									
									
									header("Location:../administrator.php?type=".$type);
								
									
							}
							else 
							{
								include_once("../fonctions/connexion_bd.php");
									$req= $bdd->prepare("INSERT INTO piece(nomTitulaire, prenomTitulaire) VALUES(:nomTitulaire, :prenomTitulaire");
									$req->execute(array('numeroPiece'=>$numeroPiece,'nomTitulaire'=>$nomTitulaire,'prenomTitulaire'=>$prenomTitulaire));
									$idPiece = $bdd->lastInsertId();
									$req->closeCursor();
									
									$req= $bdd->prepare("INSERT INTO personne(nom, prenom, telephone, email) VALUES(:nom, :prenom, :telephone, :email)");
									$req->execute(array('nom'=>$nom,'prenom'=>$prenom,'telephone'=>$telephone,'email'=>$email));
									$idProprietaire= $bdd->lastInsertId();
									$req->closeCursor();
									
									$req= $bdd->prepare("INSERT INTO objet(libelle, details, statut, lieuPerte, datePerte, idProprietaire, dateDeclaration,idPiece,archive) 
														VALUES(:libelle, :details, :statut, :lieuPerte,:datePerte, idProprietaire, NOW(), :idPiece, :archive)");
									$req->execute(array('libelle'=>$libelle,'details'=>$details,'statut'=>$statut,'lieuPerte'=>$lieuPerte,'idProprietaire'=>$idProprietaire, 'idPiece'=>$idPiece, 'archive'=>"non"));
									$req->closeCursor();
									$code="Votre Déclaration a été prise en compte !";
							}
					}
			
			
	
	
	else echo "failed";
	
	

?>
