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
    }

    //les enseignants ou le directeur des études peuvent y accéder, pas les étudiants
    function saisie_absence($username, $usernametu, $codecours, $commentaire, $motif, $type, $date){
        global $db;
        $u = [
            'UTI_IDENTIFIANT_ENSEIGNANT'    =>  $username,
            'UTI_IDENTIFIANT_ELEVE'         =>  $usernametu,
            'COU_CODE'                      =>  $codecours,
            'SIG_COMMENTAIRE'               =>  $commentaire,
            'SIG_MOTIF'                     =>  $motif,
            'SIG_TYPE'                      =>  $type,
            'SIG_DATE'                      =>  $date

        ];
        $sql = "INSERT INTO ABS_SIGNALEMENT (UTI_CODE, UTI_CODE_1, COU_CODE, SIG_COMMENTAIRE, SIG_MOTIF, SIG_TYPE, SIG_DATE) VALUES (:UTI_IDENTIFIANT_ENSEIGNANT, :UTI_IDENTIFIANT_ELEVE, :COU_CODE, :SIG_COMMENTAIRE, :SIG_MOTIF, :SIG_TYPE, :SIG_DATE)";
        $req = $db->prepare($sql);
        $req->execute($sql);
    }

    function origine_absence($username, $usernametu){
        global $db;
        $u = [
            'UTI_IDENTIFIANT_ENSEIGNANT' => $usernamens,
            'UTI_IDENTIFIANT_ELEVE'      => $usernametu
        ];
        $sql = "SELECT * from ABS_SIGNALEMENT WHERE UTI_CODE = ':UTI_ENSEIGNANT' AND UTI_CODE_1 = 'UTI_IDENTIFIANT_ELEVE' ";
        $req = $db->prepare($sql);
        $ens_eleve = [];
        while($row = $req->fetchObject()){
            $ens_eleve['absence'] = $row;
        }
        return $ens_eleve;
        
    }
    
    //demander vérification à l'utilisateur
    function delete_absence($username, $usernametu, $date){
        global $db;
        $u = [
            'UTI_IDENTIFIANT_ENSEIGNANT' => $usernamens,
            'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
            'SIG_DATE'                   => $date
        ];
        $absence[];
        $absence[] = origine_absence($username,$usernametu)['absence']->DATE;
        foreach($absence as $row){
            if($absence['row'] == $date){
                $sql = "DELETE from ABS_SIGNALEMENT WHERE UTI_CODE = ':UTI_IDENTIFIANT_ENSEIGNANT' AND UTI_CODE_1 = ':UTI_IDENTIFIANT_ELEVE' AND SIG_DATE = ':DATE'";
                $req = $db->prepare($sql);
                $req->execute($sql);
                echo "L'absence a bien été supprimée";
            }
            else{
                echo "Pas d'absence à supprimer";
            }
        }
           
        
    }

    
    
   
?>
