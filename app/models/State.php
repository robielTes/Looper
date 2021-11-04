<?php

require_once 'vendor/autoload.php';

use filu\maw_orm\Model;

class State extends Model
{
    static protected string $table = "states";
    protected string $primaryKey = "id";
    public string $name;
}