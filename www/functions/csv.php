<?php

global $db;
$query = "SELECT ele.UTI_PRENOM, ele.UTI_NOM, COUNT(sig.SIG_CODE) FROM ABS_UTILISATEUR ele
JOIN ABS_SIGNALEMENT ON ele.UTI_CODE = sig.UTI_CODE_1
GROUP BY (UTI_PRENOM,UTI_NOM) 
WHERE sig.COU_CODE IN (
    SELECT COU_CODE FROM ABS_COURS WHERE COU_DATE < (SELECT SEM_DATE_FIN FROM SEMESTRE WHERE SEM_NUM = <numéro du semestre>) 
    AND COU_DATE > (SELECT SEM_DATE_DEBUT FROM SEMESTRE WHERE SEM_NUM = <numéro du semestre>)
) AND ele.UTI_PROMO = (SELECT SEM_PROMO FROM SEMESTRE WHERE SEM_NUM = <numéro du semestre>);";
$result = mysql_query($query) or die(mysql_error());
// Entêtes des colonnes dans le fichier Excel
$excel ="Prénom \t Nom \t Nombre \n";
//Les resultats de la requette
while($row = mysql_fetch_array($result))
{
$excel .= "$row[id] \t $row[F1] \t $row[F2]  \n";
}
header("Content-type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=Demandes_ouverturesFlux.xls");
print $excel;
exit;

?>