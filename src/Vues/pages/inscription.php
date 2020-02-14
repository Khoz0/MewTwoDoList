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
                    <form class="form-sign_in" method="POST" action="?page=inscription">

                        <label for="nomUser">Votre nom</label>
                        <div class="form-label-group">
                            <input type="text" id="nomUser" name="nomUser" onkeyup="verifLogin(this)" class="form-control" placeholder="Nom"
                                   required autofocus >
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('nom',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['nom'] == 1){
                                    echo "<label>Nom incorrect</label><br>";
                                }
                            }
                        }
                        ?>

                        <label for="prenomUser">Votre prénom</label>
                        <div class="form-label-group">
                            <input type="text"  name="prenomUser" id="prenomUser" onkeyup="verifLogin(this)" class="form-control" placeholder="Prénom"
                                   required autofocus>
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('prenom',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['prenom'] == 1){
                                    echo "<label>Prénom incorrect</label><br>";
                                }
                            }
                        }
                        ?>

                        <label for="inputPseudo">Votre pseudo</label>
                        <div class="form-label-group">
                            <input type="text" name="pseudoUser" id="pseudoUser" class="form-control" placeholder="Pseudo"
                                   required autofocus>
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('pseudo',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['pseudo'] == 1){
                                    echo "<label>Pseudo incorrect</label><br>";
                                }
                            }
                        }
                        ?>

                        <label for="mail">Votre adresse mail</label>
                        <div class="form-label-group">
                            <input type="email" name="mail" id="mail" onkeyup="verifMail(this)" class="form-control" placeholder="Email"
                                   required autofocus>
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('mail',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['mail'] == 1){
                                    echo "<label>Mail incorrect</label><br>";
                                }
                            }
                        }
                        ?>

                        <label for="mdp">Votre mot de passe</label>
                        <div class="form-label-group">
                            <input type="password" name="mdp" id="mdp" onkeyup="verifMDP(this)" class="form-control" placeholder="Mot de passe"
                                   required>
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('mdp',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['mdp'] == 1){
                                    echo "<label>Mot de passe incorrect</label><br>";
                                }
                            }
                        }
                        ?>

                        <label for="mdpConf">Confirmer votre mot de passe</label>
                        <div class="form-label-group">
                            <input type="password" name="mdpConf" id="mdpConf" class="form-control" placeholder="Confirmer votre mot de passe"
                                   required onkeyup="confMDP(this,document.getElementById('mdp').value)">
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('mdpconf',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['mdpconf'] == 1){
                                    echo "<label>Les mots de passe ne correspondent pas</label><br>";
                                }
                            }
                        }
                        ?>
                        <br>
                        <?php
                        if(isset($_POST["inscrire"])) {
                            echo "Bonjour";
                            header('Location: index.php?page=inscription');
                        }else{echo $_POST["inscrire"];}
                        ?>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" name ="inscrire" type="submit" value="inscrire">s'inscire</button>

                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>