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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
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

    <main class=" container all-content-wrapper p-4" style="margin-left: 220px;">      
<?php
include('../../model/bd.php');
$id=$_GET['tel'];
?>
<!-- modifier un employer -->
<form class="container p-4 card bg-light mb-5" method="POST" action="edit.php" enctype="multipart/form-data">
            <h5 class="text-center p-2 card" style="background-color:#32459D; color: white;"> Fiche de Modification des informations de <?php $rst=$conn->query("SELECT nom,prenom FROM employer WHERE telephone = '$id' ");
                        while($row=$rst->fetch_assoc()){
                        echo $row['prenom'].' '.$row['nom']; 
                        }?></h5>
            <div class="row mt-3 justify-content-center">
                <div class="col-md-5 card bg-light ">
                  <label >Nom</label>
                  <input type="text" class="form-control" name="nomEmp" value="<?php $rst=$conn->query("SELECT nom FROM employer WHERE telephone='$id'");
                while($row=$rst->fetch_assoc()){
                  echo$row['nom']; 
                }?>
                  " required>
                  <label >Prenom</label>
                  <input type="text" class="form-control" name="prenomEmp" value="<?php $rst=$conn->query("SELECT prenom FROM employer WHERE telephone='$id'");
                while($row=$rst->fetch_assoc()){
                  echo$row['prenom']; 
                }?>" required>
                  <label >Adresse</label>
                  <input type="text" class="form-control" name="adresseEmp" value="<?php $rst=$conn->query("SELECT adresse FROM employer WHERE telephone='$id'");
                while($row=$rst->fetch_assoc()){
                  echo$row['adresse']; 
                }?> "
                 required>
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" value="<?php $rst=$conn->query("SELECT email FROM employer WHERE telephone='$id' ");
                while($row=$rst->fetch_assoc()){
                  echo$row['email']; 
                }?>">
                  <label>Poste Occupé</label>
                  <select class="form-control mb-3" name="poste"  required>
                    <option><?php $rst=$conn->query("SELECT posteServi FROM employer WHERE telephone='$id' ");
                while($row=$rst->fetch_assoc()){
                  echo$row['posteServi']; 
                }?></option>
                      <option value="assistant">Assistant</option>
                      <option value="technicien">Technicien</option>
                      <option value="gerant">Gerant</option>
                      <option value="autre">Autres</option>
                  </select>
            </div>
            <div class="col-md-5 ml-3 card bg-light">
            <label >Salaire</label>
              <input type="text" class="form-control" name="salaireEmp" value="<?php $rst=$conn->query("SELECT salaire FROM employer WHERE telephone='$id' ");
            while($row=$rst->fetch_assoc()){
              echo$row['salaire']; 
            }?>" >
            <label >Date d'Integration</label>
              <input type="date" class="form-control" name="date" value="<?php $rst=$conn->query("SELECT DateIntegration FROM employer WHERE telephone='$id' ");
            while($row=$rst->fetch_assoc()){
              echo$row['DateIntegration']; 
            }?>">
            <label >Conges</label>
              <input type="text" class="form-control" name="conges" value="<?php $rst=$conn->query("SELECT conges FROM employer WHERE telephone='$id'");
            while($row=$rst->fetch_assoc()){
              echo$row['conges']; 
            }?>">
            <label >Assurance</label>
              <input type="text" class="form-control" name="assurance" value="<?php $rst=$conn->query("SELECT assurance FROM employer WHERE telephone='$id' ");
            while($row=$rst->fetch_assoc()){
              echo$row['assurance']; 
            }?>" >
             <label >Absence non justifiée</label>
              <input type="text" class="form-control" name="absence" value="<?php $rst=$conn->query("SELECT absence FROM employer WHERE telephone='$id' ");
            while($row=$rst->fetch_assoc()){
              echo$row['absence']; 
            }?>" >
              <label >Autorisation</label>
              <input type="text" class="form-control mb-3" name="auto"value="<?php $rst=$conn->query("SELECT autorisation FROM employer WHERE telephone='$id' ");
            while($row=$rst->fetch_assoc()){
              echo$row['autorisation']; 
            }?>" >
             <input type="hidden" name="telephone" value="<?php echo $id?>">
            </div>
          </div>
          <div class="row p-4 text-center justify-content-end">
              <input type="submit" name="enregistrer" class="btn btn-success mr-3" value="Enregistrer">
              <input type="submit" name="annuler" class="btn btn-primary" data-dismiss="modal" value="Annuler">
            </div>
      </form>
  </div>
</div>
<footer class="footer p-1 fixed-bottom" style="background-Color: #32459D;">
                <div class="container">
                    <span class="text-white offset-md-5">Copyright @ 2021 ACS-froid Tous droits réservés</span>
                  </div>
            </footer>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
           









