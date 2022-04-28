<?php

var_dump(filter_var($_GET['email'],FILTER_VALIDATE_EMAIL));


?>


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

var_dump($_POST);

if (
  empty($_GET['name'])
  && empty($_GET['firstName'])
  && empty($_GET['pass'])
  && empty($_GET['confirm_pass'])
  && empty($_GET['email'])
  && $_GET['pass'] === $_GET['confirm_pass']
  && !filter_var($_GET['email'],FILTER_VALIDATE_EMAIL)
) {
   echo "<h2>Erreur au niveau de la saisie</h2>";
} else { ?>

  <div class="destination">
  <span>NOM PRENOM</span>   s'est inscrit correctement avec le mot de passe valide qui est <span>PASSE</span> , et avec son adresse email suivante : <span>EMAIL</span> 
  </div>


<?php 
}
?>
 
</body>
</html>