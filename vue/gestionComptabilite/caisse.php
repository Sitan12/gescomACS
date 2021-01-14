<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Comptabilite</title>
</head>
<body>
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
      <a class="nav-link active text-dark" href="../gestionEmployers/employer.php">Employés</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="caisse.php">Comptabilité</a>
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
</div>
 <!-- afficher les entrees/sorties pour une date -->
 <!-- <nav class="navbar navbar-light bg-light">
  <form class="form-inline">
    <input class="form-control " type="date" placeholder="Search" aria-label="Search" name="recherche">
    <button class="btn btn-outline-success " type="submit">Search</button>
  </form>
</nav> -->

 <div class="container">
      <!-- ajouter un depense -->
  <form class=" p-4" method="POST" action="../../controlleur/TraitementCaisse.php" enctype="multipart/form-data">
 <h5 class="text-center">CAISSE</h5>
          <div class="row">
            <div class="col-4">
            <select class="form-control" name="type">
              <option value="0">Identifiez le type d'enregistrement</option>
                <option value="Entree">Entrée</option>
                <option value="Sortie">Sortie</option>
            </select>
              <label >Motif</label>
              <input type="text" class="form-control" name="motif" placeholder="Donnez le motif" required>
              <label >Montant</label>
              <input type="number" class="form-control mb-3" name="montant" placeholder="Indiquez le montant" required>
             <input type="submit" name="enregistrer" class="btn btn-success" value="Enrergistrer">
          </div>
      </form>
      <!-- Mouvement de la caisse dans la journee -->
<?php 
include ('../../model/bd.php');
     $query = "SELECT * FROM caisse ";
     $result = $conn-> query($query);
    ?>
    <div class="row">
        <div class=" p-4"> 
            <h4 class="text-center">Reglements de la caisse</h4> 
        <table class="table table-bordered" >
         <thead align="center">
            <th>Type</th>
            <th >Motif</th>
            <th >Montant</th>
            <th>Heure</th>
            <th >Action</th>
         </thead>
         <tbody> <?php
         while($row = $result->fetch_assoc()){?>
         <tr align="center">
             <td ><?=$row['typeEnregistrement']?></td>
             <td ><?=$row['motif']?></td> 
             <td ><?=$row['montant']?></td> 
             <td ><?=$row['heure']?></td>
             <td>
                 <a href="supprimer.php?id=<?=$row['id']?>" class="btn btn-danger" >Retirer</a>
                 <a href="modifier.php?id=<?=$row['id']?>" class="btn btn-info" >Modifier</a>
             </td>
             </tr> 
          <?php
         }
         ?>
         <tr>
             <td colspan="4">Etat de la Caisse</td>
             <td><?php $query1 = $conn->query("SELECT total FROM caisse ");?></td>
         </tr>   
         </tbody>
        </table>
        </div>

 </div>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>