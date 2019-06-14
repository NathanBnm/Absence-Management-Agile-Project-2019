<?php

global $db;

$e = [
	'ETUDIANT'	=> $_POST['etudiant'];
];

$sql = "SELECT CONCAT(UTI_NOM,' ',UTI_PRENOM,' <',UTI_IDENTIFIANT,'>') FROM ABS_UTILISATEUR WHERE CONCAT(UTI_NOM,' ',UTI_PRENOM,' <',UTI_IDENTIFIANT,'>') LIKE '%:ETUDIANT%'";

$req = $db->prepare($sql);
$req->execute($e);


$etudiants = [];

$i = 0;
while($row = $req->fetchObject()){
    $etudiants[$i] = $row;
    $i++;
}

echo json_encode($etudiants);

?>