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


// <!-- **********************************traitement FACTURES************************************************** -->

include ('../../model/bd.php');
$erreur = array();
//  enregistrement des commandes
if(isset($_POST['save']))
{
    $erreur = "";
    $quantite=$_POST['qte'];
    $prix=$_POST['prix'];
    $designation = $_POST['designation'];
    $date=date('Y-j-m');
    $client=$_POST['client'];   
    $tva=$_POST['tva'];
    $status=$_POST['facture'];
    $count= count($_POST['qte']);
    if($client==="0")
    {
      $erreur=[];
      $erreur[] = "Veuillez choisir le client";
    }else{
      $erreur = "";
    if($status==0){
        $sql1="DELETE FROM factureproforma";
        $conn->query($sql1);
        for ($i=0; $i <$count ; $i++) { 
            $total= $_POST['prix'][$i] * $_POST['qte'][$i] ; 
            $sql="INSERT INTO `factureproforma` ( `dateFP`,`designationFP`,`quantite`,`prixUnitaire`,`Total`,`client`,`tva`,`statusFP`)
            VALUES ('{$date}','{$_POST['designation'][$i]}','{$_POST['qte'][$i]}','{$_POST['prix'][$i]}','{$total}','{$client}','{$tva}','{$status}')";
            $conn->query($sql);
        }
        header('location: factureProforma.php'); 

    } else if($status==1){
        $sql1="DELETE FROM facturedefinitive";
        $conn->query($sql1);
        for ($i=0; $i <$count ; $i++) { 
            $total= $_POST['prix'][$i] * $_POST['qte'][$i] ;
            $sql="INSERT INTO `facturedefinitive` ( `dateFD`,`designationFD`,`quantite`,`prixUnitaire`,`Total`,`client`,`tva`,`statusFD`)
            VALUES ('{$date}','{$_POST['designation'][$i]}','{$_POST['qte'][$i]}','{$_POST['prix'][$i]}','{$total}','{$client}','{$tva}','{$status}')";
            $conn->query($sql);
        }
        header('location: factureDefinitive.php');
    }
  }  
} 
// ===================================TRAITEMENT BON DE COMMANDE====================================================
//  enregistrement des commandes
if(isset($_POST['saveBC']))
{
    $conn->query("DELETE FROM BC");
    $count= count($_POST['qteBC']);
    $erreur = "";
    $quantite=$_POST['qteBC'];
    $designation = $_POST['designationBC'];
    $date=date('Y-m-j');
    $client=$_POST['client'];
    if($client==="0")
    {
      $erreur=[];
      $erreur[] = "Veuillez choisir le client";
    }else{
        for ($i=0; $i <$count ; $i++) {  
            $sql=" INSERT INTO `BC` ( `dateBC`,`designationBC`,`qteBC`,`client`)
            VALUES ('{$date}','{$_POST['designationBC'][$i]}','{$_POST['qteBC'][$i]}','{$client}')";
            $conn->query($sql);
        }
        header('location: BC.php');
      }
         
}
// =============================TRAITEMENT BORDEREAU DE Livraison=========================

