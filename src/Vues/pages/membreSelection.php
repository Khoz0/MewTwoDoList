<?php
namespace App\Vues;
use App\Controllers\RechercheMembreController;
use App\Modeles\DB;

$membreSelection = new RechercheMembreController();
?>

<script type="text/javascript" src="javascript/tri_membre.js"></script>

<h4>Rechercher par:</h4>
<select onchange="sort_by_name(this.value)" onload="sort_by_name(this.value)">
    <option value="nom">Nom & prénom</option>
    <option value="pseudo">Pseudo</option>
    <option value="mail">Mail</option>
</select>


<input class="barre-recherche" type="search" id="site-search" name="q"
       aria-label="Rechercher un membre...">

<button>Rechercher</button>


<div class="scroller">
    <div class="jumbotron-fluid">
        <div class="row justify-content-center" id="utilisateurs" style="display: flex">

            <?php
            $cpt = 0;
            foreach (DB::getInstance()->getUtilisateurs() as $user) {
                if ($user->getMail() != unserialize($_SESSION['user'])->getMail() && $cpt < 10) {
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
                                    <button>Ajouter</button>
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

</div>
<div class="row justify-content-center">
<button>Annuler</button>
</div>