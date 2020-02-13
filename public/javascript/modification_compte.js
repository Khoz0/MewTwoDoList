function init() {
  $("#modifier").click(affichage)
}

function affichage(event) {
  console.log("Test");
  $("#mdp").html("<label for='inputPassword'>Votre mot de passe</label><div class='form-label-group'><input type='password' id='inputPassword' class='form-control' placeholder='Mot de passe' required></div>");
  $("#confmdp").html("<label for='inputPasswordConf'>Confirmer votre mot de passe</label><div class='form-label-group'><input type='password' id='inputPasswordConf' class='form-control' placeholder='Confirmer votre mot de passe'required></div>");
  $("#newmdp").html("<label for='inputNewPassword'>Nouveau mot de passe</label><div class='form-label-group'><input type='password' id='inputNewPassword' class='form-control' placeholder='Nouveau mot de passe'required></div>")
}

$(document).ready(function() {
  init();
});
