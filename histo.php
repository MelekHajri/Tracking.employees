<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" type="text/css" href="CSS_hist.css">
</head>
<body>
    <div class="heading">
        <h1>L'historique</h1>
    </div>
    <?php
        include_once "connexionDataBase.php";

        $sql="select h.id,e.nom,e.prenom,e.poste,h.arriver, h.depart from employes as e, historique as h where h.id = e.id;";
        $res=mysqli_query($conn,$sql);
        
        echo "
        <table border=1>
        <tr>
        <td><b>ID</b></td>
        <td><b>Nom</b></td>
        <td><b>Prenom</b></td>
        <td><b>Poste</b></td>
        <td><b>Heur_D'arrivée</b></td>
        <td><b>Heur_de_Départ</b></td>
        </tr>
        ";
        while($t=mysqli_fetch_array($res))
        {
            echo"
            <tr>
            <td>$t[0]</td>
            <td>$t[1]</td>
            <td>$t[2]</td>
            <td>$t[3]</td>
            <td>$t[4]</td>
            <td>$t[5]</td>
            </tr>";
        }
        echo "</table>";
        $conn->close();
?>
