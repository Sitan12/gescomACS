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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Tableau de Bord</title>
    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

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
    <!-- <link href="../../static/css/style.css" rel="stylesheet"> -->
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-light" href="#"><img src="../../static/img/logo ACS.png" alt="logo"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 col-md-3 " type="text" placeholder="Search" aria-label="Search">
  <div class="navbar navbar-expand-lg col-md-6" style=" font-weight: bold; font-size: large;">
    <a class="nav-link"  href="#">Home</a>
    <a class="nav-link" href="#">Services</a>
    <a class="nav-link" href="#">Partener</a>
    <a class="nav-link offset-3" href="#">Sign out</a>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-5">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
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
            <a class="nav-link" href="../gestionComptabilite/caisse.php">
              <span data-feather="layers"></span>
              <i class="fas fa-calculator"></i> Comptabilite
            </a>
          </li>
          </ul>
      </div>
    </nav>

    <main class=" container all-content-wrapper" style="margin-left: 220px;">
     
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
                  $sql = "SELECT *  FROM produit  ORDER BY id";
                  $result = $conn-> query($sql);
            }
            
         
    ?>
  <div class="container-fluid bg-light offset-2 mr-2 mt-5" style="width: 1000px;" >
      <div class="row">
        <div class="col-md-3">
          <h4 style="font-family: 'Times New Roman'; font-weight: 150; font-style: italic;" class="mt-3">Liste Produits </h4>
        </div>
        <div class="col-md-5">
            <!-- ************Recherche**************** -->
            <form method="POST" action="" class="input-group"> 
              <input type="text" class="form-control mt-3" placeholder="Rechercher un produit" name="recherche">
              <!-- <i class="fas fa-search"></i> -->
              <input type="submit" class="mt-3 btn" value="Rechercher!"> 
          </form>
        </div>
        <div class="col-md-4">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-success mb-3 mt-3" style="float: right;" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-folder-plus">Ajouter produit</i>  
              </button>
        </div>
        
      </div>
       
      <div class="row container">  
                <table class="table col-md-12" >
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
                        <a href="showProduit.php?id=<?=$row['id']?>" class="btn btn-primary" title="Voir Details"><i class="fas fa-eye"></i></a>
                        <a href="ModifierProduit.php?id=<?=$row['id']?>" class="btn btn-warning " title="Editer le produit" ><i class="fas fa-edit"></i></a>
                    </td>
                </tr>  
                <?php }
                ?>
                </tbody>
                </table>
            <div class="custom-pagination">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
            </div>
          <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
        </div>
  </div>
  </main> 

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>









