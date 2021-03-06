<?php
include ('../model/bd.php');
$quantite=$_POST['qte'];
$prix=$_POST['prix'];
$date=date('Y-m-j');
$client=$_POST['client'];
 $tva=$_POST['tva'];
 $status;
if(isset($_POST['save'])){

$count= count($_POST['qte']);
for ($i=0; $i <$count ; $i++) { 
    $total= $_POST['prix'][$i] * $_POST['qte'][$i] ; 
    $sql="INSERT INTO `facture` ( `dateFacture`,`quantite`,`produit`,`prixUnitaire`,`Total`,`client`,`tva`)
     VALUES ('{$date}','{$_POST['qte'][$i]}','{$_POST['produit'][$i]}','{$_POST['prix'][$i]}','{$total}','{$client}','{$tva}')";
    $conn->query($sql);
}
header('location:../vue/gestionFacture/affichage.php');       
} 
?>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

<?php
      // if(!empty('valider')){
      //  echo $date= date("Y-m-d");
      //  echo $type = "Entree";
      //  echo $motif="Vente";
      //   echo $heure=date("H:i:s");
      //  echo $montant=$montantTTC;
      //  $query = "INSERT INTO caisse (typeEnregistrement,motif,montant,dateEnregistrement,heure) 
      //  values ('$type','$motif','$montant','$date','$heure')";
      // }
?>

