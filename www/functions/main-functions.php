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

/* Compteurs d'absences et retards */

function count_students_absences()
{
    global $db;

    $r = [
        'UTI_IDENTIFIANT'   =>  $_SESSION['id']
    ];

    $sql = "SELECT COUNT(*) FROM ABS_BILLET
            JOIN ABS_COURS USING(COU_CODE)
            WHERE SIG_TYPE = 'A'
            AND UTI_CODE_1 = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC";

    $req = $db->prepare($sql);
    $req->execute($r);

    $total_absences = $req->fetch();
    $req->closeCursor();
    return $total_absences[0];
}

function count_students_delays()
{
    global $db;

    $r = [
        'UTI_IDENTIFIANT'   =>  $_SESSION['id']
    ];

    $sql = "SELECT COUNT(*) FROM ABS_BILLET
            JOIN ABS_COURS USING(COU_CODE)
            WHERE SIG_TYPE = 'R'
            AND UTI_CODE_1 = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC";

    $req = $db->prepare($sql);
    $req->execute($r);

    $total_absences = $req->fetch();
    $req->closeCursor();
    return $total_absences[0];
}

function count_students_absences_not_justified()
{
    global $db;

    $r = [
        'UTI_IDENTIFIANT'   =>  $_SESSION['id']
    ];

    $sql = "SELECT COUNT(*) FROM ABS_BILLET
            JOIN ABS_COURS USING(COU_CODE)
            WHERE SIG_TYPE = 'A'
            AND SIG_ETAT = 'Non justifié'
            AND UTI_CODE_1 = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC";

    $req = $db->prepare($sql);
    $req->execute($r);

    $total_absences = $req->fetch();
    $req->closeCursor();
    return $total_absences[0];
}

function count_students_delays_not_justified()
{
    global $db;

    $r = [
        'UTI_IDENTIFIANT'   =>  $_SESSION['id']
    ];

    $sql = "SELECT COUNT(*) FROM ABS_BILLET
            JOIN ABS_COURS USING(COU_CODE)
            WHERE SIG_TYPE = 'R'
            AND SIG_ETAT = 'Non justifié'
            AND UTI_CODE_1 = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC";

    $req = $db->prepare($sql);
    $req->execute($r);

    $total_absences = $req->fetch();
    $req->closeCursor();
    return $total_absences[0];
}

function delete_ticket($username, $usernametu, $date, $type) {
    global $db;
    $u = [
        'UTI_IDENTIFIANT_ENSEIGNANT' => $username,
        'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
        'SIG_DATE'                   => $date,
        'SIG_TYPE'                   => $type
    ];
    $sql = "DELETE FROM ABS_BILLET WHERE UTI_CODE = :UTI_IDENTIFIANT_ENSEIGNANT AND UTI_CODE_1 = :UTI_IDENTIFIANT_ELEVE AND UPPER(SIG_TYPE) = UPPER(:SIG_TYPE) AND COU_CODE = (SELECT COU_CODE FROM ABS_COURS WHERE SIG_DATE = :SIG_DATE)";
    $req = $db->prepare($sql);
    $req->execute($u);
}