<div class="container" id="particles-js">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-sign_in my-5">
                <div class="card-body">
                    <h3 class="card-title text-center">Récupération mot de passe</h3>
                    <form class="form-sign_in" method="post" action="?page=sessioncreate">

                        <h5 class="card-title text-center">Rentrer votre adresse mail</h5>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="mail" class="form-control"
                                   placeholder="Adresse mail"
                                   required autofocus>
                        </div>
                        <br>
                        <h5 class="card-title text-center">OU</h5>
                        <h5 class="card-title text-center">Rentrer votre pseudo</h5>
                        <div class="form-label-group">
                            <input type="text" id="inputPseudo" name="pseudo" class="form-control"
                                   placeholder="Pseudo"
                                   required>
                        </div>

                        <br>


                        <button class="btn btn-lg btn-info btn-block text-uppercase" type="submit">Connexion</button>



                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
