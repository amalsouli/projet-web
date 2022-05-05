<?php
include_once '../Model/promo.php';
include_once '../Controller/promoc.php';

$error = "";

// create promo
$promo = null;

// create an instance of the controller
$promoc = new promoc();
if (
    isset($_POST["idpromo"]) &&
    isset($_POST["nompromo"]) &&
    isset($_POST["discription"]) &&
    isset($_POST["pourcentage"]) &&
    isset($_POST["noms"]) &&
    isset($_FILES['img_upload'])
) {
    if (
        !empty($_POST["idpromo"]) &&
        !empty($_POST["nompromo"])&&
        !empty($_POST["discription"])  &&
        !empty($_POST["pourcentage"])  &&
        !empty($_POST["noms"])  &&
        !empty($_FILES["img_upload"])
    ) {
        
        $img_name = $_FILES['img_upload']['name'];
        $tmp_img_name = $_FILES['img_upload']['tmp_name'];
        $folder = '../uploads/';
        $moved = move_uploaded_file($tmp_img_name, $folder . $img_name);
        if ($moved) {
            $promo = new promo(
                $_POST['idpromo'],
                $_POST['nompromo'],
                $_POST['discription'],
                $_POST['pourcentage'],
                $_POST['noms'],
                $img_name
            );
            $promoc->ajouterpromo($promo);
            header('Location:afficherListepromo.php');
        } else {
            $error = "Upload failed";
        }
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <link rel='stylesheet' type='text/css' media='screen' href='../style.css'>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Ajout promo</title>
    <!-- Favicon-->
    <link rel="icon" href="../assets/images/logo_aphrodite_tr.png" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="../assets/css/app.min.css" rel="stylesheet">
    <!-- Custom Css -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="../assets/css/styles/all-themes.css" rel="stylesheet" />
</head>

<body>
    <header style="display: flex; height: 100px;">
        <a class="logo" href="index.html"><img src="../azerty.png" alt="logo" height="80px" width="90px"></a>
        <nav>
            <ul class="nav__links">
                <li><a href="#promos">promos</a></li>
                <li><a href="#Produits">Produits</a></li>
                <li><a href="#Propos">A propos</a></li>
                <li><a href="#Contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <center>
        <a class="btn btn-theme-light p-l-20 p-r-20 btn-primary" href="afficherListepromo.php">Retour à la liste des promo</a>

    </center>


    <div id="error">
        <?php echo $error; ?>
    </div>


    <form action="" method="POST" enctype='multipart/form-data'>
        <center>
            <table align="center">
                <tr>
                    <td>
                        <label for="idpromo">ID du promo:
                        </label>
                    </td>
                    <td><input type="number" name="idpromo" id="idpromo" minlength="3" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nompromo">Nom du promo:
                        </label>
                    </td>
                    <td><input type="text" name="nompromo" id="nompromo" minlength="3" maxlength="50"></td>
                </tr>
                <tr>
                    <td>
                        <label for="discription">discription du promo:
                        </label>
                    </td>
                    <td><input type="text" name="discription" id="discription" minlength="3" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pourcentage">pourcentage du promo:
                        </label>
                    </td>
                    <td><input type="number" name="pourcentage" id="pourcentage" min="10" max="100" step="5"></td>
                </tr>
                <tr>
                    <td>
                        <label for="noms">nom du soin:
                        </label>
                    </td>
                    <td><input type="text" name="noms" id="noms" minlength="3" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="img_upload">Image:
                        </label>
                    </td>
                    <td><input type="file" name="img_upload" id="img_upload"></td>
                </tr>
            </table>
            <div style="display: flex; justify-content: center;">
                <button class="btn btn-theme-light btn-primary p-l-20 p-r-20" type="submit" value="Envoyer" >
                    Envoyer
                </button>
                <button class="btn btn-theme-light p-l-20 p-r-20" type="reset" value="Annuler">
                    Annuler
                </button>
            </div>
        </center>
    </form>

    <script src="../assets/js/app.min.js"></script>
    <!-- Custom Js -->
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/index.js"></script>
</body>

</html>