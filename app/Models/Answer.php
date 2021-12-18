<?php

namespace App\Models;

use filu\maw_orm\database\DB;
use filu\maw_orm\Model;

class Answer extends Model
{
    protected static string $table = "answers";
    protected string $primaryKey = "id";
    public int $id;
    public string $answer;
    public int $field_id;
    public int $exercise_id;
    public string $fulfillment_id;

    public function result()
    {
        $query = "SELECT fulfillment_id,answer,label,slug FROM `answers`
                INNER JOIN `fields` on field_id = fields.id
                INNER JOIN `exercises` on `answers`.exercise_id = exercises.id
                INNER JOIN `lines` on line_id = `lines`.id
                INNER join `fulfillments` on fulfillment_id = `fulfillments`.id
                where fulfillment_id = :fulfillment_id";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["fulfillment_id" => $this->fulfillment_id], Answer::class);
    }

    public function take()
    {
        $query = "SELECT answer, take FROM `answers`
                INNER join `fulfillments` on fulfillment_id = `fulfillments`.id
                where field_id = :field_id and fulfillment_id = :fulfillment_id";
        $connector = DB::getInstance();
        return $connector->selectMany($query, [
            "field_id" => $this->field_id,
            "fulfillment_id" => $this->fulfillment_id], Answer::class);
    }

    public function fulfillment()
    {
        $query = "SELECT fulfillment_id,answer,label FROM `answers`
                INNER JOIN `fields` on field_id = fields.id
                INNER join `fulfillments` on fulfillment_id = `fulfillments`.id
                where fulfillment_id = :fulfillment_id";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["fulfillment_id" => $this->fulfillment_id], Answer::class);
    }

    public static function answerField(int $fieldId, int $fulfillmentId)
    {
        $query = "SELECT * FROM `answers`
                where field_id = :field_id and fulfillment_id = :fulfillment_id";
        $connector = DB::getInstance();
        return $connector->selectOne($query, [
            "field_id" => $fieldId,
            "fulfillment_id" => $fulfillmentId], Answer::class);
    }
}
