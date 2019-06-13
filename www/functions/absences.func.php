<?php

function list_absences(){
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, etu.UTI_PRENOM, etu.UTI_NOM, cours.COU_MODULE, SIG_DATE, SIG_TRAITE
            FROM ABS_SIGNALEMENT absence
            JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
            JOIN ABS_UTILISATEUR etu ON etu.UTI_CODE = absence.UTI_CODE_1
            WHERE upper(absence.SIG_TYPE) = 'ABSENCE'
            AND absence.UTI_CODE = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)";
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