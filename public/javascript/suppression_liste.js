function conf_suppression(id, titre) {
    if (confirm('Êtes vous sûr de vouloir supprimer votre liste ?\nCette action est définitive '+ titre)) {
        window.location.href='?page=deleteListe&id='+id;
    }
}
