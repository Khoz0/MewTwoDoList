<?php


use \App\Modeles\DB;
use \App\Controllers\ModificationTacheController;
$modifTache = new App\Controllers\ModificationTacheController;
 ?>

 <?php
 if (isset($_GET['id'])) {
   $tache = DB::getInstance()->loadTache($_GET['id']);
   $intitule = $tache->getIntituleTache();
   $id = $tache->getIdTache();

   if (isset($_POST['texte'])){
       if (!empty($_POST['texte'])) {

           $tache->setIntituleTache($_POST['texte']);
           $tache->modifBDD();
           echo "<script type='text/javascript'>",
           "window.opener.location.reload(true);",
           "window.close();",
           "</script>";

       }else{ ?>
           <em> L'intitulé de la liste n'est pas rempli'. </em><br>
       <?php }
   }
 } else {
   $intitule = "";
 }
 ?>

<div class="jumbotron text-center">
<h1 class="display-4"> Modification de la tâche </h1>
</div>
<button class="btn float-right " type="button" data-toggle="dropdown" data-target="membres"
        aria-haspopup="listbox" aria-expanded="false" onclick="supprTache(this)" value="<?php echo $id; ?>"><img src="assests/membre_listes.png" width="20" height="20"></button>


<form class="form-sign_in" method="POST" action=<?php echo "?page=modifTache&id=".$_GET['id'] ;?> >
<div class="input-group">
  <div class="input-group-pretend">
    <span class="input-group-text"> Modification de la tâche </span>
  </div>
  <textarea class="form-control" aria-label="Intitulé de la tâche" name="texte" placeholder="<?php echo $intitule; ?>"></textarea>
</div>
<div class="fixed-bottom">
  <button class="btn  btn-primary  text-uppercase" onclick="window.close()"> Annuler </button>
  <div class="float-md-right">
    <button class="btn  btn-primary  text-uppercase" type="submit"=> Confirmer </button>
  </div>
</div>
</form>

<script type="text/javascript">
  function supprTache(elem) {
    id = elem.value

    if (confirm('Êtes vous sûr de vouloir supprimer votre tâche ?\nCette action est définitive !')) {
      window.opener.location.href='?page=deleteTache&id='+id;
      window.close();
    }
  }
</script>
