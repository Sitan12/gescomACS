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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Imprimer Facture ACS</title>
</head>
<body onLoad="window.print()">
<?php  include('../../model/bd.php'); ?>
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
       <div class="row justify-content-end">
       
            <h4><?php $rst=$conn->query("SELECT nom FROM client INNER JOIN facturedefinitive ON client.id = facturedefinitive.client");
                              if($row=$rst->fetch_assoc()){
                                $nom=$row['nom']; 
                              } echo $nom ?></h4>
       </div>
        <h3 class="text-center p-2">FACTURE</h3>
        
        <!-- affichage de la facture -->
      <?php 
          $query1 = "SELECT * FROM facturedefinitive ";
          $result = $conn-> query($query1);
      ?>
      <div class="row p-4">
          <div class="col-md-4">
              <table class="table table-bordered ">
                      <tr style="font-weight: bold;">
                          <th>Date</th>
                          <th>Numero</th>
                      </tr>
                      <tr>
                          <td><?php $rst=$conn->query("SELECT dateFD,numeroFD FROM facturedefinitive ");
                              if($row=$rst->fetch_assoc()){
                                $date=$row['dateFD']; 
                              } echo $date ?></td>
                          <td>FD<?= $row['numeroFD'].date("ymj")?></td>
                      </tr>
              </table>
          </div>
          <div class="col-md-4 offset-md-4">
              <table class="table table-bordered text-center">
                      <tr style="font-weight: bold;">
                          <th>Adresse</th>
                      </tr>
                      <tr>
                          <td><?php $rst=$conn->query("SELECT adresse FROM client INNER JOIN facturedefinitive ON client.id = facturedefinitive.client");
                              if($row=$rst->fetch_assoc()){
                                $adresse=$row['adresse'];
                              } echo $adresse ?></td>
                      </tr>
              </table>
          </div>
        </div>
  <div class="row">
      <div class="col-md-12 p-4"> 
        <table class="table table-bordered" style="margin-bottom: 100px;">
          <thead align="center" class="bg-light">
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
                <td ><?=$row['designationFD']?></td>
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
              <td><?php $rst=$conn->query("SELECT tva FROM facturedefinitive");
                if($row=$rst->fetch_assoc()){
                  $tva=$row['tva']; 
                } echo $total=($montantHT*$tva)/100;?>
              </td>
            </tr>
            <tr align="right"  style="font-weight: bold;">
              <td colspan="3">MONTANT TOTAL</td>
              <td class="bg-light"><?=$montantTTC=$total+$montantHT?></td>
            </tr>
          </tbody>
        </table>
     </div>
  </div>
</div>
    <footer class="sticky-bottom">
        <p class="text-center"> Alliance Froid / Customer Services<br>Cite Lobat Fall N??44 Dakar S??n??gal<br>Tel : 221 338339393 RC N?? SN DKR 2015B 7111 NINEA 0054557472A2
                </p>
    </footer>
  
</body>
</html>
<?php 
// header('Location: factureDefinitive.php')
?>