<?php

namespace namefeeder;

use PDO;
use PDOException;

/**
 * Database model class
 */
class Database
{
    private PDO|null $connection;
    public function __construct(
        private string $host = '',
        private string $db_name = '',
        private string $db_user = '',
        private string $db_password = ''
    ) {
        $this->connectToDb();
    }

    /**
     * Creates user and returns insert id
     *
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $birthday
     * @param string $password
     * @return int
     */
    public function createUser(
        string $first_name = '',
        string $last_name = '',
        string $email = '',
        string $birthday = '',
        string $password = ''
    ): int {
        try {
            $lastInsertId = 0;
            $query = $this->connection->prepare("
    
            INSERT INTO users (first_name,last_name,email,birthday,pass,created_on)
            VALUES(:first_name_v,:last_name_v,:email_v,:birthday_v,:pass_v, now())
        
                ");

            $query -> bindParam(":first_name_v", $first_name);
            $query -> bindParam(":last_name_v", $last_name);
            $query -> bindParam(":email_v", $email);
            $query -> bindParam(":birthday_v", $birthday);
            $query -> bindParam(":pass_v", $password);

            $query->execute();

            $lastInsertId = $this->connection->lastInsertId();
        } catch (PDOException $e) {
            $this->connection->rollback();

            throw new PDOException($e->getMessage(), $e->getCode());
        }

        return $lastInsertId;
    }

    public function findUser(int $id = 0): array|false
    {
        $query = $this->connection->prepare(
            "SELECT first_name, last_name, email, birthday FROM
             users WHERE id=:id AND deleted_on IS NULL"
        );

        $query -> bindParam(":id", $id);
        $query->execute();

        return $query->fetch();
    }

    public function getUser(string $email = '', string $password = ''): bool|array
    {
        $query = $this->connection->prepare("
        SELECT id, first_name, last_name, email, birthday 
        FROM users WHERE email=:email_v AND pass=:pass_v 
        AND deleted_on IS NULL
        ");

        $query -> bindParam(":email_v", $email);
        $query -> bindParam(":pass_v", $password);
        $query->execute();

        return $query->fetch();
    }

    public function userExists(string $email = ''): bool
    {
        $query = $this->connection->prepare("SELECT count(*) as users_count FROM users WHERE email=:email_v");
        $query -> bindParam(":email_v", $email);
        $query->execute();

        $results = $query->fetch();

        return $results['users_count'] > 0;
    }

    private function connectToDb(): void
    {
        $charset = 'utf8mb4';
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$charset}";
        $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
             $this->connection = new PDO($dsn, $this->db_user, $this->db_password, $options);
        } catch (PDOException $e) {
             throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    /**
     * Disconnect from DB manually
     *
     * @return void
     */
    public function disconnectFromDb(): void
    {
        $this->connection = null;
    }
}
