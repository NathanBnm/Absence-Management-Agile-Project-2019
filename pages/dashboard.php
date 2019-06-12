<h1>Tableau de bord</h1>
<?php
    $username = "21504680";
    $var = user_rank($username)['rank']->CAT_CODE;
    echo $var;
?>
<p>Si aucun message d'erreur s'affiche c'est que la connexion à la base de données n'a pas echoué</p>