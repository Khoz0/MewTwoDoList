<?php

use App\Modeles\DB;

?>
    <div class="jumbotron text-center">

	<h1>Accueil</h1>

	<p><?= $helloWorld ?></p>

	<a href="?page=blblbl">Lien page 404</a>
    </div>
<?php
if($_SESSION["user"]){?>
    <div class="jumbotron-fluid">
    <div class="row justify-content-center">
        <div class="col-auto">
        </div>
        <div class="col-auto">
        </div>
    </div>
    </div>
<?php } ?>