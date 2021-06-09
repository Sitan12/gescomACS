<?php
include('../model/bd.php');
   
// =====================traitement fournisseur==================
if(isset($_POST['ajouter']))
{
    $nom = $_POST['nom'];
    $telephone=$_POST['tel'];
    $query = "INSERT INTO fournisseur (nom,telephone) 
    values ('$nom','$telephone')";
        if ($conn->query($query) === TRUE)
        header('location: ../vue/gestionFournisseur/fournisseur.php');
    else echo $conn->error;
}

// =====================traitement Suivi-fournisseur==================
if(isset($_POST['valider']))
{
    $date=date("Y-m-d");
    $bon = $_POST['bon'];
    $libelle=$_POST['libelle'];
    $marque = $_POST['marque'];
    $client=$_POST['client'];
    $somme=$_POST['somme'];
    $avance = $_POST['avance'];
    $solde=$_POST['solde'];
    $fournisseur=$_POST['fournisseur'];
    $query = "INSERT INTO suiviFournisseur (dateSuivi,bon,libelle,marque,client,somme,avance,solde,fournisseur) 
    values ('$date','$bon','$libelle','$marque','$client','$somme','$avance','$solde','$fournisseur')";
     if ($conn->query($query) === TRUE)
     header("location: ../vue/gestionFournisseur/suivi.php?id=$fournisseur");
     else 
     echo $conn->error;
}

?>