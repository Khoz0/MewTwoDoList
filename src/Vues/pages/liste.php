<?php

namespace App\Vues;

?>

<?php

use App\Modeles\DB;

$bdd = serialize(DB::getInstance()->loadListe($_GET["id"]));

?>
<div class="jumbotron text-center">

    <h1>Liste <?php echo unserialize($bdd)->getIntituleListe()?></h1>

</div>
