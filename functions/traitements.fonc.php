<?php
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
            $req->execute($u);
        }

        
        //demander vérification à l'utilisateur
        function delete_absence($username, $usernametu, $date, $type){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT' => $username,
                'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
                'SIG_DATE'                   => $date,
                'SIG_TYPE'                   => $type
            ];
            $sql = "";
            $req = $db->prepare($sql);
            $req->execute($u);
    
        }

        function insert_commentaire($username, $usernametu,$date, $commentaire){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT' => $usernamens,
                'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
                'SIG_DATE'                   => $date,
                'SIG_COMMENTAIRE'            => $commentaire
            ];
            $sql = "";
            $req = $db->prepare($sql);
            $req->execute($sql);
        }

        //duplication de la fonction saisie_absence
        function saisie_retard($username, $usernametu, $codecours, $commentaire, $motif, $type, $date){
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
            $req->execute($u);
        }

        //if type == retard...
        function delete_retard($username, $usernametu, $date, $type){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT' => $username,
                'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
                'SIG_DATE'                   => $date,
                'SIG_TYPE'                   => $type
            ];
            $sql = "";
            $req = $db->prepare($sql);
            $req->execute($u);
    
        }

        function visualiser_absences($username){
            global $db;
            $u = [
                'UTI_IDENTIFIANT' => $username
            ];
            $sql = "";
            $req = $db->prepare($sql);
            $req->execute($u);
        }
?>