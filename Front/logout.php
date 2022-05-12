<?php
session_start();
session_destroy();
echo "<script>
alert('Vous vous etes déconnecté!');
window.location.href='../View/afficherclient.php';
</script>";
