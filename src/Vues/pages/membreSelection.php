<?php
namespace App\Vues;
use App\Controllers\RechercheMembreController;
use App\Modeles\DB;

$membreSelection = new RechercheMembreController();
?>

<script type="text/javascript" src="cdn/jquery.js"></script>
<script type="text/javascript" src="javascript/tri_membre.js"></script>
<script type="text/javascript" src="javascript/ajouter_membre.js"></script>
<script type="text/javascript" src="javascript/request_member.js"></script>

<h4>Rechercher par:</h4>
<select id="criteria"
        onchange="setCriteria(document.getElementById('criteria').value,document.getElementById('site-search').value)">
    <option value="name" selected="selected">Nom & prénom</option>
    <option value="pseudo">Pseudo</option>
    <option value="mail">Mail</option>
</select>

<div class="row justify-content-center">
<input class="barre-recherche" type="search" id="site-search" name="q"
       placeholder="Rechercher un membre"
       onkeyup="setCriteria(document.getElementById('criteria').value,document.getElementById('site-search').value)">

<button>Rechercher</button>
</div>



    <div class="jumbotron-fluid">
        <div class="row justify-content-center" id="utilisateurs" style="display: flex">

            <?php
            $cpt = 0;

            $liste = DB::getInstance()->loadListe($_GET['id']);

            foreach (DB::getInstance()->getUtilisateurs("", null) as $user) {
                if ($user->getMail() != unserialize($_SESSION['user'])->getMail() && $cpt < 10 && !$liste->contientUtilisateur($user->getMail())) {
                    $cpt++;
                    ?>
                    <div class="jumbotron col-auto" style="border: solid; order=-1;padding: 10px; margin: 20px;"
                         id="<?php echo $user->getMail() ?>">

                        <table>
                            <tr>
                                <td>
                                    <?php
                                    if ($user->getPhoto() == null) {
                                        echo "<img src='assests/profil.png'  width=\"60px\"
                                            height=\"60px\" alt= " . $user->getMail() . ">";
                                    } else {
                                        echo "<img src=\"" . $user->getPhoto() . "\" width=\"60px\"
                                            height=\"60px\" alt= " . $user->getMail() . " >";
                                    } ?> </td>
                                <td width="30px"></td>
                                <td>
                                    <button onclick="addMembre('<?php echo $user->getMail();?>','<?php echo $_GET["id"]; ?>')">Ajouter</button>
                                </td>
                            </tr>
                            <br>
                        </table>

                        <br>
                        <div class="row justify-content-center"><?php echo $user->getMail() ?></div>
                        <div class="row justify-content-center"><?php echo $user->getPrenom() . " " . $user->getNom() ?></div>

                    </div>
                <?php }
            } ?>

        </div>
    </div>


<div class="row justify-content-center">
<button>Annuler</button>
</div>