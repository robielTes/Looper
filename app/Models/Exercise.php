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
     * @return mixed exercises table with inner join of fields table
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
     * @param string $stateSlug
     * @return array exercises table with inner join of states table with given state slug
     */
    public static function byState(string $stateSlug): array
    {
        $query = "SELECT exercises.id, title, name, slug FROM `exercises`
        inner join `states` on state_id = states.id
        where slug = :slug;";
        $connector = DB::getInstance();
        return $connector->selectMany($query, ["slug" => $stateSlug], Exercise::class);
    }

    /**
     * @param int $id exercise
     * @return mixed exercises table with inner join of states table
     */
    public static function state(int $id): mixed
    {
        $query = "SELECT * FROM `exercises`
        inner join `states` on state_id = states.id
        where exercises.id = :id;";
        $connector = DB::getInstance();
        return $connector->selectOne($query, ["id" => $id], Exercise::class);
    }

    /**
     * verifies if the exercise is in state of building, answering or closed
     * @param int $id exercise
     * @return bool
     */
    public static function isEditable(int $id): bool
    {
        $slug = Exercise::state($id)->slug;
        return $slug === "BLD";
    }

    /**
     * @return mixed next exercise to be created
     */
    public static function nextExercise(): mixed
    {
        return DB::getInstance()->selectOne("SELECT max(id)+1 as id FROM `exercises`", [], Exercise::class);
    }

    /**
     * create new exercise with the given input form
     * @param array $input
     * @return int of the created exercise id
     */
    public static function add(array $input): int
    {
        return Exercise::make(['title' => $input['title'], 'states_id' => ExerciseState::BLD])
            ->create();
    }

    /**
     * update the state to answering if param building is true else to closed
     * @param int $id exercise
     * @param bool $building if the status id building
     * @return void
     * @throws ReflectionException
     */
    public static function nextState(int $id, bool $building = false): void
    {
        $exercise = Exercise::find($id);
        $exercise->state_id = $building ? ExerciseState::ANS : ExerciseState::CLD;
        $exercise->save();
    }


    /**
     * call nextState with building param true if the state is building else with none
     * @param int $id exercise
     * @return void
     * @throws ReflectionException
     */
    public static function changeState(int $id): void
    {
        if (self::state($id)->slug === 'BLD') {
            self::nextState($id, true);
        } else {
            self::nextState($id);
        }
    }

    /**
     * verifies if the exercise is in state of building or answering
     * @param int $id exercise
     * @return bool
     */
    public static function isUpdatable(int $id): bool
    {
        $slug = Exercise::state($id)->slug;
        return $slug === "BLD" || $slug === "ANS";
    }


    /**
     * call changeState if the exercise is updatable and changeStatusTo is not given
     * call nextState with the status we want if changeStatusTo is give else do nothing
     * @param int $id exercise
     * @param string $changeStatusTo status we want
     * @return void
     * @throws ReflectionException
     */
    public static function updateState(int $id, string $changeStatusTo): void
    {
        if (self::isUpdatable($id) && $changeStatusTo === "") {
            self::changeState($id);
        } elseif ($changeStatusTo === "answering") {
            self::nextState($id, true);
        }
    }

    /**
     * verifies if the exercise is in state of building or closed
     * @param int $id exercise
     * @return bool
     */
    public static function isRemovable(int $id): bool
    {
        $slug = Exercise::state($id)->slug;
        return $slug === "BLD" || $slug === "CLD";
    }


    /**
     * remove exercise if the exercise is removable else do nothing
     * @param int $id exercise
     * @throws ReflectionException
     */
    public static function remove(int $id): void
    {
        if (self::isRemovable($id)) {
            Exercise::find($id)->delete();
        }
    }
}
