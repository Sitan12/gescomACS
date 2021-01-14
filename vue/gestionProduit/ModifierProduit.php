<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php
include ('../../model/bd.php');
 $id=$_GET['id'];
 ?>
<form class=" p-4" method="POST" action="EditText.php" enctype="multipart/form-data">
          <div class="row">
            <div class="offset-1 col-4">
                <h4>Formulaire de modification produit</h3>
              <label >Nom</label>
              <input type="text" class="form-control" name="nomPro" value="<?php $rst=$conn->query("SELECT nomProduit FROM produit WHERE id=$id");
            while($row=$rst->fetch_assoc()){
              echo''.$row['nomProduit'];
            }
          ?>" placeholder="Entrer le nom du produit" required>
              <label >Description</label>
              <textarea class="form-control" name="descriptionPro" rows="3"  placeholder="Donner une description du produit" required 
              ><?php $rst=$conn->query("SELECT descriptionProduit FROM produit WHERE id=$id");
            while($row=$rst->fetch_assoc()){
              echo''.$row['descriptionProduit'];
            }
          ?></textarea> 
              <label >Image</label>
              <input type="file" class="form-control" name="imgPro" value="<?php $rst=$conn->query("SELECT imageProduit FROM produit WHERE id=$id");
            while($row=$rst->fetch_assoc()){
              echo''.$row['imageProduit'];
            }
          ?>" required > 
          <input type="hidden" name="id" value="<?php echo $id?>">
             <div class="p-4">
             <input type="submit" name="enregistrer" class="btn btn-success" value="Enregistrer">
             </div>
            </div>
          </div>
      </form>