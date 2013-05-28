<head><link rel="stylesheet" type="text/css" href="../includes/menu.css" />
</head>

	<?php	
	include '../includes/header.php';
	
?>	
	<fieldset id='connexionFieldset'>
		<form action='../fonctions/traitement.php' method='POST'>
		<div align='center'>
			<p><input type='email' class='input' name='email' placeholder='Donnez votre@dress.email' size="40" required/></p>
			<p><input type='password' class='input' name='password' placeholder='MOT DE PASSE' size='40' required/></p>
			<p>
				<!--input type='reset' name='reset'/-->
				<input type='submit' name='connexion' value="Se connecter" required/>
			</p>
			
			
		
		</form>
		</div>
		<?php
			if(isset($_GET['auth'])){
			
				echo "<div id='connexionImpossible'>* Email ou password incorrect ! </div>";
			
			}
	?>
	</fieldset>
	
	