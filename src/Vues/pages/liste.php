<?php

namespace App\Vues;

?>


<?php
use App\Modeles\DB;

$bdd = serialize(DB::getInstance()->loadListe($_GET["id"]));
$liste = DB::getInstance()->loadListe($_GET["id"]);

?>
<div class="float-right">
    <?php
    if (stristr($_SERVER['REQUEST_URI'], "id=") != "") {
        ?>
        <div class="btn-group">
            <button class="btn float-right " type="button" data-toggle="dropdown" data-target="membres"
                    aria-haspopup="listbox" aria-expanded="false"><img src="assests/membre_listes.png" width="20" height="20" alt="membre_liste"></button>

            <div class="dropdown-menu dropdown-menu-right col-lg-2" id = "membres">
                <?php
                    $membres = $liste->recupererMembres($_GET["id"]);
                    if ($liste->getMailProprietaire() == unserialize($_SESSION['user'])->getMail()){
                        foreach ($membres as $membre) {
                            ?>
                            <div class="dropdown-item">
                                <div class="col-lg-auto">
                                    <p><?php echo $membre ?>
                                        <button class="btn">

                                            <img src="assests/changement.png" width="15"
                                                                 height="15" alt="changement2">

                                        </button>
                                        <a href="?page=supprimerUserList&mail=<?= $membre ?>&idListe=<?= $_GET['id'] ?>">
                                            <img
                                                    src="assests/croix.png" width="15" height="15" alt="croix"></a>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-lg-auto text-center">
                            <button class="btn dropdown-item" onclick="window.location.href='?page=memberSelect&idListe=<?php echo $_GET["id"] ?>&use=ajoutListe&idTache=null'"><img src="assests/add_user.png" width="40" height="40" alt="add_user"></button>
                        </div>
                        <?php
                    }else{
                        foreach ($membres as $membre) {
                            ?>
                            <div class="dropdown-item">
                                <div class="col-lg-auto">
                                    <p><?php echo $membre ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        echo "<button class=\"btn col-lg-auto\" onclick=\"window.location.href='?page=supprimerUserList&mail=".$membre[0]."&idListe=".$_GET["id"]."'\">Quitter la liste</button>";
                    }
                ?>
            </div>
        </div>
    <?php }
    ?>
</div>

<div class="jumbotron text-center">
    <h1>Liste <?php echo htmlspecialchars(unserialize($bdd)->getIntituleListe()) ?></h1>
    <a href="#" onclick="conf_modification(<?php echo $_GET["id"]; ?>)"> Modifier la liste </a>
    <br>

    <a href="#" onclick="conf_suppression(<?= htmlspecialchars($_GET["id"]) ?>, 'Liste <?= htmlspecialchars(unserialize($bdd)->getIntituleListe()) ?>')"> Supprimer la liste </a>
    <br>
    <br>
    <a href="#" onclick="window.location.href = '?page=accueil'"> Retour </a>
</div>

<div>
	<button type="button" class="btn btn-primary" id="tache"
	onclick="pop_up();" value="<?= htmlspecialchars($_GET["id"]) ?>">Ajout tâche </button>
</div>


<!--Affichage des tâches-->
<div class = "jumbotron-fluid text-center">
    <div class="row justify-content-center" id="liste" style="display: flex">
        <?php
        $taches = $liste->getTabTache();
        $idListe = $liste->getIdListe();
        foreach ($taches as $elem) {
        $tache = DB::getInstance()->loadTache($elem['idTache']);
        $nom = $tache->getIntituleTache();
        $valide = $tache->getValide();
        $id = $tache->getIdTache();
        $etat = $tache->getEtat();
        $user = unserialize($_SESSION['user']);
        $proprio = $liste->getMailProprietaire();
        $userAssigne = $tache->getUtilisateurAssigne();
        ?>
        <div class="jumbotron-fluid col-auto" style="border: solid; ;padding: 30px; margin: 10px; "
             id="<?php echo $nom ?>">
            <nom_listes><?php echo $nom ?></nom_listes>
            <br>
            <etat_tache><?= $etat ?></etat_tache>
            <div class="container">
                <div class="row">

                    <?php
                    if ($userAssigne == null || $user->getMail() == $proprio || $user->getMail() == $userAssigne) {
                        ?>
                        <!--Bouton modifier tâche-->
                        <div class="col">
                            <button class="btn" id="modifTache" type="button" onclick="pop_up_modif(this)"
                                    value="<?php echo $id; ?>"><img src="assests/edit.png" alt="edit" width="20"
                                                                    height="20"></button>
                        </div>
                     <!--Check box de tâche finie-->
                     <div class="col">
                         <input type="checkbox" aria-label="..." class="valide" id="valide" value="<?php echo $id; ?>" <?php if ($valide == 1) {
                echo 'checked';
            } ?> >
                     </div>

                        <?php
                    }
                    ?>

                 </div>
                <?php

                //Si personne n'est assigné à cette tâche on peut ajouter quelqu'un
                if ($userAssigne == null) {
                    if (isset($_POST[$nom])) {
                        $tache->setUtilisateurAssigne(unserialize($_SESSION['user']));
                    }

                    //Si c'est le propriétaire il peut ajouter un utilisateur autre que lui
                    if($user->getMail() == $proprio) {
                        ?>
                        <div>
                            <form method="post" name="<?= htmlspecialchars($nom) ?> " action="#">
                                <a href='?page=memberSelect&idListe=<?= $_GET["id"] ?>&use=ajoutTache&idTache=<?=$id?>'
                                   class="btn btn-primary btn-sm">
                                    Ajouter un Utilisateur
                                </a>
                            </form>
                        </div>
                        <?php
                    }

                    //Si c'est une autre personne il ne peut que se proposer lui même
                    else {
                        ?>
                        <div>
                            <form method="post" name="<?= htmlspecialchars($nom) ?> " action="#">
                                <a href="?page=addUserTache&mail=<?= htmlspecialchars($user->getMail()) ?>&idTache=<?= $id; ?>&idListe=<?= $_GET['id']; ?>"
                                   class="btn btn-primary btn-sm">
                                    Se proposer
                                </a>
                            </form>
                        </div>

                    <?php
                    }
                    ?>
                    <?php
                } else {

                    ?><br><h5><?=$userAssigne ?></h5><br>

                    <?php
                    if($user->getMail() == $proprio || $user->getMail() == $userAssigne) {
                        ?>

                        <div>
                        <?php

                        //Si l'utilisateur assigné à la tâche est connecté
                        if($user->getMail() == $userAssigne) {
                            ?>
                            <form method="post" action="#">
                                <a href="?page=deleteUserTache&mail=<?= $user->getMail() ?>&idTache=<?= $id; ?>&idListe=<?= $_GET['id']; ?>">
                                    <button type="button" value="<?= $user->getMail() ?>"
                                            class="btn btn-primary btn-sm">
                                        Se retirer
                                    </button>
                                </a>
                            </form>
                            <?php
                        }

                        //Si le propriétaire est connecté
                        else {
                            ?>
                            <form method="post" action="#">
                                <a href="?page=deleteUserTache&mail=<?= $user->getMail() ?>&idTache=<?= $id; ?>&idListe=<?= $_GET['id']; ?>">
                                    <button type="button" value="<?= $user->getMail() ?>"
                                            class="btn btn-primary btn-sm">
                                        Retirer l'utilisateur
                                    </button>
                                </a>
                            </form>
                            <?php
                        }
                            ?>

                            <form method="post" action="#">
                                <a href="?page=deleteTache&idTache=<?= $id; ?>">
                                    <button type="button" value="<?= $user->getMail() ?>" class="btn btn-danger btn-sm">
                                        Supprimer la tâche
                                    </button>
                                </a>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
          </div>
        <?php } ?>
    </div>
</div>
<!--Fin affichage des tâches-->

<script src="javascript/suppression_liste.js"></script>
<script src="javascript/modification_liste.js"></script>
<script src="javascript/valide_tache.js"></script>

<script>
	function pop_up() {
		var id = document.getElementById("tache").value;
		window.open('?page=ajoutTache&id='+id,'Ajout tâche', 'height=500, width=800, top=100, left=200, resizable = yes');
	}
  function pop_up_modif(elem) {
    var id = elem.value;
    window.open('?page=modifTache&id='+id,'Modification de la tâche', 'height=500, width=800, top=100, left=200, resizable = yes');
  }

</script>
