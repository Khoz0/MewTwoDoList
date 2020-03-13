<?php
use App\Modeles\DB;
?>
<script src="javascript/tri_liste.js"></script>
<div class="jumbotron-fluid text-center">

    <?php
if(isset($_SESSION["user"])){?>
    <div class="jumbotron justify-content-center">
        <h1>Mes Notifications :</h1>
        <button class="btn btn-dark float-left"> Tout sélectionner </button>
        <table class="table table-hover table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-dark">
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr class="table-dark">
              <th scope="row" >3</th>
              <td>Larry the Bird</td>
              <td>Larry the Bird</td>
              <td>@twitter</td>
            </tr>
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

