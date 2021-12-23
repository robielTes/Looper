<?php

namespace App\Models;

use App\ExerciseState;
use filu\maw_orm\Model;
use filu\maw_orm\database\DB;
use ReflectionException;

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

    /**
     * @param int $stateId
     * @return array
     */
    public static function byState(string $stateSlug)
    {
        $query = "SELECT exercises.id, title, name, slug FROM `exercises`
        inner join `states` on state_id = states.id
        where slug = :slug;";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["slug" => $stateSlug], Exercise::class);
    }

    public static function state(int $id,string $stateSlug)
    {
        $query = "SELECT * FROM `exercises`
        inner join `states` on state_id = states.id
        where exercises.id = :id and slug = :slug;";
        $connector = DB::getInstance();
        return $connector->selectOne($query, ["id" => $id, "slug" => $stateSlug], Exercise::class);
    }

    public static function last()
    {
        //TODO add param to add after last id
        return DB::getInstance()->selectOne("SELECT max(id) as id FROM `exercises`", [], Exercise::class);
    }


    /**
     * @param int $id
     * @throws ReflectionException
     */
    public static function changeState(int $id)
    {
        //TODO fix the State so that i don't need to call find after it
        $exerciseState = Exercise::state($id);
        $exercise = Exercise::find($id);
        if ($exerciseState->slug === 'BLD') {
            $exercise->state_id = ExerciseState::ANS;
        } elseif ($exerciseState->slug === 'ANS') {
            $exercise->state_id = ExerciseState::CLD;
        }
        $exercise->save();
    }

    /**
     * @param int $id
     * @throws ReflectionException
     */
    public static function remove(int $id)
    {
        $exercise = Exercise::find($id);
        $exerciseState = Exercise::state($id);
        if ($exerciseState->slug === 'BLD' || $exerciseState->slug === 'CLD') {
            $exercise->delete();
        }
    }
}
