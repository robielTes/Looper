<?php

namespace App\Models;

use filu\maw_orm\Model;
use filu\maw_orm\database\DB;

class Exercise extends Model
{
    protected static string $table = "exercises";
    protected string $primaryKey = "id";
    public int $id;
    public string $title;
    public int $state_id;

    /**
     * @return mixed
     */
    public function fields(): mixed
    {
        $query = "select fields.id, label, kind,value_kind, slug from fields
        inner join `lines` on lines.id = fields.line_id
        where fields.exercise_id = :id";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["id" => $this->id], Exercise::class);
    }

    public static function building(){
        return Exercise::where('state_id',1);
    }

    public static function answering(){
        return Exercise::where('state_id',2);
    }

    public static function closed(){
        return Exercise::where('state_id',3);
    }

    public static function changeState(int $id){
        $exercise = Exercise::find($id);
        if ($exercise->state_id === 1) {
            $exercise->state_id = 2;
        } elseif ($exercise->state_id === 2) {
            $exercise->state_id = 3;
        }
        $exercise->save();
    }

}
