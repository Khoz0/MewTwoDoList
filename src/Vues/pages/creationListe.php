<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création d'une liste</title>
</head>

<body>
<?php
use App\Controllers\CreationListeController;
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
                                (new App\Controllers\CreationListeController())->ajoutListe();
                                if ((new App\Controllers\CreationListeController)->getModifier()) {
                                    header("Location: ?page=accueil");
                                }else{?>
                                    <em> La date de création doit être antérieure à celle de fin de liste </em><br>
                                <?php }
                            }
                        ?>
                        <label for="nomListe">Nom de la liste</label>
                        <div class="form-label-group">
                            <input type="text" id="nomListe" name="nomListe"  class="form-control" placeholder="Nom"
                                   required autofocus >
                        </div>

                        <label for="dateDebut">Date de début</label>
                        <div class="form-label-group">
                            <input type="date"  name="dateDebut" id="dateDebut"  class="form-control"
                                   required autofocus>
                        </div>

                        <label for="dateFin">Date de fin</label>
                        <div class="form-label-group">
                            <input type="date" name="dateFin" id="dateFin" class="form-control"
                                   required autofocus>
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


</body>
</html>
