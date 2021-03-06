<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../static/css/style.css">
    <title>Gestion des Factures</title>
</head>
<body >
    </nav>
    </div>
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
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
</body>
</html>