<?php
var_dump(preg_match('#^[^A-Z]*([A-Z])#', $_POST['pass']) >= 1);
var_dump(ctype_alpha($_POST['pass']));
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
  !empty($_POST['pseudo'])
  && !empty($_POST['pass'])
  && !empty($_POST['confirm_pass'])
  && $_POST['pass'] === $_POST['confirm_pass']
  && (strlen($_POST["pass"]) >=8)
  && isset($_POST["register_btn"])
  && !ctype_alpha($_POST['pass'])
  && (preg_match('#^[^A-Z]*([A-Z])#', $_POST['pass']) >= 1)
 
) { ?>

  <div class="destination">
    Bonjour <?= $_POST['pseudo']?> votre enregistrement à bien été pris en compte!
  </div>

<?php
} else { 

  echo "<h2>Erreur au niveau de la saisie</h2>";


}
?>
    
</body>
</html>