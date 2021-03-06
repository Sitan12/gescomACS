<?php
include('../../model/bd.php');
//  suppression des donnees
              $id=$_GET['id'];
              $supprimer= "DELETE FROM facture WHERE id= '$id' ";
              $conn->query($supprimer);
          if($conn->query($supprimer)==true)
          header('location: affichage.php');
          else
          echo $conn->error;
       
?>