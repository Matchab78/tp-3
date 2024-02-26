<?php include "header.php";
include "connexionPdo.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];
$continent=$_POST['continent'];

if($action == "Modifier"){
    $req=$monPdo->prepare("update nationalite set libelle= :libelle, numContinent= :continent where num= :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
}else{
    $req=$monPdo->prepare("insert into nationalite(libelle, numContinent) values(:libelle, :continent)");
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
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