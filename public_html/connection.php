<?php
$db_host = '127.0.0.1'; 
$db_pass = 'nP6XiGxZ';
$db_user = 'cg08504_shop';
$db_name = 'cg08504_shop';

$mysqli = new mysqli($db_host,$db_user,$db_pass,$db_name);
$mysqli->set_charset("utf8mb4"); 
if($mysqli->connect_errno){
    echo "false";
}

?>