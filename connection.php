<?php
$db_host = '127.0.0.1'; 
$db_pass = '';
$db_user = 'root';
$db_name = 'shop';

$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
$mysqli->set_charset("utf8mb4"); 
if($mysqli->connect_errno){
    echo "false";
}

?>