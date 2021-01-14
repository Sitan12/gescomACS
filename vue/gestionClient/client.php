<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Clients</title>
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
      <a class="nav-link active text-dark" href="client.php">Client</a>
      </li>
      <li class="nav-item">
      <a class="nav-link active text-dark" href="../gestionEmployers/employer.php">Equipe ACS</a>
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
</div>
 <div class="container p-4">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary offset-4" data-toggle="modal" data-target="#exampleModal">
 Nouveau
</button>
<!-- Modal ajouter -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enregistrement d'un nouveau client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <!-- ajouter un client -->
       <form class=" p-4" method="POST" action="../../controlleur/traitementClient.php" enctype="multipart/form-data">
              <label >Prenom & Nom</label>
              <input type="text" class="form-control" name="nom" placeholder="Entrer le nom complet" required>
              <label >Adresse</label>
              <input type="text" class="form-control" name="adresse" placeholder="l'adresse du client " required>
              <label >Email</label>
              <input type="email" class="form-control" name="email" placeholder="exemple: acs@gmail.com " required>
              <label >Telephone</label>
              <input type="number" class="form-control mb-3" name="tel" placeholder="Entrer le numero du client" required>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="ajouter" class="btn btn-success" value="Ajouter">
            </div> 
        </form>
      </div>  
    </div>
  </div>
</div>

<!-- liste des clients -->
<?php 
include ('../../model/bd.php');
?>
<!--  recherche -->
<form class="p-4">
   <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
 </form>
 <?php
     $query1 = "SELECT * FROM client ";
     $result = $conn-> query($query1);
    ?>
    <div class="row">
        <div class=" p-4"> 
            <h4 class="text-center">Nos Clients </h4> 
        <table class="table table-bordered" >
         <thead align="center" style="background-color: black; color: white;">
             <th>Identifiant</th>
            <th>Prenom&Nom</th>
            <th >Adresse</th>
            <th >Email</th>
            <th>Telephone</th>
            <th >Action</th>
         </thead>
         <tbody> <?php
         while($row = $result->fetch_assoc()){?>
         <tr align="center">
             <td ><?=$row['id']?></td>
             <td ><?=$row['nom']?></td>
             <td ><?=$row['adresse']?></td>
             <td ><?=$row['email']?></td> 
             <td ><?=$row['telephone']?></td> 
             <td>
                 <a href="supprimer.php?id=<?=$row['id']?>" class="btn btn-danger" >Retirer</a>
                 <a href="modifier.php?id=<?=$row['id']?>" class="btn btn-info" >Modifier</a>
             </td>
             </tr> 
          <?php
         }
         ?>   
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
         </tbody>
        </table>

        </div>

 </div>
 
</body>
</html>