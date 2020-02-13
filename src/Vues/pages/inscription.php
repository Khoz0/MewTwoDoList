<script type="text/javascript" src="javascript/verification_inscription.js"></script>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Inscription</h5>
                    <form class="form-sign_in">

                        <label for="inputNom">Votre nom</label>
                        <div class="form-label-group">
                            <input type="text" id="inputNom" onkeyup="verifLogin(this)" class="form-control" placeholder="Nom"
                                   required autofocus >
                        </div>

                        <label for="inputPrenom">Votre prénom</label>
                        <div class="form-label-group">
                            <input type="text" id="inputPrenom" onkeyup="verifLogin(this)" class="form-control" placeholder="Prénom"
                                   required autofocus>
                        </div>

                        <label for="inputPseudo">Votre pseudo</label>
                        <div class="form-label-group">
                            <input type="text" id="inputPseudo" class="form-control" placeholder="Pseudo"
                                   required autofocus>
                        </div>

                        <label for="inputEmail">Votre adresse mail</label>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" onkeyup="verifMail(this)" class="form-control" placeholder="Email"
                                   required autofocus>
                        </div>

                        <label for="inputPassword">Votre mot de passe</label>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" onkeyup="verifMDP(this)" class="form-control" placeholder="Mot de passe"
                                   required>
                        </div>

                        <label for="inputPasswordConf">Confirmer votre mot de passe</label>
                        <div class="form-label-group">
                            <input type="password" id="inputPasswordConf" class="form-control" placeholder="Confirmer votre mot de passe"
                                   required onkeyup="confMDP(this,document.getElementById('inputPassword').value)">
                        </div>
                        <br>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">S'inscrire</button>
                        <hr class="my-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>