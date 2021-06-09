<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['username'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: index.php');
  exit();
}
?>

<!-- ******************************************************************************************************* -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Gestion Fournisseurs</title>
    
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-Color: #32459D;">
  <a class="navbar-brand col-md-3 text-center col-lg-2 me-0 px-3 bg-light" href="#"><img src="../../static/img/logo ACS.png" width="80" alt="logo"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar navbar-expand-lg col-md-6" style=" font-weight: bold;">
    <a class="nav-link" href="../../../index.php" style="color: white;">ACS-Accueil</a>
    <a class="nav-link" href="../../../produit.php" style="color: white;">ACS-Produits</a>
    <a class="nav-link" href="../../deconnexion.php" style="color: white;"><i class="fas fa-power-off"></i> Deconnexion</a>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-4">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../dashboard.php">
              <span data-feather="home"></span>
              Tableau de Bord
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionProduit/produit.php">
              <span data-feather="shopping-cart"></span>
              <i class="fab fa-product-hunt"></i> Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionClient/client.php">
              <span data-feather="users"></span>
              <i class="fas fa-user-alt"></i> Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionEmployers/employer.php">
              <span data-feather="bar-chart-2"></span>
              <i class="fas fa-user-friends"></i> Personnel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionFacture/facture.php">
              <span data-feather="layers"></span>
              <i class="fas fa-file-invoice"></i> Factures
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionFournisseur/fournisseur.php">
              <span data-feather="layers"></span>
              <i class="fas fa-user-friends"></i> Fournisseurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span data-feather="layers"></span>
              <i class="fas fa-calculator"></i> Comptabilite
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../gestionComptabilite/caisse.php">caisse</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../gestionComptabilite/banque.php">banque</a></li>
          </ul>
          </li>
        </ul>

      </div>
    </nav>

    <main class=" container all-content-wrapper p-4" style="margin-left: 220px;">
     
      <?php
          include ('../../model/bd.php');
          $id=$_GET['id'];
      ?>
          <!-- Modifier un enregistrement du suivi -->
     <div class="conatiner-fluid">
     <form class="p-4 card bg-light" method="POST" action="editSuivi.php" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <div class="col-md-5">
                        <label >Bon de Commande</label>
                        <input type="text" class="form-control" name="bon" value="<?php $rst=$conn->query("SELECT bon FROM suiviFournisseur WHERE id = '$id' ");
                    while($row=$rst->fetch_assoc()){
                        echo$row['bon']; 
                    }?>" required>
                        <label >Libelle</label>
                        <input type="text" class="form-control" name="libelle" value="<?php $rst=$conn->query("SELECT libelle FROM suiviFournisseur WHERE id = '$id' ");
                    while($row=$rst->fetch_assoc()){
                        echo$row['libelle']; 
                    }?>" required>
                        <label >Marque</label>
                        <input type="text" class="form-control" name="marque" value="<?php $rst=$conn->query("SELECT marque FROM suiviFournisseur WHERE id = '$id' ");
                    while($row=$rst->fetch_assoc()){
                        echo$row['marque']; 
                    }?>" required>
                </div>
                <div class="col-md-5">
                    <label >Client</label>
                    <select class="form-control" name="client" required >
                            <?php 
                            $query1 = "SELECT nom,id FROM client GROUP BY id";
                            $rst = $conn-> query($query1);
                            while($row = $rst->fetch_assoc()){?>
                                    <option value="<?=$row['id']?>"><?=$row['nom']?></option>
                            <?php } ?>
                        </select>
                    <label >Somme</label>
                    <input type="number" class="form-control" name="somme" min="1" value="<?php $rst=$conn->query("SELECT somme FROM suiviFournisseur WHERE id = '$id' ");
                    while($row=$rst->fetch_assoc()){
                        echo$row['somme']; 
                    }?>" required>
                        <label >Avance</label>
                        <input type="number" class="form-control" name="avance" min="1" value="<?php $rst=$conn->query("SELECT avance FROM suiviFournisseur WHERE id = '$id' ");
                    while($row=$rst->fetch_assoc()){
                        echo$row['avance']; 
                    }?>" >
                </div>
            </div>
            <div class="row justify-content-center">
            <div class="col-md-5">
                <label >Solde</label>
                        <input type="text" class="form-control" name="solde" value="<?php $rst=$conn->query("SELECT solde FROM suiviFournisseur WHERE id = '$id' ");
                    while($row=$rst->fetch_assoc()){
                        echo$row['solde']; 
                    }?>" required>
                    <input type="hidden" value="<?=$id?>" name="id">
                    <input type="hidden" value="<?php $rst=$conn->query("SELECT fournisseur FROM suiviFournisseur WHERE id = '$id' ");
                    while($row=$rst->fetch_assoc()){
                        echo$row['fournisseur']; 
                    }?>" name="fournisseur">
            </div>
            <div class="col-md-5 mt-5 text-center">
                <button type="button" class="btn btn-secondary" name="annuler" data-dismiss="modal">Close</button>
                <input type="submit" name="valider" class="btn btn-success" value="Valider">
            </div> 
            </div> 
         </form>                
        </div>
  </main>
<footer class="footer p-2 fixed-bottom" style="background-Color: #32459D;">
                <div class="container">
                    <span class="text-white offset-md-5">Copyright @ 2021 ACS-froid Tous droits réservés</span>
                  </div>
            </footer>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>





