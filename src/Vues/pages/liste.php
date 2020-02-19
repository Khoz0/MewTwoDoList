<?php

namespace App\Vues;

?>
<script type="text/javascript" src="javascript/suppression_liste.js"></script>
<script>
function pop_up() {
    window.open('?page=ajoutTache','Ajout tâche', 'height=500, width=800, top=100, left=200, resizable = yes');

}
</script>

<?php

use App\Modeles\DB;

$bdd = serialize(DB::getInstance()->loadListe($_GET["id"]));

?>
<div class="jumbotron text-center">

    <h1>Liste <?php echo unserialize($bdd)->getIntituleListe()?></h1>
    <a href="#" onclick="conf_suppression()"> Supprimer la liste </a>
</div>

<div>
  <button type="button" class="btn btn-primary"
  onclick="pop_up();">
  Ajout tâche </button>
</div>
