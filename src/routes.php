<?php

$page = $_GET['page'] ?? $_SERVER['argv'][1] ?? header('Location: index.php?page=accueil');

// Le router de l'application est ici

switch($page) {

	case 'accueil':
		(new App\Controllers\AccueilController)->index();
		break;

    case 'login':
        (new App\Controllers\LoginController())->login();
        break;

    case 'inscription':
        (new App\Controllers\InscriptionController())->inscription();
        break;

    case 'compte':
        (new App\Controllers\CompteController())->compte();
        break;

    case 'sessioncreate':
        (new App\Controllers\SessionCreateController())->sessionCreate();
        break;

    case 'disconnect':
        (new App\Controllers\SessionDestroyController())->sessionDestroy();
        break;

    case 'addUser':
        (new App\Controllers\AddUserController())->addUser();
        break;

    case 'liste':
        (new App\Controllers\ListeController())->liste();
        break;

    case 'ajoutTache':
        (new App\Controllers\AjoutTacheController())->ajoutTache();
        break;

    case 'modifTache':
        (new App\Controllers\ModificationTacheController)->modifTache();
        break;



    case 'deleteAccount':
        (new App\Controllers\DeleteAccountController())->deleteAccount();
        break;

    case 'deleteListe':
        (new App\Controllers\DeleteListeController())->deleteListe();
        break;

    case 'creationListe':
        (new App\Controllers\CreationListeController())->creationListe();
        break;

    case 'modificationListe':
        (new App\Controllers\ModificationListeController())->modificationListe();
        break;
    case 'memberSelect':
        (new App\Controllers\RechercheMembreController())->memberSelect();
        break;
	case 'supprimerUserList':
        (new App\Controllers\ListeController())->deleteListMember();
        break;
    case 'addUserList':
        (new App\Controllers\ListeController())->addListMember();
        break;
    case 'addUserTache':
        (new App\Controllers\TacheController())->addUser();
        break;
    case 'deleteUserTache':
        (new App\Controllers\TacheController())->deleteUser();
        break;
    case 'notification':
        (new App\Controllers\NotifController())->notif();
        break;
    case 'recuperationCompte':
        (new App\Controllers\RecuperationCompte())->recuperationCompte();
        break;

    case 'changementProprietaire': // notification
        (new App\Controllers\ChangerProprietaire())->changerProprietaireNotif();

    case 'changementProprietaireBDD':
        (new App\Controllers\ChangerProprietaire())->changerProprietaire();

    default: // Si, rien, alors erreur 404
        (new App\Controllers\ErreurController)->_404();
        break;
}
