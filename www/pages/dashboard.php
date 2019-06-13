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

    if(empty($module) || empty($typecourse) || empty($type) || empty($etupass) || empty($year) || empty($month) || empty($day) || empty($time)) {
        $errors['empty'] = "Tous les champs n'ont pas été remplis";
    }

    if($typecourse != 'td' && $typecourse != 'tp' && $typecourse != 'cm' && $typecourse != 'cc' && $type != 'a' && $type != 'r') {
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
        saisie_absence($module, $typecourse, $type, $etupass, $message, $date);
    }
}

require($path . 'dashboard.php');