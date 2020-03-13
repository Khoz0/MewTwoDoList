<?php

namespace App\Vues;

use App\Controllers\ModificationListeController;

$modificationListe = new ModificationListeController();
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Modification de ma liste</h5>
                    <?php
                    $id = $_GET['id'];
                    $user = unserialize($_SESSION['user']);
                    $liste = $user->recupererListe($id);
                    $_SESSION['user'] = serialize($user);
                    ?>
                    <form class="form-sign_in" method="POST" action="?page=modificationListe&id=<?php echo $id; ?>">
                        <?php
                        if(isset($_POST['submit'])){
                            $modificationListe->modifierListe($id);
                            if ($modificationListe->getModifier()) {
                                header("Location: ?page=liste&id=$id");
                            }else{?>
                                <em> La date de fin de liste doit être postérieure à la date actuelle. </em><br>
                            <?php }
                        }
                        ?>
                        <label for="nomListe">Nom de la liste</label>
                        <div class="form-label-group">
                            <?php echo $modificationListe->getAncienNom()?>
                            <input type="text" id="nomListe" name="nomListe"  class="form-control" placeholder="<?= htmlspecialchars($liste->getIntituleListe()) ?>"
                                   required >
                        </div>

                        <label for="dateFin">Date de fin</label>
                        <div class="form-label-group">
                            <input type="date" name="dateFin" id="dateFin" class="form-control"
                            >
                        </div>

                        <br>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="submit" name="submit">Valider</button>
                        <br><a href='?page=liste&id=<?=$id?>'>Retour</a>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

