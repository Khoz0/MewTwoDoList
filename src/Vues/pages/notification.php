<?php
use App\Modeles\DB;
?>
<script src="javascript/tri_liste.js"></script>
<div class="jumbotron-fluid text-center">

    <?php
if(isset($_SESSION["user"])){
    $user = unserialize($_SESSION['user']);
    $notif = $user->getTabNotification();
    $_SESSION['user'] = serialize($user); ?>
    <div class="jumbotron justify-content-center">
        <h1>Mes Notifications :</h1>

        <?php
            if(count($notif)==0){?>
        <p> Aucune notification ! </p>

        <?php
            }else{?>
        <button class="btn btn-dark float-left"> Tout sélectionner </button>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Liste</th>
                <th scope="col">Date</th>
                <th scope="col">Contenu</th>
            </tr>
            </thead>
            <tbody>
            <?php
                $cpt = 0;
                foreach ($notif as $not){
                    echo "<tr>";
                    echo "<th scope=\"row\"> <input type=\"checkbox\" id=\"notif\".$cpt ></th>";
                    echo "<td>$not->getIdListe()</td>";
                    echo "<td>$not->getDateCreation()</td>";
                    echo "<td>$not->getContenu()</td>";
                    echo "</tr>";
                    $cpt = $cpt + 1;
                }
            }
        ?>
            </tbody>
        </table>

    </div>

<?php } ?>
    <script>sort_by_name("alphab");</script>
    <div class="jumbotron justify-content-center">
                        <button class="btn btn-dark float-left" type="reset" value="Reset"> Annuler </button>
                        <button class="btn btn-dark float-right" type="submit" value="Submit"> Supprimer </button>
                    </div>
</div>

