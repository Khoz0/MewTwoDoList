<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $titre ?></title>
    <script src="cdn/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cdn/bootstrap-4.3.1-dist/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="cdn/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
</head>
<body>

<?php $page = $_GET['page'] ?? '';
if ($page != "login" && $page != "disconnect" && $page != "inscription" && $page != "modifTache"){
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
            <button class="btn float-right" type="button"><img src="assests/notif.png" alt="notification" width="20" height="20"></button>
        </div>
        <div class="btn-group">
            <button class="btn btn-default dropdown-toggle mr-4 float-right" type="button" data-toggle="dropdown"
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


<main role="main">
    <section class="container">
        <?= $contenu ?>
    </section>
</main>
<script type="text/javascript">
    particlesJS({
        "particles": {
            "number": {
                "value": 160,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 1,
                "random": true,
                "anim": {
                    "enable": true,
                    "speed": 1,
                    "opacity_min": 0,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 4,
                    "size_min": 0.3,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": false,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 1,
                "direction": "none",
                "random": true,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 600
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "bubble"
                },
                "onclick": {
                    "enable": true,
                    "mode": "repulse"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 250,
                    "size": 0,
                    "duration": 2,
                    "opacity": 0,
                    "speed": 3
                },
                "repulse": {
                    "distance": 400,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });



</script>
</body>




</html>
