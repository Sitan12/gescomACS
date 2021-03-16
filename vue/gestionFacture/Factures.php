<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Tableau de Bord</title>
    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-success flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 bg-light" href="#"><img src="../../static/img/logo ACS.png" alt="logo"></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100 col-md-3 " type="text" placeholder="Search" aria-label="Search">
  <div class="navbar navbar-expand-lg col-md-6" style=" font-weight: bold;">
    <a class="nav-link"  href="#">Home</a>
    <a class="nav-link" href="#">Services</a>
    <a class="nav-link" href="#">Partener</a>
    <a class="nav-link offset-3" href="#">Sign out</a>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-5">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Tableau de Bord
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vue/gestionProduit/produit.php">
              <span data-feather="shopping-cart"></span>
              Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vue/gestionClient/client.php">
              <span data-feather="users"></span>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vue/gestionEmployers/employer.php">
              <span data-feather="bar-chart-2"></span>
              Personnel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vue/gestionFacture/Factures.php">
              <span data-feather="layers"></span>
              Factures
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="vue/gestionComptabilite/caisse.php">
              <span data-feather="layers"></span>
              Comptabilite
            </a>
          </li>
        </ul>

      </div>
    </nav>

    <main class=" container all-content-wrap" style="margin-left: 220px;">
     
             <!-- GESTION DES FACTURES  -->
    <div class="container">
        <h5 class="text-center p-2">FACTURE <select name="facture" id="facture">
                    <option value="0">PROFORMA</option>
                    <option value="1">DEFINITIVE</option>
        </select> </h5>
    <form action="">
    <div class="row">
        <div class="col-2">
            <table class="table table-bordered">
                    <tr style="font-weight: bold;">
                        <th>Date</th>
                        <th>Numero</th>
                    </tr>
                    <tr>
                        <td> <input type="date"></td>
                        <td> <input type="text"></td>
                    </tr>
            </table>
        </div>
    </div>
    <div class="row">
       <div class="col-10 text-center" >
       <table class="table table-bordered" id="table" > 
            <thead>
                 <th>DESIGNATION</th>
                <th>QUANTITE</th>
                <th>PRIX UNITAIRE</th>
                <th>MONTANT</th>
                <th><input type="button" name="add"  id="add" class="btn btn-warning" value="+"></th>
            </thead>
            <tbody>
                <!-- <tr id="tr">
                    <td><input name="quantite[]" class="element form-control" type="number" min="0" style="border: none;"></td>
                    <td><input name="designation[]" id="designation" class="form-control" type="text" style="border: none;"></td>
                    <td><input name="prix[]" class="element form-control" type="number" min="0" style="border: none;"></td>
                    <td><input name="montant[]" id="montant" class="form-control" type="number" min="0" style="border: none;"></td>
                    <td><input type="button" name="retirer"  id="moins" class="btn btn-danger" value="-"></td>
                </tr> -->
                <tr  id="montantHT"  style="font-weight: bold; text-align: right;"><td colspan="3">MONTANT HT</td>
                    <td><input type="text" id="montantHT" name="montantHT" ></td>
                </tr>
                <tr style="font-weight: bold; text-align: right;"><td colspan="3">TVA</td>
                    <td> <input type="text" id="tva" name="tva"></td>
                </tr>
                <tr style="font-weight: bold; text-align: right;"><td colspan="3">MONTANT TTC</td>
                    <td><input type="text" id="montantTTC" name="montantTTC"></td>
                </tr>
            </tbody>
        </table>
       </div>
    </div>
    </form>
</div>
<script type="text/javascript">
//Ajout des lignes 
function creationLigne(name,id,tr,ligneMontantHT,type){
    var td = document.createElement("td");
    var input = document.createElement("input");
    input.setAttribute("type","text");
    input.setAttribute("name",name);
    input.setAttribute("id",id);
    if(type!=undefined) {
        input.setAttribute("class",type);
       if(type==="element") {
           input.addEventListener("change", produit, false);
        }
    }
    td.appendChild(input);
    tr.appendChild(td);
    var parent = ligneMontantHT.parentNode;
    parent.insertBefore(tr,ligneMontantHT);
}
function ajoutLigne(){
    var lignes = document.getElementsByClassName("ligne");
    var numero = lignes.length+1;
    var ligneMontantHT = document.getElementById("montantHT");
    var tr = document.createElement("tr");
    tr.setAttribute("class","ligne");
    creationLigne("designation[]","designation"+numero,tr,ligneMontantHT);
    creationLigne("quantite[]","quantite"+numero,tr,ligneMontantHT,"element");
    creationLigne("prix[]","prix"+numero,tr,ligneMontantHT,"element");
    creationLigne("montant[]","montant"+numero,tr,ligneMontantHT,"montant");
   
}
   
//calcul factures
function produit(){
    var id = this.getAttribute("id");
    var numero =id.substring(id.length-1, id.length);
    var quantite1 = document.getElementById("quantite"+numero).value;
    var prix1 = document.getElementById("prix"+numero).value;
    var montant1 = document.getElementById("montant"+numero).value;
    var produit = parseInt(quantite1)*parseInt(prix1);
    if(!isNaN(produit)) montant1.value=produit;
    var montantTotal=0;
    montants=document.getElementsByClassName("montant");
    for(var i=0;i<montants.length;i++){
        if(!isNaN(parseInt(montants[i].value))) 
         montantTotal=montantTotal+parseInt(montants[i].value);
    }
    var montantHT=document.getElementById("montantHT");
    montantHT.value=montantTotal;
    var tva=document.getElementById("tva");
    tva.value=montantTotal*18/100;
    var montantTTC = document.getElementById("montantTTC");
    montantTTC.value=montantTotal+tva;
}   
var elements=document.getElementsByClassName("element");
for(var i=0;i<elements.length;i++){
    elements[i].addEventListener("change", produit, false);
    elements[i].addEventListener("change", produit, false);
}
var add =document.getElementById("add");
add.addEventListener('click', ajoutLigne, false);
</script>
      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      
    </main>
  </div>
</div>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
          
   
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
 
 <script>
        //   $(document).ready(function(){
        //     var ligne = '<tr>';
        //     ligne += '<td><input type="number" min="0"></td>';
        //     ligne += '<td><input type="text"></td>';
        //     ligne += '<td><input type="number" min="1"></td>';
        //     ligne += '<td><input type="number" min="0"></td>';
        //     ligne += '<td><input type="button" name="retirer"  id="moins" class="btn btn-danger" value="-"></td>'
        //     ligne += '</tr';
        //     $("#add").click(function(){
        //         var ligneMontantHT = document.getElementById("montantHT");
        //         var table = document.getElementById("table");
        //         var parent = ligneMontantHT.parentNode; 
        //          parent.insertBefore(ligne,ligneMontantHT);
        //         $("#table").append(ligne).insertBefore(ligneMontantHT)
        //     });
        //     $("#table").on('click','#moins',function(){
        //       $(this).closest('tr').remove();
        //     });
        //   });

  </script>
