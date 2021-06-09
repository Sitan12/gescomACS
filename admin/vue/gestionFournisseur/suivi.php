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
    <title>Gestion Fournisseur</title>
    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

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
    <link href="../../static/css/style.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow"  style="background-Color: #32459D;">
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
<main class=" container p-4 all-content-wrapper" style="margin-left: 220px;"> 
<?php include ('../../model/bd.php'); 
  $id=$_GET['id'];
?>
        <!-- Modal ajouter -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau enregistrement</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- ajouter un suivi -->
              <form class="p-4" method="POST" action="../../controlleur/traitementFournisseur.php" enctype="multipart/form-data">
                    <label >Bon de Commande</label>
                    <input type="text" class="form-control" name="bon" placeholder="Entrer le numero du bon" required>
                    <label >Libelle</label>
                    <input type="text" class="form-control" name="libelle" placeholder="l'adresse du client " required>
                    <label >Marque</label>
                    <input type="text" class="form-control" name="marque" placeholder="Remplir la marque de l'appareil" required>
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
                    <input type="number" class="form-control" name="somme" min="0" placeholder=" Indiquer la somme" >
                    <label >Avance</label>
                    <input type="number" class="form-control" name="avance" min="0" placeholder="Preciser l'avance" >
                    <label >Solde</label>
                    <input type="text" class="form-control" name="solde" placeholder="Indiquer le solde" >
                      <input type="hidden" name="fournisseur" value="<?=$id?>">
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" name="valider" class="btn btn-success" value="Valider">
                  </div> 
                </form>
            </div>  
         </div>
       </div>
     </div>
     <!-- fin modal -->

  <div class="container">
  <?php 
include ('../../model/bd.php');
   // ---------------------- liste des enregistrements suiviFournisseur--------------------------
                 $sql = "SELECT * FROM suiviFournisseur WHERE fournisseur= '$id' ORDER BY dateSuivi Desc 
                 LIMIT 20";
                 $result = $conn-> query($sql);
                ?>
            <!-- =========================================SUIVI FOURNISSEURS=============================== -->
        <h3 class="card text-white p-2 text-center " style="font-family: 'Times New Roman'; font-weight: 150; background-Color: #32459D; text-decoration: underline;"> Suivi Fournisseur <?php $rst=$conn->query("SELECT nom FROM fournisseur WHERE id='$id' ");
                        if($nom = $rst->fetch_assoc()){
                          echo $nom['nom'];
                        }
                    ?> </h3>
            <table class="table table-bordered mb-5 mt-3 col-md-12 " >
              <thead align="center" class="text-uppercase">
                  <th>Date</th>
                  <th >Bon de commande</th>
                  <th >libelle</th>
                  <th>marque</th>
                  <th >client</th>
                  <th >somme</th>
                  <th>avance</th>
                  <th >solde</th>
                  <th>action</th>
              </thead>
              <tbody> <?php
              $totalsomme=0;
              $totalAv=0;
                  while($row=$result->fetch_assoc()){
                    $totalsomme=$totalsomme+$row['somme'];
                    $totalAv=$totalAv+$row['avance'];
                    ?>
                  <tr align="center">
                      <td ><?=$row['dateSuivi']?></td>
                      <td ><?=$row['bon']?></td>
                      <td ><?=$row['libelle']?></td>
                      <td ><?=$row['marque']?></td> 
                      <td ><?php 
                              $id = $row['client'];
                             $req = "SELECT nom FROM client WHERE id= '$id' ";
                             $rt = $conn-> query($req);
                              if($ligne = $rt->fetch_assoc()){
                                  echo $ligne['nom'];
                              }
                                ?> 
                        </td> 
                      <td ><?=$row['somme']?></td>
                      <td ><?=$row['avance']?></td>
                      <td ><?=$row['solde']?></td>
                      <td>
                          <a href="supprimerSuivi.php?id=<?=$row['id']?>" class="btn btn-danger" ><i class="fas fa-trash-alt"></i></a>
                          <a href="modifierSuivi.php?id=<?=$row['id']?>" class="btn btn-info" ><i class="fas fa-edit"></i></a>
                      </td>
                    </tr> 
                    <?php  } ?> 
                    <tr style="font-weight: bold;">
                      <td align="right" colspan="5" >TOTAL</td>
                      <td><?=$totalsomme?></td>
                      <td><?=$totalAv?></td>
                      <td><?=$totalsomme-$totalAv?></td> 
                      <td><!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >
                <i class="fas fa-folder-plus"> Nouveau</i> 
              </button></td>
                    </tr>  
              </tbody>
            </table>
  </div>    

 </main>
    <footer class="footer p-2 fixed-bottom" style="background-Color: #32459D;">
          <div class="container">
              <span class="text-white offset-md-5">Copyright @ 2021 ACS-froid Tous droits réservés</span>
            </div>
      </footer>
    
      <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  </body>
</html>

