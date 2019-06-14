<?php

function list_teacher_absences()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, DATE_FORMAT(SIG_DATE, 'Le %d/%m/%Y à %H:%i') AS SIG_DATE, SIG_TRAITE, COU_TYPE, SIG_ETAT,
    etu1.UTI_PRENOM, etu1.UTI_NOM, etu1.UTI_IDENTIFIANT,
    cours.COU_MODULE, SIG_CODE
    FROM ABS_BILLET absence
    JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
    JOIN ABS_UTILISATEUR etu1 ON etu1.UTI_CODE = absence.UTI_CODE_1
    WHERE absence.SIG_TYPE = 'A'
    ORDER BY SIG_CODE DESC";
    $req = $db->prepare($sql);
    $req->execute($u);
    $absences = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $absences[$i] = $row;
        $i++;
    }
    return $absences;
}

function list_students_absences()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, DATE_FORMAT(SIG_DATE, 'Le %d/%m/%Y à %H:%i') AS SIG_DATE, SIG_TRAITE, COU_TYPE, SIG_ETAT,
    etu1.UTI_PRENOM, etu1.UTI_NOM, etu1.UTI_IDENTIFIANT,
    cours.COU_MODULE, SIG_CODE
    FROM ABS_BILLET absence
    JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
    JOIN ABS_UTILISATEUR etu1 ON etu1.UTI_CODE = absence.UTI_CODE
    WHERE absence.SIG_TYPE = 'A'
    ORDER BY SIG_CODE DESC";
    $req = $db->prepare($sql);
    $req->execute($u);
    $absences = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $absences[$i] = $row;
        $i++;
    }
    return $absences;
}

function list_director_absences()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, etu.UTI_PRENOM, etu.UTI_NOM, etu.UTI_IDENTIFIANT, 
    ens.UTI_NOM as 'UTI_ENS_NOM', ens.UTI_PRENOM as 'UTI_ENS_PRE', cours.COU_MODULE, 
    DATE_FORMAT(SIG_DATE, 'Le %d/%m/%Y à %H:%i') AS SIG_DATE, SIG_TRAITE, COU_TYPE, SIG_ETAT, SIG_CODE 
    FROM ABS_BILLET absence 
    JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE 
    JOIN ABS_UTILISATEUR etu ON etu.UTI_CODE = absence.UTI_CODE_1 
    JOIN ABS_UTILISATEUR ens ON ens.UTI_CODE = absence.UTI_CODE 
    WHERE absence.SIG_TYPE = 'A' 
    AND absence.UTI_CODE = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT) 
    ORDER BY SIG_CODE DESC ";
    
    $req = $db->prepare($sql);
    $req->execute($u);
    $absences = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $absences[$i] = $row;
        $i++;
    }
    return $absences;
}
