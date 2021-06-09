<?php
include ('../model/bd.php');
$erreur = array();
//  enregistrement des commandes
if(isset($_POST['save']))
{
    $erreur = "";
if($_POST['client']===0)
{
  $erreur=[];
  $erreur[] = "Veuillez choisir le client <br>";
}
    $quantite=$_POST['qte'];
    $prix=$_POST['prix'];
    $designation = $_POST['designation'];
    $date=date('Y-j-m');
    $client=$_POST['client'];   
    $tva=$_POST['tva'];
    $status=$_POST['facture'];
    $count= count($_POST['qte']);
    if($status==0){
        $sql1="DELETE FROM factureproforma";
        $conn->query($sql1);
        for ($i=0; $i <$count ; $i++) { 
            $total= $_POST['prix'][$i] * $_POST['qte'][$i] ; 
            $sql="INSERT INTO `factureproforma` ( `dateFP`,`designationFP`,`quantite`,`prixUnitaire`,`Total`,`client`,`tva`,`statusFP`)
            VALUES ('{$date}','{$_POST['designation'][$i]}','{$_POST['qte'][$i]}','{$_POST['prix'][$i]}','{$total}','{$client}','{$tva}','{$status}')";
            $conn->query($sql);
        }
        header('location:../vue/gestionFacture/factureProforma.php'); 

    } else if($status==1){
        $sql1="DELETE FROM facturedefinitive";
        $conn->query($sql1);
        for ($i=0; $i <$count ; $i++) { 
            $total= $_POST['prix'][$i] * $_POST['qte'][$i] ;
            $sql="INSERT INTO `facturedefinitive` ( `dateFD`,`designationFD`,`quantite`,`prixUnitaire`,`Total`,`client`,`tva`,`statusFD`)
            VALUES ('{$date}','{$_POST['designation'][$i]}','{$_POST['qte'][$i]}','{$_POST['prix'][$i]}','{$total}','{$client}','{$tva}','{$status}')";
            $conn->query($sql);
        }
        header('location:../vue/gestionFacture/factureDefinitive.php');
    }
      
} 

?>
