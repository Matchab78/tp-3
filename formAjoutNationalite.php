<?php include "header.php";

?>

<div class="container mt-5">
    <h2 class="pt-3 text-center">Ajouter une nationalitée</h2>
<form action="valideAjoutNationalite.php" method ="post" class="col-md-6 offset-md-3 border border-dark p-3 rounded">
    <div class="form-group">
        <label for="libelle">Libellé</label>
        <input type="text" class='form-control' id='libelle' placeholder='Saisir le libellé' name='libelle'>
    </div>
    <div class="row">
        <div class="col"><a href="listeNationalite.php" class='btn btn-dark btn-block'>Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-dark btn-block'>Ajouter</button></div>
    </div>
</form>
</div>

<?php include "footer.php";

?>