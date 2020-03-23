<?php
use App\Modeles\DB;
?>
<script src="javascript/notif.js"></script>
<script src="javascript/tri_liste.js"></script>
<div class="jumbotron-fluid text-center">

    <?php
if(isset($_SESSION["user"])){
    $user = unserialize($_SESSION['user']);
    $notif = 0;
    $mail = $user->getMail();
    $notifications = DB::getInstance()->loadNotif($mail);
    foreach ($notifications as $not){
        $notif++;
    }
    $_SESSION['user'] = serialize($user); ?>
    <div class="jumbotron justify-content-center">
        <h1>Mes Notifications :</h1>

        <?php
            if($notif==0){?>
        <p> Aucune notification ! </p>

        <?php
            }else{?>
        <button class="btn btn-dark float-left" id="check">
          <span class="ui-button-text">Tout sélectionner</span>
         </button>
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
                foreach ($notifications as $not){
                    echo "<tr>";
                    echo "<th scope=\"row\"> <input type=\"checkbox\" data-id=".$not->getIdNotif()." id=\"notif\".$cpt ></th>";
                    echo "<td> Liste ".$not->getIdListe()."</td>";
                    echo "<td>".$not->getDateCreation()."</td>";
                    if(DB::getInstance()->isNotifAvecChoix($not->getIdNotif())) {?>
                        <td> <?php echo $not->getContenu() ?>  <a href="#" style="color:#70F92B;" onclick="conf_validation(<?php echo $not->getIdListe() ?>,<?php echo $not->getIdNotif() ?>)">accepter</a>
                            <a href="#" style="color:#F73B1D;" onclick="conf_refus(<?php echo $not->getIdListe() ?>,<?php echo $not->getIdNotif() ?>)">refuser</a></td>
                   <?php }else{
                        echo "<td>" . $not->getContenu() . "</td>";
                    }
                    echo "</tr>";
                    $cpt++;
                }
        ?>
            </tbody>
        </table>

    </div>
    <script>sort_by_name("alphab");</script>
    <div class="jumbotron justify-content-center">
        <button class="btn btn-dark float-left" type="reset" value="Reset"> Annuler </button>
        <button class="btn btn-dark float-right" type="submit" id="suppr" value="Submit"> Supprimer </button>
    </div>
    <?php } ?>
</div>
<?php } ?>
