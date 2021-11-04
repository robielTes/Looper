<?php

require_once 'vendor/autoload.php';

use filu\maw_orm\Model;

class Exercise extends Model
{
    static protected string $table = "exercices";
    protected string $primaryKey = "id";
    public string $title;
    public int $states_id;
}