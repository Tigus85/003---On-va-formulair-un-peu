<?php

$promo = 0;
$subTotal = 0;


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
asort($price);
$small = array_shift($price);

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
    <?php
      for($i=0; $i<count($articles);$i++){
        ?>
          <article>
        <div class ="product" >
          <img src= <?= $articles[$i]["image"] ?>  alt= <?= $articles[$i]["name"] ?> >
          <div>
            <div> <?= $articles[$i]["name"] ?> </div>
            <div>Prix unitaire : <?= $articles[$i]["price"] ?>€</div>
            <div>
              Quantité : 
              <input type="number"  name='quantity<?= $i ;?>' value= <?php
              if(!isset($_GET["quantity".$i]) || $_GET["quantity".$i] === "" ){
                $_GET["quantity".$i] = 1;
                
              }
  
              echo $_GET["quantity".$i];


              ?> >
              <input type="submit" value="ok" name="validation_quantity">
            </div>
          </div>
        </div>
        <div class="subTotal">
          <div class="titleTotal">Total Produit :</div>
          <div>
            <?= ($articles[$i]["price"] * $_GET["quantity".$i]) . " €";?>
          </div>
        </div>
      </article>


    <?php
      }

      ?>
    
    </section>

    <section class="total">
      <div class="blockTotal">
        <h3>Sous-Total</h3>
        <div> <?php
  
        for($j=0; $j<count($articles); $j++){
          $subTotal += ($articles[$j]["price"] * $_GET["quantity".$j]);
        }
            echo $subTotal . " €";
        ?>
          
        </div>
      </div>
      <div class="blockTotal">
        <h4>Code Promo</h4>
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

          if($promo > 0){
            ?>
            <div class="sizePromo"> <?= $_GET['promo'] ?>  </div>
            <?php
          } else {
            ?>
            <input class="sizePromo" type="text" name="promo" >
            <?php
          }


        ?>
      </div>
      <div class="blockTotal" >
        <h3>Total</h3>
        <div>
  
        <?php

          $total = $subTotal - $promo;
          echo $total . " €";
        ?>
          
        </div>
      </div>
      <input type="submit" value="Validation" name="validation">
    </section>

  </form>

</body>
</html>