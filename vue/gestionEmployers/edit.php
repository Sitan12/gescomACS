<?php
include('../../model/bd.php');
$nom = $_POST['nomEmp'];
$prenom = $_POST['prenomEmp'];
$adresse = $_POST['adresseEmp'];
$email=$_POST['email'];
$poste=$_POST['poste'];
$salaire=$_POST['salaireEmp'];
$tel=$_POST['telephone'];
$dateIntegration= $_POST['date'];
$assurance =$_POST['assurance'];
$conges=$_POST['conges'];
if(isset($_POST['enregistrer'])){
    if(empty($_POST['assurance']) || empty($_POST['conges'])){
        $assurance = 0;
        $conges = 0;
    }
        $query = "UPDATE employer SET nom='$nom', prenom='$prenom' , adresse='$adresse',email='$email',
        salaire='$salaire', posteServi='$poste', conges='$conges', assurance='$assurance', DateIntegration='$dateIntegration' WHERE telephone='$tel' " ;
         if ($conn->query($query) === TRUE)
         header('location: ../gestionEmployers/employer.php');
        else echo $conn->error;
   
}
?>