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

function get_utilisateur()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT UTI_GROUPE, UTI_IDENTIFIANT, UTI_PRENOM, UTI_NOM, UTI_PROMO, UTI_MAIL FROM ABS_UTILISATEUR WHERE
    UTI_IDENTIFIANT = :UTI_IDENTIFIANT)";
    $req = $db->prepare($sql);
    $req->execute($u);
    $utilisateur = $req->fetch();
    $req->closeCursor();
    return $utilisateur[0];
}

function envoie($mail, $type, $date)
{


    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }

    if ($type == mb_strtoupper("a")) {
        $message_txt = "Mail automatique." . $passage_ligne . "Ce mail vous est envoyé pour vous signaler votre absence en cours le " . $date . ".";
        $message_html = "<html><head></head><body><title><h1>Mail automatique.</h1></title>" . $passage_ligne . "Ce mail vous est envoyé pour vous signaler votre <b>absence</b> en cours le " . $date . ".</body></html>";
    } else {
        $message_txt = "Mail automatique." . $passage_ligne . "Ce mail vous est envoyé pour vous signaler votre retard en cours le " . $date . ".";
        $message_html = "<html><head></head><body><title><h1>Mail automatique.</h1></title>" . $passage_ligne . "Ce mail vous est envoyé pour vous signaler votre <b>retard</b> en cours le " . $date . ".</body></html>";
    }


    $boundary = "-----=" . md5(rand());

    $sujet = "Absence";

    $header = "From: \"EXPEDITEUR\"noreply@unicaen.fr" . $passage_ligne;
    $header .= "MIME-Version: 1.0" . $passage_ligne;
    $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;

    $message = $passage_ligne . "--" . $boundary . $passage_ligne;
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_txt . $passage_ligne;
    //==========
    $message .= $passage_ligne . "--" . $boundary . $passage_ligne;
    //=====Ajout du message au format HTML
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
    $message .= $passage_ligne . $message_html . $passage_ligne;
    //==========
    $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
    $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
    //==========

    mail($mail, $sujet, $message, $header);
}

function delete_ticket($code)
{
    global $db;
    $u = [
        'SIG_CODE'  =>  $code
    ];
    $sql = "DELETE FROM ABS_BILLET WHERE SIG_CODE = :SIG_CODE";
    $req = $db->prepare($sql);
    $req->execute($u);
}
