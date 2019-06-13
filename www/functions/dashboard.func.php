<?php

function list_modules() {
    global $db;
    $req = $db->query("SELECT COU_MODULE, COU_LIBELLE FROM ABS_COURS ORDER BY COU_MODULE");
    $modules = [];
    $i = 0;
    while($row = $req->fetchObject()){
        $modules[$i] = $row;
        $i++;
    }
    return $modules;
}
