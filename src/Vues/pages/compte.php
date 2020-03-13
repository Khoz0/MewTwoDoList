<?php
use \App\Controllers\CompteController;

$compte = (new App\Controllers\CompteController);
$user = unserialize($_SESSION['user']);

if(isset($_POST['submit'])){
    $_SESSION['inscription']["nomUser"] = $_POST["inputNom"];
    $_SESSION['inscription']["prenomUser"] = $_POST["inputPrenom"];
    $_SESSION['inscription']["pseudoUser"] = $_POST["inputPseudo"];
    $_SESSION['inscription']["mail"] = $_POST["inputEmail"];
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">

                    <h5 class="card-title text-center">Mon compte</h5>
                    <?php
                    if($user->getPhoto() == null){
                        echo "<img src='assests/profil.png' style='border-radius: 50%' alt='profil' class='small'/>";
                    }
                    else{
                        echo "<img src=\"".$user->getPhoto()."\" style='border-radius: 50%' alt='photo' class='small'/>";
                    }?>
                    <form class="form-sign_in" method="POST" action="?page=compte" enctype="multipart/form-data">
                        <?php if (isset($_POST["valider"])){
                            $compte->modification();

                        }?>
                        <br>
                        <label for="inputPseudo">Votre pseudo</label>
                        <div class="form-label-group">
                            <input type="text" name="inputPseudo" class="form-control" placeholder=<?php echo $user->getPseudo() ?>
                                   autofocus value="<?php if (isset($_SESSION['inscription']["pseudoUser"])){echo $_SESSION['inscription']["pseudoUser"];} ?>">
                            <?php
                            if(isset($_SESSION['error_exist'])){
                                if(isset($_SESSION['error_exist']['pseudo'])){
                                    if($_SESSION['error_exist']['pseudo'] == 1){
                                        echo "<em>Ce pseudo est déjà utilisé</em>";
                                        $_SESSION['error_exist']['pseudo'] = 0;
                                    }
                                }
                            }
                            ?>
                        </div>
                        <label for="inputNom">Votre nom</label>
                        <div class="form-label-group">
                            <input type="text" name="inputNom" class="form-control" placeholder=<?php echo $compte->getNom() ?>
                            value="<?php if (isset($_SESSION['inscription']["nomUser"])){echo $_SESSION['inscription']["nomUser"];} ?>">
                        </div>

                        <label for="inputPrenom">Votre prénom</label>
                        <div class="form-label-group">
                            <input type="text" name="inputPrenom" class="form-control" placeholder=<?php echo $compte->getPrenom() ?>
                            value="<?php if (isset($_SESSION['inscription']["prenomUser"])){echo $_SESSION['inscription']["prenomUser"];} ?>">
                        </div>

                        <label for="inputEmail">Votre adresse mail</label>
                        <div class="form-label-group">
                            <input type="email" name="inputEmail" class="form-control" placeholder="<?php echo $compte->getMail() ?>"
                                   disabled value="<?php if (isset($_SESSION['inscription']["mail"])){echo $_SESSION['inscription']["mail"];} ?>">
                        </div>

                        <label for='inputPhoto'>Votre photo de profil</label>
                        <div class='form-label-group'>
                            <input type='file' name='inputPhoto' id="inputPhoto" class='form-control'>
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
                    <br>
                        <a href="#" onclick="conf_suppression()">Supprimer le compte</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="javascript/modification_compte.js"></script>
<script src="javascript/suppression_compte.js"></script>
