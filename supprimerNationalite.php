<?php include "header.php";
include "connexionPdo.php";
$num=$_GET['num'];

$req=$monPdo->prepare("delete from nationalite where num=:num");
$req->bindParam(':num', $num);
$nb=$req->execute();

echo '<div class="container mt-5">';
echo '<div class="row">
<div class="col mt-5">'; 

if($nb==1){
    echo'<div class="alert alert-dark" role="alert">
    La nationalitée a bien été supprimée
    </div>';
}else{
    echo'<div class="alert alert-danger" role="alert">
    La nationalitée n\'a pas été supprimée
    </div>';
}
?>
    </div>
</div>
<a href="listeNationalite.php" class="btn btn-dark">Revenir à la liste des nationalitées</a>

</div>



<?php include "footer.php";

?>