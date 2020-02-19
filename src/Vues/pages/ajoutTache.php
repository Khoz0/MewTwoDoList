<?php



use \App\Controllers\AjoutTacheController;

AjoutTacheController::class;

?>
<?php
  if (isset($_POST['texte'])){
      (new App\Controllers\AjoutTacheController)->ajouterTache($_GET["id"]);
      echo "<script type='text/javascript'>",
            "window.close()",
            "</script>"; 
  }

 ?>
<div class="jumbotron text-center">
<h1 class="display-4"> Ajout  Tâche </h1>
</div>
<form class="form-sign_in" method="POST" action=<?php echo "?page=ajoutTache&id=".$_GET['id'] ;?> >
<div class="input-group">
  <div class="input-group-pretend">
    <span class="input-group-text"> Intitulé de la tâche </span>
  </div>
  <textarea class="form-control" aria-label="Intitulé de la tâche" name="texte"></textarea>
</div>
<div class="fixed-bottom">
  <button class="btn  btn-primary  text-uppercase" onclick="window.close()"> Annuler </button>
  <div class="float-md-right">
    <button class="btn  btn-primary  text-uppercase" type="submit"=> Confirmer </button>
  </div>
</div>
</form>
