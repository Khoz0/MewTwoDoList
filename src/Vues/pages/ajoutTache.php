<?php
use \App\Controllers\AjoutTacheController;
$ajoutTache = new App\Controllers\AjoutTacheController;

 ?>
<div class="jumbotron text-center">
<h1 class="display-4"> Ajout  Tâche </h1>
</div>
<?php
if (isset($_POST['texte'])){
    if (!empty($_POST['texte'])) {
        $ajoutTache->ajouterTache($_GET["id"]);
        echo "<script type='text/javascript'>",
        "window.opener.location.reload(true);",
        "window.close();",
        "</script>";
    }else{ ?>
        <em> La date de création doit être antérieure à celle de fin de liste et la date de fin de liste doit être postérieure à la date actuelle. </em><br>
    <?php }
}
?>
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
