<?php include "header.php";
include "connexionPdo.php";
$req=$monPdo->prepare("select * from genre");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesGenres=$req->fetchAll();
?>


<div class="container mt-5">
<div class="row pt-3">
    <div class="col-9"><h2>Liste des genres</h2></div>
    <div class="col-3"><a href="" class='btn btn-success'><i class="fa-solid fa-plus"></i>  Créer un genre</a></div>
</div>
<table class="table table-hover table-striped">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-8">Libellé</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesGenres as $genre){
         
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>$genre->num</td>";
        echo "<td class='col-md-8'>$genre->libelle</td>";
        echo "<td class='col-md-2'>
            <a href='' class='btn btn-primary'><i class='fa-solid fa-pen'></i></a>
            <a href='' class='btn btn-danger'><i class='fa-solid fa-trash-alt'></i></a>
        </td>";
        echo "</tr>";
    }

    ?>
  </tbody>
</table>
</div>



<?php include "footer.php";

?>