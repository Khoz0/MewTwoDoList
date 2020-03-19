
<link rel="icon" href="assests/favicon.ico" />

<div class="container" id="particles-js">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h3 class="card-title text-center">Récupération mot de passe</h3>
                    <form class="form-sign_in" method="post" >
                        </br>
                        </br>

                        <h5 class="card-title text-center">Entrez votre adresse mail</h5>
                        <div class="form-label-group">
                            <input type="email" id="mail" name="mail" class="form-control"
                                   placeholder="Adresse mail"
                                    autofocus>
                        </div>
                        <br>
                        <h5 class="card-title text-center">OU</h5>
                    </br>
                        <h5 class="card-title text-center">Entrez votre pseudo</h5>
                        <div class="form-label-group">
                            <input type="text" id="pseudo" name="pseudo" class="form-control"
                                   placeholder="Pseudo"
                                   >
                        </div>

                        <br>
                        <em class="card-title text-center"><?= $err ?><?php echo '<br>' ?></em>
                            <button class="btn btn-lg btn-info btn-block text-uppercase" type="submit" value="submit" name="submit" type="submit" >Envoie du mail de récupération
                            </button>
                    </form>

                        <br>


                        <button class="btn btn-lg btn-primary2 btn-block text-uppercase" onclick="window.location.href='?page=login'">
                            Retour sur la page de connexion
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
