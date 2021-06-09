<?php 
session_start();
session_destroy(); //On détruit le cookie de l'identifiant.
header('Location: index.php');
// include("index.php"); //On revient au départ.
?>