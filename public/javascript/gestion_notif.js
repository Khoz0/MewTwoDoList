function conf_validation_proprio(idListe, mailInvite) {
    if (confirm('Êtes vous sûr de vouloir devenir le nouveau propriétaire ?')) {
        window.location.href='?page=changementProprietaireBDD&idListe='+idListe+'&mailMembre='+mailInvite;
    }
}

function conf_validation_ajout(idListe, mailUser) {
    if (confirm('Êtes vous sûr de vouloir rejoindre la liste ?')) {
        window.location.href='?page=addUserList&mail='+mailUser+'&idListe='+idListe;
    }
}


function conf_refus(idListe, idNotif) {
    if (confirm('Êtes vous sûr de vouloir refuser cette notification ?')) {
        window.location.href='#';
    }
}