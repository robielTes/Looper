<?php

require '../env.php';

class DB
{

    public static function connexion()
    {
        try{
            $PDO = new PDO("mysql:host=".PDO_DSN.";dbname=".PDO_DB, PDO_USERNAME, PDO_PASSWORD);
        }

        catch(PDOException $e){
            printf("Connection failed : %s\n", $e->getMessage());
            exit();

        }
        return $PDO;
    }


    public static function selectMany($query,$args): bool|array
    {
        $pdo = self::connexion();
        $sth = $pdo->prepare($query);
        var_dump($sth);
        $sth->execute($args);
        return $sth->fetchAll();
    }
    public static function selectOne($query,$args): bool|array
    {
        $pdo = self::connexion();
        $sth = $pdo->prepare($query);
        $sth->execute($args);
        return $sth->fetch();
    }
    public static function insert($query,$args): int
    {
        $pdo = self::connexion();
        $sth = $pdo->prepare($query);
        $sth->execute($args);
        return $sth->rowCount();
    }
    public static function execute($query,$args): int
    {
        $pdo = self::connexion();
        $sth = $pdo->prepare($query);
        //var_dump($args);
        //var_dump($sth);
        $sth->execute($args);
        return $sth->rowCount();
    }



}