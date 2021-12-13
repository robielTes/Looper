<?php

namespace App\Models;

use App\Models;
use filu\maw_orm\Model;

class Field extends Model
{
    protected static string $table = "fields";
    protected string $primaryKey = "id";
    public int $id;
    public string $label;
    public int $line_id;
    public int $exercise_id;
}
