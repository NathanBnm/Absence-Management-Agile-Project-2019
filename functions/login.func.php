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
?>
