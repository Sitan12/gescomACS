<?php
include('../../model/bd.php');
if(isset($_POST['enregistrer'])){
    $imgName = basename($_FILES['imgPro']['name']);
    $dossier = '../../static/img';
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['imgPro']['name'], '.');
    if(!in_array($extension, $extensions))
     //Si l'extension n'est pas dans le tableau
    {
         $erreur = 'Vous devez inserer un fichier de type png, gif, jpg ou jpeg...';
         echo $erreur;
    }
    if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
    {
         //On formate le nom du fichier ici...
         $imgName = ucfirst($imgName); 
         if(move_uploaded_file($_FILES['imgPro']['tmp_name'], $dossier . $imgName)){
     //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    
        $id=$_POST['id']; 
        $nom= $_POST['nomPro']; 
        $des= $_POST['descriptionPro'];
        // $date= $_POST['DateEnregistrement'];
        $image= $imgName; 
   
      $requete= "UPDATE produit SET nomProduit='$nom' , descriptionProduit='$des',
       imageProduit='$image' WHERE id='$id'"; 
      if($conn->query($requete)===true){
        header('location: produit.php');
      }
      else 
        echo "Error updating record: " . $conn->error;
    }
}
}
?>