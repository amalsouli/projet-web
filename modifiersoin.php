<?php
    include_once '../Model/class.soin.php';
    include_once '../Controller/soinc.php';

    $error = "";

    // create soin
    $soin = null;

    // create an instance of the controller
    $soinc = new soinc();
    if (
        isset($_POST["nom"]) &&
		isset($_POST["prix"]) &&		
        isset($_POST["discription"]) 
    ) {
        if (
            !empty($_POST["nom"]) && 
			!empty($_POST['prix']) &&
            !empty($_POST["discription"]) 
        ) {
            $soin = new soin(
                $_POST['nom'],
				$_POST['prix'],
                $_POST['discription'], 
            );
            $soinc->modifiersoin($soin, $_POST["nom"]);
            header('Location:afficherListesoin.php');
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
        <button><a href="afficherListesoin.php">Retour à la liste des soins</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['nom'])){
				$soin = $soinc->recuperersoin($_POST['nom']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                    <label for="nom">nom du soin:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="prix">Prix du soin:
                        </label>
                    </td>
                    <td><input type="number" name="prix" id="prix" min="20" max="20" step="5" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="discription">discription du soin:
                        </label>
                    </td>
                    <td><input type="text" name="discription" id="discription" maxlength="30"></td>
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