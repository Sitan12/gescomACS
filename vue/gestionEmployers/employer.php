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
    <a class="nav-link"  href="#">Accueil</a>
    <a class="nav-link" href="#">Services</a>
    <a class="nav-link" href="#">Partenaires</a>
    <a class="nav-link offset-3" href="#">Deconnexion</a>
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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nouveau Employé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class=" p-4" method="POST" action="../../controlleur/traitementEmployer.php" enctype="multipart/form-data">
        <h5 class="text-center">Remplissez les champs pour ajouter un employé</h5>
              <label >Nom</label>
              <input type="text" class="form-control" name="nomEmp" placeholder="Entrer le Nom" required>
              <label >Prenom</label>
              <input type="text" class="form-control" name="prenomEmp" placeholder="Entrer le Prenom" required>
              <label >Adresse</label>
              <input type="text" class="form-control" name="adresseEmp" placeholder="l'adresse de l'employé " required>
              <label >Email</label>
              <input type="email" class="form-control" name="email" placeholder="exemple: acs@gmail.com " required>
            <label >Poste Occupé</label>
              <select class="form-control" name="poste" required>
                  <option value="0">Identifiez l'employé</option>
                  <option value="DG">Directeur General</option>
                  <option value="assistant">Assistant</option>
                  <option value="technicien">Technicien</option>
                  <option value="gerant">Gerant</option>
                  <option value="autre">Autres</option>
              </select>
              <label >Salaire</label>
              <input type="number" class="form-control" name="salaireEmp" placeholder="Salaire de l'employé " required>
              <label >Telephone</label>
              <input type="number" class="form-control mb-3" name="telEmp" placeholder="Entrer le numero de l'employé " required>
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
     $query1 = "SELECT * FROM employer ";
     $result = $conn-> query($query1);
    ?>
    <div class="row container-fluid p-4">
        <div class="card col-12 p-4"> 
          <div class="row p-4">
          <h4 style="font-family: 'Times New Roman'; font-weight: 150; font-style: italic;" class="col-md-3">Personnel ACS</h4> 
            <input class="form-control mr-sm-2 col-md-4" type="search" placeholder="Recherche" aria-label="Search">
                      <!-- Button trigger modal -->
            <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-folder-plus"> Nouveau Employé</i>
            </button>

          </div>
        <table class="table table-bordered" >
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
      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      
    </main>
  </div>
</div>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>



