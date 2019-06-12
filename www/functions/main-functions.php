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

    //les enseignants ou le directeur des études peuvent y accéder, pas les étudiants
    function saisie_absence($username, $usernametu, $codecours, $commentaire, $motif, $type, $date){
        global $db;
        $u = [
            'UTI_IDENTIFIANT_ENSEIGNANT'    =>  $username,
            'UTI_IDENTIFIANT_ELEVE'         =>  $usernametu,
            'COU_CODE'                      =>  $codecours,
            'SIG_COMMENTAIRE'               =>  $commentaire,
            'SIG_MOTIF'                     =>  $motif,
            'SIG_TYPE'                      =>  $type,
            'SIG_DATE'                      =>  $date

        ];
        $sql = "INSERT INTO ABS_SIGNALEMENT (UTI_CODE, UTI_CODE_1, COU_CODE, SIG_COMMENTAIRE, SIG_MOTIF, SIG_TYPE, SIG_DATE) VALUES (:UTI_IDENTIFIANT_ENSEIGNANT, :UTI_IDENTIFIANT_ELEVE, :COU_CODE, :SIG_COMMENTAIRE, :SIG_MOTIF, :SIG_TYPE, :SIG_DATE)";
        $req = $db->prepare($sql);
        $req->execute($sql);
    }

?>