<?php

session_destroy();
header("Location:index.php?page=login");
exit;

?>