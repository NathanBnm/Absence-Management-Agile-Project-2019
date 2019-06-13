<?php
    //les enseignants ou le directeur des études peuvent y accéder, pas les étudiants
        function saisie_absence($username, $usernametu, $codecours, $commentaire, $motif, $type){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT'    =>  $username,
                'UTI_IDENTIFIANT_ELEVE'         =>  $usernametu,
                'COU_CODE'                      =>  $codecours,
                'SIG_COMMENTAIRE'               =>  $commentaire,
                'SIG_MOTIF'                     =>  $motif,
                'SIG_TYPE'                      =>  $type

            ];
            $sql = "INSERT INTO ABS_SIGNALEMENT (UTI_CODE, UTI_CODE_1, COU_CODE, SIG_COMMENTAIRE, SIG_MOTIF, SIG_TYPE) VALUES (:UTI_IDENTIFIANT_ENSEIGNANT, :UTI_IDENTIFIANT_ELEVE, :COU_CODE, :SIG_COMMENTAIRE, :SIG_MOTIF, :SIG_TYPE)";
            $req = $db->prepare($sql);
            $req->execute($u);
        }

        function saisie_cours($module,$date, $type, $libelle, $groupe, $promo){
            global $db;
            $u = [
                'COU_MODULE'    =>  $module, 
                'COU_DATE'      =>  $date,
                'COU_TYPE'      =>  $type,
                'COU_LIBELLE'   =>  $libelle,
                'COU_GROUPE'    =>  $groupe,
                'COU_PROMO'     => $promo
            ];
            $sql = "INSERT INTO ABS_COURS (COU_DATE,COU_MODULE,COU_TYPE,COU_LIBELLE,COU_GROUPE,COU_PROMO) 
            VALUES (:COU_DATE,:COU_MODULE,:COU_TYPE,COU_LIBELLE, :COU_GROUPE,:COU_PROMO)";
            $req = $db->prepare($sql);
            $req->execute($u);
        }

        
        //demander vérification à l'utilisateur
        function delete_absence_retard($username, $usernametu, $date, $type){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT' => $username,
                'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
                'COU_DATE'                   => $date,
                'SIG_TYPE'                   => $type
            ];
            $sql = "DELETE FROM ABS_SIGNALEMENT WHERE UTI_CODE = :UTI_IDENTIFIANT_ENSEIGNANT AND UTI_CODE_1 = :UTI_IDENTIFIANT_ELEVE AND UPPER(SIG_TYPE) = UPPER(:SIG_TYPE) AND COU_CODE = (SELECT COU_CODE FROM ABS_COURS WHERE COU_DATE = :COU_DATE)";
            $req = $db->prepare($sql);
            $req->execute($u);
    
        }


        //insérer un commentaire dans la base
        function insert_commentaire($username, $usernametu,$date, $commentaire){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT' => $username,
                'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
                'COU_DATE'                   => $date,
                'SIG_COMMENTAIRE'            => $commentaire
            ];
            $sql = "UPDATE ABS_SIGNALEMENT SET SIG_COMMENTAIRE = :SIG_COMMENTAIRE WHERE SIG_CODE = :UTI_IDENTIFIANT_ENSEIGNANT AND SIG_CODE_1 = :UTI_IDENTIFIANT_ELEVE AND COU_CODE = (SELECT COU_CODE FROM ABS_COURS WHERE COU_DATE = :COU_DATE)"; // modifier le commentaire à une date précise
            $req = $db->prepare($sql);
            $req->execute($sql);
        }

        function visualiser_absences_etu($username){
            global $db;
            $u = [
                'UTI_IDENTIFIANT' => $username
            ];
            $sql = "SELECT absence.SIG_TYPE, cours.COU_DATE, cours.COU_LIBELLE, absence.UTI_CODE, absence.SIG_MOTIF, absence.SIG_COMMENTAIRE FROM ABS_SIGNALEMENT absence
            JOIN ABS_COURS cours ON cours.COU_CODE = absence.COU_CODE
            WHERE UTI_CODE_1 = :UTI_IDENTIFIANT";
            $req = $db->prepare($sql);
            $req->execute($u);
            $user_absences = [];
            while($row = $req->fetchObject()){
                $user_absences['absence'] = $row;
            }
            return $user_absences;
        }

        function visualiser_absences_ens($username){
            global $db;
            $u = [
                'UTI_IDENTIFIANT' => $username
            ];
            $sql = "SELECT absence.SIG_TYPE, cours.COU_DATE, cours.COU_LIBELLE, absence.UTI_CODE, absence.SIG_MOTIF, absence.SIG_COMMENTAIRE FROM ABS_SIGNALEMENT absence
            JOIN ABS_COURS cours ON cours.COU_CODE = absence.COU_CODE
            WHERE UTI_CODE = :UTI_IDENTIFIANT";
            $req = $db->prepare($sql);
            $req->execute($u);
            $user_absences = [];
            while($row = $req->fetchObject()){
                $user_absences['absence'] = $row;
            }
            return $user_absences;   
        }

        function afficher_liste_td($numTD, $anneeEtu){
            global $db;
            $u = [
                'UTI_GROUPE'  => $numTD,
                'UTI_PROMO'   => $anneeEtu
            ];
            $sql = "SELECT UTI_NOM, UTI_PRENOM, UTI_IDENTIFIANT, UTI_MAIL, UTI_GROUPE, UTI_PROMO FROM ABS_UTILISATEUR 
            WHERE UTI_GROUPE like ':UTI_GROUPE%' AND UTI_PROMO = :UTI_PROMO";
             $req = $db->prepare($sql);
             $req->execute($u);
             $user_liste_td = [];
             while($row = $req->fetchObject()){
                 $user_liste_td['liste_td'] = $row;
             }
             return $user_liste_td;  
        }


?>