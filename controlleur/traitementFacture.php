<?php

include ('../model/bd.php');
//  $tva=18/100;
if(isset($_POST['save'])){

$quantite=$_POST['qte'];
    $prix=$_POST['prix'];
    
$count= count($_POST['qte']);
for ($i=0; $i <$count ; $i++) { 
    $date=date('Y-m-j');
    $client=$_POST['client'];
    $total= $_POST['prix'][$i] * $_POST['qte'][$i] ; 
    $sql="INSERT INTO `facture` ( `dateFacture`, `quantite`,`produit`,`prixUnitaire`,`Total`,`client`)
     VALUES ( '{$date}', '{$_POST['qte'][$i]}','{$_POST['produit'][$i]}','{$_POST['prix'][$i]}','{$total}','{$client}')";
    $conn->query($sql);
}
header('location:../vue/gestionFacture/facture.php');

     }
  
 





        
?>
