<?php
use \App\Controllers\CompteController;

CompteController::class;

?>
<script type="text/javascript" src="cdn/jquery.js"> </script>
<script type="text/javascript" src="javascript/modification_compte.js"></script>
<?php
  $compte = CompteController::recuperation_donnees();
 ?>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Compte</h5>
                    <form class="form-sign_in" method="POST" action="?page=compte">
                        <?php if (isset($_POST["valider"])){
                            (new App\Controllers\CompteController)->modification();

                        }?>
                        <label for="inputPseudo">Votre pseudo</label>
                        <div class="form-label-group">
                            <input type="text" name="inputPseudo" class="form-control" placeholder=<?php echo $compte['pseudoUser']/*(new CompteController)->getPseudo()*/ ?>
                                   autofocus>
                        </div>
                        <label for="inputNom">Votre nom</label>
                        <div class="form-label-group">
                            <input type="text" name="inputNom" class="form-control" placeholder=<?php echo $compte['nomUser'] ?>
                                    >
                        </div>

                        <label for="inputPrenom">Votre prénom</label>
                        <div class="form-label-group">
                            <input type="text" name="inputPrenom" class="form-control" placeholder=<?php echo $compte['prenomUser'] ?>
                                   >
                        </div>

                        <label for="inputEmail">Votre adresse mail</label>
                        <div class="form-label-group">
                            <input type="email" name="inputEmail" class="form-control" placeholder="<?php echo $compte['mail'] ?>"
                                   disabled>
                        </div>

                        <div id=mdp>
                        </div>

                        <div id=newmdp>
                        </div>

                        <div id=confmdp>
                        </div>


                        <br>

                        <div id=buttonmodif>
                        </div>
                        <hr class="my-4">
                    </form>
                     <button class="btn btn-lg btn-primary btn-block text-uppercase" id="modifier">Modifier</button>
                    <br>
                      <button class="btn btn-lg btn-primary btn-block text-uppercase" onclick="window.location.href='?page=accueil'">Retour</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
