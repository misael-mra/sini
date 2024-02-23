<?php
   $database = 'id21835333_sini';
   $host = 'localhost';
   $user = 'id21835333_sini';
   $pass = 'Sini@2024';
   $dbh = new PDO("mysql:dbname={$database};host={$host};port={3306}", $user, $pass);
   if(!$dbh){
      echo "unable to connect to database";
   }
?>