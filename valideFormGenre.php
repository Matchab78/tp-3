<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];

if($action == "Modifier"){
    $req=$monPdo->prepare("update genre set libelle=:libelle where num=:num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into genre(libelle) values(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
$nb=$req->execute();
$message= $action == "Modifier" ? "modifiée" : "ajoutée";

echo '<div class="container mt-5">';
echo '<div class="row"><div class="col mt-5">'; 

if($nb==1){
    $_SESSION['message']=["success"=>"Le genre a bien été ".$action];
}else{
    $_SESSION['message']=["danger"=>"Le genre n'a pas été ".$action];
}
header('location: listeGenre.php');
exit();
?>
    </div>
</div>
<a href="listeGenre.php" class="btn btn-dark">Revenir à la liste des genres</a>

</div>



<?php include "footer.php";

?>