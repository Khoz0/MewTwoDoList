<script type="text/javascript" src="javascript/verification_inscription.js"></script>
<?php
use App\Controllers\InscriptionController;

InscriptionController::class

?>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Inscription</h5>
                    <form class="form-sign_in" method="get" action="#">

                        <label for="nomUser">Votre nom</label>
                        <div class="form-label-group">
                            <input type="text" id="nomUser" onkeyup="verifLogin(this)" class="form-control" placeholder="Nom"
                                   required autofocus >
                        </div>

                        <label for="prenomUser">Votre prénom</label>
                        <div class="form-label-group">
                            <input type="text" id="prenomUser" onkeyup="verifLogin(this)" class="form-control" placeholder="Prénom"
                                   required autofocus>
                        </div>

                        <label for="inputPseudo">Votre pseudo</label>
                        <div class="form-label-group">
                            <input type="text" id="inputPseudo" class="form-control" placeholder="Pseudo"
                                   required autofocus>
                        </div>

                        <label for="mail">Votre adresse mail</label>
                        <div class="form-label-group">
                            <input type="email" id="mail" onkeyup="verifMail(this)" class="form-control" placeholder="Email"
                                   required autofocus>
                        </div>

                        <label for="mdp">Votre mot de passe</label>
                        <div class="form-label-group">
                            <input type="password" id="mdp" onkeyup="verifMDP(this)" class="form-control" placeholder="Mot de passe"
                                   required>
                        </div>

                        <label for="mdpConf">Confirmer votre mot de passe</label>
                        <div class="form-label-group">
                            <input type="password" id="mdpConf" class="form-control" placeholder="Confirmer votre mot de passe"
                                   required onkeyup="confMDP(this,document.getElementById('inputPassword').value)">
                        </div>
                        <br>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">S'inscrire</button>
                        <?php
                        if(isset($_GET["submit"])) {
                            header('Location: index.php?page=login');
                        }
                        ?>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>