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
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: green;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-light" href="#"><img src="../../static/img/logo ACS.png" alt="logo"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 col-md-3 " type="text" placeholder="Search" aria-label="Search">
  <div class="navbar navbar-expand-lg col-md-6" style=" font-weight: bold;">
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

    <main class=" container all-content-wrap" style="margin-left: 220px;">
     
            <div class="container-fluid">
              <!-- ajouter un depense -->
                <form class="card mt-3 p-4 bg-light" method="POST" action="../../controlleur/TraitementCaisse.php" enctype="multipart/form-data">
                    <h5 class="text-center" >CAISSE</h5>
                        <div class="row" >
                          <div class="col-md-4 form-check">
                            <label for="">Precisez l'enregistrement</label><br>
                            <input type="radio" checked value="1" id="type" name="type">ENTREE
                            <input type="radio" value="0" id="type" name="type">SORTIE
                          </div>
                          <div class="col-md-4">
                                <label >Motif</label>
                                <input type="text" class="form-control" name="motif" placeholder="Donnez le motif" required>
                          </div>
                          <div class="col-md-4">
                            <label >Montant</label>
                            <input type="number" class="form-control mb-3" name="montant" placeholder="Indiquez le montant" required>  
                          </div>
                          <input type="submit" name="enregistrer" class="btn btn-success" value="Enregistrer">
                        </div>
                </form>
                <!-- Mouvement de la caisse dans la journee -->
          <?php 
          include ('../../model/bd.php');
                $date=date('Y-m-j');
              $query = "SELECT * FROM caisse WHERE dateEnregistrement = '$date' ";
              $result = $conn-> query($query);
              ?>
            <div class="row p-4 mt-3 card bg-light" >
                <div class=""> 
                          <h4 class="text-center">Enregistrement du <?= date('j-m-Y')?></h4>
                      <table class="table table-bordered" >
                      <thead align="center" >
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
                              <a href="supprimer.php?id=<?=$row['id']?>" class="btn btn-danger" ><i class="fas fa-times-circle"></i></a>
                              <a href="show.php?id=<?=$row['id']?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                              <a href="modifier.php?id=<?=$row['id']?>" class="btn btn-info" ><i class="fas fa-edit"></i></a>
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

                  <form action="show.php" method="POST"  class="mn-3 ml-3 d-none">
                <div class="form-group">
                    <label for="caisse">Enregistrement</label>
                    <input type="text" name="caisse" id="caisse">
                </div>
                <button type="submit" class="btn btn-primary">ok</button>
            </form>
            </div>
        </div>      
    </main>
  </div>
</div>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      <script>
            function toggleReplayComment(id)
            {
                let element = document.getElementById('caisse');
                element.classList.toggle('d-none');
            }
        </script>
    </body>
</html>

 
 
 
 
 
 
 
 
 