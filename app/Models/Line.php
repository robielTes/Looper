<?php

require_once __DIR__.'../../vendor/autoload.php';
use filu\maw_orm\Model;

class Line extends Model
{

    static protected string $table = "answers";
    protected string $primaryKey = "id";
    public string $kind;
}