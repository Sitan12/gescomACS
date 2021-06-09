<?php
include ('../../model/bd.php');
$nom = $_POST['nomEmp'];
$prenom = $_POST['prenomEmp'];
$adresse = $_POST['adresseEmp'];
$email=$_POST['email'];
$poste=$_POST['poste'];
$salaire=$_POST['salaireEmp'];
$tel=$_POST['telephone'];
$dateIntegration= $_POST['date'];
$assurance =$_POST['assurance'];
$absence= $_POST['absence'];
$auto =$_POST['auto'];
$conges=$_POST['conges'];

if(isset($_POST['enregistrer']))
{
    if(empty($_POST['assurance'])) 
    {
        $assurance = 0;
    }
    if( empty($_POST['conges']))
     {
        $conges = 0;
    }
    if(empty($_POST['absence']))
    {
        $absence = 0;
    }
    if(empty($_POST['auto']))
    {
        $auto = 0;
    }
        $query = "UPDATE employer SET nom='$nom', prenom='$prenom' , adresse='$adresse',email='$email',
        salaire='$salaire', posteServi='$poste', conges='$conges', assurance='$assurance', DateIntegration='$dateIntegration',
        autorisation='$auto', absence='$absence' WHERE telephone='$tel' " ;
         if ($conn->query($query) === TRUE)
         header('location: ../gestionEmployers/employer.php');
        else echo $conn->error;
   
}
else if(isset($_POST['annuler']))
    {
        header('location: ../gestionEmployers/employer.php');
    }
?>