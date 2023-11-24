<?php
echo "hello";
session_start();
session_unset();
session_destroy();
header('location: connexion.php');
?>