//  enregistrement des commandes
if(isset($_POST['saveBL']))
{
    $erreur = "";
    $conn->query("DELETE FROM BL");
    $count= count($_POST['qteBL']);
    $quantite=$_POST['qteBL'];
$designation = $_POST['designationBL'];
$date=date('Y-m-j');
$client=$_POST['client'];
if($client==="0")
{
  $erreur=[];
  $erreur[] = "Veuillez choisir le client";
}else{
        for ($i=0; $i <$count ; $i++) {  
            $sql=" INSERT INTO `BL` ( `dateBL`,`designationBL`,`qteBL`,`client`)
            VALUES ('{$date}','{$_POST['designationBL'][$i]}','{$_POST['qteBL'][$i]}','{$client}')";
            $conn->query($sql);
        }
        header('location: BL.php');
      }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Gestion Factures</title>
    

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
    <?php
               if(!empty($erreur)){
                echo '<div class="alert alert-danger" style="text-align:center;font-size:18px;">';
                 foreach($erreur as $err)
                 {
                  echo $err;
                 }
                  echo '</div>';
                      }    
			?>
    <h1 class="text-center text-uppercase" style="color:#32459D; font-size: 40px;">votre espace de gestion de factures personnalisé !!! </h1>
    <div class="row p-4 justify-content-center">
      <div class="col-md-3 card text-center p-2">
          <h3 style="color:#32459D; ">Gestion des Factures</h3>
          <p class="p-1" style="font-size: 16px;">Utiliser cette fonctionnalite pour la meilleure gestion de vos factures.
           <strong>Proforma</strong> ou <strong>Definitive</strong>, vous avez le choix sur le type de facture que vous desirez <strong>imprimer</strong>,
            Commencer par remplir le formulaire de facture avec toutes les informations necessaires.
          </p>
          <a href="#facture" class="sticky-bottom "><button class="btn btn-success" style="font-weight: bold;">Creer une facture</button></a>
          
      </div>
      <div class="col-md-3 card offset-md-1 text-center">
        <h3 style="color:#32459D; ">Gestion des Bordereaux de Livraison</h3>
        <p class="p-1" style="font-size: 16px;">la fonctionnalite gestion des Bordereaux de Livraison vous permet de <strong>créer</strong> et d'<strong>imprimer</strong> un Bordereau de Livraison
            Commencer par remplir le formulaire de previsualisation avec toutes les informations necessaires.
          </p>
          <a href="#BL" class="sticky-bottom mb-1" ><button class="btn btn-success" style="font-weight: bold;">Creer un BL</button></a>
      </div>
      <div class="col-md-3 offset-md-1 card text-center">
        <h3 style="color:#32459D; ">Gestion des Bons de Commande</h3>
        <p class="p-1" style="font-size: 16px;">Gerer vos bons de commande avec vos <strong>fournisseurs</strong> devient plus facile grace à cette fonctionnalité.
            Commencer par remplir le formulaire avec toutes les informations necessaires.
          </p>
          <a href="#BC" class="sticky-bottom mb-1"><button class="btn btn-success" style="font-weight: bold;">Creer un BC</button></a>
      </div>
    </div>
    <hr id="facture"> <hr> <hr> <hr>
    <?php
include ('../../model/bd.php');
?>
<div class="container-fluid mb-5">
    <!-- =========================================FACTURES=============================== -->
    <section >
    <h3 class="card text-white p-2 text-center " style="font-family: 'Times New Roman'; font-weight: 150; background-Color: #32459D;"> Formulaire de Facture:</h3>
  <form class="insert-form card mb-3 bg-light p-4" method="POST" action="" enctype="multipart/form-data">
      <h4 class="text-center" style="text-decoration: underline;">Prévisualisation des factures :</h4>
    <div class="input-field p-4">
                <div class=" input-group mb-3"><?php
                      $query1 = "SELECT nom,id FROM client GROUP BY id";
                      $result = $conn-> query($query1);
                      ?>
                </div> 
                <div class="row ">
                  <div class="col-md-10 input-group mb-3 ">   
                      <label for="client" style="font-weight: bold; color:cornsilk" class="input-group-text bg-success">CHOISIR LE DESTINATAIRE:</label>
                        <select class="form-control" name="client" required >
                          <option value="0">Client</option>
                            <?php
                              while($row = $result->fetch_assoc()){?>
                                    <option value="<?=$row['id']?>"><?=$row['nom']?></option>
                              <?php } ?>
                        </select>
                        <a href="../gestionClient/client.php" >
                      <input  class="input-group-text bg-success" type="button" style="color: cornsilk;" value="Nouveau-Client">
                      </a>
                  </div>
              </div>   
                  <div class="row">
                    <div class="col-md-4  input-group mb-3 ">
                      <label class="input-group-text bg-success" style="font-weight: bold; color:cornsilk">TVA:</label>
                    <input type="number" class="form-control" min="1" name="tva" required placeholder="18%"> 
                    </div>
                  </div>  
                  <div class="row">
                  <div class="col-md-12 input-group mb-3" style="font-family: 'Times New Roman'; font-weight: 150;">
                      <label for="type" style="font-weight: bold; color:cornsilk" class="input-group-text bg-success">TYPE FACTURE:</label>
                      <input type="radio" id="definitive" class="ml-3 mt-3" name="facture" value="1" checked>
                      <label for="facture" class="ml-2">Facture Définitive </label>
                      <input type="radio" id="proforma" name="facture" value="0" class="ml-3 mt-3" >
                      <label for="facture" class="ml-2">Facture Proforma</label>
                          
                    </div>
                  </div>
        <table class="table table-bordered" id="table-field"> 
          <thead class="text-uppercase text-center">
                <th>Designation</th>
                <th>Quantite</th>
                <th>Prix</th>
                <th ><button style=" color:white" class="btn btn-warning" name="add"  id="add" title="Ajouter une nouvelle ligne">Nouvelle Ligne</button></th>
          </thead>
          <tbody>
           <tr>
                <td><input class="form-control" name="designation[]" type="text" required></td></td>
                <td> <input class="form-control" name="qte[]" type="number" min="1" required></td>
                <td> <input class="form-control" name="prix[]" type="number" min="1"  required></td>
                <td class="text-center"><button class="btn btn-danger" name="retirer" id="retirer" title="Retirer cette ligne">supprimer</button></td>
            </tr> 
          </tbody>
        </table>
        <center>
        <button class="btn btn-success" style="color:cornsilk; font-weight:bold;" name="save" style="font-weight: bold;">Générer la facture</button>
        </center>
    </div>  
  </form>
    </section> 
    <!-- ==========fin de section======== -->
    
  <hr id="BL"><hr>
   <hr><hr>

    <!-- =============================Bordereau de Livraison============================================== -->
  <section >
  <h3 class="card text-white p-2 text-center " style="font-family: 'Times New Roman'; font-weight: 150; background-Color: #32459D;"> Formulaire de Bordereau de Livraison:</h3>
  <form class="insert-form card mb-3 bg-light p-4" method="POST" action="" enctype="multipart/form-data">
      <h4 class="text-center" style="text-decoration: underline;">Previsualisation des Bordereau de Livraison :</h4>
    <div class="input-field p-4">
                <div class=" input-group mb-3"><?php
                      $query1 = "SELECT nom,id FROM client GROUP BY id";
                      $result = $conn-> query($query1);
                      ?>
                </div> 
                <div class="row ">
                  <div class="col-md-10 input-group mb-3 ">   
                      <label for="client" style="font-weight: bold; color:cornsilk" class="input-group-text bg-success">CHOISIR LE DESTINATAIRE:</label>
                        <select class="form-control" name="client" required >
                        <option value="0">Client</option>
                            <?php
                              while($row = $result->fetch_assoc()){?>
                                    <option value="<?=$row['id']?>"><?=$row['nom']?></option>
                              <?php } ?>
                        </select>
                        <a href="../gestionClient/client.php" >
                      <input  class="input-group-text bg-success" type="button" style="color: cornsilk;" value="Nouveau-Client">
                      </a>
                  </div>
              </div>   
            <table class="table table-bordered" id="table-field1"> 
                <tr class="text-center text-uppercase" style="font-family: 'Times New Roman'; font-size: 20px;">
                    <th>Designation</th>
                    <th>Quantite</th>
                    <th class="text-center" ><button class="btn btn-warning" style="color: white;" name="add"  id="add1" title="Ajouter une nouvelle ligne">Nouvelle ligne</button></th>
                </tr>
                <tr>
                    <td><input class="form-control" name="designationBL[]" type="text" required></td></td>
                    <td> <input class="form-control" name="qteBL[]" type="number" min="1" required></td>
                    <td class="text-center"><button class="btn btn-danger" name="retirer"  id="retirer1" title="Retirer cette ligne">supprimer</button></td>
                </tr>
            </table>
        <center>
        <button class="btn btn-success" style="color:cornsilk; font-weight:bold;" name="saveBL" style="font-weight: bold;">Générer le BL</button>
        </center>
    </div>  
  </form>
  </section>
  <!-- -==================fin de section==================== -->
  <hr id="BC"><hr>
  <hr><hr>
    <!-- =============================BON DE COMMANDE============================================== -->
  <section >
  <h3 class="card text-white p-2 text-center " style="font-family: 'Times New Roman'; font-weight: 150; background-Color: #32459D;"> Formulaire de Bon de Commande:</h3>
  <form class="insert-form card mb-3 bg-light p-4" method="POST" action="" enctype="multipart/form-data">
      <h4 class="text-center" style="text-decoration: underline;">Previsualisation des Commandes :</h4>
    <div class="input-field p-4">
                <div class=" input-group mb-3"><?php
                      $query1 = "SELECT nom,id FROM client GROUP BY id";
                      $result = $conn-> query($query1);
                      ?>
                </div> 
                <div class="row ">
                  <div class="col-md-10 input-group mb-3 ">   
                      <label for="client" style="font-weight: bold; color:cornsilk" class="input-group-text bg-success">CHOISIR LE DESTINATAIRE:</label>
                        <select class="form-control" name="client" required >
                        <option value="0">Client</option>
                            <?php
                              while($row = $result->fetch_assoc()){?>
                                    <option value="<?=$row['id']?>"><?=$row['nom']?></option>
                              <?php } ?>
                        </select>
                        <a href="../gestionClient/client.php" >
                      <input  class="input-group-text bg-success" type="button" style="color: cornsilk;" value="Nouveau-Client">
                      </a>
                  </div>
              </div>   
            <table class="table table-bordered" id="table-field2"> 
                <tr class="text-center text-uppercase">
                    <th>Designation</th>
                    <th>Quantite</th>
                    <th class="text-center"><button class="btn btn-warning text-white" type="button" name="add"  id="add2" title="Ajouter une nouvelle ligne">Nouvelle Ligne</button></th>
                </tr>
                <tr>
                    <td><input class="form-control" name="designationBC[]" type="text" required></td></td>
                    <td> <input class="form-control" name="qteBC[]" type="number" min="1" required></td>
                    <td class="text-center"><button class="btn btn-danger" name="retirer"  id="retirer1" title="Retirer cette ligne">supprimer</button></td>
                </tr>
            </table>
        <center>
        <button class="btn btn-success" style="color:cornsilk; font-weight:bold;" name="saveBC" style="font-weight: bold;">Générer le BON</button>
        </center>
    </div>  
  </form>
  </section>
  <!-- -==================fin de section==================== -->
</div>        
    </main>
    <footer class="footer p-2 fixed-bottom" style="background-Color: #32459D;">
                <div class="container">
                    <span class="text-white offset-md-5">Copyright @ 2021 ACS-froid Tous droits réservés</span>
                  </div>
            </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->
  <script type="text/javascript">
  
          $(document).ready(function(){
            var ligne = '<tr>';
            ligne+= '<td><input class="form-control" name="designation[]" type="text" required></td></td>';
            ligne += '<td> <input class="form-control" name="qte[]" type="number" min="1"  required></td>';
            ligne += '<td><input class="form-control" name="prix[]" type="number" min="1" required></td>';
            ligne += '<td class="text-center"><button class="btn btn-danger" name="retirer" id="retirer" title="Retirer cette ligne">supprimer</button></td>';
            ligne += '</tr';
            $("#add").click(function(){
            $("#table-field").append(ligne);
            });
            $("#table-field").on('click','#retirer',function(){
              $(this).closest('tr').remove();
            });
          });
          // ============================BL===================================
          $(document).ready(function(){
            var bl = '<tr>';
            bl+= '<td><input class="form-control" name="designationBL[]" type="text" required></td></td>';
            bl += '<td> <input class="form-control" name="qteBL[]" type="number" min="1"  required></td>';
            bl += '<td class="text-center"><button class="btn btn-danger" name="retirer"  id="retirer1" title="Retirer cette ligne">supprimer</button></td>';
            bl += '</tr';
            $("#add1").click(function(){
            $("#table-field1").append(bl);
            });
            $("#table-field1").on('click','#retirer1',function(){
              $(this).closest('tr').remove();
            });
          });

           // ============================BC===================================
           $(document).ready(function(){
            var bc = '<tr>';
            bc+= '<td><input class="form-control" name="designationBC[]" type="text" required></td></td>';
            bc += '<td> <input class="form-control" name="qteBC[]" type="number" min="1"  required></td>';
            bc += '<td class="text-center"><button class="btn btn-danger" name="retirer"  id="retirer2" title="Retirer cette ligne">supprimer</button></td>';
            bc += '</tr';
            $("#add2").click(function(){
            $("#table-field2").append(bc);
            });
            $("#table-field2").on('click','#retirer2',function(){
              $(this).closest('tr').remove();
            });
          });
  </script>
  </body>
</html>

