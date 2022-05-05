<?php
include_once '../Model/promo.php';
include_once '../Controller/promoc.php';
$error = "";
// create promo
$promo = null;
$image = "";
if (isset($_POST["modifier"])) {
    if (
        !empty($_POST["idpromo"]) &&
        !empty($_POST["nompromo"]) &&
        !empty($_POST["discription"]) &&
        !empty($_POST["pourcentage"]) &&
        !empty($_POST["noms"]) 
    ) {
        // create an instance of the controller
        $promoc = new promoc();
        if (isset($_FILES['img_upload']) && !empty($_FILES["img_upload"])) {
            $img_name = $_FILES['img_upload']['name'];
            $tmp_img_name = $_FILES['img_upload']['tmp_name'];
            $folder = '../uploads/';
            $moved = move_uploaded_file($tmp_img_name, $folder . $img_name);
            if ($moved) {
                $image = $img_name;
            } else {
                $image = $_POST['old_image'];
            }
        } else {
            $image = $_POST['old_image'];
        }


        $promo = new promo(
            $_POST['idpromo'],
            $_POST['nompromo'],
            $_POST['discription'],
            $_POST['pourcentage'],
            $_POST['noms'],
            $image,

        );

        $promoc->modifierpromo($promo, $_POST["idpromo"]);
        header('Location:afficherListepromo.php');
    }
}

?>
<html lang="en">

<head>
    <link rel='stylesheet' type='text/css' media='screen' href='../style.css'>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Modifier promo</title>
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

    <div id="error">
        <?php echo $image; ?>
    </div>

    <?php

    if (isset($_POST['nom'])) {

        $promoc = new promoc();

        $promo = $promoc->recupererpromo($_POST['nom']);


    ?>

        <form method="POST" name="f" enctype='multipart/form-data'>
            <input type="text" name="old_image" hidden value="<?php echo $promo['image']; ?>" />
            <center>
                <table border="1" align="center">

                    <tr>
                        <td>
                            <label for="nompromo">nom du promo:
                            </label>
                        </td>
                        <td><input type="text" name="nompromo" value="<?php echo $promo['nompromo']; ?>" maxlength="20"></td>
                        <td><input type="hidden" name="idpromo" value="<?php echo $promo['idpromo']; ?>" maxlength="20"></td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="discription">discription du promo:
                            </label>
                        </td>
                        <td><input type="text" name="discription" value="<?php echo $promo['discription']; ?>" maxlength="20"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="img_upload">Image:
                            </label>
                        </td>
                        <td><input type="file" name="img_upload" id="img_upload"></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pourcentage">pourcentage du promo:
                            </label>
                        </td>
                        <td><input type="number" name="pourcentage" value="<?php echo $promo['pourcentage']; ?>" min="10" max="100"></td>
                    </tr>

                </table>
                <div style="display: flex; justify-content: center;">
                    <button class="btn btn-theme-light btn-primary p-l-20 p-r-20" type="submit" value="modifier" name="modifier">
                        Modifier
                    </button>
                    <button class="btn btn-theme-light p-l-20 p-r-20" type="reset" value="Annuler">
                        Annuler
                    </button>
                </div>
            </center>
        </form>
    <?php
    }
    ?>

    <script src="../assets/js/app.min.js"></script>
    <!-- Custom Js -->
    <script src="../assets/js/admin.js"></script>
    <script src="../assets/js/pages/index.js"></script>
</body>

</html>