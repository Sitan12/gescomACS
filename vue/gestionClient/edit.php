<?php
include('../../model/bd.php');
$id=$_POST['id'];
$nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $email=$_POST['email'];
    $telephone=$_POST['tel'];
if(isset($_POST['enregistrer'])){
        $query = "UPDATE client SET nom='$nom', adresse='$adresse', email='$email', telephone='$telephone'
         WHERE id='$id' " ;
         if ($conn->query($query) === TRUE)
         header('location: ../gestionClient/client.php');
        else echo $conn->error;

}
if(isset($_POST['annuler']))
header('location: ../gestionClient/client.php');
?>