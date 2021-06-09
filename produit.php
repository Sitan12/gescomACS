
  <?php include ('header/header.php') ?> 
  <!-- lister les produits -->
  <h2 class="text-center titre p-5" id="produits"><strong>Produit</strong></h2>
       <section class="container">
         <div class="row">
            <?php
                  include ('admin/model/bd.php');
                 
                 if(isset($_GET['page']))
                  {
                    $page = $_GET['page'];
                  }else
                  {
                    $page=1;
                  }
                  $num_page = 02;
                  $start_from = ($page-1)*$num_page;

                 $selectIMG=" SELECT * FROM produit ORDER BY id DESC limit $start_from,$num_page ";
                  $resultat=$conn->query($selectIMG);

                  while($produit = $resultat->fetch_assoc()){ ?>
              <div class="card col-md-4 p-2 justify-content-center">
                <img src="admin/static/img/<?=$produit['imageProduit']?>" class="card-img-top" width="50" height="250" alt="..." >
                <div class="card-body">
                  <h5 class="card-title"  ><?=$produit['nomProduit']?></h5>
                  <p class="card-text"><?=$produit['descriptionProduit']?></p>
                  <a href="#contact" class="btn btn-success">Contactez-nous</a>
                </div>
              </div>
              
                <?php
              }

              ?>
              
              </div> 
       </section>
       <div class="container">

       <?php
  //=======================================PAGINATION===================================================
            $query="SELECT * FROM produit";
            $result=$conn->query($query);
            //nombre de ligne
            $ligne = mysqli_num_rows($result);
            // echo $totalpages;
            //nombre de page
            $totalpages=ceil($ligne/$num_page);
            // echo $totalpages;
            ?>

      <nav aria-label="Page navigation example" class="mt-1">
        <ul class="pagination justify-content-center" >
          <li class="page-item">
            <a class="page-link" href="produit.php?page=1#produits" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          
          <?php
            for($i=1; $i<=$totalpages;$i++)
            {
            echo "<li class='page-link'><a href='produit.php?page=".$i."#produits' style='text-decoration: none;'>$i</a></li>";
             
            }
            ?>
          <li class="page-item">
            <a class="page-link" href="produit.php?page=<?=$i-1?>#produits">Next</a>
          </li>
        </ul>
      </nav>
           </div> 
       <hr class="container mt-5 mb-3">
  <section class="">
      <div class="container text-center">
        <h2 class="titre p-5"><strong>Nos marques d'appareils </strong></h2>
        <img class="espace" src="admin/static/logo/midea.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/wilson.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/gree.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/vestel.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/astech.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/serico.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/beko.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/westpool.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/lg.png" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/samsung.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/airwell.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/solstar.jpg" alt="" width="50" height="50">
        <img class="espace" src="admin/static/logo/hisense.png" alt="" width="50" height="50">
        
      </div>
  </section>

  <hr class="container mt-5 mb-3">  
  <!-- marques electromenagers -->
  <section>
    <h2 class="text-center titre p-5"><strong>Nos marques électroménagers</strong></h2>
    <div class="bg-light">
      <marquee behavior="" direction="left">
        <img src="admin/static/logo/airwell.jfif" alt="">
        <img src="admin/static/logo/astech.jfif" alt="">
        <img src="admin/static/logo/electro.jfif" alt="">
        <img src="admin/static/logo/electromenager.jfif" alt="">
        <img src="admin/static/logo/hisense.jfif" alt="">
        <img src="admin/static/logo/LG.jfif" alt="">
        <img src="admin/static/logo/midea.jfif" alt="">
        <img src="admin/static/logo/solstar.jfif" alt="">
      </marquee>
    </div>
  </section>
  
  
    <!-- Inclure le footer -->
  <?php
    include ('footer/footer.php');
    ?>
</body>
</html>
