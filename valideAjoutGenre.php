<?php include "header.php";
include "connexionPdo.php";
$libelle=$_POST['libelle'];
$req=$monPdo->prepare("insert into genre(libelle) values(:libelle)");
$req->bindParam(':libelle', $libelle);
$nb=$req->execute();

echo '<div class="container mt-5">';
echo '<div class="row">
<div class="col mt-5">'; 

if($nb==1){
    echo'<div class="alert alert-dark" role="alert">
    Le genre a bien été add
    </div>';
}else{
    echo'<div class="alert alert-danger" role="alert">
    Le genre n\'a pas été add
    </div>';
}
?>
    </div>
</div>
<a href="listeGenre.php" class="btn btn-dark">Revenir à la liste des genres</a>

</div>



<?php include "footer.php";

?>