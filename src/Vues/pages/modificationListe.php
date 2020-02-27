<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Modification de ma liste</h5>
                    <form class="form-sign_in" method="POST" action="?page=modificationListe">
                        <?php
                        if(isset($_POST['submit'])){
                            $id = $_GET['id'];
                            $modificationListe->modifierListe($id);
                            if ($modificationListe->getModifier()) {
                                header("Location: '?page=liste&id=$id'");
                            }else{?>
                                <em> La date de fin de liste doit être postérieure à la date actuelle. </em><br>
                            <?php }
                        }
                        ?>
                        <label for="nomListe">Nom de la liste</label>
                        <div class="form-label-group">
                            <input type="text" id="nomListe" name="nomListe"  class="form-control" placeholder="Nom"
                                   required autofocus >
                        </div>

                        <label for="dateFin">Date de fin</label>
                        <div class="form-label-group">
                            <input type="date" name="dateFin" id="dateFin" class="form-control"
                            >
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

