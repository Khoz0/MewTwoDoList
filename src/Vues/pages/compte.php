<link type="text/css" rel="stylesheet" href="css/sign_in.css">
<link type="text/css" rel="stylesheet" href="css/all.css">
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/jquery.slim.min.js"></script>
<script src="particles.js"></script>

<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Compte</h5>
                    <form class="form-sign_in">

                      <label for="inputNom">Votre pseudo</label>
                      <div class="form-label-group">
                          <input type="text" id="inputNom" class="form-control" placeholder="Nom"
                                 required autofocus>
                      </div>


                        <label for="inputNom">Votre nom</label>
                        <div class="form-label-group">
                            <input type="text" id="inputNom" class="form-control" placeholder="Nom"
                                   required autofocus>
                        </div>

                        <label for="inputPrenom">Votre prénom</label>
                        <div class="form-label-group">
                            <input type="text" id="inputPrenom" class="form-control" placeholder="Prénom"
                                   required autofocus>
                        </div>

                        <label for="inputEmail">Votre adresse mail</label>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email"
                                   required autofocus>
                        </div>

                        <label for="inputPassword">Votre mot de passe</label>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe"
                                   required>
                        </div>

                        <label for="inputPasswordConf">Confirmer votre mot de passe</label>
                        <div class="form-label-group">
                            <input type="password" id="inputPasswordConf" class="form-control" placeholder="Confirmer votre mot de passe"
                                   required>
                        </div>

                        <br>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Modifier</button>
                        <hr class="my-4">
                    </form>
                      <button class="btn btn-lg btn-primary btn-block text-uppercase" href="?page=accueil" type="submit">Retour</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
