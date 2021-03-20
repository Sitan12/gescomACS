<?php
include('../model/bd.php');
    $date= date("Y-m-d");
    $type = $_POST['type'];
    $motif=$_POST['motif'];
    $heure=date("H:i:s");
    $montant=$_POST['montant'];
    $somEntree; $somSortie;
    $total= $conn->query("SELECT total FROM caisse");
//    enregistrement des entrees/sorties
if(isset($_POST['enregistrer']))
{
    if(isset($_POST['type'])){
        if($_POST['type']==="1")
        {
            $type="entree";
            $total=$total+$montant;
            $sql = $conn->query('SELECT SUM(montant) AS somEntree FROM caisse');
           
        }
         if($_POST['type']==="0")
        {
            $type="sortie";
            $total=$total-$montant;       
        }
    }
        $query = "INSERT INTO caisse (typeEnregistrement,motif,montant,dateEnregistrement,heure) 
        values ('$type','$motif','$montant','$date','$heure')";
        $query1 = "UPDATE caisse SET total = '$total' ";
         if ($conn->query($query) === TRUE)
         header('location: ../vue/gestionComptabilite/caisse.php');
        else echo $conn->error;
}
