<?php
include 'session.php';


unset($_SESSION['user_id']);
unset($_SESSION['group']);
unset($_SESSION['name']);

header('Location: ../index.php');
exit;

?>