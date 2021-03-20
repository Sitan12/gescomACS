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
    
<header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
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
            <a class="nav-link" href="vue/gestionProduit/produit.php">
              <span data-feather="shopping-cart"></span>
              Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionClient/client.php">
              <span data-feather="users"></span>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionEmployers/employer.php">
              <span data-feather="bar-chart-2"></span>
              Personnel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionFacture/Factures.php">
              <span data-feather="layers"></span>
              Factures
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../gestionComptabilite/caisse.php">
              <span data-feather="layers"></span>
              Comptabilite
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class=" container all-content-wrap" style="margin-left: 220px;">
     <?php  include('../../model/bd.php'); ?>
    <div class="container">
    <div class="row p-4">
            <div class="col-4">
                <img src="../../static/img/logo ACS.png" style="width: 50; height: 50;">
            </div>
            <div class="col-6">
            <h2 >ALLIANCE CUSTOMER SERVICE</h2>
            </div>
        </div>
        <hr>
        <h5 class="text-center p-2">FACTURE  </h5>
        
        <!-- affichage de la facture -->
    <?php 
        $query1 = "SELECT * FROM facturedefinitive ";
        $result = $conn-> query($query1);
    ?>
    <div class="row">
          <div class="col-3 offset-1">
              <table class="table ">
                      <tr style="font-weight: bold;">
                          <th>Date</th>
                          <th>Numero</th>
                      </tr>
                      <tr>
                          <td><?php $rst=$conn->query("SELECT dateFD FROM facturedefinitive ");
                              if($row=$rst->fetch_assoc()){
                                $date=$row['dateFD']; 
                              } echo $date ?></td>
                          <td>FD</td>
                      </tr>
              </table>
          </div>
          <div class="col-3 offset-4">
              <table class="table ">
                      <tr style="font-weight: bold;">
                          <th>Destinataire</th>
                          <th>Adresse</th>
                      </tr>
                      <tr>
                          <td><?php $rst=$conn->query("SELECT nom,adresse FROM client INNER JOIN facturedefinitive ON client.id = facturedefinitive.client");
                              if($row=$rst->fetch_assoc()){
                                $nom=$row['nom']; 
                                $adresse=$row['adresse'];
                              } echo $nom ?></td>
                          <td><?=$adresse?></td>
                      </tr>
              </table>
          </div>
      </div>
  <div class="row">
      <div class="col-12 p-4"> 
        <table class="table table-bordered" >
          <thead align="center" class="bg-primary">
              <th>QTE</th>
              <th>DESIGNATION</th>
              <th >PRIX UNITAIRE</th>
              <th >MONTANT</th>
          </thead>
          <tbody>
           <?php
             $montantHT = 0;
             $montantTTC = 0;
            while($row = $result->fetch_assoc()){ 
                $montantHT = $montantHT + $row['Total'];
            ?>
            <tr align="center">
                <td ><?=$row['quantite']?></td>
                <td ><?=$row['produit']?></td>
                <td ><?=$row['prixUnitaire']?></td>
                <td ><?=$row['Total']?></td> 
            </tr> 
            <?php }  ?>
            <tr align="right" style="font-weight: bold;">
              <td colspan="3"></td>
              <td><?=$montantHT?></td>
            </tr>
            <tr align="right" style="font-weight: bold;">
              <td colspan="3"></td>
              <td><?php $rst=$conn->query("SELECT tva FROM facturedefinitive ");
                if($row=$rst->fetch_assoc()){
                  $tva=$row['tva']; 
                } echo $total=($montantHT*$tva)/100;?>
              </td>
            </tr>
            <tr align="right"  style="font-weight: bold;">
              <td colspan="3">MONTANT TOTAL</td>
              <td class="bg-primary"><?=$montantTTC=$total+$montantHT?></td>
            </tr>
          </tbody>
        </table>
        <!-- <a href=""><button class="btn btn-success" name="valider">Valider</button></a> -->
        
     </div>
  </div>
</div>

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <footer>
        <p class="text-center"> Alliance Froid / Customer Services<br>Cite Lobat Fall N°44 Dakar Sénégal<br>Tel : 221 338339393 RC N° SN DKR 2015B 7111 NINEA 0054557472A2
                </p>
    </footer>
    <form method="POST" action="../../controlleur/traitementFacture.php"  enctype="multipart/form-data" >
      <div class="row p-4">
        <div class="col-3 offset-3">
            <a href="imprimerFD.php" class="btn btn-warning"><i class="fas fa-print"></i><input type="button" name="imprimerFD" class="btn btn-warning" value="Imprimer la facture" ></a>
            
        </div>
        <div class="col-3">
          <input type="button" name="annulerFD" id="" class="btn btn-danger" value="Annuler la facture">
        </div>
      </div>      
    </form>

    </main>
  </div>
</div>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script><script src="dashboard.js"></script>
  </body>
</html>