<?php
$path = '';
if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ETU') {
    header('Location:index.php?page=dashboard');
    exit;
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ENS') {
    $path = 'includes/teacher/';
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'DIR') {
    $path = 'includes/director/';
}

require($path . 'courses.php');
?>