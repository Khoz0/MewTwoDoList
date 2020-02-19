function conf_suppression() {
    if (confirm('Êtes vous sûr de vouloir supprimer votre liste ?\nCette action est définitive')) {
        window.location.href='?page=deleteListe'
    }
}