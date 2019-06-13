<?php
    function user_exist($username, $password){
        if(isset($_POST["rang"]){
            $rank = $_POST["rang"];
        }
        else {
            $rank = 'ETU';
        }
        
        global $db;
        $u = [
            'UTI_IDENTIFIANT'   =>  $username,
            'UTI_MDP'           =>  hash('sha256', $password)
            /*'CAT_CODE'          =>  $rank*/
        ];
        $sql = "SELECT * FROM ABS_UTILISATEUR WHERE UTI_IDENTIFIANT = :UTI_IDENTIFIANT AND UTI_MDP = :UTI_MDP /*AND CAT_CODE = :CAT_CODE*/";
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
    }

    function user_firstname($username){
        global $db;
        $u = [
            'UTI_IDENTIFIANT'   =>  $username
        ];
        $sql = "SELECT UTI_PRENOM from ABS_UTILISATEUR where UTI_IDENTIFIANT = :UTI_IDENTIFIANT";
        $req = $db->prepare($sql);
        $req->execute($u);
        $user_firstname = [];
        while($row = $req->fetchObject()){
            $user_firstname['firstname'] = $row;
        }
        return $user_firstname;
    }

    function user_lastname($username){
        global $db;
        $u = [
            'UTI_IDENTIFIANT'   =>  $username
        ];
        $sql = "SELECT UTI_NOM from ABS_UTILISATEUR where UTI_IDENTIFIANT = :UTI_IDENTIFIANT";
        $req = $db->prepare($sql);
        $req->execute($u);
        $user_lastname = [];
        while($row = $req->fetchObject()){
            $user_lastname['lastname'] = $row;
        }
        return $user_lastname;
    }

?>
