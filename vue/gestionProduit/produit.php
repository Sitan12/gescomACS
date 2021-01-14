<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Gestion des Produits</title>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin.php" ><img src="../../static/img/logo ACS.png" alt="logo"></a>
  <div class="navbar jutify content-end" id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item active">
      <a class="nav-link active text-dark" href="produit.php">Produit</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="../gestionClient/client.php">Client</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="../gestionEmployers/employer.php">Employés</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="../gestionComptabilite/caisse.php">Comptabilité</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link active text-dark dropdown-toggle" href="../gestionFacture" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Factures
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../gestionFacture/factureProforma.php">Facture Proforma</a>
          <a class="dropdown-item" href="../gestionFacture/factureDef.php">Facture Définitive</a>
        </div>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="#">Services</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Ajouter un produit
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enregistrer un nouveau produit </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class=" p-4" method="POST" action="../../controlleur/traitementProduit.php" enctype="multipart/form-data">
          <div class="row">
            <div class="">
                <h5>Remplissez les champs pour ajouter un produit</h5>
              <label >Nom</label>
              <input type="text" class="form-control" name="nomPro" placeholder="Nom du produit" required>
              <label >Description</label>
              <textarea class="form-control" name="descriptionPro" rows="3"  placeholder="Description du produit" required></textarea>
              <label >Image</label>
              <input type="file" class="form-control" name="imgPro" size="30"  required>
              <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
             <div class="modal-footer">
             <input type="submit" name="ajouter" class="btn btn-success" value="Ajouter">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- fin container -->
</div>
      <!-- liste des produits -->
      <?php 
include ('../../model/bd.php');
     $query1 = "SELECT *  FROM produit  ORDER BY id";
     $result = $conn-> query($query1);
    ?>
    <div class="row">
        <div class=" offset-1 col-10 p-4"> 
            <h4> liste des produits ajoutés récement</h4> 
        <table class="table table-bordered" >
         <thead align="center">
            <th>Identifiant</th>
            <th >Nom</th>
            <th >Description</th>
            <th>Date</th>
           <th >Image</th>
            <th >Action</th>
         </thead>
         <tbody> <?php
         while($row = $result->fetch_assoc()){?>
         <tr align="center">
             <td ><?=$row['id']?></td>
             <td ><?=$row['nomProduit']?></td>
             <td ><?=$row['descriptionProduit']?></td>
             <td ><?=$row['dateEnregistrement']?></td> 
            <td ><?=$row['imageProduit']?></td> 
             <td>
                 <a href="supprimerProduit.php?id=<?=$row['id']?>" class="btn btn-danger" >Supprimer</a>
                 <a href="ModifierProduit.php?id=<?=$row['id']?>" class="btn btn-info" >Modifier</a>
             </td>
         </tr>  
         <?php }
         ?>
         </tbody>
        </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>