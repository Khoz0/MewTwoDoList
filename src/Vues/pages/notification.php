<?php
use App\Modeles\DB;
?>
<script src="javascript/tri_liste.js"></script>
<div class="jumbotron-fluid text-center">

    <?php
if(isset($_SESSION["user"])){
    $user = unserialize($_SESSION['user']);
    $notif = 0;
    $mail = $user->getMail();
    $bddRequete = DB::getInstance()->getPDO();
    $requete = $bddRequete->prepare("SELECT * FROM Notification WHERE mailMembre = :mail");
    $requete->bindParam(':mail', $mail);
    $requete->execute();
    while ($donnees = $requete->fetch()){
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
                $requete = $bddRequete->prepare("SELECT * FROM Notification WHERE mailMembre = :mail");
                $requete->bindParam(':mail', $mail);
                $requete->execute();
                while ($donnees = $requete->fetch()) {
                    echo "<tr>";
                    echo "<th scope=\"row\"> <input type=\"checkbox\" id=\"notif\".$cpt ></th>";
                    echo "<td>".$donnees['idListe']."</td>";
                    echo "<td>".$donnees['dateEnvoi']."</td>";
                    echo "<td>".$donnees['contenu']."</td>";
                    echo "</tr>";
                    $cpt++;
                }
                /*$cpt = 0;
                foreach ($notif as $not){
                    echo "<tr>";
                    echo "<th scope=\"row\"> <input type=\"checkbox\" id=\"notif\".$cpt ></th>";
                    echo "<td>$not->getIdListe()</td>";
                    echo "<td>$not->getDateCreation()</td>";
                    echo "<td>$not->getContenu()</td>";
                    echo "</tr>";
                    $cpt = $cpt + 1;
                }*/

        ?>
            </tbody>
        </table>

    </div>
    <script>sort_by_name("alphab");</script>
    <div class="jumbotron justify-content-center">
        <button class="btn btn-dark float-left" type="reset" value="Reset"> Annuler </button>
        <button class="btn btn-dark float-right" type="submit" value="Submit"> Supprimer </button>
    </div>
    <?php } ?>
</div>
<?php } ?>



