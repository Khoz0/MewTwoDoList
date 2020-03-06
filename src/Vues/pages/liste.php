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
    if (stristr($_SERVER['REQUEST_URI'], "id=") != ""){
        ?>
        <div class="btn-group">
            <button class="btn float-right " type="button" data-toggle="dropdown" data-target="membres"
                    aria-haspopup="listbox" aria-expanded="false"><img src="assests/membre_listes.png" width="20" height="20" alt="membre_liste"></button>

            <div class="dropdown-menu dropdown-menu-right col-lg-2" id = "membres">
                <?php
                    $membres = $liste->recupererMembres($_GET["id"]);
                    print_r($membres);
                    if ($liste->getMailProprietaire() == unserialize($_SESSION['user'])->getMail()){
                        foreach ($membres as $membre) {
                            ?>
                            <div class="dropdown-item">
                                <div class="col-lg-auto">
                                    <p><?php echo $membre ?>
                                        <button class="btn">
                                            <img src="assests/changement.png" width="15"
                                                                 height="15" alt="changement">
                                        </button>
                                        <a href="?page=supprimerUserList&mail=<?= $membre ?>&idListe=<?= $_GET['id'] ?>"><img
                                                    src="assests/croix.png" width="15" height="15"></a>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col-lg-auto text-center">
                            <button class="btn dropdown-item" onclick="window.location.href='?page=memberSelect&id=<?php echo $_GET["id"] ?>'"><img src="assests/add_user.png" width="40" height="40"></button>
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

    <a href="#" onclick="conf_suppression(<?php echo $_GET["id"]; ?>, 'Liste <?php echo unserialize($bdd)->getIntituleListe();?>')"> Supprimer la liste </a>
    <br>
    <br>
    <a href="#" onclick="window.location.href = '?page=accueil'"> Retour </a>
</div>

<div>
	<button type="button" class="btn btn-primary" id="tache"
	onclick="pop_up();" value="<?php echo $_GET["id"]; ?>">Ajout tâche </button>
</div>

<div class = "jumbotron-fluid text-center">
    <div class="row justify-content-center" id="liste" style="display: flex">
        <?php
        $taches = $liste->getTabTache();
        foreach ($taches as $elem){
            $tache = DB::getInstance()->loadTache($elem['idTache']);
            $nom = $tache->getIntituleTache();
            $valide = $tache->getValide();
            $id = $tache->getIdTache();
            $user = unserialize($_SESSION['user']);
            ?>
            <div class="jumbotron-fluid col-auto" style="border: solid; ;padding: 30px; margin: 10px;"
                 id="<?php echo $nom ?>">
                <nom_listes><?php echo $nom ?></nom_listes>
                 <div class="form-check align-top">
                   <button class="btn"  id="modifTache" type="button" onclick="pop_up_modif(this)" value="<?php echo $id; ?>"><img src="assests/edit.png" width="20" height="20"></button>
                </div>
                <div class="form-check align-top">
                    <input type="checkbox" aria-label="..." class="valide" id="valide" value="<?php echo $id; ?>" <?php if ($valide == 1) {
                        echo 'checked';
                    } ?> >
                </div>
                <?php

                if ($tache->getUtilisateurAssigne() == null) {
                    if (isset($_POST[$nom])) {
                        $tache->setUtilisateurAssigne(unserialize($_SESSION['user']));
                    }

                    ?>
                    <div>
                        <form method="post" name="<?php echo $nom ?> " action="#">
                            <a href="?page=addUserTache&mail=<?php echo $membre['mail'] ?>&idTache=<?php echo $id;?>&idListe=<?php echo $_GET['id'];?>">
                            <button type="button" value="<?php echo $user->getMail() ?>" class="btn btn-primary btn-sm">
                                Ajouter
                                un Utilisateur
                            </button>
                            </a>
                        </form>
                    </div>
                    <?php
                } else {
                    ?><br><h5><?php echo $tache->getUtilisateurAssigne(); ?></h5><br>
                    <div>
                        <form method="post" name="-<?php echo $nom ?> " action="#">
                            <a href="?page=deleteUserTache&mail=<?php echo $membre['mail'] ?>&idTache=<?php echo $id;?>&idListe=<?php echo $_GET['id'];?>">
                            <button type="button" value="<?php echo $user->getMail() ?>" class="btn btn-primary btn-sm">
                                Se retirer
                            </button>
                            </a>
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>
        <?php } ?>
    </div>
</div>

<script type="text/javascript" src="javascript/suppression_liste.js"></script>
<script type="text/javascript" src="javascript/modification_liste.js"></script>
<script type="text/javascript" src="cdn/jquery.js"> </script>
<script type="text/javascript" src="javascript/valide_tache.js"></script>

<script>
	function pop_up() {
    console.log("test");
		var id = document.getElementById("tache").value;
		window.open('?page=ajoutTache&id='+id,'Ajout tâche', 'height=500, width=800, top=100, left=200, resizable = yes');
	}
  function pop_up_modif(elem) {
    var id = elem.value;
    window.open('?page=modifTache&id='+id,'Modification de la tâche', 'height=500, width=800, top=100, left=200, resizable = yes');
  }

</script>
