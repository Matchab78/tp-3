<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];

if($action == "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle=:libelle where num=:num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
$nb=$req->execute();
$message= $action == "Modifier" ? "modifiée" : "ajoutée";

echo '<div class="container mt-5">';
echo '<div class="row"><div class="col mt-5">'; 

if($nb==1){
    $_SESSION['message']=["success"=>"La nationalitée a bien été ".$action];
}else{
    $_SESSION['message']=["danger"=>"La nationalitée n'a pas été ".$action];
}
header('location: listeNationalite.php');
exit();
?>
    </div>
</div>
<a href="listeNationalite.php" class="btn btn-dark">Revenir à la liste des nationalitées</a>

</div>



<?php include "footer.php";

?>