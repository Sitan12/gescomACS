<?php
include('../model/bd.php');
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $pwd=$_POST['password'];
    $sql=$conn->query("SELECT username,pwd FROM connexion");
    if($row=$sql->fetch_assoc())
    {
        if($username===$row['username'] && $pwd===$row['pwd'])
        {
            header('Location: ../dashboard.php');
        }else 
        header('Location: ../index.php?message=error');
    }

}
?>