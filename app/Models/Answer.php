<?php

namespace App\Models;
use App\Models;
use filu\maw_orm\Model;

class Answer extends Model
{
    static protected string $table = "answers";
    protected string $primaryKey = "id";
    public int $take;
    public string $answer;
    public int $field_id;
    public int $exercise_id;
}