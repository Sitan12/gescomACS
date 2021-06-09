<?php
include('../../model/bd.php');
    $id=$_POST['id'];
    // $date=$_POST['date'];
    $bon = $_POST['bon'];
    $libelle=$_POST['libelle'];
    $marque = $_POST['marque'];
    $client=$_POST['client'];
    $somme=$_POST['somme'];
    $avance = $_POST['avance'];
    $solde=$_POST['solde'];
    $fournisseur=$_POST['fournisseur'];
    if(isset($_POST['valider']))
    {
        $query = "UPDATE suiviFournisseur SET bon='$bon', libelle='$libelle', marque='$marque',
            client='$client',somme='$somme', avance='$avance',solde='$solde'
            WHERE id='$id' " ;
            if ($conn->query($query) === TRUE)
            header("location: ../gestionFournisseur/suivi.php?id=$fournisseur");
        else echo $conn->error;

    }
if(isset($_POST['annuler']))
header("location: ../gestionFournisseur/suivi.php?id=$fournisseur");
?>