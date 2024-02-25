<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];

$req=$monPdo->prepare("delete from genre where num=:num");
$req->bindParam(':num', $num);
$nb=$req->execute();

echo '<div class="container mt-5">';
echo '<div class="row">
<div class="col mt-5">'; 

if($nb==1){
    echo'<div class="alert alert-dark" role="alert">
    Le genre a bien été supprimé
    </div>';
}else{
    echo'<div class="alert alert-danger" role="alert">
    Le genre n\'a pas été supprimée
    </div>';
}
?>
    </div>
</div>
<a href="listeGenre.php" class="btn btn-dark">Revenir à la liste des genres</a>

</div>



<?php include "footer.php";

?>