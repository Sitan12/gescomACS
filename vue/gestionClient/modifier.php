<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php
include ('../../model/bd.php');
include ('client.php');
$id=$_GET['id'];
?>
  <!-- ajouter un client -->
  <form class=" p-4" method="POST" action="edit.php" enctype="multipart/form-data">
          <div class="row font-weight-bolder" >
            <div class=" card bg-light offset-4 p-4 col-md-6">
            <h5 class="text-center">Remplissez les champs pour modifier les informations du client</h5>
              <label >Prenom & Nom</label>
              <input type="text" class="form-control" name="nom" value="<?php $rst=$conn->query("SELECT nom FROM client WHERE id=$id");
                while($row=$rst->fetch_assoc()){
                  echo$row['nom']; 
                }?>" required>
              <label >Adresse</label>
              <input type="text" class="form-control" name="adresse" value="<?php $rst=$conn->query("SELECT adresse FROM client WHERE id=$id");
                while($row=$rst->fetch_assoc()){
                  echo$row['adresse']; 
                }?>" required>
              <label >Email</label>
              <input type="email" class="form-control" name="email" value="<?php $rst=$conn->query("SELECT email FROM client WHERE id=$id ");
                while($row=$rst->fetch_assoc()){
                  echo$row['email']; 
                }?>" >
                <input type="hidden" name="id" value="<?php echo$id ?>">
              <label >Telephone</label>
              <input type="number" class="form-control mb-3" name="tel" value="<?php $rst=$conn->query("SELECT telephone FROM client WHERE id=$id");
                while($row=$rst->fetch_assoc()){
                  echo$row['telephone']; 
                }?>" required>
             <input type="submit" name="enregistrer" class="btn btn-success mb-2" value="Enregistrer">
              <input type="submit" name="annuler" class="btn btn-primary"  value="Annuler">
          </div>
      </form>