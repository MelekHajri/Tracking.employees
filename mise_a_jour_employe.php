<?php
// Inclure votre fichier de connexion à la base de données
include_once "connexionDataBase.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $poste = $_POST["poste"];

    // Échapper et sécuriser les données du formulaire pour éviter les attaques par injection SQL
    $id = mysqli_real_escape_string($conn, $id);
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $poste = mysqli_real_escape_string($conn, $poste);

    // Requête SQL pour mettre à jour les données de l'employé dans la base de données
    $sql = "UPDATE employes SET nom='$nom', prenom='$prenom', poste='$poste' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Rediriger vers la page employees.php après la mise à jour réussie
        header("Location: employee.php");
        exit();
    } else {
        // En cas d'erreur lors de la mise à jour, afficher un message d'erreur
        echo "Erreur lors de la mise à jour de l'employé : " . $conn->error;
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
