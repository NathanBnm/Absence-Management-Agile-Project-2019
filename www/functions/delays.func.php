<?php

function list_teacher_delays()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, etu.UTI_PRENOM, etu.UTI_NOM, etu.UTI_IDENTIFIANT, cours.COU_MODULE, SIG_DATE, SIG_TRAITE, COU_TYPE, SIG_ETAT
            FROM ABS_BILLET absence
            JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
            JOIN ABS_UTILISATEUR etu ON etu.UTI_CODE = absence.UTI_CODE_1
            WHERE absence.SIG_TYPE = 'r'
            AND absence.UTI_CODE = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC";
    $req = $db->prepare($sql);
    $req->execute($u);
    $delays = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $delays[$i] = $row;
        $i++;
    }
    return $delays;
}

function list_students_delays()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT COU_MODULE, SIG_ETAT, SIG_MOTIF, SIG_COMMENTAIRE, SIG_DATE
            FROM ABS_BILLET
            JOIN ABS_COURS USING(COU_CODE)
            WHERE SIG_TYPE = 'r'
            AND UTI_CODE_1 = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC
            ";
    $req = $db->prepare($sql);
    $req->execute($u);
    $delays = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $delays[$i] = $row;
        $i++;
    }
    return $delays;
}
