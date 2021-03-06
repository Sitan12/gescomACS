<?php
include('../model/bd.php');
    $date= date("Y-m-d");
    $type = $_POST['type'];
    $motif=$_POST['motif'];
    $heure=date("H:i:s");
    $montant=$_POST['montant'];
    $somEntree; $somSortie;
    $total;
//    enregistrement des entrees/sorties
if(isset($_POST['enregistrer'])){
    if(isset($_POST['type'])){
        if($_POST['type']==="Entree"){
            $sql = $conn->query('SELECT SUM(montant) AS somEntree FROM caisse');
           
        } if($_POST['type']==="Sortie"){
            $sql = $conn->query('SELECT SUM(montant) AS somSortie FROM caisse');
           
        }
    }
    $total=$somEntree-$somSortie;
        $query = "INSERT INTO caisse (typeEnregistrement,motif,montant,dateEnregistrement,heure,total) 
        values ('$type','$motif','$montant','$date','$heure','$total')";
         if ($conn->query($query) === TRUE)
         header('location: ../vue/gestionComptabilite/caisse.php');
        else echo $conn->error;
}

?>