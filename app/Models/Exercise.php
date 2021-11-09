<?php

namespace App\Models;
use App\Models;
use filu\maw_orm\Model;
use filu\maw_orm\database\DB;


class Exercise extends Model
{
    static protected string $table = "exercises";
    protected string $primaryKey = "id";
    public string $title;
    public int $states_id;

    public function fields()
    {
        $query = "select label, kind from fields
        inner join `lines` on lines.id = fields.lines_id
        where fields.exercises_id = :id";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["id" => $this->id], Exercise::class);
    }
}