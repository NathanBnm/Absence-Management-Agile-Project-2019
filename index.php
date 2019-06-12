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

//On redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if($page != 'login' && $page != 'error' && !isLogged()) {
    header("Location:index.php?page=login");
    exit;
}

//On redirige l'utilisateur vers la page du tableau de bord s'il est déjà connecté
if($page == 'login' && isLogged()){
    header("Location:index.php?page=dashboard");
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Absences</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="css/bulma.css"/>
    <link type="text/css" rel="stylesheet" href="css/main.css"/>
    <script src="https://kit.fontawesome.com/4a31b437ba.js"></script>
</head>

<body>

    <?php 

        //On importe l'entête
        require 'body/header.php';

        //On importe la page correspondante
        require 'pages/' . $page . '.php';

        //On importe le pied de page
        require 'body/footer.php';

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