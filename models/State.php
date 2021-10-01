<?php

abstract class State
{
    private $db;
    private $error;

    function __construct($db_conn)
    {
        $this->db = $db_conn;

        session_start();
    }
}