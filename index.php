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
    <title>Absences</title>
    <link type="text/css" rel="stylesheet" href="../css/bulma.css"/>
    <link type="text/css" rel="stylesheet" href="../css/main.css"/>

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php 
        //On importe l'entête
        require 'body/header.php';
        //On importe la page correspondante
        require 'pages/' . $page . '.php';
        //On importe le pied de page
        require 'body/footer.php'
    ?>


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