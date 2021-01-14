<?php
include('../../model/bd.php');
//  suppression des donnees
              $id=$_GET['id'];
              $supprimer= "DELETE FROM client WHERE id= '$id' ";
              $conn->query($supprimer);
          if($conn->query($supprimer)==true)
          header('location: client.php');
          else
          echo $conn->error;
       
?>