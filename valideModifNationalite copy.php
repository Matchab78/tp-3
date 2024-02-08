<?php include "header.php";
include "connexionPdo.php";
$num=$_POST['num'];
$libelle=$_POST['libelle'];
$req=$monPdo->prepare("update nationalite set libelle=:libelle where num=:num");
$req->bindParam(':libelle', $libelle);
$nb=$req->execute();

echo '<div class="container mt-5">';
echo '<div class="row">
<div class="col mt-5">'; 

if($nb==1){
    echo'<div class="alert alert-dark" role="alert">
    La nationalitée a bien été add
    </div>';
}else{
    echo'<div class="alert alert-danger" role="alert">
    La nationalitée n\'a pas été add
    </div>';
}
?>
    </div>
</div>
<a href="listeNationalite.php" class="btn btn-dark">Revenir à la liste des nationalitées</a>

</div>



<?php include "footer.php";

?>