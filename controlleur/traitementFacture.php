<?php
include ('../model/bd.php');

//  enregistrement des commandes
if(isset($_POST['save'])){
    $quantite=$_POST['qte'];
$prix=$_POST['prix'];
$date=date('Y-m-j');
$client=$_POST['client'];
// $produit=$_POST['produit'];
 $tva=$_POST['tva'];
 $status=$_POST['facture'];
    $count= count($_POST['qte']);
    if($status==0){
        for ($i=0; $i <$count ; $i++) { 
            $total= $_POST['prix'][$i] * $_POST['qte'][$i] ; 
            
    // $sql="UPDATE `factureproforma` SET
    // `dateFP`='{$date}',`quantite`='{$_POST['qte'][$i]}',`produit`='{$_POST['produit'][$i]}',
    // `prixUnitaire`='{$_POST['prix'][$i]}',`Total`='{$total}',`client`='{$client}',`tva`='{$tva}',`statusFP`='{$status}' "; 
        $sql="INSERT INTO `factureproforma` ( `dateFP`,`quantite`,`produit`,`prixUnitaire`,`Total`,`client`,`tva`,`statusFP`)
        VALUES ('{$date}','{$_POST['qte'][$i]}','{$_POST['produit'][$i]}','{$_POST['prix'][$i]}','{$total}','{$client}','{$tva}','{$status}')";
            $conn->query($sql);
        }
        header('location:../vue/gestionFacture/factureProforma.php'); 

    } else if($status==1){
        for ($i=0; $i <$count ; $i++) { 
            $total= $_POST['prix'][$i] * $_POST['qte'][$i] ;
            
    // $sql="UPDATE `facturedefinitive` SET
    // `dateFD`='{$date}',`quantite`='{$_POST['qte'][$i]}',`produit`='{$_POST['produit'][$i]}',
    // `prixUnitaire`='{$_POST['prix'][$i]}',`Total`='{$total}',`client`='{$client}',`tva`='{$tva}',`statusFD`='{$status}' ";  
            $sql="INSERT INTO `facturedefinitive` ( `dateFD`,`quantite`,`produit`,`prixUnitaire`,`Total`,`client`,`tva`,`statusFD`)
            VALUES ('{$date}','{$_POST['qte'][$i]}','{$_POST['produit'][$i]}','{$_POST['prix'][$i]}','{$total}','{$client}','{$tva}','{$status}')";
            $conn->query($sql);
        }
        header('location:../vue/gestionFacture/factureDefinitive.php'); 
    }
      
} 
// bouttons imprimer ou annuler facture
if( isset($_POST['annulerFD']) ){
    $sql1="DELETE * FROM facturedefinitive";
    $conn->query($sql1);
    header('location:../vue/gestionFacture/facture.php');
    if ($conn->query($sql1) === TRUE) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . $conn->error;
      }

}
// else if(isset($_POST['imprimerFP']) || isset($_POST['annulerFP'])){
//     $sql1="DELETE * FROM factureproforma";
//     $conn->query($sql1);
//     header('location:../vue/gestionFacture/facture.php');
// }

?>
