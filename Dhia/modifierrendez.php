<?php
    include_once 'A:/jj/htdocs/TEST/rendez.php';;
    include_once 'A:/jj/htdocs/TEST/rendezc.php';

    $error = "";

    // create adherent
    $adherent = null;

    // create an instance of the controller
    $adherentC = new rendezc();
    if (
        isset($_POST["ID"]) &&
		isset($_POST["Dates"]) &&		
        isset($_POST["Temps"]) &&
		isset($_POST["Soin"]) && 
        isset($_POST["Durée"])  
       
    ) {
        if (
            !empty($_POST["ID"]) && 
			!empty($_POST['Dates']) &&
            !empty($_POST["Temps"]) && 
			!empty($_POST["Soin"]) && 
            !empty($_POST["Durée"]) 
          
        ) {
            $adherent = new rendez(
                $_POST['ID'],
				$_POST['Dates'],
                $_POST['Temps'], 
				$_POST['Soin'],
                $_POST['Durée']
                
            );
            $rendezc->modifierrendez($adherent, $_POST["ID"]);
            header('Location:connection.php');
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
        <button><a href="afficherListeAdherents.php">Retour à la liste des adherents</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['NumAdherent'])){
				$adherent = $adherentC->recupereradherent($_POST['NumAdherent']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="numadherent">Numéro Adherent:
                        </label>
                    </td>
                    <td><input type="text" name="numadherent" id="numadherent" value="<?php echo $adherent['NumAdherent']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $adherent['Nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $adherent['Prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="adresse" value="<?php echo $adherent['Adresse']; ?>" id="adresse">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $adherent['Email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">Date d'inscription:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateins" id="dateins" value="<?php echo $adherent['DateInscription']; ?>">
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