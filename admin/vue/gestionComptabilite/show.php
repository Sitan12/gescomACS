
<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['username'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: ../../index.php');
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
    <title>Gestion Comptabilite</title>
  
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
  <a class="navbar-brand col-md-3 col-lg-2 text-center me-0 px-3 text-center bg-light" href="#"><img src="../../static/img/logo ACS.png" width="80" alt="logo"></a>
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

    <main class=" container p-5 all-content-wrapper" style="margin-left: 220px;">
     
        <?php
        include('../../model/bd.php');
        //  afficher les donnees
        $id=$_GET['id'];
        $show= "SELECT * FROM caisse WHERE id= '$id' ";
        $result=$conn->query($show);
        ?>
        <div class="row p-4 container-fluid">
            <div class="p-2 card bg-light col-md-8 offset-md-2"> 
                <h4 class="text-center p-2 card" style="background-color:#32459D; color:white">Fiche d'Informations</h4> 
                <?php
            while($row = $result->fetch_assoc()){?>
                <h4>Nature: <label for=""><?=$row['typeEnregistrement']?></label> </h4>
                <h4>Somme: <label for=""><?=$row['montant']?></label></h4>
                <h4>Motif: <label for=""><?=$row['motif']?></label></h4>
                <h4>Date d'enregistrement: <label for=""><?=$row['dateEnregistrement']?></label> </h4>
                <h4>Heure d'enregistrement: <label for=""> <?=$row['heure']?></label></h4>
             <?php   } ?>
            
            </div>
        </div>
    </main>
  </div>
</div>
<footer class="footer p-2 fixed-bottom" style="background-Color: #32459D;">
                <div class="container">
                    <span class="text-white offset-md-5">Copyright @ 2021 ACS-froid Tous droits réservés</span>
                  </div>
            </footer>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
           







