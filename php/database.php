<?php
namespace namefeeder;

use PDO;
use PDOException;

class Database{
    private PDO $connection;
    public function __construct(private string $host='', private string $db_name = '', private string $db_user='', private string $db_password='')
    {
      $this->connection = $this->connectToDb(); 

    }
//Method for user data input
    public function createUser( string $first_name = '' , string $last_name = '' , string $email = '' , string $birthday = '' , string $password = '' ): object
    {
        // @todo: Insert data to the database
        $con = $this->connectToDb();
        $query =$con->prepare("
    
        INSERT INTO users (first_name,last_name,email,birthday,pass,created_on)
        VALUES(:first_name_v,:last_name_v,:email_v,:birthday_v,:pass_v, now())
    
            ");

    $query -> bindParam(":first_name_v",$first_name);
    $query -> bindParam(":last_name_v",$last_name);
    $query -> bindParam(":email_v",$email);
    $query -> bindParam(":birthday_v",$birthday);
    $query -> bindParam(":pass_v",$password);

        $query->execute();
        return new \stdClass(); 
    }   
//Method for sign in
    public function sign_in (string $email='', string $password = '')
    {
      //  $con = $this->connectToDb();
        $query = $this->connectToDb()->prepare("
    
        SELECT * FROM users WHERE email=:email_v AND pass=:pass_v
    
    ");

    $query -> bindParam(":email_v",$email);
    $query -> bindParam(":pass_v",$password);
    $query->execute(); 

    if ($query->rowCount()==1)
    {
        return true;
    }else{
        return false;
    }
    }
//Method for checking existing email 
    public function getUserByEmail(string $email='')
    {
     //   $obj = new \stdClass();
        $con = $this->connectToDb();

        $query = $con->prepare("
    
        SELECT * FROM users WHERE email=:email_v 
    
    ");
        $query -> bindParam(":email_v",$email);
        $query->execute();

        if ($query->rowCount()==0)
        {
          return true;
        }else{
            return false;
        }
     
    }
//Method for database connection
    private function connectToDb(): PDO
    {
        $charset = 'utf8mb4';
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$charset}";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        try {
             $con = new PDO($dsn, $this->db_user, $this->db_password, $options);
        } catch (PDOException $e) {
             throw new PDOException($e->getMessage(), (int)$e->getCode());
            
        }

        return $con;
    }
}
