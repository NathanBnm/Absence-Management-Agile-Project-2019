<?php

function list_teacher_absences(){
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, etu.UTI_PRENOM, etu.UTI_NOM, etu.UTI_IDENTIFIANT, cours.COU_MODULE, SIG_DATE, SIG_TRAITE, COU_TYPE
            FROM ABS_BILLET absence
            JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
            JOIN ABS_UTILISATEUR etu ON etu.UTI_CODE = absence.UTI_CODE_1
            WHERE absence.SIG_TYPE = 'a'
            AND absence.UTI_CODE = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_DATE";
    $req = $db->prepare($sql);
    $req->execute($u);
    $user_absences = [];
    $i = 0;
    while($row = $req->fetchObject()){
        $user_absences[$i] = $row;
        $i++;
    }
    return $user_absences;   
}