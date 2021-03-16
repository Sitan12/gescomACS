
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<?php
include('../../model/bd.php');
include ('info.php');
$id=$_GET['tel'];
?>
<!-- modifier un employer -->
<form class="container all-content-wrap" style="margin-left: 220px;" method="POST" action="edit.php" enctype="multipart/form-data">
            <h5 class="text-center">Formulaire de Modification</h5>
            <div class="row">
                <div class="col-4 offset-2">
                  <label >Nom</label>
                  <input type="text" class="form-control" name="nomEmp" value="
                  <?php $rst=$conn->query("SELECT nom FROM employer WHERE telephone='$id'");
                while($row=$rst->fetch_assoc()){
                  echo$row['nom']; 
                }?>
                  " required>
                  <label >Prenom</label>
                  <input type="text" class="form-control" name="prenomEmp" value="
                  <?php $rst=$conn->query("SELECT prenom FROM employer WHERE telephone='$id'");
                while($row=$rst->fetch_assoc()){
                  echo$row['prenom']; 
                }?>" required>
                  <label >Adresse</label>
                  <input type="text" class="form-control" name="adresseEmp" value="
                  <?php $rst=$conn->query("SELECT adresse FROM employer WHERE telephone='$id'");
                while($row=$rst->fetch_assoc()){
                  echo$row['adresse']; 
                }?> "
                 required>
                  <label >Email</label>
                  <input type="text" class="form-control" name="email" value="
                  <?php $rst=$conn->query("SELECT email FROM employer WHERE telephone='$id' ");
                while($row=$rst->fetch_assoc()){
                  echo$row['email']; 
                }?>" required>
                  <label >Poste Occupé</label>
                  <select class="form-control" name="poste"  required>
                    <option><?php $rst=$conn->query("SELECT posteServi FROM employer WHERE telephone='$id' ");
                while($row=$rst->fetch_assoc()){
                  echo$row['posteServi']; 
                }?></option>
                      <option value="DG">Directeur General</option>
                      <option value="assistant">Assistant</option>
                      <option value="technicien">Technicien</option>
                      <option value="gerant">Gerant</option>
                      <option value="autre">Autres</option>
                  </select>
            </div>
            <div class="col-4 ">
            <label >Salaire</label>
              <input type="text" class="form-control" name="salaireEmp" value=" <?php $rst=$conn->query("SELECT salaire FROM employer WHERE telephone='$id' ");
            while($row=$rst->fetch_assoc()){
              echo$row['salaire']; 
            }?>" required>
            <label >Date d'Integration</label>
              <input type="date" class="form-control" name="date" value="
              <?php $rst=$conn->query("SELECT DateIntegration FROM employer WHERE telephone='$id' ");
            while($row=$rst->fetch_assoc()){
              echo$row['DateIntegration']; 
            }?>" required>
            <label >Conges</label>
              <input type="text" class="form-control" name="conges" value="
              <?php $rst=$conn->query("SELECT conges FROM employer WHERE telephone='$id'");
            while($row=$rst->fetch_assoc()){
              echo$row['conges']; 
            }?>">
            <label >Assurance</label>
              <input type="text" class="form-control" name="assurance" value="
              <?php $rst=$conn->query("SELECT assurance FROM employer WHERE telephone='$id' ");
            while($row=$rst->fetch_assoc()){
              echo$row['assurance']; 
            }?>" >
             <input type="hidden" name="telephone" value="<?php echo $id?>">
            </div>
            <div class="col-12 p-4 text-center">
              <input type="submit" name="enregistrer" class="btn btn-success" value="Enregistrer">
              <input type="submit" name="annuler" class="btn btn-primary" data-dismiss="modal" value="Annuler">
            </div>
          </div>
      </form>