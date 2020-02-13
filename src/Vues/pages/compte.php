
<script type="text/javascript" src="cdn/jquery.js"> </script>
<script type="text/javascript" src="javascript/modification_compte.js"></script>

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

                        <div id=mdp>
                        </div>

                        <div id=newmdp>
                        </div>

                        <div id=confmdp>
                        </div>


                        <br>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" id="modifier">Modifier</button>
                        <div id=buttonmodif>
                        </div>
                        <hr class="my-4">
                    </form>

                      <button class="btn btn-lg btn-primary btn-block text-uppercase" href="?page=accueil">Retour</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
