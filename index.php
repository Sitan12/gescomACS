<?php
  //Affichage des erreurs php
  error_reporting(E_ALL);
  ini_set('display-errors','on');
  
  //démarrage des sessions
  if(session_id() == '') {
	  session_start();
	}

  //connexion à la bdd
  include('model/bd.php');
  
  //récupération PROPRE des variables AVANT de les utiliser
    // $username = !empty($_POST['username']) ? trim($_POST['username']) : NULL;
     // $pwd = !empty($_POST['password']) ? trim($_POST['password']) : NULL;
     
        
        $errMsg = array();
  
  //traitement du formulaire  
    if(isset($_POST['login']))
    {
        $username=$_POST['username'];
        $pwd=$_POST['password'];
		$errMsg = "";
		//login and password sent from Form
        if(empty($username))
        {
            $errMsg=[];
			$errMsg[] = "Veuillez entrer votre nom<br>";	
        }
	
        if(empty($pwd))
        {
            $errMsg=[] ;
            $errMsg[]= "Veuillez entrer votre mot de passe<br>";
        }
    
        if(empty($errMsg))
        {   
            //execution de la requete
            try
            {
                $sql="SELECT username,pwd FROM connexion";
                $result=$conn->query($sql);
                
            }catch(Exception $e)
            {
                echo "<p>Erreur : " . $e->getMessage() . "</p>";
                exit();
            }
            if($row=$result->fetch_array())
                {
                    
                    if($username===$row['username'] && $pwd===$row['pwd'])
                    {   
                        $_SESSION['username'] = $row['username'];
                        header('Location: dashboard.php');
                        exit();
                    }else {
                        $errMsg=[];
                        $errMsg[] = "Vérifiez vos identifiants de connexion<br>";
                    }
                }
           
          
        }		
    }

?>
<!-- *********************************************************************** -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Login</title>
</head>
<body>
    <div class="container" >
        <div class="row d-flex justify-content-center mt-5 p-4 ">
        <?php
                if(!empty($errMsg))
                {
                    echo '<div style="color:#FF0000;text-align:center;font-size:12px;">';
                    foreach($errMsg as $err){
                            echo $err;
                }
          echo '</div>';
				}
			?>
            <div class=" card col-md-6 p-4" style="background-Color:cornsilk;">
                    <h1><i style="font-size: 100px;" class="offset-5 fas fa-user-circle "></i></h1>
                <div class="card p-4" style="background-Color:cornsilk;">
                        <form action="" method="POST">   
                            <h3 class="text-center">Administrateur</h3>
                            <div class="input-group mb-3">
                                <i class=" input-group-text fas fa-user  bg-info"></i>  
                                <input type="email" class="form-control" name="username" placeholder="Identifiant" required>
                            </div>
                            
                            <div class="input-group mb-3">
                            <i class="input-group-text fas fa-key  bg-info"></i>
                            <input type="password" class="form-control" name="password" placeholder="Mot De Passe" required>
                            </div>
                            <div class="row justify-content-end">
                                <a class="float-right" href="">Mot de Passe Oublié?</a>
                            </div>
                            <div class="row justify-content-center">
                                 <input type="submit" class="btn-success" name="login" value="Login">
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>