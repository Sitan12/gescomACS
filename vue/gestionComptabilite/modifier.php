<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php
include('../../model/bd.php');
$id=$_GET['id'];
?>
<!-- modifier -->
<form class=" p-4" method="POST" action="edit.php" enctype="multipart/form-data">
 <h5 class="text-center">CAISSE</h5>
          <div class="row">
            <div class="col-4">
            <label>Indiquez le reglement</label>
            <select class="form-control" name="type">
            <option><?php $rst=$conn->query("SELECT typeEnregistrement FROM caisse WHERE id=$id");
                while($row=$rst->fetch_assoc()){
                  echo$row['typeEnregistrement']; 
                }?></option>
                <option value="Entree">Entrée</option>
                <option value="Sortie">Sortie</option>
            </select>
              <label >Motif</label>
              <input type="text" class="form-control" name="motif" value="<?php $rst=$conn->query("SELECT motif FROM caisse WHERE id=$id");
                while($row=$rst->fetch_assoc()){
                  echo$row['motif']; 
                }?>" required>
              <label >Montant</label>
              <input type="number" class="form-control mb-3" name="montant" value="<?php $rst=$conn->query("SELECT montant FROM caisse WHERE id=$id");
                while($row=$rst->fetch_assoc()){
                  echo$row['montant']; 
                }?>" required>
                <input type="hidden" name="id" value="<?php echo $id ?>">
             <input type="submit" name="enregistrer" class="btn btn-success" value="Enregistrer">
          </div>
      </form>