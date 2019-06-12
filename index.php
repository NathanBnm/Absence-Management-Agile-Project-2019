<?php
require 'functions/main-functions.php';

//On récupère la page dans l'URL
$pages = scandir('pages/');
if (isset($_GET['page']) && !empty($_GET['page'])) {
    if (in_array($_GET['page'] . '.php', $pages)) {
        $page = $_GET['page'];
    } else {
        $page = "error";
    }
} else {
    $page = "dashboard"; //Page par défaut
}

//On importe dynamiquement le php nécessaire aux pages spécifiques
$pages_functions = scandir('functions/');
if (in_array($page . '.func.php', $pages_functions)) {
    require 'functions/' . $page . '.func.php';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absences</title>
    <link href="css/main.css" rel="stylesheet">
</head>

<body>

    <script src="js/script.js"></script>

    <?php
        //On importe dynamiquement le javascript nécessaire aux pages spécifiques
        $pages_js = scandir('js/');
        if (in_array($page . '.func.js', $pages_js)) {
    ?>
        <script type="text/javascript" src="js/<?= $page ?>.func.js"></script>
    <?php
        }
    ?>

</body>

</html>