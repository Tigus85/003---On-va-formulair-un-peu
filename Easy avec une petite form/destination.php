
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Destination</title>
</head>
<body>

<?php


if (
  !empty($_POST['name'])
  && !empty($_POST['firstName'])
  && !empty($_POST['pass'])
  && !empty($_POST['confirm_pass'])
  && !empty($_POST['email'])
  && $_POST['pass'] === $_POST['confirm_pass']
  && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)
  && (strlen($_POST["pass"]) >=6)
  && isset($_POST["register_btn"])
 
) { ?>

  <div class="destination">
  <span> <?= $_POST['name']?> <?= $_POST['firstName']?></span>   s'est inscrit correctement avec le mot de passe valide qui est <span> <?= $_POST['pass']?> </span> , et avec son adresse email suivante : <span> <?= $_POST['email']?> </span> 
  </div>

<?php
} else { 

  echo "<h2>Erreur au niveau de la saisie</h2>";


}
?>
 
</body>
</html>