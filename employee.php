<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des employés</title>
    <link rel="stylesheet" href="CSS_Employees.css">
    <script src="accueil.js"></script>
    <script src="scrpt.js"></script>
</head>
<body>
    <h1>Liste des employés</h1>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Poste</th>
                <th>Statut</th>
                <th>Heure d'arrivée</th>
                <th>Heure de départ</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="employees-table">
        <?php

        include_once "connexionDataBase.php";

        // Récupérer les données des employés depuis la base de données
        $sql = "SELECT id, nom, prenom, poste, statut FROM employes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Afficher les données des employés dans le tableau
            while($row = $result->fetch_assoc()) //chaque ligne de résultat retournée par la requête SQL et la stocke dans la variable $row sous forme d'array associatif
            //row : tableau associatif; les noms representent les clés
            {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nom"] . "</td>";
                echo "<td>" . $row["prenom"] . "</td>";
                echo "<td>" . $row["poste"] . "</td>";
                
                //(condition ? valeur si vrai : valeur si faux) 
                echo "<td id='message_" . $row['id'] . "'>" . ($row["statut"] == 1 ? "On office" : "Off office") . "</td>"; 
                echo "<td><button onclick=\"Pointee(" . $row['id'] . ")\">Obtenir l'heure</button> </td>";
                echo "<td><button onclick=\"Depart(" . $row['id'] . ")\">Obtenir l'heure</button></td>";
                
                echo "<td>";
                echo "<button onclick=\"modifierEmploye(" . $row['id'] . ")\">Modifier</button> ";
                echo "<button onclick=\"supprimerEmploye(" . $row['id'] . ")\">Supprimer</button> ";
                echo "<button onclick=\"changerStatut(" . $row['id'] . ", true)\" id='onBtn_" . $row['id'] . "'>On office</button> ";
                echo "<button onclick=\"changerStatut(" . $row['id'] . ", false)\" id='offBtn_" . $row['id'] . "'>Off office</button> ";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Aucun employé trouvé</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
    
</body>
</html>
