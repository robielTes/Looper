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
     * verifies if the exercise is in state of building
     * @param int $exerciseId
     * @return bool
     */
    public static function isEditable(int $exerciseId): bool
    {
        $slug = Exercise::state($exerciseId)->slug;
        return $slug === "BLD";
    }

    /**
     * verifies if the exercise is in state of answering
     * @param int $exerciseId
     * @return bool
     */
    public static function isAnswerable(int $exerciseId): bool
    {
        $slug = Exercise::state($exerciseId)->slug;
        return $slug === "ANS";
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
     * @param int $exerciseId
     * @param bool $building if the status id building
     * @return void
     * @throws ReflectionException
     */
    public static function nextState(int $exerciseId, bool $building = false): void
    {
        $exercise = Exercise::find($exerciseId);
        $exercise->state_id = $building ? ExerciseState::ANS : ExerciseState::CLD;
        $exercise->save();
    }


    /**
     * call nextState with building param true if the state is building else with none
     * @param int $exerciseId
     * @return void
     * @throws ReflectionException
     */
    public static function changeState(int $exerciseId): void
    {
        if (self::state($exerciseId)->slug === 'BLD') {
            self::nextState($exerciseId, true);
        } else {
            self::nextState($exerciseId);
        }
    }

    /**
     * verifies if the exercise is in state of building or answering
     * @param int $exerciseId
     * @return bool
     */
    public static function isUpdatable(int $exerciseId): bool
    {
        $slug = Exercise::state($exerciseId)->slug;
        return $slug === "BLD" || $slug === "ANS";
    }


    /**
     * call changeState if the exercise is updatable and changeStatusTo is not given
     * call nextState with the status we want if changeStatusTo is give else do nothing
     * @param int $exerciseId
     * @param string $changeStatusTo status we want
     * @return void
     * @throws ReflectionException
     */
    public static function updateState(int $exerciseId, string $changeStatusTo): void
    {
        if (self::isUpdatable($exerciseId) && $changeStatusTo === "") {
            self::changeState($exerciseId);
        } elseif ($changeStatusTo === "answering") {
            self::nextState($exerciseId, true);
        }
    }

    /**
     * verifies if the exercise is in state of building or closed
     * @param int $exerciseId
     * @return bool
     */
    public static function isRemovable(int $exerciseId): bool
    {
        $slug = Exercise::state($exerciseId)->slug;
        return $slug === "BLD" || $slug === "CLD";
    }


    /**
     * remove exercise if the exercise is removable else do nothing
     * @param int $exerciseId
     * @throws ReflectionException
     */
    public static function remove(int $exerciseId): void
    {
        if (self::isRemovable($exerciseId)) {
            Exercise::find($exerciseId)->delete();
        }
    }
}
