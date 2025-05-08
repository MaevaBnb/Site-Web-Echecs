<?php

$conn = pg_connect("host=localhost dbname=avis_users user=maeva password=motdepasse");

$query = "SELECT nom, email, commentaire, date_soumission, niveau, temps_consacree, ouverture FROM avis";
$result = pg_query($conn, $query);

echo "<h2>Consultation des Avis</h2>";
echo "<table border='1'>";
echo "<tr><th>Nom</th><th>Email</th><th>Commentaire</th><th>Date</th><th>Niveau</th><th>Temps</th><th>Ouverture</th></tr>";

while ($row = pg_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
    echo "<td>" . htmlspecialchars($row['commentaire']) . "</td>";
    echo "<td>" . htmlspecialchars($row['date_soumission']) . "</td>";
    echo "<td>" . htmlspecialchars($row['niveau']) . "</td>";
    echo "<td>" . htmlspecialchars($row['temps_consacree']) . "</td>";
    echo "<td>" . htmlspecialchars($row['ouverture']) . "</td>";
    echo "</tr>";
}

echo "</table>";

pg_close($conn);
?>