
<html>
	<head></head>
	<body>
		
	
	</body>
</html>
<form method="POST" name="ff" action="recherche.php">
<?php
	include_once 'A:/xampp/htdocs/dhia/project/RendezC.php';
	$Rendezc=new Rendezc();
	$listerendez=$Rendezc->afficherrendez(); 

?>



<table border="1">

<tr>
<th>ID rendez</th>
<th>Dates rendez</th>
<th>Temps rendez</th>
<th>Soin rendez</th>
<th>Duree</th>
<th>nom</th>
</tr>
<?php
foreach($listerendez as $rendez){
echo'
<tr>
<td>  '.$rendez['ID'].' </td>
<td>'.$rendez['Dates'].' </td>
<td>  '.$rendez['Temps'].' </td>
<td>  '.$rendez['Soin'].' </td>
<td>  '.$rendez['Duree'].' </td>
<td>  '.$rendez['nom'].' </td>
<td>

<button class="btn btn-info"><a href="modifierRendez.php? deletevar='.$rendez['ID'].'" class="text-light">Modifier</a></button>
  <button class="btn btn-danger"><a href="supprimerrendez.php? deletevar='.$rendez['ID'].'" class="text-light">Delete</a></button>
 
</td>';
?>
</tr>
<?php
}
?>

</table>
<a href="ajouterRendez.php" >Ajouter rendez</a>
<br>
<input type="text" name="IDD">
<input type="Submit" value="Rechercher">
</form>
</form>
<form name="f" method="POST" action="trie.php">
<input type="Submit" value="trie">
</form>
