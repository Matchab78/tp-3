<?php include "header.php";
include "connexionPdo.php";
$req=$monPdo->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n,  contient c where n.numContinent=c.num order by n.libelle");
$req->setFetchMode(PDO::FETCH_OBJ);
$lesNationalites=$req->fetchAll();
$req->execute();

if(!empty($_SESSION['message'])){
  $mesMessages=$_SESSION['message'];
  foreach($mesMessages as $key=>$message){
    echo'<div class="container pt-5">
            <div class="alert alert'.$key.' alert-dismissible fade show" role="alert">'.$message.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
         </div>';
  }
  $_SESSION['message']=[];
}
?>


<div class="container mt-5">
<div class="row pt-3">
    <div class="col-9"><h2>Liste des nationalités</h2></div>
    <div class="col-3"><a href="formNationalite.php?action=Ajouter" class='btn btn-success'><i class="fa-solid fa-plus"></i>  Créer une nationalitée</a></div>
</div>
<table class="table table-hover table-striped">
  <thead>
    <tr class="d-flex">
      <th scope="col" class="col-md-2">Numéro</th>
      <th scope="col" class="col-md-5">Libellé</th>
      <th scope="col" class="col-md-3">Continent</th>
      <th scope="col" class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesNationalites as $nationalite){
         
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>$nationalite->num</td>";
        echo "<td class='col-md-5'>$nationalite->libNation</td>";
        echo "<td class='col-md-3'>$nationalite->libContinent</td>";
        echo "<td class='col-md-2'>
            <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-dark'><i class='fa-solid fa-pen'></i></a>
            <a href='#modalSupp' data-toggle='modal' data-message='Suppression de cette nationalitée ?'data-suppression='supprimerNationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='fa-solid fa-trash-alt'></i></a>
        </td>";
        echo "</tr>";
    }
    //supprimerNationalite.php?num=$nationalite->num
    ?>
  </tbody>
</table>
</div>



<?php include "footer.php";

?>