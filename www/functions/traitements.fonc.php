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
            $sql = "INSERT INTO ABS_SIGNALEMENT (UTI_CODE, UTI_CODE_1, COU_CODE, SIG_COMMENTAIRE, SIG_MOTIF, SIG_TYPE,SIG_DATE) VALUES (:UTI_IDENTIFIANT_ENSEIGNANT, :UTI_IDENTIFIANT_ELEVE, :COU_CODE, :SIG_COMMENTAIRE, :SIG_MOTIF, :SIG_TYPE, :SIG_DATE)";
            $req = $db->prepare($sql);
            $req->execute($u);
           
        }

        function recup_etupass($nom, $prenom){
            global $db;
            $u = [
                'UTI_NOM'         =>  $nom,
                'UTI_PRENOM'      =>  $prenom
            ];
            $sql = "SELECT * FROM ABS_UTILISATEUR WHERE UTI_NOM = :UTI_NOM AND UTI_PRENOM = :UTI_PRENOM";
            $req = $db->prepare($sql);
            $req->execute($u);
            $user_etupass = [];
            while($row = $req->fetchObject()){
                $user_etupass['etupass'] = $row;
            }
            return $user_etupass;

        }
        
        //demander vérification à l'utilisateur
        function delete_absence_retard($username, $usernametu, $date, $type){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT' => $username,
                'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
                'SIG_DATE'                   => $date,
                'SIG_TYPE'                   => $type
            ];
            $sql = "DELETE FROM ABS_SIGNALEMENT WHERE UTI_CODE = :UTI_IDENTIFIANT_ENSEIGNANT AND UTI_CODE_1 = :UTI_IDENTIFIANT_ELEVE AND UPPER(SIG_TYPE) = UPPER(:SIG_TYPE) AND COU_CODE = (SELECT COU_CODE FROM ABS_COURS WHERE SIG_DATE = :SIG_DATE)";
            $req = $db->prepare($sql);
            $req->execute($u);
    
        }


        //insérer un commentaire dans la base
        function insert_commentaire($username, $usernametu,$date, $commentaire){
            global $db;
            $u = [
                'UTI_IDENTIFIANT_ENSEIGNANT' => $username,
                'UTI_IDENTIFIANT_ELEVE'      => $usernametu,
                'SIG_DATE'                   => $date,
                'SIG_COMMENTAIRE'            => $commentaire
            ];
            $sql = "UPDATE ABS_SIGNALEMENT SET SIG_COMMENTAIRE = :SIG_COMMENTAIRE WHERE SIG_CODE = :UTI_IDENTIFIANT_ENSEIGNANT AND SIG_CODE_1 = :UTI_IDENTIFIANT_ELEVE AND COU_CODE = (SELECT COU_CODE FROM ABS_COURS WHERE SIG_DATE = :SIG_DATE)"; // modifier le commentaire à une date précise
            $req = $db->prepare($sql);
            $req->execute($sql);
        }

        function visualiser_absences_etu($username){
            global $db;
            $u = [
                'UTI_IDENTIFIANT' => $username
            ];
            $sql = "SELECT absence.SIG_TYPE, absence.SIG_DATE, cours.COU_LIBELLE, absence.UTI_CODE, absence.SIG_MOTIF, absence.SIG_COMMENTAIRE FROM ABS_SIGNALEMENT absence
            JOIN ABS_COURS cours ON cours.COU_CODE = absence.COU_CODE
            WHERE UTI_CODE_1 = :UTI_IDENTIFIANT";
            $req = $db->prepare($sql);
            $req->execute($u);
            $user_absences = [];
            $i =0;
            while($row = $req->fetchObject()){
                $user_absences[$i] = $row;
                $i++;
            }
            return $user_absences;
        }

        function visualiser_absences_ens($username){
            global $db;
            $u = [
                'UTI_IDENTIFIANT' => $username
            ];
            $sql = "SELECT absence.SIG_TYPE, absence.SIG_DATE, cours.COU_LIBELLE, absence.UTI_CODE, absence.SIG_MOTIF, absence.SIG_COMMENTAIRE FROM ABS_SIGNALEMENT absence
            JOIN ABS_COURS cours ON cours.COU_CODE = absence.COU_CODE
            WHERE UTI_CODE = :UTI_IDENTIFIANT";
            $req = $db->prepare($sql);
            $req->execute($u);
            $user_absences = [];
            $i = 0;
            while($row = $req->fetchObject()){
                $user_absences[$i] = $row;
                $i++;
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
             $i =0;
             while($row = $req->fetchObject()){
                 $user_liste_td[$i] = $row;
             }
             return $user_liste_td;  
        }

        function gerer_notif($utilisateur, $allou_notif){
            global $db;
            $u = [
                'UTI_NOTIF'    => $allou_notif,
                'UTI_CODE'    => $utilisateur
            ];
            $sql = "UPDATE ABS_UTILISATEUR SET UTI_NOTIF = :UTI_NOTIF WHERE UTI_CODE = :UTI_CODE";
            $req = $db->prepare($sql);
            $req->execute($u);
        }
    
        function afficher_eleves_cours($cours){
            global $db;
            $u = [
                'COU_CODE' =>  $cours
            ];
            $sql = "SELECT UTI_NOM, UTI_PRENOM FROM ABS_UTILISATEUR WHERE UTI_CODE IN (SELECT UTI_CODE FROM SUIVRE WHERE COU_CODE = :COU_CODE)";
            $req = $db->prepare($sql);
            $req->execute($u);
            $user_cours = [];
            $i = 0;
            while($row = $req->fetchObject()){
                $user_cours[$i] = $row;
                $i++;
            }
               return $user_cours;
        }

        function afficher_cours_uti($username){
            global $db;
            $u = [
                'UTI_IDENTIFIANT' =>  $username
            ];
            $sql = "SELECT cou_libelle, to_char(sig_date,'dd/mm/yyyy') AS DATE_COURS, to_char(sig_date,'HH24:MI') AS HEURE FROM ABS_COURS 
            WHERE COU_CODE IN (SELECT COU_CODE FROM SUIVRE WHERE UTI_CODE = :UTI_IDENTIFIANT)";
            $req = $db->prepare($sql);
            $req->execute($u);
            $user_cours = [];
            $i = 0;
             while($row = $req->fetchObject()){
                 $user_cours[$i] = $row;
                 $i++;
             }
             return $user_cours;
        }


?>