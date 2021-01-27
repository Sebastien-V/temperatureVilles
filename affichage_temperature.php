<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles;charset=utf8', 'root', '');
	$bdd->query("SET lc_time_names ='fr_FR'");
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$ville = htmlspecialchars($_POST['ville']);
$reponse = $bdd->prepare("SELECT temperature , DATE_FORMAT(last_update,'Le %d %M %Y à %H h %i') as last_update FROM temperaturevilles WHERE ville = ? ");
$reponse->execute(array($ville));

while ($donnees = $reponse->fetch())
{
	


	echo  $donnees['last_update'], ' il faisait ',$donnees['temperature'],'°C',' à ',ucfirst($_POST['ville']);

	
} 

$reponse->closeCursor();

?>

