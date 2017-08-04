<?php
include_once("db.php");

unset($_SESSION['password']);
unset($_SESSION['login']);

header( 'Location: enter.php');
?>