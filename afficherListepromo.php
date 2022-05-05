<?php
include '../Controller/promoc.php';

$listepromo = null;

function getData()
{
    $promoc = new promoc();
    return $promoc->afficherpromo();
}
if (isset($_GET['sort'])) {
    $listepromo = sortData();
} else {
    $listepromo = getData();
}

?>
<html>

<head>
    <link rel='stylesheet' type='text/css' media='screen' href='../style.css'>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Liste des promos</title>
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
        <h1>Liste des promos</h1>
    </center>

    </div>
    <br>
    <center>

        <div class="">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div style="display: flex; justify-content: end;">

                    
                    
                    <button class="btn btn-theme-light p-l-20 p-r-20">
                        <a href="ajouterpromo.php" class="">
                            Ajouter
                        </a>
                    </button>
                </div>
                <div class="card">
                    <div class="header">
                        <

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>id du promo</th>
                                        <th>nom du promo</th>
                                        <th>discription</th>
                                        <th>pourcentage</th>
                                        <th>nomsoin</th>
                                        <th>Modifier</th>
                                        <th>Supprimer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ((array)$listepromo as $promo) {
                                    ?>
                                        <tr>
                                            <td><img style="max-height: 50px;" src="<?php echo "../uploads/" . $promo['image']; ?>" /></td>
                                            <td><?php echo $promo['idpromo']; ?></td>
                                            <td><?php echo $promo['nompromo']; ?></td>
                                            <td><?php echo $promo['discription']; ?></td>
                                            <td><?php echo $promo['pourcentage']; ?></td>
                                            <td><?php echo $promo['noms']; ?></td>
                                            

                                            <td>
                                                <form method="POST" action="modifierpromo.php">
                                                    <button type="submit" value="Modifier" class="btn btn-theme-light btn-primary p-l-20 p-r-20">
                                                        Modifier
                                                    </button>
                                                    <!-- <input type="submit" name="Modifier" value="Modifier"> -->
                                                    <input type="hidden" value=<?PHP echo $promo['nom']; ?> name="nom">
                                                </form>
                                            </td>
                                            <form name="f" method="GET">
                                                <td>
                                                    <a href="supprimerpromo.php?nom=<?php echo $promo['nom']; ?>">Supprimer</a>
                                                </td>
                                        </tr>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="../assets/js/app.min.js"></script>
        <!-- Custom Js -->
        <script src="../assets/js/admin.js"></script>
        <script src="../assets/js/pages/index.js"></script>

</body>

</html>