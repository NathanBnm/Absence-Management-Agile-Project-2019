<?php
$path = '';
if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ETU') {
    $path = 'includes/student/';
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ENS') {
    $path = 'includes/teacher/';
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'DIR') {
    $path = 'includes/director/';
}

if(isset($_POST['submit-ticket'])) {
    $module = htmlspecialchars(trim($_POST['module']));
    $typecourse = htmlspecialchars(trim($_POST['typecourse']));
    $type = htmlspecialchars(trim($_POST['type']));
    $etupass = htmlspecialchars(trim($_POST['etupass']));
    $message = htmlspecialchars(trim($_POST['message']));
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $date = null;

    $errors = [];

    if(empty($module) || empty($typecourse) || empty($type) || empty($etupass) || $year == 0 || $month == 0 || $day == 0 || empty($time)) {
        $errors['empty'] = "Tous les champs n'ont pas été remplis";
    }

    if(strlen($message) > 255) {
        $errors['invalid-size'] = "Le commentaire ne peut pas dépasser 255 caractères";
    } 

    if($typecourse != 'TD' && $typecourse != 'TP' && $typecourse != 'CM' && $typecourse != 'CC' && $type != 'A' && $type != 'R') {
        $errors['invalid'] = "Le formulaire n'est pas valide";
    }

    if (checkdate($month, $day, $year)) {
        $date = $year . '-' . $month . '-' . $day;
    } else {
        $errors['invalid-date'] = "La date n'est pas valide";
    }

    if (!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $_POST['time'])) {
        $errors['invalid-time'] = "L'heure n'est pas valide";
    }

    if(empty($errors)) {
        $date = $date . " " . $time;
        if((saisie_absence($module, $typecourse, $type, $etupass, $message, $date) == 'ENS') || saisie_absence($module, $typecourse, $type, $etupass, $message, $date) =='DIR'){
            $errors['ens_abs'] = "Un enseignant ne peut pas être absent";
        }
        
        else {
        saisie_absence($module, $typecourse, $type, $etupass, $message, $date);
        }
    }
}

require($path . 'dashboard.php');