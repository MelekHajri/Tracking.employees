<?php
include_once "connexionDataBase.php"; //inclure le contenu du fichier dans la fichier presente 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //obligation de remplir tous les champs
    if ((empty($_POST["nom"]) || (empty($_POST["prenom"]) || (empty($_POST["poste"]))))) {
        echo '<script>alert("Vous devez remplir tous les champs")</script>';
    }else{
        // Récupérer les données du formulaire
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $poste = $_POST["poste"];
        $id = $_POST["id"];

        // Insérer les données dans la base de données
        $sql = "INSERT INTO employes (id, nom, prenom, poste) VALUES ('$id','$nom', '$prenom', '$poste')";
    
        if ($conn->query($sql) === TRUE) {
            // Rediriger vers la page employee.php
            header("Location: employee.php");
            exit();
    } else {
        echo "Erreur lors de l'ajout de l'employé : " . $conn->error;
    }
    }
    
}
$conn->close();
?>
