<?php
session_start();
session_destroy();
setcookie('token', null, -1, '/');
unset($_COOKIE['token']);
header('Location: index.php');
exit;
?>