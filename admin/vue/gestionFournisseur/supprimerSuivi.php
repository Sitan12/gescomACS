<?php
include('../../model/bd.php');
//  suppression des donnees
              $id=$_GET['id'];
              $supprimer= "DELETE FROM suiviFournisseur WHERE id= '$id' ";
              $conn->query($supprimer);
          if($conn->query($supprimer)==true)
          header('location: suivi.php');
          else
          echo $conn->error;
       
?>