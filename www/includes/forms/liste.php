<?php
// debut session
global $db;
$u = [
    'COU_CODE' =>  $cours
];
$sql = "SELECT UTI_NOM, UTI_PRENOM, UTI_IDENTIFIANT FROM ABS_UTILISATEUR";
$req = $db->prepare($sql);
$req->execute($u);
$array = array(); // on créé le tableau

$term = $_POST['term'];

$requete = $db->prepare('SELECT CONCAT(UTI_NOM,\' \',UTI_PRENOM,\' <\',UTI_IDENTIFIANT,\'>\') FROM ABS_UTILISATEUR WHERE CONCAT(UTI_NOM,\' \',UTI_PRENOM,\' <\',UTI_IDENTIFIANT,\'>\') LIKE :etudiant'); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => '%'.$term.'%'));

$array = array(); // on créé le tableau

while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
{
    array_push($array, $donnee['nom']); // et on ajoute celles-ci à notre tableau
}

echo json_encode($array); // il n'y a plus qu'à convertir en JSON

?>