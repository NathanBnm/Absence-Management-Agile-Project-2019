<?php

//Script de connexion à la BDD

//Lancement d'une session
session_start();

//DB
$dbhost = 'localhost';
$dbname = 'agile3_bd';
$dbuser = 'agile3';
$dbpswd = 'Viwaik7ahcoo8che';

try {
    $db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname, $dbuser, $dbpswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
} catch (PDOexception $e) {
    die("Une erreur est survenue lors de la connexion à la base de données");
}
