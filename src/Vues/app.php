<?php

use App\Modeles\DB;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $titre ?></title>
    <script src="cdn/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="assests/favicon.ico" />
    <link rel="stylesheet" href="cdn/bootstrap-4.3.1-dist/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="cdn/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
</head>
<body>

<?php $page = $_GET['page'] ?? '';
if ($page != "login" && $page != "recuperationCompte" && $page != "disconnect" && $page != "inscription" && $page != "modifTache"){
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="?page=accueil">MewTwoDoList</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <li class="nav-item">
                </li>
            <li class="nav-item active">
                <li class="nav-item">
            </li>
            <li class="nav-item active">
                <li class="nav-item">
            </li>
        </ul>
    </div>
    <?php
    } ?>



    <!-- affichage des icônes de menu -->
    <?php if (isset($_SESSION['user']) && $page != "modifTache") {?>
        <div class="btn-group">

            <button class="btn btn-default dropdown-toggle mr-4 float-right" type="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <img src="assests/notif.png" alt="notification" width="20" height="20">
                <span class="badge badge-pill "><?php
                    $user = unserialize($_SESSION['user']);
                    $countNotif = 0;
                    $bddRequete = DB::getInstance()->getPDO();
                    $mail = $user->getMail();
                    $requete = $bddRequete->prepare("SELECT * FROM Notification WHERE mailMembre = :mail");
                    $requete->bindParam(':mail', $mail);
                    $requete->execute();
                    while ($donneesNotif = $requete->fetch()){
                        if ($donneesNotif['lu'] == 0){
                            $countNotif++;
                        }
                    }
                    $_SESSION['user'] = serialize($user);
                    echo $countNotif;?></span>
            </button>
            <?php
                $user = unserialize($_SESSION['user']);
                $mail = $user->getMail();
                $notifs = DB::getInstance()->loadNotif($mail);
                $i = 0;
                ?><div class="dropdown-menu dropdown-menu-right"><?php
                    if (!empty($notifs)) {
                        foreach ($notifs as $notification) {
                            if ($i < 3) { ?>
                                <div
                                <a class="dropdown-item"><?= $notification->getContenu() ?></a>
                                <?php
                                if (DB::getInstance()->isNotifAvecChoix($notification->getIdNotif())) {
                                    ?>
                                    <button class="btn">Accepter</button>
                                    <button class="btn">Refuser</button>
                                    <?php
                                }
                                ?> </div> <?php
                            }
                            $i++;
                        }
                    }
                    ?>
                    <br>
                    <button class="btn" onclick="window.location.href='?page=notification'">Mes notifications</button>
                </div>
        </div>
        <div class="btn-group">
            <button class="btn btn-default dropdown-toggle mr-4 float-right" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <?php
                $user = unserialize($_SESSION['user']);
                if ($user->getPhoto() == null) {
                    echo "<img src='assests/profil.png' alt='profil' class=\"img-rounded\" width=\"20\" height=\"20\">";
                } else {
                    echo "<img src=\"" . $user->getPhoto() . "\" class=\"img-rounded\" width=\"20\" height=\"20\" alt='profil'>";
                } ?>
            </button>

            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="?page=compte">Mon Compte</a>
                <?php if (isset($_SESSION['user'])) {?>
                    <a class="dropdown-item" href="?page=disconnect">Se déconnecter</a>
                <?php }else{ ?>
                    <a class="dropdown-item" href="?page=disconnect">Se connecter</a>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

        </nav>



<main>
    <section class="container">
        <?= $contenu ?>
    </section>
</main>

</body>


</html>
