<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=bdd_temperaturevilles;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}?>
<form method="post" action="http://localhost/temperaturesVilles/affichage_temperature.php">
<p>

<select name="ville">
   
   <?php
   $reponse = $bdd->prepare("SELECT ville FROM temperaturevilles ");
   $reponse->execute();

   
   while ($donnees = $reponse->fetch())
   {
         ?>
         <option>
         
         <?php   echo ucfirst($donnees['ville']);?>
         
         </option>
         <?php
   }
   ?>
 </select>
<input type="submit" value="Go"/>
</p>
</form>

