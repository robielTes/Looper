<?php

namespace App\Models;
use filu\maw_orm\database\DB;
use filu\maw_orm\Model;

class Answer extends Model
{
    static protected string $table = "answers";
    protected string $primaryKey = "id";
    public int $id;
    public string $take;
    public string $answer;
    public int $field_id;
    public int $exercise_id;

    public function result()
    {
        $query = "SELECT answer, label FROM `answers`
        INNER JOIN `fields` on fields.id = `answers`.field_id
        WHERE `answers`.exercise_id = :id";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["id" => $this->id], Answer::class);

    }
}