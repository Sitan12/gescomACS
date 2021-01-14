<?php
include('../model/bd.php');
if(isset($_POST['ajouter'])){
    $nom = $_POST['nomEmp'];
    $prenom = $_POST['prenomEmp'];
    $adresse = $_POST['adresseEmp'];
    $email=$_POST['email'];
    $poste=$_POST['poste'];
    $salaire=$_POST['salaireEmp'];
    $tel=$_POST['telEmp'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
        $query = "INSERT INTO employer (nom,prenom,adresse,telephone,email,salaire,posteServi) 
        values ('$nom', '$prenom', '$adresse','$tel','$email', '$salaire', '$poste')";
         if ($conn->query($query) === TRUE)
         header('location: ../vue/gestionEmployers/employer.php');
        else echo $conn->error;
}
?>