<?php include "header.php";
$action=$_GET['action'];
if($action == "Modifier"){
    include "connexionPdo.php";
    $num=$_GET['num'];
    $req=$monPdo->prepare("select * from nationalite where num= :num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $laNationalite=$req->fetch();
    $req->execute();
}
?>

<div class="container mt-5">
    <h2 class="pt-3 text-center"> <?php echo $action ?> une nationalitée</h2>
<form action="valideFormNationalite.php?action=<?php echo $action ?>" method ="post" class="col-md-6 offset-md-3 border border-dark p-3 rounded">
    <div class="form-group">
        <label for="libelle">Libellé</label>
        <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle' value="<?php if($action == "Modifier"){echo $laNationalite->libelle;} ?>">
    </div>
    <input type="hidden" id="num" name="num" value="<?php if($action == "Modifier"){ echo $laNationalite->num;} ?>">
    <div class="row">
        <div class="col"><a href="listeNationalite.php" class='btn btn-dark btn-block'>Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-dark btn-block'> <?php echo $action ?> </button></div>
    </div>
</form>
</div>

<?php include "footer.php";

?>