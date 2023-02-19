<?php


namespace Adaurum;


use PDO;

class LatestPosts
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function get(int $limit): ?array
    {
        $statment = $this->connection->prepare('SELECT * FROM post ORDER BY published_date DESC LIMIT ' . $limit
        );

        $statment->execute();
        return $statment->fetchAll();
    }
}