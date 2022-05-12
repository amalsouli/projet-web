<?php
include_once '../../controller/reclamationC.php';
if (


  isset($_POST["nom"]) &&
  isset($_POST["prenom"]) &&
  isset($_POST["description"])
) {
  if (

    !empty($_POST['nom']) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["description"])
  ) {
    $reclamationC = new reclamationC();
    $reclamation = new reclamation(

      1,
      $_POST['nom'],
      $_POST['prenom'],
      $_POST['description']
    );
    $reclamationC->ajouterReclamation($reclamation);
    //header('Location: index.html');

    echo "<script> alert('reclamation envoyé');</script>";
    header('Location: contacts.php');
  } else
    $error = "Missing information";
} else {
    echo 'error';
}
?>