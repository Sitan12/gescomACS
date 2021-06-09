<?php
include('../model/bd.php');
    $date= date("Y-m-d");
    $type = $_POST['type'];
    $motif=$_POST['motif'];
    $heure=date("H:i:s");
    $montant=$_POST['montant'];
//    enregistrement des entrees/sorties
if(isset($_POST['enregistrer']))
{
    $rst= $conn->query("SELECT total FROM caisse");
    if($row=$rst->fetch_array()){
        $total= $row['total'];
    }

    if(isset($_POST['type']))
    {
        if($_POST['type']==="1")
        {
            $type="entree";
            $total=$total+$montant;
           
        }
         if($_POST['type']==="0")
        {
            $type="sortie";
            $total=$total-$montant;       
        }
    }
        $query = "INSERT INTO caisse (typeEnregistrement,motif,montant,dateEnregistrement,heure) 
        values ('$type','$motif','$montant','$date','$heure')";
        $conn->query( "UPDATE caisse SET total = '$total' ");
         if ($conn->query($query) === TRUE)
         header('location: ../vue/gestionComptabilite/caisse.php');
        else echo $conn->error;
}
