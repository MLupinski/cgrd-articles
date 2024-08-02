<?php

declare(strict_types=1);

namespace App\Core;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class Database
{
    private string $host;
    private string $dbname;
    private string $username;
    private string $password;
    private ?PDO $connection = null;


    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../../");
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
        $this->username = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
    }

    /**
     * @return PDO|null
     */
    public function getConnection(): ?PDO
    {
        try {
            $database = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT => true
            ];

            $this->connection = new PDO($database, $this->username, $this->password, $options);
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage());
        }

        return $this->connection;
    }
}
