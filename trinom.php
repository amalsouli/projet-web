
<html>
	<head>
	<link rel="style" href="style.css" >
	<link rel='stylesheet' type='text/css' media='screen' href='../style.css'>
	
	</head>

	<body>
	<header>
            <!--<a class="logo" href="/"><img src="images/logo_aphrodite_tr.png" alt="logo"></a>-->
            <a class="logo" href="index.html"><img src="C:\xampp\htdocs\aaaa\azerty.png" alt="logo" height="110px" width="110px">
            <nav>
                <ul class="nav__links">
                    <li><a href="#Soins">Soins</a></li>
                    <li><a href="#Produits">Produits</a></li>
                    <li><a href="#Propos">A propos</a></li>
                </ul>
            </nav>
            <a class="cta" href="#Contact">Contact</a>
    </header>

		
	    <button><a href="ajoutersoin.php">Ajouter un soin</a></button>
		
		<center><h1>Liste des soins</h1></center>
        <?php
	include_once '../Controller/soinc.php';
        $soinc=new soinc();
	    $listesoin=$soinc->trinom(); 
	
    
echo'
		<table border="1" align="center">
			<tr>
				<th>nom du soin</th>
				<th>Prix</th>
				<th>discription</th>
				
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>';

			
				foreach($listesoin as $soin){
			echo'
			<tr>
				<td>  '.$soin['nom'].'</td>
				<td>  '.$soin['prix'].'</td>
				<td>  '.$soin['discription'].'</td>
				
				<td>
					<form method="POST" action="modifiersoin.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value='.$soin['nom'] .'name="nom">
					</form>
				</td>
				<form name="f" method="GET">
				<td>
					<a href="supprimersoin.php?nom= '.$soin['nom'] .'">Supprimer</a>
				</td>
			</tr>
			</form>';
		
				}
			
			?>
		</table>
			
	</body>
</html>
