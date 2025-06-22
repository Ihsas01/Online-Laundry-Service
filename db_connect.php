<?php
$userName = 'root';
$serverName = 'localhost';
$password = '';
$dBName = 'online_laundry';

$connection = mysqli_connect($serverName,$userName , $password, $dBName);

global $connection;
if(!$connection){
    die("Not connected").mysqli_connect_error();
}



?>