<?php
$servername='127.0.0.1';
$username='root';
$password= '';
$dbname='dhia';

try{

    $pdo=new PDO("mysql:host=$servername;dbname=$dbname",
    $username,
    $password,
   [
    PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
   ]

);
    echo "Connected successfully";
    echo '<form action="ajouterRendez.php"method="POST"> 
    <input type="submit" value="ajouter">
    </form>

    ';

}
catch(PDOException $e){
    echo "Connection failed:". $e->getMessage();

}
try{

    $query=$pdo->prepare('SELECT * FROM rendezvous');
    $query->execute();
    $list =$query->fetchALL();
}
catch(PDOException $e){
    $e->getMessage();

}

?>
<pre> 
    <?php
    print_r($list);
    ?>
</pre>

<table border=1>
<tr>
<td>ID</td>
<td>Dates</td>
<td>Temps</td>
<td> Soin</td>
<td>Durée</td>
<td>supprimer</td>


</tr>

<?php
foreach($list as $rendezvous){
    ?>
    <tr>
    <td> <?= $rendezvous['ID']?> </td>
    <td> <?= $rendezvous['Dates']?> </td>
    <td> <?= $rendezvous['Temps']?> </td>
    <td> <?= $rendezvous['Soin']?> </td>
    <td> <?= $rendezvous['Durée']?> </td>
    <td> <form action="deleteRendez.php"method="POST"> 
        <input type="submit" value="supprimer">
        <input type="hidden" name="IDrendezvous"value="<?=$rendezvous['ID']?>">
</form>

    </td>
        
    </tr>
<?php

}
?>

</table>

