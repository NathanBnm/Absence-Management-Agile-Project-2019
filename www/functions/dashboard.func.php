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

    $mailetu = recuperer_mail($etupass);
    envoie($mailetu, $type, $date);
}

function test_billet_existant($professeur, $etudiant, $module, $date){
    global $db;
    $u = [
                'UTI_CODE' => $professeur,
            'UTI_IDENTIFIANT' => $etudiant,
            'COU_CODE' => $module,
            'SIG_DATE' => $date
        ];
        $sql = "SELECT COUNT(*) FROM ABS_BILLET WHERE UTI_CODE = :UTI_CODE AND UTI_CODE_1 = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT) AND COU_CODE = :COU_CODE AND SIG_DATE = :SIG_DATE";
        $req = $db->prepare($sql);
        $req->execute($u);
        $exist = $req->rowCount($sql);
        return $exist;
    }

function nom_vers_etupass($nom, $prenom)
{
    global $db;
    $u = [
        'UTI_NOM'       => $prenom,
        'UTI_PRENOM'    => $nom
    ];

    $sql = "SELECT UTI_IDENTIFIANT FROM ABS_UTILISATEUR WHERE UTI_NOM = :UTI_NOM AND UTI_PRENOM = :UTI_PRENOM";
    $req = $db->prepare($sql);
    $req->execute($u);
    $etupass = $req->fetch();
    $req->closeCursor();
    return $etupass['UTI_IDENTIFIANT'];
}

function etupass_vers_nom($etupass)
{
    global $db;

    $u = [
        'UTI_IDENTIFIANT'       => $etupass
    ];

    $sql = "SELECT UTI_NOM, UTI_PRENOM FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT";
    $req = $db->prepare($sql);
    $req->execute($u);
}

function etupass_vers_role($etupass)
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $etupass
    ];
    $sql = "SELECT CAT_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT";
    $req = $db->prepare($sql);
    $req->execute($u);
    $role = $req->fetch();
    $req->closeCursor();
    return $role['CAT_CODE'];
}

function last_ticket()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, etu.UTI_PRENOM, etu.UTI_NOM, etu.UTI_IDENTIFIANT, cours.COU_MODULE, DATE_FORMAT(SIG_DATE, 'Le %d/%m/%Y à %H:%i') AS SIG_DATE, SIG_TRAITE, COU_TYPE, SIG_ETAT, SIG_TYPE
            FROM ABS_BILLET absence
            JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
            JOIN ABS_UTILISATEUR etu ON etu.UTI_CODE = absence.UTI_CODE_1
            AND absence.UTI_CODE = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC
            LIMIT 2";
    $req = $db->prepare($sql);
    $req->execute($u);
    $user_last_ticket = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $user_last_ticket[$i] = $row;
        $i++;
    }
    return $user_last_ticket;
}

function last_absence_ticket()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, etu.UTI_PRENOM, etu.UTI_NOM, etu.UTI_IDENTIFIANT, cours.COU_MODULE, DATE_FORMAT(SIG_DATE, 'Le %d/%m/%Y à %H:%i') AS SIG_DATE, SIG_TRAITE, COU_TYPE, SIG_ETAT, SIG_TYPE
            FROM ABS_BILLET absence
            JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
            JOIN ABS_UTILISATEUR etu ON etu.UTI_CODE = absence.UTI_CODE_1
            WHERE absence.SIG_TYPE = 'A'
            AND absence.UTI_CODE_1 = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC
            LIMIT 2";
    $req = $db->prepare($sql);
    $req->execute($u);
    $user_last_absence_ticket = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $user_last_absence_ticket[$i] = $row;
        $i++;
    }
    return $user_last_absence_ticket;
}

function last_delay_ticket()
{
    global $db;
    $u = [
        'UTI_IDENTIFIANT' => $_SESSION['id']
    ];
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, etu.UTI_PRENOM, etu.UTI_NOM, etu.UTI_IDENTIFIANT, cours.COU_MODULE, DATE_FORMAT(SIG_DATE, 'Le %d/%m/%Y à %H:%i') AS SIG_DATE, SIG_TRAITE, COU_TYPE, SIG_ETAT, SIG_TYPE
            FROM ABS_BILLET absence
            JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
            JOIN ABS_UTILISATEUR etu ON etu.UTI_CODE = absence.UTI_CODE_1
            WHERE absence.SIG_TYPE = 'R'
            AND absence.UTI_CODE_1 = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC
            LIMIT 2";
    $req = $db->prepare($sql);
    $req->execute($u);
    $user_last_delay_ticket = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $user_last_delay_ticket[$i] = $row;
        $i++;
    }
    return $user_last_delay_ticket;
}

function detail_ticket()
{
    global $db;
    $sql = "SELECT absence.SIG_COMMENTAIRE, absence.SIG_MOTIF, absence.SIG_ETAT, etu.UTI_PRENOM, etu.UTI_NOM, etu.UTI_IDENTIFIANT, cours.COU_MODULE, 
            DATE_FORMAT(SIG_DATE, 'Le %d/%m/%Y à %H:%i') AS SIG_DATE, SIG_TRAITE, COU_TYPE, SIG_ETAT, SIG_TYPE, UTI_GROUPE,UTI_PROMO
            FROM ABS_BILLET absence
            JOIN ABS_COURS cours ON absence.COU_CODE = cours.COU_CODE
            JOIN ABS_UTILISATEUR etu ON etu.UTI_CODE = absence.UTI_CODE_1
            AND absence.UTI_CODE = (SELECT UTI_CODE FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT)
            ORDER BY SIG_CODE DESC
            LIMIT 2";
    $req = $db->query($sql);
    $user_detail_ticket = [];
    $i = 0;
    while ($row = $req->fetchObject()) {
        $user_detail_ticket[$i] = $row;
        $i++;
    }
    return $user_detail_ticket;
}
