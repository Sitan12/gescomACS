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
  <a class="navbar-brand col-md-3 col-lg-2 me-0 text-center px-3 bg-light" href="#"><img src="../../static/img/logo ACS.png" width="80" alt="logo"></a>
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
            <div class="container-fluid">
            <h3 class="row card text-center" style="background-color:#32459D; color:white" ><i class="fas fa-coins"></i> Gestion de la CAISSE</h3>
              <!-- ajouter un depense -->
                <form class="card mt-3 p-4 bg-light" method="POST" action="../../controlleur/TraitementCaisse.php" enctype="multipart/form-data">
                    <h3 class="text-center" style="text-decoration: underline;" > Formulaire d'enregistrement :</h3>
                        <div class="row justify-content-center" >
                          <div class="col-md-4 form-check">
                            <label for="">Nature</label><br>
                            <input type="radio" checked value="1" class="mr-1" id="type" name="type">ENTREE
                            <input type="radio" value="0" class="mr-1 ml-3" id="type" name="type">SORTIE
                          </div>
                          <div class="col-md-4">
                                <label >Motif</label>
                                <input type="text" class="form-control" name="motif" placeholder="Donnez le motif" required>
                          </div>
                          <div class="col-md-4">
                            <label >Montant</label>
                            <input type="number" class="form-control mb-3" name="montant" placeholder="Indiquez le montant" required>  
                          </div>
                          <input type="submit" name="enregistrer" class="btn btn-success" style="font-weight: bold;" value="Enregistrer">
                        </div>
                </form>
                <!-- Mouvement de la caisse dans la journee -->
          <?php 
          include ('../../model/bd.php');
                $date=date('Y-m-j');
               // Récupère la recherche
           if(isset($_POST['recherche'])){
            $recherche = $_POST['recherche'];
            // la requete mysql
          $sql = "SELECT * FROM caisse
                  WHERE dateEnregistrement LIKE '%$recherche%'
                  LIMIT 10";
            $result = $conn-> query($sql);
          }else{
               // ---------------------- liste des enregistrements--------------------------
                $sql = "SELECT * FROM caisse  ORDER BY id
                LIMIT 10";
                $result = $conn-> query($sql);
          }
              ?>
            <div class="row p-4 mt-3 mb-5 card bg-light" >
                <div class="row"> 
                          <h4 class="col-md-6" style="font-style: italic;">Liste des enregistrements</h4>
                          <!-- ************Recherche**************** -->
                          <form method="POST" action="" class="input-group col-md-4 mb-3"> 
                            <input type="date" class="form-control " placeholder="Rechercher un enregistrement" name="recherche">
                            <!-- <i class="fas fa-search"></i> -->
                            <input type="submit" class="btn" value="Rechercher"> 
                          </form>
                       </div>
                      <table class="table table-bordered" >
                      <thead align="center" class="text-uppercase" >
                          <th >Motif</th>
                          <th >Montant</th>
                          <th>Heure</th>
                          <th >Action</th>
                      </thead>
                      <tbody> <?php
                      while($row = $result->fetch_assoc()){?>
                      <tr align="center">
                          <td ><?=$row['motif']?></td> 
                          <td ><?=$row['montant']?></td> 
                          <td ><?=$row['heure']?></td>
                          <td>
                              <a href="show.php?id=<?=$row['id']?>" class="btn btn-info">Voir plus <i class="fas fa-eye"></i></a>
                          </td>
                          </tr> 
                        <?php
                      }
                      ?>
                      <tr class="text-center" style="font-weight: bold; font-size:24px">
                          <td colspan="3">Etat de la Caisse</td>
                          <td><?php $query1 = $conn->query("SELECT total FROM caisse ");
                          if($caisse=$query1->fetch_assoc()){
                            $total=$caisse['total'];
                            echo$total;
                          }?>
                          F CFA</td>
                      </tr>   
                  </tbody>
                  </table>

                  <!-- <form action="show.php" method="POST"  class="mn-3 ml-3 d-none">
                    <div class="form-group">
                        <label for="caisse">Enregistrement</label>
                        <input type="text" name="caisse" id="caisse">
                    </div>
                    <button type="submit" class="btn btn-primary">ok</button>
                  </form> -->
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

 
 
 
 
 
 
 
 
 