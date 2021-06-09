<?php
include('../model/bd.php');
    $nom = $_POST['nom'];
    $telephone=$_POST['tel'];
    $adresse = $_POST['adresse'];
    $email=$_POST['email'];
   
if(isset($_POST['ajouter'])){
        $query = "INSERT INTO client (nom,telephone,adresse,email) 
        values ('$nom','$telephone','$adresse','$email')";
         if ($conn->query($query) === TRUE)
         header('location: ../vue/gestionClient/client.php');
        else echo $conn->error;
}
?>