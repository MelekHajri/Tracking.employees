function changerStatut(id, nouveauStatut) {
    // Envoyer une requête au serveur pour mettre à jour le statut de l'employé
    fetch("changer_statut_employe.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded" //encoder les données de formulaire
        },
        body: "id=" + encodeURIComponent(id) + "&statut=" + encodeURIComponent(nouveauStatut) //& separer les diff parametres
    })
    .then(response => { //la reponse de la requette
        if (response.ok) {
            // Mettre à jour le texte des boutons et le message de la cellule
            changerTexteBoutons(id, nouveauStatut);
            var messageCell = document.getElementById("message_" + id);
                                     //condition?    si vrai     :    si faux
            messageCell.textContent = nouveauStatut ? "On office" : "Off office"; // Mettre à jour le texte dans la cellule de message
            return response.text();
        } else {
            throw new Error("Erreur lors du changement de statut de l'employé : " + response.status);
        }
    })
    .then(message => {
        // Affichez un message de succès (facultatif)
        console.log(message);
    })
    .catch(error => console.error('Erreur lors du changement de statut de l\'employé :', error));
}

// Fonction pour mettre à jour le texte des boutons et le message de la cellule
function changerTexteBoutons(id, nouveauStatut) {
    var onBtn = document.getElementById("onBtn_" + id);
    var offBtn = document.getElementById("offBtn_" + id);
    var messageCell = document.getElementById("message_" + id);

    if (nouveauStatut) {
        onBtn.textContent = "On office";
        offBtn.textContent = "Off office";
        messageCell.textContent = "On office"; // Mettre à jour le texte dans la cellule de message
    } else {
        onBtn.textContent = "Off office";
        offBtn.textContent = "On office";
        messageCell.textContent = "Off office"; // Mettre à jour le texte dans la cellule de message
    }
}

// Fonction pour supprimer un employé
function supprimerEmploye(id) {
    console.log("Identifiant de l'employé à supprimer :", id); // Débogage
    if (confirm("Êtes-vous sûr de vouloir supprimer cet employé ?")) {
        // Utilisez fetch() pour envoyer une requête DELETE au serveur avec l'identifiant de l'employé
        fetch("supprimer_employe.php?id=" + id, {
            method: "DELETE"
        })
        .then(response => {
            if (response.ok) {
                // Suppression réussie, mettre à jour le tableau
                return response.text(); // Renvoie la réponse texte pour gérer le message
            } else {
                throw new Error("Erreur lors de la suppression de l'employé : " + response.status);
            }
        })
        .then(message => {
            // Affichez un message de succès (facultatif)
            console.log(message);
            // Mettez à jour le tableau si nécessaire (vous pouvez ajouter du code ici pour mettre à jour le tableau sans recharger la page)
            location.reload(); // Recharge la page uniquement si la suppression est réussie
        })
        .catch(error => console.error('Erreur de suppression de l\'employé :', error));
    }
}

//modifiers
function modifierEmploye(id) {
    window.location.href = "modifier_employe.php?id=" + id;
}
