<?php
session_start();
session_destroy();
header('location: /gbaf/index.php');
exit;
?>