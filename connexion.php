<?php
// Identifiants de connexion
$login_valide = "melek";
$password_valide = "hajri";

// Vérifier si les champs sont remplis
if(isset($_POST['login']) && (isset($_POST['password']))) {
    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    // Vérifier les identifiants
    if($login == $login_valide && $password == $password_valide) {
        // Authentification réussie, rediriger vers la page d'accueil
        header('Location: index.html');
        exit;
    } elseif($login != $login_valide && $password != $password_valide) {
        // Les deux sont incorrects
        echo "Login et mot de passe incorrects. Veuillez réessayer.";
    } elseif($login != $login_valide) {
        // Login incorrect
        echo "Login incorrect. Veuillez réessayer.";
    } elseif($password != $password_valide) {
        // Mot de passe incorrect
        echo "Mot de passe incorrect. Veuillez réessayer.";
    }

}
?>
