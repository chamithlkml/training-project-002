<?php
namespace namefeeder;

use PDO;
use PDOException;

class Database{

    public $db_type = 'mysql';

    protected $sample = 'my_sample';

    // # Cannot accessible from outside
    // private $db_name;
    // private $db_user;
    // private $db_password;

    #PHP 5-7
    // public function __construct($db_name, $db_user, $db_password){
    //     $this->db_name = $db_name;
    //     $this->db_user = $db_user;
    //     $this->db_password = $db_password;
    // }

    # PHP 8
    public function __construct(private string $host='', private string $db_name = '', private string $db_user='', private string $db_password='')
    {

    }

    public function createUser(string $first_name, string $last_name, string $email, string $birthday): object
    {
        // @todo: Insert data to the database

        return new \stdClass();
    }

    public function getUserByEmail(string $email=''): object
    {
        $obj = new \stdClass();

        $con = $this->connectToDb();

        # SQL query
        // $con->prepare()

        return $obj;
    }

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
            // echo "sucsess";
        } catch (PDOException $e) {
             throw new PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $con;
    }

}
