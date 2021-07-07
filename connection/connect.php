<!-- file to connect databse of this webpage. -->

<?php

   $dbname = 'deepjyoti'; 
   $server = 'localhost'; 
   $username = 'root'; 
   $password = '';

// connecting databse with website.
   $pdo = new PDO('mysql:dbname=' . $dbname . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

?>