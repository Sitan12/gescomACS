<?php
include('../../model/bd.php');
$id= $_POST['id'];
$type = $_POST['type'];
$motif=$_POST['motif'];
$montant = $_POST['montant'];
$heure=date("H:i:s");
if(isset($_POST['enregistrer'])){
        $query = "UPDATE caisse SET typeEnregistrement='$type', motif='$motif', montant='$montant',heure='$heure'
        WHERE id='$id' " ;
         if ($conn->query($query) === TRUE)
         header('location: caisse.php');
        else echo $conn->error;
   
}
?>