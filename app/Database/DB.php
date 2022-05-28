<?php

namespace App\Database;

use Exception;
use PDO;

class DB {
    private static function makeConnection(): PDO {
        $dbname = 'flashcards';
        $host = '127.0.0.1';
        $user = 'root';
        $senha = '';

        try {
            return new PDO ("mysql:dbname=" . $dbname . ";host=" . $host, $user, $senha);
        }
        catch (Exception $exception) {
            throw $exception;
        }
    }

    public static function handle(string $sql): array {
        $pdo = self::makeConnection();

        try {
            $cmd = $pdo->query($sql);
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        catch(Exception $exception) {
            throw $exception;
        }
    }
}