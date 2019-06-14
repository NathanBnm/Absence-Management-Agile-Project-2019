<?php

function update_message($id, $message) {
    global $db;

    $m = [
        'SIG_CODE'            =>  $id,
        'SIG_COMMENTAIRE'     =>  $message
    ];

    $sql = "UPDATE ABS_BILLET
            SET SIG_COMMENTAIRE = :SIG_COMMENTAIRE
            WHERE SIG_CODE = :SIG_CODE";
    
    $req = $db->prepare($sql);
    $req->execute($m);
}

function fetch_ticket($id) {
    global $db;

    $t = [
        'SIG_CODE'  =>  $id
    ];

    $sql = "SELECT *
            FROM ABS_BILLET ABS
            JOIN ABS_UTILISATEUR UTI ON UTI.UTI_CODE = ABS.UTI_CODE_1
            JOIN ABS_COURS USING(COU_CODE)
            WHERE SIG_CODE = :SIG_CODE";
    
    $req = $db->prepare($sql);
    $req->execute($t);

    $result = $req->fetch();
    $req->closeCursor();

    return $result;
}