<?php

namespace App\Models;

use filu\maw_orm\Model;
use ReflectionException;

class Field extends Model
{
    protected static string $table = "fields";
    protected string $primaryKey = "id";
    public int $id;
    public string $label;
    public int $line_id;
    public int $exercise_id;

    /**
     * verifies if the given field belong to the given exercise
     * @param int $exerciseId
     * @param int $fieldId
     * @return bool
     * @throws ReflectionException
     */
    public static function isBelong(int $exerciseId, int $fieldId): bool
    {
        return Field::find($fieldId)->exercise_id === $exerciseId;
    }

    /**
     * @param int $fid
     * @param $input
     * @throws ReflectionException
     */
    public static function update(int $fid, $input)
    {
        $field = Field::find($fid);
        $slug = strtolower(self::first(explode("-", $input['value-kind'])));
        $lineId = self::first(Line::where('slug', $slug))->id;
        $field->label = $input['label'];
        $field->line_id = $lineId;
        $field->save();
    }

    /**
     * create and store new field with the given data
     * @param int $id exercise
     * @param array $input form
     */
    public static function store(int $id, array $input): void
    {
        $lines = Line::where('kind', str_replace("_", " ", $input['value-kind']));
        $field = Field::make(['label' => $input['label'], 'line_id' => self::first($lines)->id, 'exercise_id' => $id]);
        $field->create();
    }

    /**
     * helper function that return the first item
     * @param array $array
     * @return mixed
     */
    public static function first(array $array): mixed
    {
        return $array[0];
    }
}
