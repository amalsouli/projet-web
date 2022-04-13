<?php
    include '../Model/Commande.php';
    include '../Controller/CommandeC.php';

    $error = "";

    // create Commande
    $Commande = null;

    // create an instance of the controller
    $CommandeC = new CommandeC();
    if (
        isset($_POST["IdCommande"]) &&
		isset($_POST["NomClient"]) &&		
        isset($_POST["PrenomClient"]) &&
		isset($_POST["TypeProduit"]) && 
        isset($_POST["PrixPorduit"]) && 
        isset($_POST["date"])
    ) {
        if (
            !empty($_POST["IdCommande"]) && 
			!empty($_POST['NomClient']) &&
            !empty($_POST["PrenomClient"]) && 
			!empty($_POST["TypeProduit"]) && 
            !empty($_POST["PrixPorduit"]) && 
            !empty($_POST["date"])
        ) {
            $Commande = new Commande(
                $_POST['IdCommande'],
				$_POST['NomClient'],
                $_POST['PrenomClient'], 
				$_POST['TypeProduit'],
                $_POST['PrixPorduit'],
                $_POST['date']
            );
            $CommandeC->modifierCommande($Commande, $_POST["IdCommande"]);
            header('Location:afficherListeCommandes.php');
        }
        else
            $error = "Missing information";
    }    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
    <header>
            <!--<a class="logo" href="/"><img src="images/logo_aphrodite_tr.png" alt="logo"></a>-->
            <a class="logo" href="index.html"><img src="images\logo_aphrodite_tr.png" alt="logo" height="110px" width="110px">
            <nav>
                <ul class="nav__links">
                    <li><a href="#Soins">Soins</a></li>
                    <li><a href="#Produits">Produits</a></li>
                    <li><a href="#Propos">A propos</a></li>
                </ul>
            </nav>
            <a class="cta" href="#Contact">Contact</a>
    </header>
        <button><a href="afficherListeCommande.php">Retour à la liste des Commandes</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['IdCommande'])){
				$Commande = $CommandeC->recupererCommande($_POST['IdCommande']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdCommande">Id Commande:
                        </label>
                    </td>
                    <td><input type="text" name="IdCommande" id="IdCommande" value="<?php echo $Commande['IdCommande']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="NomClient">NomClient:
                        </label>
                    </td>
                    <td><input type="text" name="NomClient" id="NomClient" value="<?php echo $Commande['NomClient']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="PrenomClient">PrenomClient:
                        </label>
                    </td>
                    <td><input type="text" name="PrenomClient" id="PrenomClient" value="<?php echo $Commande['PrenomClient']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="TypeProduit">TypeProduit:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="TypeProduit" value="<?php echo $Commande['TypeProduit']; ?>" id="TypeProduit">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="PrixPorduit">PrixProduit :
                        </label>
                    </td>
                    <td>
                        <input type="PrixPorduit" name="PrixPorduit" id="PrixPorduit" value="<?php echo $Commande['PrixPorduit']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date" id="date" value="<?php echo $Commande['datecription']; ?>">
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>