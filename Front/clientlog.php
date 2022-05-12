<?PHP
include '../Controller/gestionclientC.php';

if (isset($_POST['email']) and isset($_POST['password'])) {

	$clientC = new clientC();
	$user=$clientC->checklogin($_POST['email'],$_POST['password']);
	if($user)
	{
		session_start();

		$_SESSION['email']=$user['email'];
		$_SESSION['password']=$user['password'];
		$_SESSION['firstname']=$user['firstname'];
		$_SESSION['lastname']=$user['lastname'];
		$_SESSION['sexe']=$user['sexe'];

		header("Location:../view/afficherclient.php");
	}
	else {
		echo "<script>
alert('Verifiez vos données!');
window.location.href='connexion.php';
</script>";
	}
}
else {
	echo "<script>
alert('champs vides.');
window.location.href='connexion.php';
</script>";
}
?>
