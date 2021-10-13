<?php

require 'env.php';

class DB
{

    public static function connexion(): null|PDO
    {
        try{
            $PDO = new PDO("mysql:host=".PDO_DSN.";dbname=".PDO_DB, PDO_USERNAME, PDO_PASSWORD);
            return $PDO;
        }

        catch(PDOException $e){
            printf("Connection failed : %s\n", $e->getMessage());
            return null;
        }

    }

    private static function queryHander($query, $args)
    {
        $pdo = self::connexion();
        if($pdo != null) {
            $sth = $pdo->prepare($query);
            $sth->execute($args);
            return $sth;
        }
        return null;
    }

    public static function selectMany(String $query, array $args) :null|array
    {
        $sth = DB::queryHander($query,$args);
        if($sth != null){
            $row = $sth->fetchAll(PDO::FETCH_OBJ);
            return $row;
        }
        return null;

    }
    public static function selectOne( string $query, array $args)
    {

        $sth = DB::queryHander($query,$args);
        if($sth != null){
            $row = $sth->fetchObject();
            return $row;
        }
        return null;

    }
    public static function insert(string $query, array $args) : null|int
    {
        $sth = DB::queryHander($query,$args);
        if($sth != null){
            return $sth->rowCount();
        }
        return null;
    }
    public static function execute(string $query, array $args) : null|int
    {
        $sth = DB::queryHander($query,$args);
        if($sth != null){
            return $sth->rowCount();
        }
        return null;

    }

}