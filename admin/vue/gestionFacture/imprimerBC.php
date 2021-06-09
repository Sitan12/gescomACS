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
    <link href="../../dashboard.css" rel="stylesheet">
    
  </head>
  <body onload="window.print()">
  <?php  include ('../../model/bd.php'); ?>
    <div class="container">
      <div class="row p-4">
              <div class="col-md-4">
                  <img src="../../static/img/logo ACS.png" style="width: 50; height: 50;">
            </div>
            <div class="col-md-8">
            <h2 >ALLIANCE CUSTOMER SERVICE</h2>
            </div>
      </div>
       <hr>
        
        <!-- affichage de la facture -->
      <?php 
          $query1 = "SELECT * FROM BC ";
          $result = $conn-> query($query1);
      ?>
      <div class="row justify-content-end">
         <h4 style="font-weight: bold; font-size: 20px;"><?php $rst=$conn->query("SELECT nom FROM client INNER JOIN BC ON client.id = BC.client");
                              if($row=$rst->fetch_assoc()){
                                $nom=$row['nom'];
                              } echo $nom ?>
        </h4>
      </div>
      <h5 class="text-center text-uppercase p-4" style="text-decoration: underline; font-weight: bold;">Bon de Commande</h5>
      <div class="row p-2">
          <div class="col-md-4 offset-md-1">
              <table class="table table-bordered text-center">
                      <tr style="font-weight: bold;">
                          <th>Date</th>
                          <th>Numero</th>
                      </tr>
                      <tr>
                          <td><?php $rst=$conn->query("SELECT dateBC,numeroBC FROM BC ");
                              if($row=$rst->fetch_array()){
                                $date=$row['dateBC']; 
                              } echo $date ?></td>
                          <td>BC<?= $row['numeroBC'].date("ymj")?></td>
                      </tr>
              </table>
          </div>
        </div>
  <div class="row justify-content-center">
      <div class="col-md-10 p-2"> 
        <table class="table table-bordered"  style="margin-bottom: 150px;" >
          <thead align="center" class="bg-light">
              <th>QTE</th>
              <th>DESIGNATION</th>
          </thead>
          <tbody>
           <?php
            while($row = $result->fetch_assoc()){ 
            ?>
            <tr align="center">
                <td ><?=$row['qteBC']?></td>
                <td ><?=$row['designationBC']?></td>
            </tr> 
            <?php }  ?>
          </tbody>
        </table>
     </div>
  </div>
</div>
    
    <footer class="fixed-bottom">
        <p class="text-center"> Alliance Froid / Customer Services<br>Cite Lobat Fall N°44 Dakar Sénégal<br>Tel : 221 338339393 RC N° SN DKR 2015B 7111 NINEA 0054557472A2
                </p>
    </footer>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script><script src="dashboard.js"></script>
  </body>
</html>