<?php
include_once "connexionDataBase.php";

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Récupérer l'identifiant de l'employé à supprimer à partir des paramètres de l'URL
    $id = $_GET['id'];

    // Échapper et sécuriser l'identifiant de l'employé pour éviter les attaques par injection SQL
    $id = mysqli_real_escape_string($conn, $id);

    // Requête SQL pour supprimer l'employé avec l'identifiant spécifié
    $sql = "DELETE FROM employes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        //ok
        http_response_code(200);
        echo "Employé supprimé avec succès.";
    } else {
        //error
        http_response_code(500);
        echo "Erreur lors de la suppression de l'employé : " . $conn->error;
    }
} else {
    // Si la méthode de requête n'est pas DELETE, répondre avec un code de statut HTTP 405 (Method Not Allowed)
    http_response_code(405);
    echo "Méthode non autorisée. Seule la méthode DELETE est autorisée pour cette ressource.";
}
$conn->close();
?>

