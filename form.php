<?php

try

{

   $bdd = new PDO('mysql:host=localhost;dbname=mailavatar', 'root','');

}

catch(Exception $e)

{

   die('Erreur : '.$e->getMessage());

}

$reponse = $bdd->prepare("INSERT INTO formulaire (`nom`, `prenom`, `email`,`message`) VALUES (':nom',':prenom',':email',':message')");
$reponse->bindParam(':nom', $_POST['nom']);
$reponse->bindParam(':email',$_POST['email']);
$reponse->bindParam(':message', $_POST['message']);
$reponse->execute();
$to = 'clement.g@codeur.online';
$message = $_POST['message'];
$subject = 'Reponse du site avatar';
$headers = 'Form: monsieurX@exemple.com' . "/r/n" .
'Reply-To: webmaster@exemple.com' . "/r/n" .
'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);