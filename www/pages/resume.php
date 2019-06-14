<?php
$path = '';
if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ETU') {
    header('Location:index.php?page=dashboard');
    exit;
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ENS') {
    header('Location:index.php?page=dashboard');
    exit;
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'DIR') {
    $path = 'includes/director/';
}

require($path . 'resume.php');
