<body id="particles-js">
<div class="container" id="particles-js">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Connexion / Déconnexion</h5>
                    <form class="form-sign_in" method="post" action="?page=sessioncreate">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="mail" class="form-control"
                                   placeholder="Adresse mail"
                                   required autofocus>
                        </div>
                        <br>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="mdp" class="form-control"
                                   placeholder="Mot de passe"
                                   required>
                        </div>

                        <br>

                        </button>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Connexion</button>
                        <br>
                        <hr class="my-4">
                    </form>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" onclick="window.location.href='?page=inscription'">Inscription
                        </button>

                    <br>


                        <button class="btn btn-lg btn-primary2 btn-block text-uppercase" onclick="window.location.href='?page=inscription'">
                            Mot de passe oublié ?
                          </button>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
