<?php
	session_start();

    $db_host = 'localhost';
    $db_name = 'id2093700_pass';
    $db_username = 'id2093700_alekseev700';
    $db_password = 'Aa1517612';
    $db_table_to_show = 'Login';


$connect_to_db = mysqli_connect($db_host, $db_username, $db_password)
    or die("Could not connect: " . mysqli_error());


    mysqli_select_db($connect_to_db, $db_name)
    or die("Could not select DB: " . mysql_error());

    $qr_result = mysqli_query( $connect_to_db, "select * from " . $db_table_to_show)
    or die(mysqli_error());

?>