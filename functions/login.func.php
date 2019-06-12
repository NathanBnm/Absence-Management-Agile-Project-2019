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
        $user_rank = [];
        while($row = $req->fetchObject()){
            $user_rank['rank'] = $row;
        }
        return $user_rank;
        //user_rank($username)['rank']->CAT_CODE;
    }

    function grab_absence($username){
        global $db;
        $u = [
            'UTI_IDENTIFIANT' => $username;
        ];
        $sql = "";
        $req->execute($u);
        return $req;
    }

    function delete_absence($usernamens, $usernametu, $date){
            /*UTI_CODE => personne qui a signalé l'absence seule qui peut supprimer*/
        global $db;
        $u = [
            'UTI_IDENTIFIANT_ENSEIGNANT' => $usernamens;
            'UTI_IDENTIFIANT_ELEVE' => $usernametu;
        ];
        $sql = "SELECT * from ABS_SIGNALEMENT WHERE UTI_CODE = ':UTI_ENSEIGNANT' AND UTI_CODE_1 = 'UTI_IDENTIFIANT_ELEVE' ";
        
    }
   
?>
