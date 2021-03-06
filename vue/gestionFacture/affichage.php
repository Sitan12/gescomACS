<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
        <!-- affichage de la facture -->
    <?php 
    include('../../model/bd.php');
        $query1 = "SELECT * FROM facture where client = 5 ";
        $result = $conn-> query($query1);
    ?>
  <div class="row">
      <div class="col-12 p-4"> 
            <h4 class="text-center"> Facture préparée pour <?php $rst=$conn->query("SELECT nom FROM client where id = 5 ") ; 
            if($row=$rst->fetch_assoc()){
                echo$row['nom']; 
              }?></h4> 
        <table class="table table-bordered" >
          <thead align="center">
              <th>QTE</th>
              <th>DESIGNATION</th>
              <th >PRIX UNITAIRE</th>
              <th >MONTANT</th>
              <th >ACTION</th>
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
                <td>
                    <a href="../vue/gestionFacture/supprimer.php" class="btn btn-danger">Retirer</a>
                    <a href="../vue/gestionFacture/modifier.php?id=<?=$row['id']?>" class="btn btn-info">Modifier</a>
                </td>
            </tr> 
            <?php }  ?>
            <tr align="right" style="font-weight: bold;">
              <td colspan="3">MONTANT HT</td>
              <td><?=$montantHT?></td>
            </tr>
            <tr align="right" style="font-weight: bold;">
              <td colspan="3">TVA</td>
              <td>
              <?php $rst=$conn->query("SELECT tva FROM facture WHERE client = 5 ");
                if($row=$rst->fetch_assoc()){
                  $tva=$row['tva']; 
                } echo $total=($montantHT*$tva)/100;?>
              </td>
            </tr>
            <tr align="right"  style="font-weight: bold;">
              <td colspan="3">MONTANT TTC</td>
              <td><?=$montantTTC=$total+$montantHT?></td>
            </tr>
          </tbody>
        </table>
        <a href=""><button class="btn btn-success" name="valider">Valider</button></a>
     </div>
  </div>
</div>
</body>
</html>