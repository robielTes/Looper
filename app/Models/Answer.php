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

    /**
     * @return mixed table answer with inner join to table fields, lines
     */
    public function result(): mixed
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

    /**
     * @return mixed table answer with inner join to table fulfillments
     */
    public function take(): mixed
    {
        $query = "SELECT answer, take FROM `answers`
                INNER join `fulfillments` on fulfillment_id = `fulfillments`.id
                where field_id = :field_id and fulfillment_id = :fulfillment_id";
        $connector = DB::getInstance();
        return $connector->selectMany($query, [
            "field_id" => $this->field_id,
            "fulfillment_id" => $this->fulfillment_id], Answer::class);
    }

    /**
     * @return mixed table answer with inner join to table fields, fulfillments
     */
    public function fulfillment(): mixed
    {
        $query = "SELECT fulfillment_id,answer,label FROM `answers`
                INNER JOIN `fields` on field_id = fields.id
                INNER join `fulfillments` on fulfillment_id = `fulfillments`.id
                where fulfillment_id = :fulfillment_id";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["fulfillment_id" => $this->fulfillment_id], Answer::class);
    }

    /**
     * @param int $fieldId
     * @param int $fulfillmentId
     * @return mixed table answer with the given fieldId and fulfillmentId
     */
    public static function answerField(int $fieldId, int $fulfillmentId): mixed
    {
        $query = "SELECT * FROM `answers`
                where field_id = :field_id and fulfillment_id = :fulfillment_id";
        $connector = DB::getInstance();
        return $connector->selectOne($query, [
            "field_id" => $fieldId,
            "fulfillment_id" => $fulfillmentId], Answer::class);
    }

    /**
     * Update the answer with the given input
     * @param int $fid
     * @param $input
     */
    public static function update(int $fid, $input):void
    {
        foreach ($input as $key => $value) {
            $answer = Answer::answerField($key, $fid);
            $answer->answer = $value;
            $answer->save();
        }
        $_SESSION['inputData'] = $input;
    }

    /**
     * store the new answer with the given data
     * first store answering time on fulfillment table
     * then use the created id  as fulfillment_id
     * @param int $exerciseId
     * @param $input
     * @return false
     */
    public static function store(int $exerciseId, $input):int
    {
        $fulfillment = Fulfillment::make(['take' => date('Y-m-d H:i:s')])->create();
        foreach ($input as $key => $value) {
            Answer::make([
                'answer' => $value,
                'field_id' => $key,
                'exercise_id' => $exerciseId,
                'fulfillment_id' => $fulfillment])
                ->create();
        }
        $_SESSION['inputData'] = $input;
        return $fulfillment;
    }
}
