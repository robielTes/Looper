<?php

require_once 'vendor/autoload.php';
use filu\maw_orm\Model;

class Line extends Model
{
    static protected string $table = "lines";
    protected string $primaryKey = "id";
    public string $kind;
}