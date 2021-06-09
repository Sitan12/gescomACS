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
    <title>Personnel ACS</title>
    
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


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
 <main class=" container p-4 all-content-wrapper" style="margin-left: 220px;">
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white" >
        <h3 class="modal-title text-center " style="font-weight: bold;" id="exampleModalLongTitle">Formulaire d'Ajout d'employé</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class=" card bg-light p-4" method="POST" action="../../controlleur/traitementEmployer.php" enctype="multipart/form-data">
        <h5 class="">Veuillez remplir le formulaire suivant</h5>
        <div class="row  justify-content-center">
          <div class="col-md-8 card bg-light">
              <label >Nom</label>
              <input type="text" class="form-control" name="nomEmp" placeholder="Entrer le Nom" required>
              <label >Prenom</label>
              <input type="text" class="form-control" name="prenomEmp" placeholder="Entrer le Prenom" required>
              <label >Adresse</label>
              <input type="text" class="form-control" name="adresseEmp" placeholder="saisissez l'adresse de l'employé" required>
              <label >Email</label>
              <input type="email" class="form-control" name="email" placeholder="exemple: acs@gmail.com" >
              <label >Salaire</label>
              <input type="number" class="form-control" name="salaireEmp" placeholder="Salaire de l'employé " >
              <label >Téléphone</label>
              <input type="number" class="form-control mb-3" name="telEmp" placeholder="Entrer le numero de telephone de l'employé" required>
              
          </div>
        </div>
        <div class="row justify-content-center mt-2">
        <div class="form-check  col-md-3">
          <input type="radio" class="form-check-input mt-3 " name="poste" id="technicien" value="technicien" checked>
          <label for="technicien" class="form-check-label">Technicien</label>
        </div>
        <div class="form-check col-md-3">
          <input type="radio" class="form-check-input mt-3 " id="assistant" name="poste" value="assistant">
          <label for="assistant" class="form-check-label">Assistant</label>
        </div>
        <div class="form-check col-md-2">
          <input type="radio" class="form-check-input mt-3" id="gerant" name="poste" value="gerant">
          <label for="gerant" class="form-check-label">Gerant</label>
        </div>
        <div class="form-check col-md-2">
          <input type="radio" class="form-check-input mt-3" id="autre" name="poste" value="autres">
          <label for="autre" class="form-check-label">Autres</label>
        </div>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="ajouter" class="btn btn-success" value="Enregistrer">
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
      <!-- liste des employers -->
       <?php 
    include ('../../model/bd.php');
    // **********************************************RECHERCHER UN EMPLOYé**********************************************
     
     // Récupère la recherche
     if(isset($_POST['recherche']))
     {
        $recherche = $_POST['recherche'];
        // la requete mysql
      $sql = "SELECT * FROM employer
              WHERE nom LIKE '%$recherche%'
              OR WHERE prenom LIKE '%$recherche%'
              LIMIT 10";
         $result = $conn->query($sql);
      }else{
          // ----------------------liste des EMPLOYES--------------------------
           $sql = "SELECT * FROM employer
           LIMIT 15";
           $result = $conn->query($sql);
     }
    ?>
    <div class="row container-fluid p-4">
        <div class="card col-md-12 mb-5"> 
        <h3 class="row card text-center p-2" style="background-color:#32459D; color:white; text-decoration: underline;" > Personnel ACS  </h3>
          <div class="row p-4 justify-content-end">
          <!-- ************Recherche**************** -->
             <form method="POST" action="" class="input-group col-md-5"> 
                <input type="text" class="form-control " placeholder="saisir le nom de l'employé" name="recherche">
                <!-- <i class="fas fa-search"></i> -->
                <input type="submit" class="btn" value="Rechercher"> 
              </form>
                      <!-- Button trigger modal -->
              <button type="button" class="btn btn-success col-md-3" data-toggle="modal" data-target="#exampleModalCenter">
              <i class="fas fa-folder-plus"> Nouveau Employé</i>
              </button>
          </div>
        <table class="table table-bordered bg-light" >
         <thead align="center">
            <th>Nom</th>
            <th >Prenom</th>
            <th >Poste</th>
            <th>Telephone</th>
            <th >Action</th>
         </thead>
         <tbody> <?php
         while($row = $result->fetch_assoc()){?>
         <tr align="center">
             <td ><?=$row['nom']?></td>
             <td ><?=$row['prenom']?></td>
             <td ><?=$row['posteServi']?></td> 
            <td ><?=$row['telephone']?></td> 
             <td>
                 <a href="supprimer.php?tel=<?=$row['telephone']?>" class="btn btn-danger" ><i class="far fa-trash-alt"></i></a>
                 <a href="info.php?tel=<?=$row['telephone']?>" class="btn btn-info" ><i class="fas fa-angle-double-right"></i></a>
                 <a href="modifier.php?tel=<?=$row['telephone']?>" class="btn btn-warning" ><i class="far fa-edit"></i></a>
             </td>
             </tr> 
          <?php
         }
         ?>   
         </tbody>
        </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
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



