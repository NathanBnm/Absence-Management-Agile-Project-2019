<?php

//Script de connexion à la BDD

//Lancement d'une session
session_start();

//DB
$dbhost = 'localhost';
$dbname = 'agile3_bd';
$dbuser = 'agile3';
$dbpswd = 'Viwaik7ahcoo8che';

try {
    $db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOexception $e) {
    die("Une erreur est survenue lors de la connexion à la base de données");
}

// On vérifie si l'utilisateur est connecté
function isLogged()
{
    if (isset($_SESSION['id'])) {
        $logged = 1;
    } else {
        $logged = 0;
    }
    return $logged;
}

function user_rank($username){
    global $db;
    $u = [
        'UTI_IDENTIFIANT'   =>  $username
    ];
    $sql = "SELECT CAT_CODE from ABS_UTILISATEUR where UTI_IDENTIFIANT = :UTI_IDENTIFIANT";
    $req = $db->prepare($sql);
    $req->execute($u);
    $user_rank = [];
    while($row = $req->fetchObject()){
        $user_rank['rank'] = $row;
    }
    return $user_rank;
    //user_rank($username)['rank']->CAT_CODE;
}

?>