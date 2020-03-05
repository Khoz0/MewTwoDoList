<?php

?>
<script type="text/javascript" src="cdn/jquery.js"></script>
<script type="text/javascript" src="javascript/tri_liste.js"></script>
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
                    <div class="jumbotron col-auto" style="border: solid; order=-1;padding: 30px; margin: 10px;"
                         id="<?php echo $liste->getIntituleListe().$liste->getIdListe() ?>"
                         onclick="window.location.href = '?page=liste&id=<?php echo $liste->getIdListe() ?>'">
                        <nom_listes><?php echo $liste->getIntituleListe() ?></nom_listes>
                        <dates><br><br>Du <?php echo $liste->getDateCreation()?><br>au <?php echo $liste->getDateFin()?></dates>
                    </div>
                <?php } ?>
        </div>
        <div class="jumbotron-fluid col-auto">
            <a onclick="window.location.href = '?page=creationListe'"><img src="assests/plus.png" alt="Ajouter une liste" width="140px" height="140px"/></a>
        </div>
    </div>
    <div class="jumbotron-fluid justify-content-center">
        <p>Les listes où je suis invité(e) :</p>
    </div>
<?php } ?>
    <script language="JavaScript">sort_by_name("alphab");</script>
</div>
