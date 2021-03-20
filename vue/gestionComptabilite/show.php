<?php
include('../../model/bd.php');
//  afficher les donnees
              $id=$_GET['id'];
              $show= "SELECT * FROM caisse WHERE id= '$id' ";
              $conn->query($show);
          if($conn->query($show)==true)
          header('location: caisse.php');
          else
          echo $conn->error;
       
?>

