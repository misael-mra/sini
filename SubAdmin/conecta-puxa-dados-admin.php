<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/*
$hostname_conexao = "localhost";
$database_conexao = "suprimart";
$username_conexao = "suprimart";
$password_conexao = "5upr1m4r7";
*/

$hostname_conexao = "localhost";
$database_conexao = "sine";
$username_conexao = "root";
$password_conexao = "";

$mysqli = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}




?>