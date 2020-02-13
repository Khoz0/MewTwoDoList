<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $titre ?></title>
	<link rel="stylesheet" href="cdn/bootstrap-4.3.1-dist/css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

    <?php $page = $_GET['page'] ?? '' ?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="/">MewTwoToList</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<?php if ($page == 'accueil') { ?>
					<li class="nav-item active">
                <?php }else{ ?>
                    <li class="nav-item">
                <?php } ?>
					<a class="nav-link" href="?page=accueil">Accueil <span class="sr-only">(current)</span></a>
				</li>
				<?php if(false) { 
				if ($page == 'compte') { ?>
					<li class="nav-item active">
                <?php }else{ ?>
                    <li class="nav-item">
                <?php } ?>
						<a class="nav-link" href="?page=compte">Mon compte</a>
					</li>
				<?php } else {
					if ($page == 'login') { ?>
                        <li class="nav-item active">
                    <?php }else{ ?>
                        <li class="nav-item">
                    <?php } ?>
						<a class="nav-link" href="?page=login">Connexion</a>
					</li>
					<?php if ($page == 'inscription') { ?>
                        <li class="nav-item active">
                    <?php }else{ ?>
                        <li class="nav-item">
                    <?php } ?>
						<a class="nav-link" href="?page=inscription">Inscription</a>
					</li>
				<?php } ?>
			</ul>

		</div>
	</nav>

	<main role="main">
		<section class="container">
			<?= $contenu ?>
		</section>
	</main>


	<script src="cdn/jquery.js"></script>
	<script src="cdn/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
</body>
</html>
