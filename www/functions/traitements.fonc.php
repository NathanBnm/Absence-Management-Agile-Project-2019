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
                'COU_DATE'                      =>  $date

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
            $sql = "DELETE FROM ABS_SIGNALEMENT WHERE UTI_CODE = :UTI_IDENTIFIANT_ENSEIGNANT AND UTI_CODE_1 = :UTI_IDENTIFIANT_ELEVE AND COU_CODE = (SELECT COU_CODE FROM ABS_COURS WHERE COU_DATE = :COU_DATE)";
            $req = $db->prepare($sql);
            $req->execute($u);
    
        }


        //insérer un commentaire dans la base
        function insert_commentaire($username, $usernametu,$date, $commentaire){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT' => $usernamens,
                'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
                'SIG_DATE'                   => $date,
                'SIG_COMMENTAIRE'            => $commentaire
            ];
            $sql = "UPDATE ABS_SIGNALEMENT SET SIG_COMMENTAIRE = :SIG_COMMENTAIRE WHERE SIG_CODE = :UTI_IDENTIFIANT_ENSEIGNANT AND SIG_CODE_1 = :UTI_IDENTIFIANT_ELEVE AND COU_CODE = (SELECT COU_CODE FROM ABS_COURS WHERE COU_DATE = :COU_DATE)"; // modifier le commentaire à une date précise
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
            $sql = "DELETE FROM ABS_SIGNALEMENT WHERE UTI_CODE = :UTI_IDENTIFIANT_ENSEIGNANT AND UTI_CODE_1 = :UTI_IDENTIFIANT_ETUDIANT AND COU_CODE = (SELECT COU_CODE FROM ABS_COURS WHERE COU_DATE = :COU_DATE)";
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


        function ajouter_cours($date, $module, $type, $libelle, $groupe, $promo){
            global $db;
            $u = [
                'COU_DATE'          => $date,
                'COU_MODULE'        => $module,
                'COU_TYPE'          => $type,
                'COU_LIBELLE'       => $libelle,
                'COU_GROUPE'        => $groupe,
                'COU_PROMO'         => $promo
            ];
            $sql = "INSERT INTO ABS_COURS (COU_DATE,COU_MODULE,COU_TYPE,COU_LIBELLE,COU_GROUPE,COU_PROMO) 
            VALUES (:COU_DATE,:COU_MODULE,:COU_TYPE,:COU_LIBELLE,:COU_GROUPE,:COU_PROMO)";
            $req = $db->prepare($sql);
            $req->execute($u);
        }


?>