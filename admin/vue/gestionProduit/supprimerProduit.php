<?php
include('../../model/bd.php');
//  suppression des donnees
              $id=$_GET['id'];
              $supprimer= "DELETE FROM produit WHERE id= $id";
              $conn->query($supprimer);
          
          header('location: produit.php');
       
?>