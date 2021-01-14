<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../static/css/style.css">
    <title>Gestion des Factures</title>
    

</head>
<?php 
include ('../../model/bd.php');
?>
<body >
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin.php" ><img src="../../static/img/logo ACS.png" alt="logo"></a>
  <div class="navbar jutify content-end" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item active">
      <a class="nav-link active text-dark" href="../gestionProduit/produit.php">Produit</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="../gestionClient/client.php">Client</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="../gestionEmployers/employer.php">Equipe ACS</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="../gestionComptabilite/caisse.php">Comptabilité</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active text-dark" href="facture.php" >Factures</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="#">Services</a>
      </li>
    </ul>
  </div>
</nav>
</div>

<!-- Formulaire commande -->
<div class="container">
    <h4 class="p-4">Preparez vos factures clients en remplissant le formulaire ci dessus:</h4>
  <form class="insert-form p-4" method="POST" action="../../controlleur/traitementFacture.php" enctype="multipart/form-data">
    <div class="input-field">
              <div class="row">
              <div class="col-4 mb-3"><?php
                $query1 = "SELECT nom,id FROM client GROUP BY id";
                $result = $conn-> query($query1);
                ?>
                  <select class="form-control" name="client" >
                            <option value="0">Destinataire</option><?php
                            while($row = $result->fetch_assoc()){?>
                                  <option value="<?=$row['id']?>"><?=$row['nom']?></option>
                            <?php } ?>
                  </select>
                  </div>
                  <div class="col-4 offset-1">
                  <form class="text-dark" required>
                    <input type="radio" id="definitive" name="definitive" value="0" >
                    <label class="label"> DEFINITIVE</label>
                    <input type="radio" id="proforma" name="proforma" value="1"  class="ml-3">
                    <label class="label"> PROFORMA</label>
                  </form>
                  </div>
                  <div class="col-3">
                  <a href="../gestionClient/client.php"><button class="btn">Nouveau Client</button></a>
                  </div>
              </div>
                
        <table class="table table-bordered" id="table-field"> 
            <tr>
                <th>Produit</th>
                <th>Quantite</th>
                <th>Prix</th>
                <th><input type="button" name="add"  id="add" class="btn btn-warning" value="+"></th>
            </tr>
            <tr>
                <td><?php $query1 = "SELECT nomProduit,id FROM produit GROUP BY id"; 
                $result = $conn-> query($query1); ?>
                  <select class="form-control" name="produit[]" required>
                            <option>Choisir un produit</option>
      <?php while($row = $result->fetch_assoc()){?><option value="<?=$row['id']?>"><?=$row['nomProduit']?></option><?php } ?>
                        </select>
                </td>
                <td> <input class="form-control" name="qte[]" type="number" min="0" required></td>
                <td> <input class="form-control" name="prix[]" type="number" min="0"  required></td>
                <td><input type="button" name="retirer"  id="retirer" class="btn btn-danger" value="x"></td>
            </tr>
        </table>
        <center>
        <button class="btn btn-success" name="save">Valider</button>
        <!-- <input type="submit" name="save" class="btn btn-success" value="Ajouter a la Facture"> -->
        </center>
    </div>  
  </form>           
</div>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
      $(document).ready(function(){
        var ligne = '<tr>';
        ligne +='<td><?php $query1 = "SELECT nomProduit,id FROM produit GROUP BY id"; $result = $conn-> query($query1);?><select class="form-control" name="produit[]" required><option>Choisir un produit</option><?php while($row = $result->fetch_assoc()){?><option value="<?=$row['id']?>"><?=$row['nomProduit']?></option><?php } ?></select></td>';
        ligne += '<td> <input class="form-control" name="qte[]" type="number" min="0"  required></td>';
        ligne += '<td><input class="form-control" name="prix[]" type="number" min="0" required></td>';
        ligne += ' <td><input type="button" name="retirer"  id="retirer" class="btn btn-danger" value="x"></td>';
        ligne += '</tr';
        $("#add").click(function(){
         $("#table-field").append(ligne);
        });
        $("#table-field").on('click','#retirer',function(){
          $(this).closest('tr').remove();
        });
        
      });
    </script>
</body>
</html>