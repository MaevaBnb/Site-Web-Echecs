<?php

$conn = pg_connect("host=localhost dbname=avis_users user=maeva password=motdepasse");

$nom = $_POST['nom'];
$email = $_POST['email'];
$commentaire = $_POST['commentaire'];
$date_soumission = $_POST['date_soumission'];

$niveau = implode(", ", array_filter([
	isset($_POST['debutant']) ? "débutant" : null,
	isset($_POST['intermédiaire']) ? "intermédiaire" : null,
	isset($_POST['avancé']) ? "avancé" : null
]));

$temps_consacree = implode(", ", array_filter([
    isset($_POST['Peu']) ? "Aucun ou très peu" : null,
    isset($_POST['Occasionnel']) ? "J y joue de temps en temps" : null,
    isset($_POST['Mensuel_ou_hebdo']) ? "J y accorde quelques heures par semaine ou par mois" : null,
    isset($_POST['Quotidiennement']) ? "J y accorde plusieurs heures par jour" : null
]));

$ouverture = implode(", ", array_filter([
    isset($_POST['Défense_Française']) ? "Défense Française" : null,
    isset($_POST['Défense_Scandinave']) ? "Défense Scandinave" : null,
    isset($_POST['Sicilienne']) ? "Sicilienne" : null,
    isset($_POST['Défense_Petrov']) ? "Défense Petrov" : null,
    isset($_POST['Caro_Kann']) ? "Caro-Kann" : null,
    isset($_POST['Gambit_Dame']) ? "Le Gambit de la Dame" : null,
    isset($_POST['Italienne']) ? "Italienne" : null,
    isset($_POST['Espagnol']) ? "Espagnol" : null
]));

$query = "INSERT INTO avis (nom, email, commentaire, date_soumission, niveau, temps_consacree, ouverture) 
          VALUES ('$nom', '$email', '$commentaire', '$date_soumission', '$niveau', '$temps_consacree', '$ouverture')";

$result = pg_query($conn, $query);

echo "<p>Merci pour votre avis !</p>";

pg_close($conn);
?>