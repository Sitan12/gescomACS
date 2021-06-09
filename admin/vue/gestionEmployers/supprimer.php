<?php
include('../../model/bd.php');
//  suppression des donnees
              $id=$_GET['tel'];
              $supprimer= "DELETE FROM employer WHERE telephone= '$id' ";
              $conn->query($supprimer);
          if($conn->query($supprimer)==true)
          header('location: employer.php');
          else
          echo $conn->error;
       
?>