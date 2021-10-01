<?php

class DB{

    public function connection(){
        $file = './env.ini';

        $parse = parse_ini_file($file,true);

        $host = $parse['PDO_DSN'];
        $dbname = $parse['PDO_DB'];
        $username = $parse['PDO_USERNAME'];
        $password = $parse['PDO_PASSWORD'];

        try {

            $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage());
        }
    }

}


