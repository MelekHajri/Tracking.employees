<?php
// Inclure votre fichier de connexion à la base de données
include_once "connexionDataBase.php";

// Vérifier si l'identifiant de l'employé est passé dans l'URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Échapper et sécuriser l'identifiant de l'employé pour éviter les attaques par injection SQL
    $id = mysqli_real_escape_string($conn, $id);

    // Requête SQL pour récupérer les données de l'employé à partir de son identifiant
    $sql = "SELECT * FROM employes WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Récupérer les données de l'employé
        $row = $result->fetch_assoc();
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $poste = $row["poste"];
        // Ajoutez d'autres données si nécessaire
    } else {
        // Si aucun employé correspondant à l'identifiant n'est trouvé, rediriger ou afficher un message d'erreur
        echo "Aucun employé trouvé avec cet identifiant.";
        // Vous pouvez également rediriger l'utilisateur vers une autre page ici si nécessaire
        exit(); // Arrêter l'exécution du script
    }
} else {
    // Si aucun identifiant d'employé n'est passé dans l'URL, rediriger ou afficher un message d'erreur
    echo "Aucun identifiant d'employé fourni.";
    // Vous pouvez également rediriger l'utilisateur vers une autre page ici si nécessaire
    exit(); // Arrêter l'exécution du script
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Employé</title>
    <link rel="stylesheet" href="CSS_Employees.css">
</head>
<body>
    <h1>Modifier Employé</h1>
    <form action="mise_a_jour_employe.php" method="post" class="form-modification">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>"><br>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>"><br>
        <label for="poste">Poste :</label>
        <input type="text" name="poste" id="poste" value="<?php echo $poste; ?>"><br>
        <!-- Ajoutez d'autres champs si nécessaire -->
        <button type="submit">Enregistrer les modifications</button>
    </form>
</body>
</html>
