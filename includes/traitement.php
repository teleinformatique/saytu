<?php
	
	if(isset($_POST['connexion']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		if($email&&$password)
		{
			include_once("./connexion.php");
			
			$req= $bdd->query("SELECT *
							FROM personne 
							WHERE email='$email'
							AND password='$password'");
			
			$donnees = $req->fetch();
			if(!empty($donnees)){
				
					session_start();
					$_SESSION['id']=$donnees->id;
					
					$_SESSION['login'] = $donnees['email'];
					$_SESSION['nom']= $donnees['nom'];
					$_SESSION['prenom']= $donnees['prenom'];
			
					header('Location:../pages/index.php');
			
			
			}
			else
				  
				 header('Location:../pages/connexionForm.php?auth=0');
			
		}
		  
   }
?>