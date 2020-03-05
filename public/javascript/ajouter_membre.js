function addMembre(mail,id) {
    var url = window.location.origin + "/mew_two_do_list/ajax/ajoutMembre.php";
    console.log(url);
    $.ajax({
        url: url,
        type: 'GET',
        data: {user: mail, id: id},

        success: function (code_html, statut) { // code_html contient le HTML renvoyé
        },
        error: (xhr) => {
            console.log("status =" + xhr.status);
            console.log(xhr);
        }
    });
}
