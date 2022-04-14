<?php
	include '../Controller/soinc.php';
	$soinc=new soinc();
	$listesoin=$soinc->affichersoin(); 
?>
<html>

	<head>
	<link rel="style" href="style.css" >
<p style="background-image: url('sub.jpg');">
	</head>
	<body>
	    <button><a href="ajoutersoin.php">Ajouter un soin</a></button>
		<center><h1>Liste des soins</h1></center>
		<table border="10" align="center">
			<tr>
				<th>Nom du soin</th>
				<th>Prix du soin</th>
				<th>Discription du soin</th>
				
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listesoin as $soin){
			?>
			<tr>
				<td><?php echo $soin['nom']; ?></td>
				<td><?php echo $soin['prix']; ?></td>
				<td><?php echo $soin['discription']; ?></td>
				
				<td>
					<form method="POST" action="modifiersoin.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $soin['nom']; ?> name="nom">
					</form>
				</td>
				<td>
					<a href="supprimersoin.php?nom=<?php echo $soin['nom']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>
