<?php
$userName = 'root';
$serverName = 'localhost';
$password = '';
$dBName = 'OnlineLaundry';

$connection = mysqli_connect($serverName,$userName , $password, $dBName);

global $connection;
if(!$connection){
    die("Not connected").mysqli_connect_error();
}



?>