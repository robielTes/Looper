<?php

require_once __DIR__.'../../vendor/autoload.php';
use filu\maw_orm\Model;

class Exercise extends Model
{
    static protected string $table = "exercises";
    protected string $primaryKey = "id";
    public string $title;
    public int $states_id;
}