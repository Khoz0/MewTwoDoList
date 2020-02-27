<?php

namespace App\Vues;

?>


<?php

use App\Classe\Tache;
use App\Modeles\DB;

$bdd = serialize(DB::getInstance()->loadListe($_GET["id"]));
$liste = DB::getInstance()->loadListe($_GET["id"]);

?>
<div class="jumbotron text-center">
    <h1>Liste <?php echo unserialize($bdd)->getIntituleListe()?></h1>
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
            ?>
            <div class="jumbotron-fluid col-auto" style="border: solid; ;padding: 30px; margin: 10px;"
                 id="<?php echo $nom ?>">
                <nom_listes><?php echo $nom ?></nom_listes>
            </div>
        <?php }
        /*$bdd = DB::getInstance()->getPDO();
        $requete = $bdd->prepare("SELECT * FROM Tache WHERE mailUtilisateur = :mail");
        $loginSession = unserialize($_SESSION['user'])->getMail();
        $requete->bindParam('mail', $loginSession);
        $requete->execute();
        while ($donnees = $requete->fetch()) {
            ?>


            <div class="jumbotron-fluid col-auto" style="border: solid; ;padding: 30px; margin: 10px;"
                 id="<?php echo $donnees['intituleTache'] ?>">
                 <div class="form-check" style="right: -50%; top: -40%;">
                       <input type="checkbox" aria-label="..." <?php if ($donnees['valide'] == 1) {echo 'checked';}?> >
                   </div>
                <nom_listes><?php echo $donnees['intituleTache'] ?></nom_listes>
                <div>
                <button type="button" class="btn btn-primary btn-sm">Ajouter un Utilisateur</button>
              </div>
            </div>
        <?php
        }*/
        ?>
    </div>
</div>

<script type="text/javascript" src="javascript/suppression_liste.js"></script>
<script type="text/javascript" src="javascript/modification_liste.js"></script>
<script>
	function pop_up() {
		var id = document.getElementById("tache").value;
		window.open('?page=ajoutTache&id='+id,'Ajout tâche', 'height=500, width=800, top=100, left=200, resizable = yes');
	}
</script>
