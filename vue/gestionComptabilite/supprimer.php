<?php
include('../../model/bd.php');
//  suppression des donnees
              $id=$_GET['id'];
              $supprimer= "DELETE FROM caisse WHERE id= '$id' ";
              $conn->query($supprimer);
          if($conn->query($supprimer)==true)
          header('location: caisse.php');
          else
          echo $conn->error;
       
?>