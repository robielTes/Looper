<?php

require_once __DIR__.'../../vendor/autoload.php';
use filu\maw_orm\Model;

class Answer extends Model
{
    static protected string $table = "answers";
    protected string $primaryKey = "id";
    public int $take;
    public string $answer;
    public int $fields_id;
}