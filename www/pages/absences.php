<?php
$path = '';
if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ETU') {
    $path = 'includes/student/';
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'ENS') {
    $path = 'includes/teacher/';
} else if (isset($_SESSION['rank']) && $_SESSION['rank'] == 'DIR') {
    $path = 'includes/director/';
}

require($path . 'absences.php');

if(isset($_POST['delete'])) {
    $code = $_POST['code'];
    delete_ticket($code);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>