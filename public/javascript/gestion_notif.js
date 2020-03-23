function conf_validation(idListe, idNotif) {
    if (confirm('Êtes vous sûr de vouloir accepter cette notification ?')) {
        window.location.href='?page=deleteListe&id='+id;
    }
}