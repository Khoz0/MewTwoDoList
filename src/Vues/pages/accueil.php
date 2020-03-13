<?php
use App\Modeles\DB;
?>
<script src="javascript/tri_liste.js"></script>
<div class="jumbotron-fluid text-center">

    <?php
if(isset($_SESSION["user"])){?>
    <div class="jumbotron justify-content-center">
        <h1>Mes listes :</h1>
        <br>
        <br>
        <h4>Trier par:</h4>
        <select onchange="sort_by_name(this.value)" onload="sort_by_name(this.value)">
            <option value="alphab">Ordre alphabétique</option>
            <option value="alphabInverse">Ordre alphabétique inverse</option>
            <option value="debRecent">Date de début la plus récente</option>
            <option value="debAncien">Date de début la plus ancienne</option>
            <option value="finRecent">Date de fin la plus récente</option>
            <option value="finAncien">Date de fin la plus ancienne</option>
        </select>
        <br>
        <br>
        <br>
    </div>
    <div class="jumbotron-fluid">
        <div class="row justify-content-center" id="liste" style="display: flex">
            <?php
            $user = unserialize($_SESSION["user"]);
            $listes = $user->getListesProprietaire();
            foreach ($listes as $liste) {
                    ?>
                    <div class="jumbotron col-auto" style="border: solid; padding: 30px; margin: 10px;"
                         onclick="window.location.href = '?page=liste&id=<?= $liste->getIdListe() ?>'">
                        <div><?= htmlspecialchars($liste->getIntituleListe()) ?></div>
                        <?php if ($liste->getDateFin() == null) { ?>
                            <div><br><br>A partir du <?= htmlspecialchars($liste->getDateCreation()) ?><br></div>
                        <?php } else { ?>
                            <div><br><br>Du <?= htmlspecialchars($liste->getDateCreation()) ?>
                                <br>au <?= htmlspecialchars($liste->getDateFin()) ?></div>
                        <?php } ?>
                    </div>
                <?php }
            $_SESSION['user'] = serialize($user); ?>

        </div>
        <div class="jumbotron-fluid col-auto">
            <a onclick="window.location.href = '?page=creationListe'"><img src="assests/plus.png" alt="Ajouter une liste" width="140px" height="140px"/></a>
        </div>
    </div>
    <div class="jumbotron-fluid">
        <p>Les listes où je suis invité(e) :</p>
    </div>
    <div class="row justify-content-center" id="liste2" style="display: flex">
        <?php
            $user = unserialize($_SESSION["user"]);
            $mail = $user->getMail();
            $bdd = DB::getInstance();
            $listesTotal = $bdd->recupererListesMembres($mail);
            $listesInvite = array();
            foreach ($listesTotal as $listeMembre){
                if (!empty($listes)) {
                    if ($listeMembre->getMailProprietaire() != unserialize($_SESSION["user"])->getMail() && !in_array($listeMembre, $listesInvite)) {
                        array_push($listesInvite, $listeMembre);
                    }
                }else{
                    array_push($listesInvite, $listeMembre);
                }
            }
            foreach ($listesInvite as $listeInvite){
            ?>

                <div class="jumbotron col-auto" style="border: solid; padding: 30px; margin: 10px;"
                     onclick="window.location.href = '?page=liste&id=<?= $listeInvite->getIdListe() ?>'">
                    <h3><?= $listeInvite->getIntituleListe(); ?></h3>
                    <?php if ($listeInvite->getDateFin() == null) { ?>
                        <div><br><br>A partir du <?= $listeInvite->getDateCreation() ?><br></div>
                    <?php } else { ?>
                        <div><br><br>Du <?= $listeInvite->getDateCreation() ?>
                            <br>au <?= $listeInvite->getDateFin() ?></div>
                    <?php } ?>
                </div>

            <?php }
        ?>
    </div>
<?php } ?>
    <script>sort_by_name("alphab");</script>
</div>
