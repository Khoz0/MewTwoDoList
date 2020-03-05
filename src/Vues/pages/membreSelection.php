<?php
namespace App\Vues;

use App\Controllers\RechercheMembreController;

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


</div>

<button>Annuler</button>
<button>Valider</button>