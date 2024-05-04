<?php
include_once "connexionDataBase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les paramètres de la requête
    $id = $_POST['id'];
    $nouveauStatut = $_POST['statut'];

    // Convertir le statut en entier avant de l'insérer dans la base de données
    $nouveauStatut = $_POST['statut'] === "true" ? 1 : 0;

    // Mettre à jour le statut de l'employé dans la base de données
    $sql = "UPDATE employes SET statut = '$nouveauStatut' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        http_response_code(200); 
        echo "Statut de l'employé mis à jour avec succès.";
    } else {
        http_response_code(500);
        echo "Erreur lors de la mise à jour du statut de l'employé : " . $conn->error;
    }
}
$conn->close();
?>
