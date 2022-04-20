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
        isset($_POST["PrixProduit"]) && 
        isset($_POST["date"])
    ) {
        if (
            !empty($_POST["IdCommande"]) && 
			!empty($_POST['NomClient']) &&
            !empty($_POST["PrenomClient"]) && 
			!empty($_POST["TypeProduit"]) && 
            !empty($_POST["PrixProduit"]) && 
            !empty($_POST["date"]) && 
            isset($_POST['save'])

        ) {
              
            $Commande = new Commande(
                $_POST['IdCommande'],
				$_POST['NomClient'],
                $_POST['PrenomClient'], 
				$_POST['TypeProduit'],
                $_POST['PrixProduit'],
                $_POST['date']
            );
            $CommandeC->AjouterCommande($Commande);
            header('Location:AfficherCommande.php');
        }
    
        else
            $error = "Missing information";
    
}

    
?>
<html lang="en">
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
        <button><a href="AfficherCommande.php">Retour à la liste des Commandes</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdCommande">Id Commande:
                        </label>
                    </td>
                    <td><input type="text" name="IdCommande" id="IdCommande" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">NomClient:
                        </label>
                    </td>
                    <td><input type="text" name="NomClient" id="nom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="PrenomClient">PrenomClient:
                        </label>
                    </td>
                    <td><input type="text" name="PrenomClient" id="PrenomClient" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="TypeProduit">TypeProduit:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="TypeProduit" id="TypeProduit">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="PrixProduit">PrixProduit :
                        </label>
                    </td>
                    <td>
                        <input type="PrixProduit" name="PrixProduit" id="PrixProduit">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date :
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date" id="date" >
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer" name="save">  
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
        
    </body>
</html>