<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#" >ACS</a>
          <div class="navbar jutify content-end" style="font-weight: bold;">
            <a class="nav-link active text-dark" href="#">Accueil</a>
            <a class="nav-link active text-dark" href="produit.php">Produit</a>
            <a class="nav-link active text-dark" href="#">Nos Services</a>
            <a class="nav-link active text-dark" href="#">Contact</a>
            <a class="nav-link active text-dark" href="panier.php">Panier</a>
          </div>
        </div>
       </nav>
        <!-- lister les produits -->
       <section class="container">
         <div class="row">
            <?php
              include ('../model/bd.php');
              $selectIMG=" SELECT * FROM produit";
              $resultat=$conn->query($selectIMG);
              while($row = $resultat->fetch_assoc()){
            ?>
            <!-- <div class="col-12 p-4"> -->
              <div class="card col-md-3">
                <img src="../static/img/<?=$row['imageProduit']?>" class="card-img-top" width="50" height="250" alt="..." >
                <div class="card-body">
                  <h5 class="card-title"  ><?=$row['nomProduit']?></h5>
                  <p class="card-text"><?=$row['descriptionProduit']?></p>
                  <a href="panier.php?id=<?=$row['id']?>" class="btn btn-success" >Contactez-nous</a>
                </div>
              </div>
                <?php
              }
              ?>
         </div> 
       </section>
</body>
</html>