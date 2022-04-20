<?php
	include 'C:/xampp/htdocs/ahmed web/Controller/CommandeC.php';
	$CommandeC=new CommandeC();
	$listeCommande=$CommandeC->AfficherCommande(); 
?>
<html>
	<head></head>
	<body>
	
	    <button><a href="AjouterCommande.php">Ajouter une Commande</a></button>
		<center><h1>Liste des Commandes</h1></center>
		<table border="1" align="center">
			<tr>
				<th>IdCommande</th>
				<th>NomClient</th>
				<th>PrenomClient</th>
				<th>TypeProduit</th>
				<th>PrixDate</th>
				<th>date</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeCommande as $Commande){
			?>
			<tr> 
				<td><?php echo $Commande['IdCommande']; ?></td>
				<td><?php echo $Commande['NomClient']; ?></td>
				<td><?php echo $Commande['PrenomClient']; ?></td>
				<td><?php echo $Commande['TypeProduit']; ?></td>
				<td><?php echo $Commande['PrixProduit']; ?></td>
				<td><?php echo $Commande['date']; ?></td>
				<td>
					<form method="POST" action="ModifierCommande.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $Commande['IdCommande']; ?> name="IdCommande">
					</form>
				</td>
				<td>
					<a href="SupprimerCommande.php?IdCommande=<?php echo $Commande['IdCommande']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>

</html>
