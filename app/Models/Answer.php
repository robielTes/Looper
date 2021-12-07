<?php

namespace App\Models;
use filu\maw_orm\database\DB;
use filu\maw_orm\Model;

class Answer extends Model
{
    static protected string $table = "answers";
    protected string $primaryKey = "id";
    public int $id;
    public string $answer;
    public int $field_id;
    public int $exercise_id;
    public string $fulfillment_id;

    public function result()
    {
        $query = "SELECT take,answer,label,slug FROM `answers`
                INNER JOIN `fields` on field_id = fields.id
                INNER JOIN `exercises` on `answers`.exercise_id = exercises.id
                INNER JOIN `lines` on line_id = `lines`.id
                INNER join `fulfillments` on fulfillment_id = `fulfillments`.id
                where take = :take";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["take" => $this->take], Answer::class);
    }

}