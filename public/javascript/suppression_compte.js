function conf_suppression() {
    if (confirm('Êtes vous sûr de vouloir supprimer votre compte ?\nCette action est définitive')) {
        window.location.href='?page=deleteAccount'
    }
}