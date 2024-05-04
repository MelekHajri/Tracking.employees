<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="formulaire.css">
</head>
<body>
    <div class="wrapper fadeInDown">
    <img src="images/PanoroEnergy.jpg" id="logo" alt="Logo" class="logo">
        <div id="formContent">
            <h2 class="active"> Connexion </h2>
            <div class="first">
                <img src="images/user.png" id="icon" alt="User Icon" />
            </div>
            
            <form action="connexion.php" method="POST">
                <input type="text" id="login" class="second" name="login" placeholder="Login">
                <input type="password" id="password" class="third" name="password" placeholder="Mot de passe">
                <input type="submit" class="fourth" value="Se connecter">
            </form>
        </div>
    </div>
</body>
</html>
