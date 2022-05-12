<?php

if($_GET['id']){
include '../../controller/reclamationC.php';
$reclamationC = new reclamationC();
$reclamationC->done($_GET['id']);
header('Location: reclamations.php');

}
?>