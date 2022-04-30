<?php

var_dump($_GET);


$quantity1;
$quantity2;
$quantity3;
$promo = 0;
$subTotal = 0;

// function whoIsSmall(array $who){
//   foreach($who as $value) {

//   }
// }

$articles = [
  [
    "id" => 1,
    "name" => "Clavier",
    "price" => 55,
    "image" => "https://www.hp.com/fr-fr/shop/Html/Merch/Images/c07771345_1750x1285.jpg"  
  ],
  [
    "id" => 2,
    "name" => "Camera",
    "price" => 600,
    "image" => "https://lecirque.mac2-hosting.net/img/p/3/7/1/2/8/37128-tm_thickbox_default.jpg"  
  ],
  [
    "id" => 3,
    "name" => "Stylo",
    "price" => 12,
    "image" => "https://cdn-img-compress.api.pens.com/compress-img?imageUrl=https%3A%2F%2Fassets.documents.cimpress.io%2Fv2%2Ffulfillers%2F123815948%2Fcompositions%2F971753a9-e193-4310-9dbf-307389785919%2Fassets%2F4e749869-2de8-4e22-b51b-949006113903&width=610&height=610"  
  ],
 
];





$price = array_column($articles,'price');
var_dump($price);

asort($price);
var_dump($price);
$small = array_shift($price);
var_dump($small);


?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Easy avec une petite form’</title>
</head>
<body>

  <form action="" method="get">
  
    <section class="panier">
      <h2>Votre Panier</h2>


      <article>
        <div class ="product" >
          <img src= <?= $articles[0]["image"] ?>  alt= <?= $articles[0]["name"] ?> >
          <div>
            <div> <?= $articles[0]["name"] ?> </div>
            <div>Prix unitaire : <?= $articles[0]["price"] ?>€</div>
            <div>
              Quantité : 
              <input type="number" name="quantity1" value= <?php
              if(!isset($_GET["quantity1"])){
                $quantity1 = 1;
  
              } else {
                $quantity1 = $_GET["quantity1"];
              }
  
              echo $quantity1;
              ?> >
              <input type="submit" value="ok" name="validation_quantity_1">
            </div>
          </div>
        </div>
        <div class="subTotal">
          <div>Total Produit :</div>
          <div>
            <?= " ".($articles[0]["price"] * $quantity1) . " €";?>
          </div>
        </div>
      </article>

      <article>
        <div class ="product" >
          <img src= <?= $articles[1]["image"] ?> alt= <?= $articles[1]["name"] ?> >
          <div>
            <div> <?= $articles[1]["name"] ?> </div>
            <div>Prix unitaire : <?= $articles[1]["price"] ?> €</div>
            <div>
              Quantité : 
              <input type="number" name="quantity2" value= <?php
              if(!isset($_GET["quantity2"])){
                $quantity2 = 1;
              } else {
                $quantity2 =  $_GET["quantity2"];
              }
              echo $quantity2;
              ?>  >
              <input type="submit" value="ok" name="validation_quantity_2">
            </div>
          </div>
        </div>
        <div class="subTotal">
          <div>Total Produit : </div>
          <div>
            <?= " ".($articles[1]["price"] * $quantity2) . " €";?>
          </div>
        </div>
      </article>

      <article>
        <div class ="product" >
          <img src=<?= $articles[2]["image"] ?> alt= <?= $articles[2]["name"] ?> >
          <div>
            <div> <?= $articles[2]["name"] ?>  </div>
            <div>Prix unitaire : <?= $articles[2]["price"] ?> €</div>
            <div>
              Quantité : 
              <input type="number" name="quantity3" value= <?php
              if(!isset($_GET["quantity3"])){
                $quantity3 = 1;
              } else {
                $quantity3 =  $_GET["quantity3"];
              }
  
              echo $quantity3;
              ?> >
              <input type="submit" value="ok" name="validation_quantity_3">
            </div>
          </div>
        </div>
        <div class="subTotal">
          <div>Total Produit : </div>
          <div>
            <?= " ".($articles[2]["price"]  * $quantity3) . " €";?> 
          </div>
        </div>
      </article>

    </section>

    <section class="total">
      <h3>Sous-Total</h3>
      <div> <?php
          $subTotal = ($articles[0]["price"] * $quantity1 ) + ($articles[1]["price"]  * $quantity2 ) + ($articles[2]["price"]  * $quantity3 );
          echo $subTotal . " €";
      ?>
        
      </div>
      <h4>Code Promo</h4>
      <input type="text" name="promo" >
      <h3>Total</h3>
      <div>

      <?php

        $valideReduc = [
          "NOUNOURS10" => $subTotal * 10 / 100,
          "TROP_BIEN" => $subTotal * 30 / 100,
          "MAIS_LE_PERE_NOEL_EXISTE" => $small * 75 / 100
        ];
      

      foreach($valideReduc as $reduc => $percent){
        if($_GET['promo'] === $reduc ){
          $promo = $percent;
        }
      }

   

      $total = $subTotal - $promo;
      echo $total . " €";


      ?>
        
      </div>
      <input type="submit" value="Validation" name="validation">
    </section>


     
    
  </form>

 
  
</body>
</html>