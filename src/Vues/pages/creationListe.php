<?php

namespace App\Vues;

use App\Controllers\CreationListeController;

$creationListe = new CreationListeController();

if(isset($_POST['submit'])){
    $_SESSION['creation_liste']["nom"] = $_POST["nomListe"];
    $_SESSION['creation_liste']["dateDebut"] = $_POST["dateDebut"];
    $_SESSION['creation_liste']["dateFin"] = $_POST["dateFin"];
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Création de ma liste</h5>
                    <form class="form-sign_in" method="POST" action="?page=creationListe">
                        <?php
                            if(isset($_POST['submit'])){
                                $creationListe->ajoutListe();
                                if ($creationListe->getModifier()) {
                                    header("Location: ?page=accueil");
                                }else{?>
                                    <em> La date de création doit être antérieure à celle de fin de liste et la date de fin de liste doit être postérieure à la date actuelle. </em><br>
                                <?php }
                            }
                        ?>
                        <label for="nomListe">Nom de la liste</label>
                        <div class="form-label-group">
                            <input type="text" id="nomListe" name="nomListe"  class="form-control" placeholder="Nom"
                                   required autofocus value="<?php if (isset($_SESSION['creation_liste']["nom"])){echo $_SESSION['creation_liste']["nom"];} ?>">
                        </div>

                        <label for="dateDebut">Date de début</label>
                        <div class="form-label-group">
                            <input type="date" name="dateDebut" id="dateDebut"  class="form-control"
                                   required value="<?php if (isset($_SESSION['creation_liste']["dateDebut"])){echo $_SESSION['creation_liste']["dateDebut"];} ?>">
                        </div>

                        <label for="dateFin">Date de fin</label>
                        <div class="form-label-group">
                            <input type="date" name="dateFin" id="dateFin" class="form-control"
                                   value="<?php if (isset($_SESSION['creation_liste']["dateFin"])){echo $_SESSION['creation_liste']["dateFin"];} ?>">
                        </div>

                        <br>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="submit" name="submit">Valider</button>

                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

unset($_SESSION['creation_liste']);
