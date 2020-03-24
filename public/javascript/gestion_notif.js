function conf_validation_proprio(idListe, mailInvite) {
    if (confirm('Êtes vous sûr de vouloir devenir le nouveau propriétaire ?')) {
        window.location.href='?page=changementProprietaireBDD&idListe='+idListe+'&mailMembre='+mailInvite;
    }
}

function conf_validation_ajout(idListe, idNotif) {
    if (confirm('Êtes vous sûr de vouloir rejoindre la liste ?')) {
        window.location.href='?page=confirmJoinList&idListe='+idListe+'&idNotif='+idNotif;
    }
}

function conf_validation_del(idListe, idNotif) {
    if (confirm('Êtes vous sûr de vouloir supprimer la tâche ?')) {
        window.location.href='?page=deleteTache&idListe='+idListe+'&idNotif='+idNotif;
    }
}


function conf_refus(idListe, idNotif) {
    if (confirm('Êtes vous sûr de vouloir refuser cette notification ?')) {
        window.location.href='#';
    }
}
