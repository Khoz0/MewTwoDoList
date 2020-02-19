
<?php

use App\Modeles\DB;

?>
<script type="text/javascript" src="cdn/jquery.js"></script>
<script type="text/javascript" src="javascript/tri_liste.js"></script>
<div class="jumbotron text-center">

    <?php
if(isset($_SESSION["user"])){?>
    <div class="jumbotron-fluid justify-content-center">
        <h1>Mes listes :</h1>
        <br>
    </div>
    <div class="jumbotron-fluid">
        <div class="row justify-content-center">
            <div class="jumbotron-fluid col-auto" id="liste" style="display: flex; justify-content: space-between">
                <?php
            $bdd = DB::getInstance()->getPDO();
            $requete = $bdd->prepare("SELECT * FROM Liste WHERE mailProprietaire = :mail");
            $loginSession = unserialize($_SESSION['user'])->getMail();
                $requete->bindParam('mail', $loginSession);
                $requete->execute();
                echo "<div class=\"jumbotron-fluid col-1\"></div>";
                while ($donnees = $requete->fetch()) {
                    ?>
                    <div class="jumbotron col-auto" style="border: solid"
                         onclick="window.location.href = '?page=liste&id=<?php echo $donnees['idListe'] ?>'">
                        <nom_listes><?php echo $donnees['intituleListe'] ?></nom_listes>
                    </div>
                    <div class="jumbotron-fluid col-1"></div>
                <?php } ?>
                <div class="jumbotron col-auto" style="border: solid" id="patate"
                     onclick="window.location.href = '?page=liste&id=<?php echo 1 ?>'">
                    <nom_listes><?php echo "patate" ?></nom_listes>
                </div>
                <div class="jumbotron-fluid col-1"></div>
                <div class="jumbotron col-auto" style="border: solid" id="chien"
                     onclick="window.location.href = '?page=liste&id=<?php echo 1 ?>'">
                    <nom_listes><?php echo "chien" ?></nom_listes>
                </div>
                <div class="jumbotron-fluid col-1"></div>
            </div>
        </div>
        <div class="jumbotron-fluid col-auto">
            <a onclick="window.location.href = '?page=creationListe'"><img src="assests/plus.png"
                                                                           alt="Ajouter une liste" width="140px"
                                                                           height="140px"/></a>
        </div>
    </div>
<?php } ?>
    <script language="JavaScript">sort_by_name();</script>
</div>
