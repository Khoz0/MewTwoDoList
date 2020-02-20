function conf_suppression(id) {
    if (confirm('Êtes vous sûr de vouloir supprimer votre liste ?\nCette action est définitive '+id)) {
        window.location.href='?page=deleteListe&id='+id;
    }
}