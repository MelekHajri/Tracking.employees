<?php
include_once "connexionDataBase.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'identifiant de l'employé à supprimer à partir des paramètres de l'URL
    $id = $_GET['id'];
    $hour=DATE('h:i:s');
    $jour=DATE('y-m-d');
    // Échapper et sécuriser l'identifiant de l'employé pour éviter les attaques par injection SQL
    $id = mysqli_real_escape_string($conn, $id);

    // Requête SQL pour supprimer l'employé avec l'identifiant spécifié
    $sql = "INSERT INTO historique (id,arriver,jour) values('$id','$hour','$jour')";
    if ($conn->query($sql) === TRUE) {
        // Répondre avec un code de statut HTTP 200 (OK) pour indiquer que la suppression a réussi // mysqli affected rows
        http_response_code(200);
        echo "ajout pointage avec succès.";
    } else {
        // Répondre avec un code de statut HTTP 500 (Internal Server Error) en cas d'erreur lors de la suppression
        http_response_code(500);
        echo "Erreur lors de l'ajout pointage' de l'employé : " . $conn->error;
    }
} else {
    // Si la méthode de requête n'est pas DELETE, répondre avec un code de statut HTTP 405 (Method Not Allowed)
    http_response_code(405);
    echo "Méthode non autorisée.";
}

$conn->close();
?>
