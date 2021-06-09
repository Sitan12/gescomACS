<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['username'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location:../../index.php');
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Gestion Produits</title>

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
    <!-- <link href="../../static/css/style.css" rel="stylesheet"> -->
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-Color: #32459D;">
  <a class="navbar-brand col-md-3 col-lg-2 text-center me-0 px-3 bg-light" href="#"><img src="../../static/img/logo ACS.png" width="80" alt="logo"></a>
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

    <main class=" container p-4 all-content-wrapper mb-5" style="margin-left: 220px;">
    <div class="container row">
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
      
      <?php 
include ('../../model/bd.php');
 // **********************************************RECHERCHER UN PRODUIT**********************************************
            
            // Récupère la recherche
            if(isset($_POST['recherche'])){
              $recherche = $_POST['recherche'];
              // la requete mysql
            $sql = "SELECT * FROM produit
                    WHERE nomProduit LIKE '%$recherche%'
                    OR descriptionProduit LIKE '%$recherche%'
                    LIMIT 10";
              $result = $conn-> query($sql);
            }else{
                 // ---------------------- liste des produits--------------------------
                  $sql = "SELECT *  FROM produit LIMIT 10";
                  $result = $conn-> query($sql);
            }
        
    ?>
    
  <div class="container-fluid bg-light">
  <h3 class="row card text-center p-2" style="background-color:#32459D; color:white; text-decoration: underline;" > Gestion des Produits  </h3>
  
     <div class="row p-2 justify-content-end">
        <div class="col-md-5">
            <!-- ************Recherche**************** -->
            <form method="POST" action="" class="input-group"> 
              <input type="text" class="form-control mt-3" placeholder="saisir le nom du produit" name="recherche">
              <!-- <i class="fas fa-search"></i> -->
              <input type="submit" class="mt-3 btn" value="Rechercher"> 
          </form>
        </div>
        <div class="col-md-4">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success mb-3 mt-3" style="float: right;" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-folder-plus"> Ajouter produit</i>  
              </button>
        </div> 
      </div>
       
      <div class="row justify-content-center">  
          <h4 style="font-family: 'Times New Roman';font-weight: bold; text-decoration: underline;" class="mt-3 p-1 text-center">Liste des Produits </h4>
                <table class="table col-md-12 p-4" >
                <thead align="center" style="font-weight: 300;"> 
                    <th >IMAGE</th>
                    <th >NOM</th>
                    <th >DESCRIPTION</th>
                    <th>DATE</th>
                    <th >ACTION</th>
                </thead>
                <tbody> <?php
                while($row = $result->fetch_assoc()){?>
                <tr align="center">
                    <td><img src="../../static/img/<?=$row['imageProduit']?>" width="50" height="50"></td> 
                    <td ><?=$row['nomProduit']?></td>
                    <td ><?=$row['descriptionProduit']?></td>
                    <td ><?=$row['dateEnregistrement']?></td> 
                    <td class="">
                        <a href="supprimerProduit.php?id=<?=$row['id']?>" class="btn btn-danger" title="Suprimer le produit" ><i class="fas fa-trash-alt"></i></a>
                        <a href="ModifierProduit.php?id=<?=$row['id']?>" class="btn btn-warning text-white" title="Editer le produit"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>  
                <?php }
                ?>
                </tbody>
                </table>
           </div>
     </div>
  </main> 
  <footer class="footer fixed-bottom" style="background-Color: #32459D;">
                <div class="container">
                    <span class="offset-md-5 text-white" >Copyright @ 2021 ACS-froid Tous droits réservés</span>
                  </div>
            </footer>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous"></script>
        <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>









