<?php

function list_modules()
{
    global $db;
    $req = $db->query("SELECT COU_MODULE, COU_LIBELLE FROM ABS_COURS ORDER BY COU_MODULE");
    $modules = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $modules[$i] = $row;
        $i++;
    }
    return $modules;
}

function saisie_absence($module, $typecourse, $type, $etupass, $message, $date)
{
    global $db;
    $u = [
        'COU_MODULE'                    =>  $module,
        'COU_TYPE'                      =>  $typecourse,
        'SIG_TYPE'                      =>  $type,
        'UTI_IDENTIFIANT_ELEVE'         =>  $etupass,
        'UTI_IDENTIFIANT_ENSEIGNANT'    =>  $_SESSION['id'],
        'SIG_COMMENTAIRE'               =>  $message,
        'SIG_DATE'                      =>  $date
    ];
    $sql = "INSERT INTO ABS_BILLET (UTI_CODE, UTI_CODE_1, COU_CODE, SIG_COMMENTAIRE, SIG_TYPE, SIG_DATE, COU_TYPE)
            VALUES (
                (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT_ENSEIGNANT),
                (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT_ELEVE),
                (SELECT COU_CODE FROM ABS_COURS WHERE COU_MODULE = :COU_MODULE),
                :SIG_COMMENTAIRE,
                :SIG_TYPE,
                :SIG_DATE,
                :COU_TYPE
            )";
    $req = $db->prepare($sql);
    $req->execute($u);
    $mail = recuperer_mail($etupass);
    envoie($mail, $type);
}

function recuperer_mail($etupass, $type) {

    global $db;
    $u = [
      'UTI_IDENTIFIANT' => $etupass
    ];
    $req = $db->query("SELECT UTI_MAIL FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT");
    $mails = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $mails[$i] = $row;
        $i++;
    }
    return $mails;
}
