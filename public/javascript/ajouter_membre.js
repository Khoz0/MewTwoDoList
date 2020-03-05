function addMembre(user,id) {
    $.ajax({
        url: 'ajoutMembre.php',
        type: 'GET',
        data: 'user=' + user + '&id='+ id,

        success: function (code_html, statut) { // code_html contient le HTML renvoyé
        },
        error: function (resultat, statut, erreur) {
            console.log("Erreur requête ajax")
        }
    });
}