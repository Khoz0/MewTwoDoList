<script type="text/javascript" src="javascript/verification_inscription.js"></script>
<?php
use App\Controllers\CreationListeController;
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Création de ma liste</h5>
                    <form class="form-sign_in" method="post" action="?page=addUser">

                        <label for="nomListe">Nom de la liste</label>
                        <div class="form-label-group">
                            <input type="text" id="nomListe" name="nomListe"  class="form-control" placeholder="Nom"
                                   required autofocus >
                        </div>

                        <label for="dateDebut">Date de début</label>
                        <div class="form-label-group">
                            <input type="date"  name="dateDebut" id="dateDebut"  class="form-control" placeholder="Date début"
                                   required autofocus>
                        </div>

                        <label for="dateFin">Date de fin</label>
                        <div class="form-label-group">
                            <input type="date" name="dateFin" id="dateFin" class="form-control" placeholder="Date de fin"
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