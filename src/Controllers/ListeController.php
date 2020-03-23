<?php


namespace App\Controllers;

use App\Classe\Liste;
use App\Modeles\DB;


class ListeController extends Controller {

    public function liste() {
    	$id = $_GET['id'] ?? $this->redirect('accueil');
    	$bdd = DB::getInstance()->loadListe($id);

        return $this->render('liste', compact('bdd', 'id'));
    }

	public function deleteListMember(){
		$mail = $_GET['mail'];
		$idListe = $_GET['idListe'];
		$bdd = DB::getInstance();
        $liste = $bdd->loadListe($idListe);
        $liste->retirerUtilisateur($mail);
        $bdd->deleteListMember($mail, $idListe);
        $user = $bdd->loadUtilisateur($mail);
        $pseudo = $user->getPseudo();

        $contenu = $pseudo." s'est retiré de ".$liste->getIntituleListe();
        $membres = $liste->recupererMembres();

        $idNotif = 0;
        $requeteBDD = DB::getInstance()->getPDO()->prepare("SELECT * FROM Notification");
        $requeteBDD->execute();
        while ($donnees = $requeteBDD->fetch()){
            $idNotif = $donnees['idNotification'];
        }
        foreach ($membres as $membre){
            if ($membre != $mail) {
                $idNotif++;
                $bdd->createNotif($idNotif, date("Y-m-d"), null, $contenu, 0, $mail, $idListe, $membre);
            }
        }

    	if($bdd->isMemberIn($mail, $idListe)) {
            $this->redirect("liste&id=$idListe");
        }
    	else{
            $this->redirect("accueil");
        }
	}

    public function addListMember(){
        $mail = $_GET['mail'];
        $idListe = $_GET['idListe'];
        $bdd = DB::getInstance();
        $bdd->addMembre($mail, $idListe);
        $liste = $bdd->loadListe($idListe);
        $liste->ajouterUtilisateur($mail);

        $this->redirect("liste&id=$idListe");
    }


}
