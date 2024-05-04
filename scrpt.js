function Pointee(id) {
    console.log("Cliquer sur OK pour continuer", id); // Débogage
    if (confirm("Cliquer sur OK pour continuer")) {
        // Utilisez fetch() pour envoyer une requête DELETE au serveur avec l'identifiant de l'employé
        fetch("insert_historique.php?id=" + id, {
            method: "POST"
        })
        .then(response => {
            if (response.ok) {
                // inerstion réussie, mettre à jour le tableau
                return response.text(); // Renvoie la réponse texte pour gérer le message
            } else {
                throw new Error("Erruer se produit dans l'ajout: " + response.status);
            }
        })
        .then(message => {
            // Affichez un message de succès (facultatif)
            console.log(message);
            // Mettez à jour le tableau si nécessaire (vous pouvez ajouter du code ici pour mettre à jour le tableau sans recharger la page)
            location.reload(); // Recharge la page uniquement si la suppression est réussie
        })
        .catch(error => console.error('ege', error));
    }
    
}
function Depart(id) {
    console.log("Cliquer sur OK pour continuer", id); // Débogage
    if (confirm("Cliquer sur OK pour continuer")) {
        // Utilisez fetch() pour envoyer une requête DELETE au serveur avec l'identifiant de l'employé
        fetch("insert_depart.php?id=" + id, {
            method: "POST"
        })
        .then(response => {
            if (response.ok) {
                // inerstion réussie, mettre à jour le tableau
                return response.text(); // Renvoie la réponse texte pour gérer le message
            } else {
                throw new Error("Erruer se produit dans l'ajout: " + response.status);
            }
        })
        .then(message => {
            // Affichez un message de succès (facultatif)
            console.log(message);
            // Mettez à jour le tableau si nécessaire (vous pouvez ajouter du code ici pour mettre à jour le tableau sans recharger la page)
            location.reload(); // Recharge la page uniquement si la suppression est réussie
        })
        .catch(error => console.error('ege', error));
    }
    
}