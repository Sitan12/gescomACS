<?php
include ('../model/bd.php');

// ****************************AJOUTER PRODUIT*******************************

if(isset($_POST['ajouter']))
{
        $imgName = basename($_FILES['imgPro']['name']);
        $dossier = '../static/img/';
        $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.jfif');
        $extension = strrchr($_FILES['imgPro']['name'], '.');
        if(!in_array($extension, $extensions))
        //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez inserer un fichier de type png, gif, jpg, jfif ou jpeg...';
            echo $erreur;
        }else if($imgName>8000)
        {
            $erreur = 'Image est trop grande, veuillez choisir une autre';
            echo $erreur;
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $imgName = ucfirst($imgName); 
            if(move_uploaded_file($_FILES['imgPro']['tmp_name'], $dossier . $imgName))
            //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            if (file_exists($imgName))
            {
                echo "Sorry, file already exists.";
            }
            //  Insertion de produit 
            $nom = $_POST['nomPro'];
            $des = $_POST['descriptionPro'];
            $date = date("Y-m-d");
            $image=$imgName;
                $query = "INSERT INTO produit (nomProduit,descriptionProduit,dateEnregistrement,imageProduit) 
                values ('$nom', '$des', '$date', '$image')";
                if ($conn->query($query) === TRUE)
                header('location: ../vue/gestionProduit/produit.php');
         }
}
            else echo' erreur';


?>