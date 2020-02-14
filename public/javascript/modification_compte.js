function init() {
  $("#modifier").click(affichage)
}

function affichage(event) {
  $("#mdp").html("<label for='inputPassword'>Votre mot de passe</label><div class='form-label-group'><input type='password' name='inputPassword' class='form-control' placeholder='Mot de passe' required></div>");
  $("#confmdp").html("<label for='inputPasswordConf'>Confirmer votre mot de passe</label><div class='form-label-group'><input type='password' name='inputPasswordConf' class='form-control' placeholder='Confirmer votre mot de passe'></div>");
  $("#newmdp").html("<label for='inputNewPassword'>Nouveau mot de passe</label><div class='form-label-group'><input type='password' name='inputNewPassword' class='form-control' placeholder='Nouveau mot de passe'></div>")
  $("#modifier").hide();
  $("#buttonmodif").html("<button class='btn btn-lg btn-primary btn-block text-uppercase' name='valider' type='submit' value='valider' >Valider</button>")
}

$(document).ready(function() {
  init();
});
