<?php
    function user_exist($username, $password){
        global $db;
        $u = [
            'UTI_IDENTIFIANT'   =>  $username,
            'UTI_MDP'           =>  hash('sha256', $password)
        ];
        $sql = "SELECT * FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT AND UTI_MDP = :UTI_MDP";
        $req = $db->prepare($sql);
        $req->execute($u);
        $exist = $req->rowCount($sql);
        return $exist;
    }

    function user_rank($username){
        global $db;
        $u = [
            'UTI_IDENTIFIANT'   =>  $username
        ];
        $sql = "SELECT CAT_CODE from ABS_UTILISATEUR where UTI_IDENTIFIANT = :UTI_IDENTIFIANT";
        $req = $db->prepare($sql);
        $req->execute($u);
        return exist;
    }
   
?>
