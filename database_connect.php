<?php

$server_host='localhost';
$server_username='root';
$server_password='';


if( !($conn=@mysqli_connect($server_host,$server_username,$server_password,'project_database'))){
    die('Database Not Connected.<br>');
}
?>