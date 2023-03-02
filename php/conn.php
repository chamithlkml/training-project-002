<?php

class config {

     public static function connect()
     {
          require 'config.php';
          $host = DB_HOST;
          $db   = DB;
          $user = USER;
          $pass = PASSWORD;
          $charset = 'utf8mb4';

          $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
          $options = [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES   => false,
          ];
          
          try {
               $con = new PDO($dsn, $user, $pass, $options);
              // echo "sucsess";
          } catch (\PDOException $e) {
               throw new \PDOException($e->getMessage(), (int)$e->getCode());
          }
          return $con;
     }
}
?>