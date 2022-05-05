<?php
    include_once 'A:/xampp/htdocs/dhia/project/frontend/RendezC.php';

    $error = "";

    // create adherent
    $Rendez = null;

    // create an instance of the controller
    $RendezC = new RendezC();
    if (
        isset($_POST["ID"]) &&
		isset($_POST["Dates"]) &&		
        isset($_POST["Temps"]) &&
		isset($_POST["Soin"]) && 
        isset($_POST["Duree"])&& 
        isset($_POST["nom"]) 

       
    ) {
        if (
            !empty($_POST["ID"]) && 
			!empty($_POST['Dates']) &&
            !empty($_POST["Temps"]) && 
			!empty($_POST["Soin"]) && 
            !empty($_POST["Duree"])&& 
            !empty($_POST["nom"]) 

            
        ) {
            $Rendez = new rendez(
                $_POST['ID'],
				$_POST['Dates'],
                $_POST['Temps'], 
				$_POST['Soin'],
                $_POST['Duree'],
                $_POST['nom']

             
            );
            $RendezC->modifierRendez($Rendez, $_POST["ID"]);
            header('Location:afficher.php');
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
        <button><a href="afficher.php">Retour à la liste des rendez-vous </a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
            $Rendezc=new Rendezc();
			$listerendez = $RendezC->recupererrendez($_GET['deletevar']);
            foreach($listerendez as $Rendez){
            
				
            
				
		?>
        
        <form action="" method="POST">
            <table >
                <tr>
                    <td>
                        <label for="ID">ID:
                        </label>
                    </td>
                    <td><input type="text" name="ID" value="<?php echo $Rendez['ID']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Dates">Dates:
                        </label>
                    </td>
                    <td><input type="date" name="Dates" id="nom" value="<?php echo $Rendez['Dates']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Temps">Temps:
                        </label>
                    </td>
                    <td><input type="text" name="Temps" id="prenom" value="<?php echo $Rendez['Temps']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Soin">Soin:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Soin" value="<?php echo $Rendez['Soin']; ?>" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Duree">Duree:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Duree" value="<?php echo $Rendez['Duree']; ?>">
                    </td>
                   
                    
                    </td>
                       
                </tr>
                <tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="nom" value="<?php echo $Rendez['nom']; ?>" >
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