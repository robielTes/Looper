<?php

namespace App\Models;

use filu\maw_orm\Model;

class Field extends Model
{
    protected static string $table = "fields";
    protected string $primaryKey = "id";
    public int $id;
    public string $label;
    public int $line_id;
    public int $exercise_id;

    /**
     * @param int $fid
     * @param $input
     * @throws \ReflectionException
     */
    public static function update(int $fid, $input)
    {
        $field = Field::find($fid);
        $slug = strtolower(explode("-", $input['value-kind'])[0]);
        $lineId = Line::where('slug', $slug)[0]->id;
        $field->label = $input['label'];
        $field->line_id = $lineId;
        $field->save();
    }

    /**
     * @param int $id
     * @param $input
     */
    public static function store(int $id, $input)
    {
        $lines = Line::where('kind', str_replace("_", " ", $input['value-kind']));
        $field = Field::make(['label' => $input['label'], 'line_id' => $lines[0]->id, 'exercise_id' => $id]);
        $field->create();
    }
}
