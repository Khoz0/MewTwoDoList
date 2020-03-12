<?php
use App\Modeles\DB;
?>
<script type="text/javascript" src="cdn/jquery.js"></script>
<script type="text/javascript" src="javascript/tri_liste.js"></script>
<div class="jumbotron-fluid text-center">

    <?php
if(isset($_SESSION["user"])){?>
    <div class="jumbotron justify-content-center">
        <h1>Mes Notifications :</h1>

    </div>
<?php } ?>
    <script language="JavaScript">sort_by_name("alphab");</script>
</div>
