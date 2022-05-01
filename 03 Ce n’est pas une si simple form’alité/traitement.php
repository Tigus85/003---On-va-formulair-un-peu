<?php

$outDomaine = [
  "@free.fr",
  "@bidule.com",
  "@mailbidon.net",
  "@oulalalalalala.com"
];
$trueDomaine = true;

for($i=0; $i<count($outDomaine);$i++){
  if((strstr($_POST['email'],'@')) === $outDomaine[$i] ){
    $trueDomaine = false;
    break;
  };
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trouver la bonne form’ule</title>
</head>
<body>

<?php


if (
  
   !empty($_POST['pass'])
  && !empty($_POST['confirm_pass'])
  && $_POST['pass'] === $_POST['confirm_pass']
  && (strlen($_POST["pass"]) >=8)
  && isset($_POST["register_btn"])
  && (preg_match('#^[^0-9]*([0-9])#',$_POST['pass']) >= 1)
  && (preg_match('#^[^A-Z]*([A-Z])#', $_POST['pass']) >= 1)
  && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)
  && (strlen($_POST["email"]) <= 27)
  && $trueDomaine 
) { ?>

  <div class="destination">
    Bonjour <?= $_POST['email']?> votre enregistrement à bien été pris en compte!
  </div>

<?php
} else { 

  echo "<h2>Erreur au niveau de la saisie</h2>";


}
?>
    
</body>
</html>