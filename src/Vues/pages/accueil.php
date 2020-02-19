<?php

use App\Modeles\DB;

?>
    <div class="jumbotron text-center">

	<h1>Accueil</h1>

	<p><?= $helloWorld ?></p>

	<a href="?page=blblbl">Lien page 404</a>
    </div>
<?php
if(isset($_SESSION["user"])){?>
    <div class="jumbotron-fluid justify-content-center">
        <p>Mes listes :</p>
    </div>
    <div class="jumbotron-fluid">
        <div class="row justify-content-center">
            <?php
            $bdd = DB::getInstance()->getPDO();
            $requete = $bdd->prepare("SELECT * FROM Liste WHERE mailProprietaire = :mail");
            $loginSession = unserialize($_SESSION['user'])->getMail();
            $requete->bindParam('mail', $loginSession);
            $requete->execute();
            while($donnees = $requete->fetch()){
            ?>
                <div class="jumbotron col-auto" onclick="window.location.href='?page=liste'">
                    <?php echo $donnees['intituleListe'] ?>
                </div>
                <div class="jumbotron-fluid col-1"></div>
            <?php } ?>
        </div>
    </div>
<?php } ?>