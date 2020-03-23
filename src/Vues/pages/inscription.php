
<link rel="icon" href="assests/favicon.ico" />
<script type="text/javascript" src="javascript/verification_inscription.js"></script>
<?php
use App\Controllers\InscriptionController;


if(isset($_POST['submit'])){
    $_SESSION['inscription']["nomUser"] = $_POST["nomUser"];
    $_SESSION['inscription']["prenomUser"] = $_POST["prenomUser"];
    $_SESSION['inscription']["pseudoUser"] = $_POST["pseudoUser"];
    $_SESSION['inscription']["mail"] = $_POST["mail"];
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Inscription</h5>
                    <form class="form-sign_in" method="post" action="?page=addUser" enctype="multipart/form-data">

                        <label for="nomUser">Votre nom</label>
                        <div class="form-label-group">
                            <input type="text" id="nomUser" name="nomUser" onkeyup="verifLogin(this)" class="form-control" placeholder="Nom"
                                   required autofocus value="<?php if (isset($_SESSION['inscription']["nomUser"])){echo $_SESSION['inscription']["nomUser"];} ?>">
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('nom',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['nom'] == 1){
                                    echo "<em>Nom incorrect</em><br>";
                                }
                            }
                        }
                        ?>

                        <label for="prenomUser">Votre prénom</label>
                        <div class="form-label-group">
                            <input type="text"  name="prenomUser" id="prenomUser" onkeyup="verifLogin(this)" class="form-control" placeholder="Prénom"
                                   required autofocus value="<?php if (isset($_SESSION['inscription']["prenomUser"])){echo $_SESSION['inscription']["prenomUser"];} ?>">
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('prenom',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['prenom'] == 1){
                                    echo "<em>Prénom incorrect</em><br>";
                                }
                            }
                        }
                        ?>

                        <label for="inputPseudo">Votre pseudo</label>
                        <div class="form-label-group">
                            <input type="text" name="pseudoUser" id="pseudoUser" onkeyup="verifLogin(this)" class="form-control" placeholder="Pseudo"
                                   required autofocus value="<?php if (isset($_SESSION['inscription']["pseudoUser"])){echo $_SESSION['inscription']["pseudoUser"];} ?>">
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('pseudo',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['pseudo'] == 1){
                                    echo "<em>Pseudo incorrect</em><br>";
                                }
                            }
                        }
                        if(isset($_SESSION['error_exist'])) {
                            if(array_key_exists('pseudo',$_SESSION['error_exist'])){
                                if($_SESSION['error_exist']['pseudo'] == 1){
                                    echo "<em>Ce pseudo est déjà utilisé</em><br>";
                                }
                            }
                        }
                        ?>

                        <label for="mail">Votre adresse mail</label>
                        <div class="form-label-group">
                            <input type="email" name="mail" id="mail" onkeyup="verifMail(this)" class="form-control" placeholder="Email"
                                   required autofocus value="<?php if (isset($_SESSION['inscription']["mail"])){echo $_SESSION['inscription']["mail"];} ?>">
                        </div>
                        <?php
                        if(isset($_SESSION['error_syntx'])) {
                            if(array_key_exists('mail',$_SESSION['error_syntx'])){
                                if($_SESSION['error_syntx']['mail'] == 1){
                                    echo "<em>Mail incorrect</em><br>";
                                }
                            }
                        }
                        if(isset($_SESSION['error_exist'])) {
                            if(array_key_exists('mail',$_SESSION['error_exist'])){
                                if($_SESSION['error_exist']['mail'] == 1){
                                    echo "<em>Ce mail est déjà utilisé</em><br>";
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
                                    echo "<em>Mot de passe incorrect</em><br>";
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
                        if(isset($_SESSION['error_exist'])) {
                            if(array_key_exists('mdpConf',$_SESSION['error_exist'])){
                                if($_SESSION['error_exist']['mdpConf'] == 1){
                                    echo "<em>Les mots de passe ne correspondent pas</em><br>";
                                }
                            }
                        }
                        ?>

                        <label for="photo">Choisissez une photo de profil</label>
                        <div class="form-label-group">
                            <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                            <input type="file" name="photo" id="photo" size="50">
                        </div>
                        <br>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="submit" name="submit">S'inscrire</button>

                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
